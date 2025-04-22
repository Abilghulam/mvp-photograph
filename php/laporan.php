<?php
require 'vendor/autoload.php'; // penting untuk memanggil library

use Dompdf\Dompdf;

// Koneksi ke database
require 'php/server.php'; 

// Query database
$result = $conn->query("SELECT * FROM pemesanan");

// Buat HTML untuk isi PDF
$html = '<h1>Data Pemesanan</h1><table border="1" cellpadding="5" cellspacing="0"><tr><th>ID</th><th>Nama</th><th>Status</th></tr>';

while($row = $result->fetch_assoc()) {
    $html .= '<tr><td>'.$row['id'].'</td><td>'.$row['nama'].'</td><td>'.$row['status'].'</td></tr>';
}
$html .= '</table>';

// Inisialisasi Dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Set ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Outputkan ke browser
$dompdf->stream("laporan_pemesanan.pdf", array("Attachment" => false));
?>
