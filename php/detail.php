<?php
require 'server.php';

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'ID tidak ditemukan']);
    exit;
}

$id = intval($_GET['id']);
$query = $conn->prepare("SELECT * FROM pemesanan WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo json_encode(['error' => 'Data tidak ditemukan']);
    exit;
}

echo json_encode($data);
?>
