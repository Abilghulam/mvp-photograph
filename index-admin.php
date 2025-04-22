<?php
session_start();

// Require file koneksi
require 'php/server.php';

// Tangkap status filter dari URL
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';

// Query utama
if ($status_filter != '' && in_array($status_filter, ['Menunggu', 'Disetujui', 'Ditolak'])) {
    $stmt = $conn->prepare("SELECT * FROM pemesanan WHERE status = ?");
    $stmt->bind_param("s", $status_filter);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Kalau tidak ada filter, tampilkan semua
    $result = $conn->query("SELECT * FROM pemesanan");
}

// Untuk login admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: php/login.php');
    exit();
}

// Query untuk menghitung data dashboard
$total_pemesanan = $conn->query("SELECT COUNT(*) AS total FROM pemesanan")->fetch_assoc()['total'];
$menunggu = $conn->query("SELECT COUNT(*) AS total FROM pemesanan WHERE status = 'Menunggu'")->fetch_assoc()['total'];
$disetujui = $conn->query("SELECT COUNT(*) AS total FROM pemesanan WHERE status = 'Disetujui'")->fetch_assoc()['total'];
$ditolak = $conn->query("SELECT COUNT(*) AS total FROM pemesanan WHERE status = 'Ditolak'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Most Valuable Photograph</title>
    <link rel="stylesheet" href="css/style-admin.css">
</head>
<body>
<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h1>MV<span>Photograph</span></h1>
        </div>
        <div class="menu">
            <div class="menu-title">Main Menu</div>
            <div class="menu-item active" onclick="window.location.href='index-admin.php'">
                <i>📊</i> Pemesanan
            </div>

            <div class="menu-item" onclick="window.location.href='laporan-admin.php'">
                <i>📋</i> Laporan
            </div>

            <div class="menu-title">Option</div>
            <!-- Tombol Logout -->
            <div class="menu-item logout" onclick="confirmLogout()" style="color: #ff6b6b;">
                <i>🚪</i> Logout
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>Dashboard Admin</h2>
        </div>

        <!-- Stats Cards -->
        <div class="content-cards">
            <div class="card">
                <h3>Total Pemesanan</h3>
                <p><?= $total_pemesanan ?></p>
            </div>
            <div class="card">
                <h3>Menunggu Konfirmasi</h3>
                <p><?= $menunggu ?></p>
            </div>
            <div class="card">
                <h3>Disetujui</h3>
                <p><?= $disetujui ?></p>
            </div>
            <div class="card">
                <h3>Ditolak</h3>
                <p><?= $ditolak ?></p>
            </div>
        </div>


        <!-- Orders Section -->
        <div class="orders-section">
            <div class="section-header">
                <h3 class="section-title">Daftar Pemesanan Terbaru</h3>
                <select class="filter-dropdown" onchange="filterStatus(this.value)">
                    <option value="">Semua Status</option>
                    <option value="Menunggu" <?= $status_filter == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                    <option value="Disetujui" <?= $status_filter == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                    <option value="Ditolak" <?= $status_filter == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                </select>
            </div>

            <!-- Table Section -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jenis Layanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Waktu Pemesanan</th>
                        <th>Lokasi</th>
                        <th>Nama Lengkap</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['jenis_layanan']) ?></td>
                                <td><?= htmlspecialchars($row['tanggal_pemesanan']) ?></td>
                                <td><?= htmlspecialchars($row['waktu_pemesanan']) ?></td>
                                <td><?= htmlspecialchars($row['lokasi']) ?></td>
                                <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                                <td><?= htmlspecialchars($row['nomor_telepon']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td>
                                    <?php
                                    $status = $row['status'];
                                    $class = '';

                                    if ($status == 'Menunggu') {
                                        $class = 'pending';
                                    } elseif ($status == 'Disetujui') {
                                        $class = 'approved';
                                    } elseif ($status == 'Ditolak') {
                                        $class = 'rejected';
                                    } elseif ($status == 'Selesai') {
                                        $class = 'completed';
                                    }

                                    echo '<span class="status ' . $class . '">' . htmlspecialchars($status) . '</span>';
                                    ?>
                                </td>

                                <td class="action-button">
                                    <?php if ($row['status'] == 'Menunggu'): ?>
                                        <form action="php/update-status.php" method="POST" style="display:inline-block;" onsubmit="return confirmAction();">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <input type="hidden" name="status" value="Disetujui">
                                            <button type="submit" class="btn btn-approve">Terima</button>
                                        </form>
                                        <form action="php/update-status.php" method="POST" style="display:inline-block;" onsubmit="return confirmAction();">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <input type="hidden" name="status" value="Ditolak">
                                            <button type="submit" class="btn btn-reject">Tolak</button>
                                        </form>
                                    <?php else: ?>
                                        <button class="btn btn-view" onclick="openDetailPesanan(<?= $row['id'] ?>)">Detail</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10">Belum ada pemesanan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <!-- Modal Detail Pesanan -->
            <div id="detailPesananModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeModal('detailPesananModal')">&times;</span>
                    <h2 id="detailNama">Detail Pesanan</h2>
                    <ul id="detailData"></ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/admin.js"></script>
<script src="js/detail-admin.js"></script>
<script src="js/logout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
