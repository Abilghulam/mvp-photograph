<?php
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Most Valueable Photograph</title>
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
            <div class="menu-item" onclick="window.location.href='index-admin.php'">
                <i>📊</i> Pemesanan
            </div>

            <div class="menu-item active" onclick="window.location.href='laporan-admin.php'">
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

        <!-- Orders Section -->
        <div class="orders-section">
            <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="section-title" style="margin: 0;">Laporan Pemesanan</h3>

                <!-- Section Filter Status -->
                <div style="display: flex; align-items: center; gap: 10px;">
                <select class="filter-dropdown" onchange="filterStatus(this.value)">
                    <option value="">Semua Status</option>
                    <option value="Menunggu" <?= $status_filter == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                    <option value="Disetujui" <?= $status_filter == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                    <option value="Ditolak" <?= $status_filter == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                </select>

                <?php if ($status_filter == 'Disetujui') : ?>
                <!-- Section Filter Created Order -->
                <div class="date-filter">
                    <label for="from_date">Start Date:</label>
                    <input type="date" id="from_date" name="from_date" value="<?= isset($_GET['from_date']) ? $_GET['from_date'] : '' ?>">

                    <label for="to_date">End Date:</label>
                    <input type="date" id="to_date" name="to_date" value="<?= isset($_GET['to_date']) ? $_GET['to_date'] : '' ?>">
                </div>

                <!-- Section Download laporan -->
                    <form method="GET" action="php/export-pdf.php" style="display: inline;" target="_blank">
                        <input type="hidden" name="status" value="<?= htmlspecialchars($status_filter) ?>">
                        <input type="hidden" id="hidden_from_date" name="from_date" value="">
                        <input type="hidden" id="hidden_to_date" name="to_date" value="">
                        <button type="submit" class="btn btn-download" style="background-color: green; color: white; padding: 8px 16px; border-radius: 6px; border: none;">
                            Download PDF
                        </button>
                    </form>
                <?php endif; ?>
                </div>
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
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10">Belum ada pemesanan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="js/laporan-admin.js"></script>
<script src="js/logout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
