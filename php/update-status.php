<?php
session_start(); // penting untuk ambil user_id admin
require 'server.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $status = $_POST['status'] ?? '';

    if ($id <= 0 || empty($status)) {
        echo json_encode(['success' => false, 'message' => 'ID atau status kosong / salah.']);
        exit;
    }

    $stmt = $conn->prepare("UPDATE pemesanan SET status = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("si", $status, $id);
        if ($stmt->execute()) {

            // Catat aktivitas admin
            if (isset($_SESSION['user_id'])) {
                $admin_id = $_SESSION['user_id'];
                $aksi = "Mengubah status pemesanan ID $id menjadi '$status'";
                $log_stmt = $conn->prepare("INSERT INTO aktivitas_admin (admin_id, aksi) VALUES (?, ?)");
                if ($log_stmt) {
                    $log_stmt->bind_param("is", $admin_id, $aksi);
                    $log_stmt->execute();
                    $log_stmt->close();
                }
            }

            echo json_encode(['success' => true, 'message' => 'Status berhasil diperbarui.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal update database.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error prepare statement: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Metode request tidak valid.']);
}
?>
