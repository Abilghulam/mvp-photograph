<?php
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
        $stmt->bind_param("si", $status, $id); // sekarang id beneran integer
        if ($stmt->execute()) {
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
