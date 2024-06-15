<?php
session_start(); // Memulai sesi

// Lakukan koneksi ke database Anda di sini
include 'koneksi.php';

// Periksa apakah ada input yang dikirimkan dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari setiap input
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $warna_bulu = $_POST['warna_bulu'];
    $warna_mata = $_POST['warna_mata'];
    $prestasi = $_POST['prestasi'];

    // Ambil id anggota dari sesi
    if (isset($_SESSION['id_anggota'])) {
        $pemilik = $_SESSION['id_anggota'];

        // Periksa apakah nilai pemilik yang dimasukkan ada di tabel anggota
        $cek_pemilik = "SELECT id_anggota FROM anggota WHERE id_anggota = '$pemilik'";
        $result = $koneksi->query($cek_pemilik);

        if ($result->num_rows > 0) {
            // Buat kueri SQL untuk memasukkan data merpati baru ke dalam database
            $sql = "INSERT INTO merpati (nama, tgl_lahir, jenis_kelamin, warna_bulu, warna_mata, prestasi, pemilik) 
                    VALUES ('$nama', '$tgl_lahir', '$jenis_kelamin', '$warna_bulu', '$warna_mata', '$prestasi', '$pemilik')";

            // Jalankan kueri dan periksa apakah berhasil
            if ($koneksi->query($sql) === TRUE) {
                echo "<script>
                alert('Data merpati berhasil ditambahkan.');
                window.location.href='tampilanbloodline.php?id=$id_burung';
              </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        } else {
            echo "Error: Pemilik tidak ditemukan.";
        }
    } else {
        echo "Error: Anda harus login untuk menambahkan merpati.";
    }

    // Tutup koneksi database
    $koneksi->close();
}
?>
