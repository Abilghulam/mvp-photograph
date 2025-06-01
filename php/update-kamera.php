<?php
session_start();
require 'server.php';

$tipe = $_POST['tipe'];
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga_sewa'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$target = "../img/" . basename($gambar);

if (!empty($gambar)) {
    move_uploaded_file($tmp, $target);
}

if (empty($id)) {
    // INSERT (Prepared Statements)
    switch ($tipe) {
        case 'kamera':
            $stmt = $conn->prepare("INSERT INTO kamera (nama_kamera, harga_sewa, deskripsi, status, gambar) VALUES (?, ?, ?, ?, ?)");
            break;
        case 'lensa':
            $stmt = $conn->prepare("INSERT INTO lensa (nama_lensa, harga_sewa, deskripsi, status, gambar) VALUES (?, ?, ?, ?, ?)");
            break;
        case 'aksesoris':
            $stmt = $conn->prepare("INSERT INTO aksesoris (nama_aksesoris, harga_sewa, deskripsi, status, gambar) VALUES (?, ?, ?, ?, ?)");
            break;
    }
    $stmt->bind_param("sssss", $nama, $harga, $deskripsi, $status, $gambar);
    $stmt->execute();
    $_SESSION['alert'] = 'Data berhasil ditambahkan.';
} else {
    // UPDATE (Prepared Statements)
    switch ($tipe) {
        case 'kamera':
            if (!empty($gambar)) {
                $stmt = $conn->prepare("UPDATE kamera SET nama_kamera=?, harga_sewa=?, deskripsi=?, status=?, gambar=? WHERE id_kamera=?");
                $stmt->bind_param("sssssi", $nama, $harga, $deskripsi, $status, $gambar, $id);
            } else {
                $stmt = $conn->prepare("UPDATE kamera SET nama_kamera=?, harga_sewa=?, deskripsi=?, status=? WHERE id_kamera=?");
                $stmt->bind_param("ssssi", $nama, $harga, $deskripsi, $status, $id);
            }
            break;
        case 'lensa':
            if (!empty($gambar)) {
                $stmt = $conn->prepare("UPDATE lensa SET nama_lensa=?, harga_sewa=?, deskripsi=?, status=?, gambar=? WHERE id_lensa=?");
                $stmt->bind_param("sssssi", $nama, $harga, $deskripsi, $status, $gambar, $id);
            } else {
                $stmt = $conn->prepare("UPDATE lensa SET nama_lensa=?, harga_sewa=?, deskripsi=?, status=? WHERE id_lensa=?");
                $stmt->bind_param("ssssi", $nama, $harga, $deskripsi, $status, $id);
            }
            break;
        case 'aksesoris':
            if (!empty($gambar)) {
                $stmt = $conn->prepare("UPDATE aksesoris SET nama_aksesoris=?, harga_sewa=?, deskripsi=?, status=?, gambar=? WHERE id_aksesoris=?");
                $stmt->bind_param("sssssi", $nama, $harga, $deskripsi, $status, $gambar, $id);
            } else {
                $stmt = $conn->prepare("UPDATE aksesoris SET nama_aksesoris=?, harga_sewa=?, deskripsi=?, status=? WHERE id_aksesoris=?");
                $stmt->bind_param("ssssi", $nama, $harga, $deskripsi, $status, $id);
            }
            break;
    }
    $stmt->execute();
    $_SESSION['alert'] = 'Data berhasil diperbarui.';
}

header("Location: ../kamera-admin.php");
exit;
