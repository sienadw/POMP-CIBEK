<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

// Memeriksa tabel pengurus
$sql_pengurus = "SELECT * FROM pengurus WHERE username='$username' AND password='$password'";
$result_pengurus = mysqli_query($koneksi, $sql_pengurus);
$cek_pengurus = mysqli_num_rows($result_pengurus);

if ($cek_pengurus > 0) {
    session_start();
    $data = mysqli_fetch_assoc($result_pengurus);
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'pengurus';
    $_SESSION['status'] = 'login';
    header("location: index.php");
} else {
    // Memeriksa tabel anggota
    $sql_anggota = "SELECT * FROM anggota WHERE username='$username' AND password='$password'";
    $result_anggota = mysqli_query($koneksi, $sql_anggota);
    $cek_anggota = mysqli_num_rows($result_anggota);

    if ($cek_anggota > 0) {
        session_start();
        $data = mysqli_fetch_assoc($result_anggota);
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'anggota';
        $_SESSION['status'] = 'login';

        $_SESSION['id_anggota'] = $data['id_anggota'];

        header("location: index.php");
    } else {
        echo "Gagal login, silahkan login lagi <a href='loginSession.html'> Halaman Login </a>";
        echo mysqli_error($koneksi);
    }
}
?>
