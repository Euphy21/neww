<?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM userr WHERE username='$username' AND password='$password' AND role='admin'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama']    = $data['nama_lengkap'];
        $_SESSION['role']    = $data['role'];
        header("location:admin.php");
        exit();
    } else {
        echo "<script>alert('Gagal! Username atau Password Admin Salah.'); window.location='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin — Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <span class="book-icon">📚</span>
        <h2>Perpustakaan</h2>
        <p class="subtitle">Portal Masuk Administrator</p>
        <div class="gold-divider"></div>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" name="login" class="btn-primary">✦ Masuk ke Panel ✦</button>
        </form>
        <a href="login.php" class="link-user">← Lanjut Sebagai Peminjam</a>
    </div>
</body>
</html>