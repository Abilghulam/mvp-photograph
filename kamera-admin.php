<?php
session_start();
require 'php/server.php';
$kamera = mysqli_query($conn, "SELECT * FROM kamera");
$lensa = mysqli_query($conn, "SELECT * FROM lensa");
$aksesoris = mysqli_query($conn, "SELECT * FROM aksesoris");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kamera - Most Valuable Photograph</title>
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
            <div class="menu-title">Layanan Jasa</div>
            <div class="menu-item" onclick="window.location.href='home-admin.php'"><i>🏠</i> Home</div>
            <div class="menu-item" onclick="window.location.href='index-admin.php'"><i>📊</i> Pemesanan</div>
            <div class="menu-item" onclick="window.location.href='laporan-admin.php'"><i>📋</i> Laporan</div>

            <div class="menu-title">Layanan Sewa</div>
            <div class="menu-item active" onclick="window.location.href='kamera-admin.php'"><i>📷</i> Data Kamera</div>

            <div class="menu-title">Option</div>
            <div class="menu-item logout" onclick="confirmLogout()" style="color: #ff6b6b;"><i>🚪</i> Logout</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>Dashboard Admin</h2>
        </div>

        <div class="header">
        <button id="btnTambah" class="btn-tambah" onclick="openModal('kamera')">+ Tambah Kamera</button>

            <!-- Modal Sewa -->
            <div id="modal-sewa" class="modal-sewa">
            <div class="modal-sewa-content">
                <span class="close-sewa">&times;</span>
                <h2 id="modal-title">Tambah Data</h2>
                <form id="form-sewa" enctype="multipart/form-data" method="POST" action="php/update-kamera.php">
                <input type="hidden" name="id" id="form-id">
                <input type="hidden" name="tipe" id="form-tipe">

                <label>Nama</label>
                <input type="text" name="nama" id="form-nama" required>

                <label>Harga Sewa</label>
                <input type="number" name="harga_sewa" id="form-harga" min="0" required>

                <label>Deskripsi</label>
                <textarea name="deskripsi" id="form-deskripsi" required></textarea>

                <label>Status</label>
                <select name="status" id="form-status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Disewa">Disewa</option>
                </select>

                <label>Gambar</label>
                <input type="file" name="gambar" id="form-gambar" accept="image/*">

                <button type="submit" id="submit-btn">Simpan</button>
                </form>
            </div>
            </div>

            <!-- Pagination Tambahan -->
            <div class="filter-tabs">
                <button class="tab-link active" data-filter="kamera">Kamera</button>
                <button class="tab-link" data-filter="lensa">Lensa</button>
                <button class="tab-link" data-filter="aksesoris">Aksesoris</button>
            </div>
        </div>

        <div class="card-container">
        <!-- Kamera -->
        <?php while($row = mysqli_fetch_assoc($kamera)): ?>
            <div class="card kamera">
            <img src="img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_kamera']) ?>">
            <div class="card-body">
                <p class="status <?= strtolower($row['status']) === 'tersedia' ? 'tersedia' : 'disewa' ?>">
                <?= htmlspecialchars($row['status']) ?>
                </p>
                <h3><?= htmlspecialchars($row['nama_kamera']) ?></h3>
                <p class="harga">Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?></p>
                <p class="deskripsi"><?= htmlspecialchars($row['deskripsi']) ?></p>
            </div>
            <div class="card-footer">
                <?php
                $data = [
                'id' => $row['id_kamera'],
                'nama' => $row['nama_kamera'],
                'harga_sewa' => $row['harga_sewa'],
                'deskripsi' => $row['deskripsi'],
                'status' => $row['status']
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8');
                ?>
                <a class="btn-aksi btn-edit" href="#" onclick='event.preventDefault(); openModal("kamera", <?= $jsonData ?>)'>✏️ Edit</a>
                <a class="btn-aksi btn-hapus" href="php/hapus-kamera.php?tipe=kamera&id=<?= $row['id_kamera'] ?>" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
            </div>
            </div>
        <?php endwhile; ?>

        <!-- Lensa -->
        <?php while($row = mysqli_fetch_assoc($lensa)): ?>
            <div class="card lensa" style="display: none;">
            <img src="img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_lensa']) ?>">
            <div class="card-body">
                <p class="status <?= strtolower($row['status']) === 'tersedia' ? 'tersedia' : 'disewa' ?>">
                <?= htmlspecialchars($row['status']) ?>
                </p>
                <h3><?= htmlspecialchars($row['nama_lensa']) ?></h3>
                <p class="harga">Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?></p>
                <p class="deskripsi"><?= htmlspecialchars($row['deskripsi']) ?></p>
            </div>
            <div class="card-footer">
                <?php
                $data = [
                'id' => $row['id_lensa'],
                'nama' => $row['nama_lensa'],
                'harga_sewa' => $row['harga_sewa'],
                'deskripsi' => $row['deskripsi'],
                'status' => $row['status']
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8');
                ?>
                <a class="btn-aksi btn-edit" href="#" onclick='event.preventDefault(); openModal("lensa", <?= $jsonData ?>)'>✏️ Edit</a>
                <a class="btn-aksi btn-hapus" href="php/hapus-kamera.php?tipe=lensa&id=<?= $row['id_lensa'] ?>" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
            </div>
            </div>
        <?php endwhile; ?>

        <!-- Aksesoris -->
        <?php while($row = mysqli_fetch_assoc($aksesoris)): ?>
            <div class="card aksesoris" style="display: none;">
            <img src="img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_aksesoris']) ?>">
            <div class="card-body">
                <p class="status <?= strtolower($row['status']) === 'tersedia' ? 'tersedia' : 'disewa' ?>">
                <?= htmlspecialchars($row['status']) ?>
                </p>
                <h3><?= htmlspecialchars($row['nama_aksesoris']) ?></h3>
                <p class="harga">Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?></p>
                <p class="deskripsi"><?= htmlspecialchars($row['deskripsi']) ?></p>
            </div>
            <div class="card-footer">
                <?php
                $data = [
                'id' => $row['id_aksesoris'],
                'nama' => $row['nama_aksesoris'],
                'harga_sewa' => $row['harga_sewa'],
                'deskripsi' => $row['deskripsi'],
                'status' => $row['status']
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8');
                ?>
                <a class="btn-aksi btn-edit" href="#" onclick='event.preventDefault(); openModal("aksesoris", <?= $jsonData ?>)'>✏️ Edit</a>
                <a class="btn-aksi btn-hapus" href="javascript:void(0);" onclick="confirmDelete('php/hapus-kamera.php?tipe=aksesoris&id=<?= $row['id_aksesoris'] ?>')">🗑️ Hapus</a>
            </div>
            </div>
        <?php endwhile; ?>
        </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/logout.js"></script>

<script src="js/sewa-admin.js"></script>

<?php if (isset($_SESSION['alert'])): ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '<?= $_SESSION['alert'] ?>',
      timer: 2000,
      showConfirmButton: false
    });
  </script>
  <?php unset($_SESSION['alert']); ?>
<?php endif; ?>
</body>
</html>
