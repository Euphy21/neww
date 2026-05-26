<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin — Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display:block; padding: 40px 20px;">
<div class="container">
    <div class="container-header">
        <h2>🛠 Panel Kendali Admin</h2>
        <a href="logout.php" class="btn-logout">⬅ Keluar</a>
    </div>
    <div class="container-body">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT pinjam.*, buku.judul, userr.nama_lengkap 
                              FROM pinjam 
                              JOIN buku ON pinjam.id_buku = buku.id_buku 
                              JOIN userr ON pinjam.id_user = userr.id_user 
                              WHERE pinjam.status != 'kembali'";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                    if ($count === 0) {
                    ?>
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <div class="icon">✨</div>
                                <p>Tidak ada peminjaman aktif saat ini.</p>
                            </div>
                        </td>
                    </tr>
                    <?php } else { while($p = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><strong><?= $p['nama_lengkap']; ?></strong></td>
                        <td><strong><?= $p['judul']; ?></strong></td>
                        <td><?= date('d M Y', strtotime($p['tgl_pengajuan'])); ?></td>
                        <td>
                            <?php if($p['status'] == 'menunggu') { ?>
                                <span class="badge badge-menunggu">Menunggu</span>
                            <?php } else { ?>
                                <span class="badge badge-dipinjam">Dipinjam</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($p['status'] == 'menunggu') { ?>
                                <a href="admin_aksi.php?aksi=setuju&id=<?= $p['id_pinjam']; ?>&id_buku=<?= $p['id_buku']; ?>" class="btn-aksi btn-setuju">✔ Setujui</a>
                            <?php } else { ?>
                                <a href="admin_aksi.php?aksi=kembali&id=<?= $p['id_pinjam']; ?>&id_buku=<?= $p['id_buku']; ?>" class="btn-aksi btn-kembalikan">↩ Kembalikan</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>