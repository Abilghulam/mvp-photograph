<?php
// Require file koneksi
require 'server.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if (!$email || !$password) {
        echo "<script>alert('Akses ditolak!'); window.location.href='../logreg.php';</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM logreg WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            // Simpan data ke sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['role']; // pastikan kolom 'role' ada di tabel logreg

            // Cek role
            if ($user['role'] === 'admin') {
                header("Location: ../index-admin.php"); // ke dashboard admin
            } else {
                header("Location: ../index.php"); // ke halaman client
            }
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location.href='../logreg.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.location.href='../logreg.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Akses ditolak!'); window.location.href='../logreg.php';</script>";
    exit();
}
?>
