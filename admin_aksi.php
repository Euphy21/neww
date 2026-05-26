<?php
include 'koneksi.php';

if (isset($_GET['aksi']) && isset($_GET['id']) && isset($_GET['id_buku'])) {
    $aksi = $_GET['aksi'];
    $id_pinjam = $_GET['id'];
    $id_buku = $_GET['id_buku'];

    if ($aksi == 'setuju') {
        mysqli_query($conn, "UPDATE pinjam SET status = 'dipinjam' WHERE id_pinjam = '$id_pinjam'");
        mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id_buku = '$id_buku'");
        
        echo "<script>alert('Berhasil Disetujui!'); window.location='admin.php';</script>";
    } 
    
    elseif ($aksi == 'kembali') {
        mysqli_query($conn, "UPDATE pinjam SET status = 'kembali' WHERE id_pinjam = '$id_pinjam'");
        mysqli_query($conn, "UPDATE buku SET stok = stok + 1 WHERE id_buku = '$id_buku'");
        
        echo "<script>alert('Buku Sudah Kembali!'); window.location='admin.php';</script>";
    }
} else {
    header("location:admin.php");
}
?>