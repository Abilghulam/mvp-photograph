<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: php/login.php');
    exit();
}

require 'php/server.php';

// Statistik
$total_pemesanan = $conn->query("SELECT COUNT(*) AS total FROM pemesanan")->fetch_assoc()['total'];
$menunggu = $conn->query("SELECT COUNT(*) AS total FROM pemesanan WHERE status = 'Menunggu'")->fetch_assoc()['total'];
$disetujui = $conn->query("SELECT COUNT(*) AS total FROM pemesanan WHERE status = 'Disetujui'")->fetch_assoc()['total'];
$ditolak = $conn->query("SELECT COUNT(*) AS total FROM pemesanan WHERE status = 'Ditolak'")->fetch_assoc()['total'];

// Data terbaru
$recent = $conn->query("SELECT * FROM pemesanan ORDER BY id DESC LIMIT 5");

// Recent actions (activity log)
$recent_actions = $conn->query("SELECT nama_lengkap, jenis_layanan, status, tanggal_pemesanan, waktu_pemesanan FROM pemesanan ORDER BY id DESC LIMIT 5");
$log_admin = $conn->query("SELECT * FROM aktivitas_admin ORDER BY waktu DESC LIMIT 5");

// Kalender pemesanan
$agenda = $conn->query("
    SELECT nama_lengkap, jenis_layanan, tanggal_pemesanan, waktu_pemesanan 
    FROM pemesanan 
    WHERE status = 'Disetujui'
");
$event_data = [];
while ($row = $agenda->fetch_assoc()) {
    $event_data[] = [
        'title' => $row['nama_lengkap'] . ' - ' . $row['jenis_layanan'],
        'start' => $row['tanggal_pemesanan'] . 'T' . $row['waktu_pemesanan']
    ];
}

// Statistik untuk chart
$chartData = $conn->query("SELECT jenis_layanan, COUNT(*) as jumlah FROM pemesanan GROUP BY jenis_layanan");
$chart_labels = [];
$chart_values = [];
while ($row = $chartData->fetch_assoc()) {
    $chart_labels[] = $row['jenis_layanan'];
    $chart_values[] = $row['jumlah'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Home</title>
    <link rel="stylesheet" href="css/style-admin.css">

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <div class="logo">
            <h1>MV<span>Photograph</span></h1>
        </div>
        <div class="menu">

            <!-- Section Sewa -->
            <div class="menu-title">Layanan Jasa</div>

            <div class="menu-item active" onclick="window.location.href='home-admin.php'">
                <i>🏠</i> Home
            </div>
            <div class="menu-item" onclick="window.location.href='index-admin.php'">
                <i>📊</i> Pemesanan
            </div>
            <div class="menu-item" onclick="window.location.href='laporan-admin.php'">
                <i>📋</i> Laporan
            </div>

            <!-- Section Sewa -->
            <div class="menu-title">Layanan Sewa</div>
            <div class="menu-item" onclick="window.location.href='kamera-admin.php'">
                <i>📷</i> Data Kamera
            </div>

            <!-- Section Option -->
            <div class="menu-title">Option</div>
            <div class="menu-item logout" onclick="confirmLogout()" style="color: #ff6b6b;">
                <i>🚪</i> Logout
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h2>Welcome, Admin!</h2>
            <p>Last Login <?= date('d M Y H:i:s') ?></p>
        </div>

        <!-- Ringkasan -->
        <div class="content-cards">
            <div class="card"><h3>Total Order</h3><p><?= $total_pemesanan ?></p></div>
            <div class="card"><h3>Pending</h3><p><?= $menunggu ?></p></div>
            <div class="card"><h3>Approved</h3><p><?= $disetujui ?></p></div>
            <div class="card"><h3>Rejected</h3><p><?= $ditolak ?></p></div>
        </div>

        <!-- Section Jasa -->
         <div class="header" style="margin-top: 40px; margin-bottom: 20px;">
            <h2>Layanan Jasa</h2>
        </div>

        <!-- Recent Actions + Activity Log side by side -->
        <div class="dashboard-logs" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin: 20px 0;">
            
            <!-- Recent Actions -->
            <div class="orders-section recent-actions">
                <h3 class="section-title" style="margin-bottom: 16px;">Recent Activity</h3>
                <ul>
                    <?php while ($row = $recent_actions->fetch_assoc()): ?>
                        <li>
                            <?php
                            $icon = '📥';
                            if ($row['status'] === 'Disetujui') $icon = '✅';
                            elseif ($row['status'] === 'Ditolak') $icon = '❌';
                            elseif ($row['status'] === 'Selesai') $icon = '✅';

                            echo "$icon <strong>{$row['nama_lengkap']}</strong> - <em>{$row['jenis_layanan']}</em> ({$row['status']}) pada <span>{$row['tanggal_pemesanan']} {$row['waktu_pemesanan']}</span>";
                            ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <!-- Activity Log -->
            <div class="orders-section admin-log">
                <h3 class="section-title" style="margin-bottom: 16px;">Activity Log</h3>
                <ul class="log-admin-list">
                    <?php if ($log_admin && $log_admin->num_rows > 0): ?>
                        <?php while ($row = $log_admin->fetch_assoc()): ?>
                            <li>
                                <strong>Admin #<?= htmlspecialchars($row['admin_id']) ?>:</strong>
                                <?= htmlspecialchars($row['aksi']) ?>
                                <br><small><?= date('d M Y H:i', strtotime($row['waktu'])) ?></small>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li><em>Belum ada aktivitas.</em></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Kalender Jadwal -->
         <script>
            const calendarEvents = <?= json_encode($event_data) ?>;
        </script>

        <div class="orders-section" style="margin-bottom: 20px;">
            <h3 class="section-title" style="margin-bottom: 16px;">Booking Calender</h3>
            <div id="calendar"></div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    height: 600,
                    events: calendarEvents
                });
                calendar.render();
            });
        </script>

        <!-- Chart -->
        <div class="orders-section" style="margin-bottom: 20px;">
            <h3 class="section-title" style="margin-bottom: 16px;">Services Statistic</h3>
            <canvas id="layananChart" height="100"></canvas>
        </div>

        <!-- Pemesanan Terbaru -->
        <div class="orders-section" style="margin-bottom: 40px;">
            <h3 class="section-title" style="margin-bottom: 16px;">Latest Booking</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Layanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $recent->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                            <td><?= htmlspecialchars($row['jenis_layanan']) ?></td>
                            <td><?= htmlspecialchars($row['tanggal_pemesanan']) ?></td>
                            <td>
                                <?php
                                $status = $row['status'];
                                $class = '';
                                if ($status == 'Menunggu') $class = 'pending';
                                elseif ($status == 'Disetujui') $class = 'approved';
                                elseif ($status == 'Ditolak') $class = 'rejected';
                                elseif ($status == 'Selesai') $class = 'completed';
                                echo '<span class="status ' . $class . '">' . htmlspecialchars($status) . '</span>';
                                ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/logout.js"></script>

<script>
    window.chartLabels = <?= json_encode($chart_labels) ?>;
    window.chartValues = <?= json_encode($chart_values) ?>;
</script>
<script src="js/chart-admin.js"></script>
</body>
</html>