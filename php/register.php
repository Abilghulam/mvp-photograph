<?php

// Include file koneksi
require 'server.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirm_password = $_POST['confirm_password'] ?? null;

    if (!$name || !$email || !$password || !$confirm_password) {
        echo "<script>alert('Semua field wajib diisi!'); window.location.href='../reglog.php';</script>";
        exit();
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan Konfirmasi Password tidak sama!'); window.location.href='../reglog.php';</script>";
        exit();
    }

    // Cek apakah email sudah terdaftar
    $check = $conn->prepare("SELECT * FROM logreg WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location.href='../reglog.php';</script>";
        exit();
    }

    // Hash password sebelum simpan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan user baru ke database
    $stmt = $conn->prepare("INSERT INTO logreg (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='../logreg.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal!'); window.location.href='../reglog.php';</script>";
    }
} else {
    echo "Akses tidak sah.";
}
?>
