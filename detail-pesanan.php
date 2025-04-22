<?php
require 'php/detail.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="css/style-admin.css">
</head>
<body>

    <div class="detail-container">
            <!-- Modal Detail Pesanan -->
        <div id="detailPesananModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('detailPesananModal')">&times;</span>
            <h2 id="detailNama">Detail Pesanan</h2>
            <ul id="detailData">
            <!-- Data akan diisi lewat JS -->
            </ul>
        </div>
        </div>
        <div class="detail-buttons">
            <a href="index-admin.php" class="btn-dtl btn-back">Kembali</a>
        </div>
    </div>
    <script src="js/detail-admin.js"></script>
</body>
</html>
