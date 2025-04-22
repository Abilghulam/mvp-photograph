<?php
require 'server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil semua data form
    $jenis_layanan = $_POST['jenis_layanan'];
    $tanggal_pemesanan = $_POST['tanggal_pemesanan'];
    $waktu_pemesanan = $_POST['waktu_pemesanan'];
    $lokasi = $_POST['lokasi'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];

    // Insert ke database
    $stmt = $conn->prepare("INSERT INTO pemesanan (jenis_layanan, tanggal_pemesanan, waktu_pemesanan, lokasi, nama_lengkap, nomor_telepon, email, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Menunggu')");
    $stmt->bind_param("sssssss", $jenis_layanan, $tanggal_pemesanan, $waktu_pemesanan, $lokasi, $nama_lengkap, $nomor_telepon, $email);

    if ($stmt->execute()) {
        // Redirect ke halaman sebelumnya dengan success
        header("Location: ../index.php?success=true");
        exit();
    } else {
        echo "<script>alert('Gagal mengirim pemesanan!'); window.history.back();</script>";
    }
}
?>
