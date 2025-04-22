<?php
require '../vendor/autoload.php';
require 'server.php';

use Dompdf\Dompdf;

// Ambil parameter dari URL
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
$to_date = isset($_GET['to_date']) ? $_GET['to_date'] : '';

// Validasi status
if ($status_filter !== 'Disetujui') {
    die('Status tidak valid untuk laporan.');
}

// Filter database
if (!empty($from_date) && !empty($to_date)) {
    $stmt = $conn->prepare("SELECT * FROM pemesanan WHERE status = ? AND created_at BETWEEN ? AND ?");
    $from_date_full = $from_date . " 00:00:00";
    $to_date_full = $to_date . " 23:59:59";
    $stmt->bind_param("sss", $status_filter, $from_date_full, $to_date_full);
} else {
    $stmt = $conn->prepare("SELECT * FROM pemesanan WHERE status = ?");
    $stmt->bind_param("s", $status_filter);
}

$stmt->execute();
$result = $stmt->get_result();

// Baca file CSS
$css = @file_get_contents('../css/style-laporan.css');
if ($css === false) {
    die('Gagal membaca file CSS.');
}

// Awal HTML
$html = '<html><head><style>' . $css . '</style></head><body>';

// Tambah konten
$html .= '<h1>Laporan Pemesanan Disetujui</h1>';
$html .= '<table>';
$html .= '
    <thead>
        <tr>
            <th>ID</th>
            <th>Jenis Layanan</th>
            <th>Tanggal Pemesanan</th>
            <th>Waktu Pemesanan</th>
            <th>Lokasi</th>
            <th>Nama Lengkap</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
';


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($row['id']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['jenis_layanan']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['tanggal_pemesanan']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['waktu_pemesanan']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['lokasi']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['nama_lengkap']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['nomor_telepon']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['email']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['created_at']) . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="9" style="text-align:center;">Tidak ada data ditemukan pada rentang tanggal ini.</td></tr>';
}

$html .= '</tbody></table>';

// Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan Pemesanan Jasa Fotografi.pdf", array("Attachment" => false));
?>
