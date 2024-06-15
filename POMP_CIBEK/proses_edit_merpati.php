<?php
session_start();
include 'koneksi.php';

if (isset($_POST['id_burung'])) {
    // Retrieve existing data first
    $id_burung = htmlspecialchars($_POST['id_burung']);
    
    // Query to fetch existing data
    $query_select = "SELECT * FROM merpati WHERE id_burung = ?";
    $stmt_select = $koneksi->prepare($query_select);
    $stmt_select->bind_param("s", $id_burung);
    $stmt_select->execute();
    $result_select = $stmt_select->get_result();
    
    if ($result_select->num_rows > 0) {
        // Existing data found, proceed with update
        $row = $result_select->fetch_assoc();
        
        // Retrieve updated fields from form
        $nama = htmlspecialchars($_POST['nama']);
        $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
        $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
        $warna_bulu = htmlspecialchars($_POST['warna_bulu']);
        $warna_mata = htmlspecialchars($_POST['warna_mata']);
        $prestasi = htmlspecialchars($_POST['prestasi']);
        
        // Query to update data
        $query_update = "UPDATE merpati SET nama = ?, tgl_lahir = ?, jenis_kelamin = ?, warna_bulu = ?, warna_mata = ?, prestasi = ? WHERE id_burung = ?";
        $stmt_update = $koneksi->prepare($query_update);
        $stmt_update->bind_param("ssssssi", $nama, $tgl_lahir, $jenis_kelamin, $warna_bulu, $warna_mata, $prestasi, $id_burung);
        
        if ($stmt_update->execute()) {
            // Update successful
            echo "<script>
            alert('Data merpati berhasil diedit');
            window.location.href = 'biodata2.php?id=$id_burung';
         </script>";
        } else {
            // Update failed
            echo "Error updating record: " . $koneksi->error;
        }
        
    } else {
        // No existing data found
        echo "Error: Data merpati dengan ID $id_burung tidak ditemukan.";
    }

    // Close database connection
    $koneksi->close();
} else {
    // User not logged in
    echo "Error: Anda harus login untuk mengedit data merpati.";
}
?>
