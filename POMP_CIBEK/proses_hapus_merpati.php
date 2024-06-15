<?php
session_start();
include 'koneksi.php';

// Pastikan parameter id_burung tersedia dalam URL
if(isset($_GET['id_burung'])) {
    // Ambil ID merpati dari parameter GET
    $id_burung = $_GET['id_burung'];
    $pemilik = $_GET['id_anggota'];

    // Query untuk menghapus data merpati berdasarkan ID
    $query = "DELETE FROM merpati WHERE id_burung='$id_burung'";
    
    // Lakukan query delete dan periksa hasilnya
    $result = mysqli_query($koneksi, $query);

    if (isset($_SESSION['id_anggota'])) {
        $pemilik = $_SESSION['id_anggota'];

        // Periksa apakah nilai pemilik yang dimasukkan ada di tabel anggota
        $cek_pemilik = "SELECT id_anggota FROM anggota WHERE id_anggota = '$pemilik'";
        $result = $koneksi->query($cek_pemilik);

    if($result) {
        // Redirect ke halaman tampilanbloodline.php dengan menyertakan id_pemilik
        header("location: tampilanbloodline.php?id=$pemilik");
        exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan
    } else {
        // Tampilkan pesan error jika query delete gagal
        echo "Data gagal dihapus: " . mysqli_error($koneksi);
    }
} else {
    // Tampilkan pesan jika parameter id_burung tidak tersedia dalam URL
    echo "Parameter ID merpati tidak diberikan";
}
}

// Tutup koneksi ke database setelah selesai menggunakan
mysqli_close($koneksi);
?>
