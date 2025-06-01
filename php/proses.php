<?php
require 'server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil semua data form
    $jenis_layanan = $_POST['jenis_layanan'];
    $harga_paket = isset($_POST['harga_paket']) ? floatval($_POST['harga_paket']) : 0;
    $tanggal_pemesanan = $_POST['tanggal_pemesanan'];
    $waktu_pemesanan = $_POST['waktu_pemesanan'];
    $lokasi = $_POST['lokasi'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];

    // Insert ke database
    $stmt = $conn->prepare("INSERT INTO pemesanan 
        (jenis_layanan, harga_paket, tanggal_pemesanan, waktu_pemesanan, lokasi, nama_lengkap, nomor_telepon, email, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Menunggu')");
    
    // s = string, d = double
    $stmt->bind_param("sdssssss", 
        $jenis_layanan, 
        $harga_paket, 
        $tanggal_pemesanan, 
        $waktu_pemesanan, 
        $lokasi, 
        $nama_lengkap, 
        $nomor_telepon, 
        $email
    );

    if ($stmt->execute()) {
        header("Location: ../index.php?success=true");
        exit();
    } else {
        echo "<script>alert('Gagal mengirim pemesanan!'); window.history.back();</script>";
    }
}
?>
