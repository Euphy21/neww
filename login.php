<?php
include 'koneksi.php';
session_start();
$_SESSION['id_user'] = 1;
$_SESSION['role'] = 'user';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Buku — Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display:block; padding: 40px 20px;">
<div class="container">
    <div class="container-header">
        <h2>📖 Katalog Buku</h2>
        <a href="logout.php" class="btn-logout">⬅ Keluar</a>
    </div>
    <div class="container-body">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM buku");
                    while($b = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td class="no-col"><?= $no++; ?></td>
                        <td><strong><?= $b['judul']; ?></strong></td>
                        <td><?= $b['penulis']; ?></td>
                        <td><?= $b['kategori']; ?></td>
                        <td>
                            <?php if($b['stok'] > 0) { ?>
                                <span class="stok-ok"><?= $b['stok']; ?> tersedia</span>
                            <?php } else { ?>
                                <span class="stok-habis">✕ Habis</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($b['stok'] > 0) { ?>
                                <a href="pinjam_aksi.php?id_buku=<?= $b['id_buku']; ?>" class="btn-aksi btn-pinjam">＋ Pinjam</a>
                            <?php } else { ?>
                                <span class="stok-habis">Tidak Tersedia</span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>