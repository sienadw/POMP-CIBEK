<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <title>POMP CIBEK</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center border-start border-end px-3">
                    <small class="fa fa-phone-alt me-2"></small>
                    <small>+62-812-1352-1528</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center border-end px-3">
                    <small class="far fa-envelope-open me-2"></small>
                    <small>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-square border-end border-start" href="https://www.facebook.com/groups/872481400048996/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square border-end" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h1 class="fa fa-dove m-0"></h1>POMP CIBEK
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-3 py-lg-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="artikel.html" class="nav-item nav-link">Artikel</a>
                <a href="bloodline.php" class="nav-item nav-link">Bloodlines</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="loginSession.html">Login</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Bloodline</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <?php
    include 'koneksi.php';

    // Terima parameter id anggota dari URL
    if(isset($_GET['id'])) {
        // Lakukan sanitasi untuk menghindari serangan SQL injection atau XSS
        $id_anggota = htmlspecialchars($_GET['id']);

        // Lakukan kueri ke database untuk mendapatkan informasi tentang anggota
        $sql_anggota = "SELECT * FROM anggota WHERE id_anggota = $id_anggota";
        $result_anggota = $koneksi->query($sql_anggota);

        if ($result_anggota->num_rows > 0) {
            $row_anggota = $result_anggota->fetch_assoc();
            $nama_anggota = $row_anggota["nama"];

            // Lakukan kueri untuk mendapatkan merpati yang dimiliki oleh anggota dengan id tertentu
            $sql_merpati = "SELECT * FROM merpati WHERE pemilik = $id_anggota";
            $result_merpati = $koneksi->query($sql_merpati);
    ?>
    <!-- Tampilan Bloodline Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end mb-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="border-start border-5 border-primary ps-2">
                        <h1 class="display-6 mb-0">Merpati Milik <?php echo $nama_anggota; ?></h1>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">

            <?php
            // Periksa apakah hasil kueri tidak kosong
            if ($result_merpati->num_rows > 0) {
                // Output data dari setiap baris
                while($row_merpati = $result_merpati->fetch_assoc()) {
                    $id_burung = $row_merpati["id_burung"];
                    $nama_merpati = $row_merpati["nama"];

                    // Tautan ke halaman biodata burung dengan ID burung sebagai parameter
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-light overflow-hidden h-90">
                            <div class="service-text position-relative text-center h-100 p-4">
                                <h5 class="mb-3"><a href='biodata2.php?id=<?php echo $id_burung; ?>'><?php echo $nama_merpati; ?></a></h5>
                                <!-- Output data merpati di sini -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Tidak ada merpati yang dimiliki oleh anggota ini";
            }
            ?>

            </div>
        </div>
    </div>
    <!-- Tampilan Bloodline End -->
    <?php
        } else {
            echo "Anggota tidak ditemukan";
        }
    } else {
        echo "Parameter ID anggota tidak diberikan";
    }
    ?>
    <!-- Tampilkan tombol "Tambah Merpati" jika anggota adalah pemilik halaman -->
    <?php
    if(isset($_SESSION['id_anggota']) && $id_anggota == $_SESSION['id_anggota']) {
        echo "<div class='container text-center'>
                <a href='tambah_merpati.php?id_anggota=$id_anggota' class='btn btn-primary'>Tambah Merpati</a>
              </div>";
    }
    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
