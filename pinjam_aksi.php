<?php
include 'koneksi.php';
session_start();

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $id_user = 1; // Otomatis mendaftarkannya atas nama user id 1 (Fauzan Anggota)
    $tgl_pinjam = date('Y-m-d');

    $sql = "INSERT INTO pinjam (id_user, id_buku, tgl_pengajuan, status) 
            VALUES ('$id_user', '$id_buku', '$tgl_pinjam', 'menunggu')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Permintaan berhasil dikirim! Menunggu persetujuan admin.'); window.location='login.php';</script>";
    }
} else {
    header("location:login.php");
}
?>