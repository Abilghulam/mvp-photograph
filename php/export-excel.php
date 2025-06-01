<?php
require '../vendor/autoload.php';
require 'server.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Ambil parameter dari URL
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
$to_date = isset($_GET['to_date']) ? $_GET['to_date'] : '';

// Validasi status
if ($status_filter !== 'Disetujui') {
    die('Status tidak valid untuk laporan.');
}

// Query data
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

// Buat spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Judul besar di atas tabel
$sheet->mergeCells('A1:I1');
$sheet->setCellValue('A1', 'Laporan Pemesanan Jasa Fotografi');
$sheet->getStyle('A1')->applyFromArray([
    'font' => ['bold' => true, 'size' => 16],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
]);

// Header tabel (baris ke-3)
$headers = [
    'ID', 'Jenis Layanan', 'Tanggal Pemesanan', 'Waktu Pemesanan',
    'Lokasi', 'Nama Lengkap', 'Nomor Telepon', 'Email', 'Created At'
];
$sheet->fromArray($headers, NULL, 'A3');

// Styling Header: warna merah dan tebal
$sheet->getStyle('A3:I3')->applyFromArray([
    'font' => ['bold' => true, 'color' => ['argb' => Color::COLOR_WHITE]],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['argb' => 'FFFF0000'], // merah terang
    ],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    'borders' => [
        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
    ],
]);

// Isi data mulai dari baris ke-4
$row = 4;
while ($data = $result->fetch_assoc()) {
    $sheet->setCellValue("A$row", $data['id']);
    $sheet->setCellValue("B$row", $data['jenis_layanan']);
    $sheet->setCellValue("C$row", $data['tanggal_pemesanan']);
    $sheet->setCellValue("D$row", $data['waktu_pemesanan']);
    $sheet->setCellValue("E$row", $data['lokasi']);
    $sheet->setCellValue("F$row", $data['nama_lengkap']);
    $sheet->setCellValue("G$row", $data['nomor_telepon']);
    $sheet->setCellValue("H$row", $data['email']);
    $sheet->setCellValue("I$row", $data['created_at']);
    $row++;
}

// Autofit & Border untuk semua data
$lastRow = $row - 1;
foreach (range('A', 'I') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}
$sheet->getStyle("A3:I$lastRow")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

// Output ke browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan Pemesanan Jasa Fotografi.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
