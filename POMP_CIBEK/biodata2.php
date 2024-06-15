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
</head>

<body>
<?php
// Mulai sesi
session_start();
?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h1 class="fa fa-dove m-0"></i>POMP CIBEK</h1>
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
    <?php
// Lakukan koneksi ke database Anda di sini
include 'koneksi.php';

// Pastikan ID burung dipilih dari URL
if (isset($_GET['id'])) {
    // Sanitasi ID burung untuk mencegah SQL injection atau XSS
    $id_burung = htmlspecialchars($_GET['id']);

    // Lakukan kueri untuk mendapatkan data merpati dan anggota berdasarkan ID burung yang dipilih
    $sql = "SELECT merpati.nama AS nama_merpati, anggota.nama AS nama_anggota, anggota.id_anggota AS id_anggota
            FROM merpati
            JOIN anggota ON merpati.pemilik = anggota.id_anggota
            WHERE merpati.id_burung = $id_burung";
    $result = $koneksi->query($sql);

    // Periksa apakah hasil kueri tidak kosong
    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            // Mulai menampilkan HTML dinamis
            echo '<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">';
            echo '    <div class="container text-center py-5">';
            echo '        <h1 class="display-4 text-white animated slideInDown mb-4">' . htmlspecialchars($row["nama_merpati"]) . '</h1>';
            echo '        <nav aria-label="breadcrumb animated slideInDown">';
            echo '            <ol class="breadcrumb justify-content-center mb-0">';
            echo '                <li class="breadcrumb-item"><a class="text-white" href="tampilanbloodline.php?id=' . htmlspecialchars($row["id_anggota"]) . '">' . htmlspecialchars($row["nama_anggota"]) . '</a></li>';            echo '                <li class="breadcrumb-item text-primary active" aria-current="page">' . htmlspecialchars($row["nama_merpati"]) . '</li>';
            echo '            </ol>';
            echo '        </nav>';
            echo '    </div>';
            echo '</div>';
        }
    } else {
        echo "<div class='container'><p class='text-center'>Tidak ada data merpati dengan ID yang dipilih.</p></div>";
    }
} else {
    echo "<div class='container'><p class='text-center'>ID burung tidak dipilih.</p></div>";
}
?>



    <!-- Page Header End -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
          <?php
            // Lakukan koneksi ke database Anda di sini
            include 'koneksi.php';
    
            // Pastikan ID burung dipilih dari URL
            if(isset($_GET['id'])) {
                // Sanitasi ID burung untuk mencegah SQL injection atau XSS
                $id_burung = htmlspecialchars($_GET['id']);
    
                // Lakukan kueri untuk mendapatkan data merpati berdasarkan ID yang dipilih
                $sql = "SELECT * FROM merpati WHERE id_burung = $id_burung";
                $result = $koneksi->query($sql);
                
                
                // Periksa apakah hasil kueri tidak kosong
                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    while($row = $result->fetch_assoc()) {
                        echo "<h2>" . $row["nama"] . "</h2>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data merpati dengan ID yang dipilih.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='9'>ID burung tidak dipilih.</td></tr>";
            }
            ?>
          </div>
        </section><!-- End Breadcrumbs -->
    
        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
        <div class="container">
    <div class="row gy-4">
        <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide">
                        <img src="img/merpati fact-1.jpg" alt="" style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="portfolio-info">
                <?php
        // Lakukan koneksi ke database Anda di sini -> INFORMASI MERPATI
        include 'koneksi.php';

        // Pastikan ID burung dipilih dari URL
        if(isset($_GET['id'])) {
            // Sanitasi ID burung untuk mencegah SQL injection atau XSS
            $id_burung = htmlspecialchars($_GET['id']);

            // Lakukan kueri untuk mendapatkan data merpati berdasarkan ID yang dipilih
            $sql = "SELECT * FROM merpati WHERE id_burung = $id_burung";
            $result = $koneksi->query($sql);

            // Periksa apakah hasil kueri tidak kosong
            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while($row = $result->fetch_assoc()) {
                    echo "<h2>Informasi Burung</h2>";
                    echo "<ul>";
                    echo "<li><strong>Tanggal Lahir</strong>: " . $row["tgl_lahir"] . "</li>";
                    echo "<li><strong>Jenis Kelamin</strong>: " . $row["jenis_kelamin"] . "</li>";
                    echo "<li><strong>Warna Bulu</strong>: " . $row["warna_bulu"] . "</li>";
                    echo "<li><strong>Warna Mata</strong>: " . $row["warna_mata"] . "</li>";
                    echo '</ul>';

                    echo "<h2>Prestasi</h2>";
                    echo "<li> " . $row["prestasi"] . "</li>";
                    echo "</ul>";
                    
                }
            } else {
                echo "<tr><td colspan='9'>Tidak ada data merpati dengan ID yang dipilih.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='9'>ID burung tidak dipilih.</td></tr>";
        }
        ?>
                </div>
              </div>
            </div>
            <?php 
            $id_anggota = null;

            if (isset($_GET['id'])) {
                $id_burung = htmlspecialchars($_GET['id']);
            
                $sql = "SELECT merpati.nama AS nama_merpati, anggota.nama AS nama_anggota, anggota.id_anggota AS id_anggota
                        FROM merpati
                        JOIN anggota ON merpati.pemilik = anggota.id_anggota
                        WHERE merpati.id_burung = $id_burung";
                $result = $koneksi->query($sql);
            
            
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id_anggota = $row['id_anggota'];
                    }
                } else {
                    echo "<div class='container'><p class='text-center'>Tidak ada data merpati dengan ID yang dipilih.</p></div>";
                }
            } else {
                echo "<div class='container'><p class='text-center'>ID burung tidak dipilih.</p></div>";
            }

            ?>


            <?php if (isset($_SESSION['id_anggota']) && $_SESSION['id_anggota'] == $id_anggota): ?>
            <div class="portfolio-description">
                <a href="edit_merpati.php?id=<?php echo $id_burung; ?>" class="btn btn-primary">Edit Data</a>
            </div>
        <?php endif; ?>
          </div>
        </section><!-- End Portfolio Details Section -->
    
      </main><!-- End #main -->

      <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
          <div class="row g-5 align-items-end mb-5">
              <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="border-start border-5 border-primary ps-2">
                      <h3 class="display-6 mb-0">Orang Tua</h3>
                  </div>
              </div>
          </div>
          <?php
// Lakukan koneksi ke database Anda di sini -> INFORMASI ORANG TUA
include 'koneksi.php';

// Pastikan ID burung dipilih dari URL
if (isset($_GET['id'])) {
    // Sanitasi ID burung untuk mencegah SQL injection atau XSS
    $id_burung = htmlspecialchars($_GET['id']);

    // Query untuk mendapatkan data keturunan
    $sql_keturunan = "SELECT 
                        keturunan.id_bapak, keturunan.id_ibu, 
                        bapak.nama AS nama_bapak, 
                        ibu.nama AS nama_ibu
                    FROM 
                        keturunan
                    JOIN 
                        merpati AS bapak ON keturunan.id_bapak = bapak.id_burung
                    JOIN 
                        merpati AS ibu ON keturunan.id_ibu = ibu.id_burung
                    WHERE 
                        keturunan.id_burung = $id_burung";
    $result_keturunan = $koneksi->query($sql_keturunan);

    // Query untuk mendapatkan data pasangan
    $sql_pasangan = "SELECT 
                        keturunan.id_pasangan, merpati.nama
                    FROM 
                        keturunan
                    JOIN 
                        merpati ON keturunan.id_pasangan = merpati.id_burung
                    WHERE 
                        keturunan.id_burung = $id_burung";
    $result_pasangan = $koneksi->query($sql_pasangan);

    // Query untuk mendapatkan data anak-anak
    $sql_anak = "SELECT 
                    keturunan.id_anak, merpati.nama
                FROM 
                    keturunan
                JOIN 
                    merpati ON keturunan.id_anak = merpati.id_burung
                WHERE 
                    keturunan.id_burung = $id_burung";
    $result_anak = $koneksi->query($sql_anak);

    // Memeriksa apakah hasil query tidak kosong
    if ($result_keturunan->num_rows > 0) {
        // Mulai menampilkan HTML dinamis
        echo '<div class="row g-4 justify-content-center">';
        
        // Loop untuk menampilkan data keturunan
        while ($row = $result_keturunan->fetch_assoc()) {
            echo '    <div class="col-lg-6 col-md-6">';
            echo '        <div class="service-item bg-light overflow-hidden h-90">';
            echo '            <img class="img-fluid" src="img/service-1.jpg">';
            echo '            <div class="service-text position-relative text-center h-100 p-4">';
            echo '                <h5 class="mb-3">' . htmlspecialchars($row["nama_bapak"]) . '</h5>';
            echo '                <a class="small" href="biodata2.php?id=' . htmlspecialchars($row["id_bapak"]) . '">Lihat Lebih</a>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';

            echo '    <div class="col-lg-6 col-md-6">';
            echo '        <div class="service-item bg-light overflow-hidden h-90">';
            echo '            <img class="img-fluid" src="img/service-1.jpg">';
            echo '            <div class="service-text position-relative text-center h-100 p-4">';
            echo '                <h5 class="mb-3">' . htmlspecialchars($row["nama_ibu"]) . '</h5>';
            echo '                <a class="small" href="biodata2.php?id=' . htmlspecialchars($row["id_ibu"]) . '">Lihat Lebih</a>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
        }

        echo '</div>';
    } else {
        echo "<div class='container'><p class='text-center'>Tidak ada data keturunan dengan ID yang dipilih.</p></div>";
    }

    // Menampilkan bagian untuk informasi pasangan
    echo '<div class="container">';
    echo '    <div class="row g-5 align-items-end mb-5">';
    echo '        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">';
    echo '            <div class="border-start border-5 border-primary ps-2">';
    echo '                <h3 class="display-6 mb-0">Pasangan</h3>';
    echo '            </div>';
    echo '        </div>';
    echo '    </div>';

    if ($result_pasangan->num_rows > 0) {
        // Ambil data pasangan
        $row_pasangan = $result_pasangan->fetch_assoc();
        $id_pasangan = $row_pasangan['id_pasangan'];
        $nama_pasangan = $row_pasangan['nama'];

        // Menampilkan data pasangan dalam HTML dinamis
        echo '    <div class="row g-5 align-items-end mb-5">';
        echo '        <div class="col-lg-4 col-md-6">';
        echo '            <div class="service-item bg-light overflow-hidden h-90">';
        echo '                <img class="img-fluid" src="img/service-1.jpg">';
        echo '                <div class="service-text position-relative text-center h-100 p-4">';
        echo '                    <h5 class="mb-3">' . htmlspecialchars($nama_pasangan) . '</h5>';
        echo '                    <a class="small" href="tampilanbloodline.php?id=' . htmlspecialchars($id_pasangan) . '">Lihat Lebih</a>';
        echo '                </div>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
    } else {
        echo "<div class='container'><p class='text-center'>Tidak ada pasangan yang ditemukan untuk burung ini.</p></div>";
    }

    // Menampilkan bagian untuk informasi keturunan
    echo '    <div class="row g-5 align-items-end mb-5">';
    echo '        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">';
    echo '            <div class="border-start border-5 border-primary ps-2">';
    echo '                <h3 class="display-6 mb-0">Keturunan</h3>';
    echo '            </div>';
    echo '        </div>';
    echo '    </div>';

    if ($result_anak->num_rows > 0) {
        // Loop untuk menampilkan data anak-anak
        echo '<div class="row g-4 justify-content-center">';
        while ($row_anak = $result_anak->fetch_assoc()) {
            $id_anak = $row_anak['id_anak'];
            $nama_anak = $row_anak['nama'];

            echo '    <div class="col-lg-4 col-md-6">';
            echo '        <div class="service-item bg-light overflow-hidden h-90">';
            echo '            <img class="img-fluid" src="img/service-1.jpg">';
            echo '            <div class="service-text position-relative text-center h-100 p-4">';
            echo '                <h5 class="mb-3">' . htmlspecialchars($nama_anak) . '</h5>';
            echo '                <a class="small" href="biodata2.php?id=' . htmlspecialchars($id_anak) . '">Lihat Lebih</a>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
        }
        echo '</div>';
    } else {
        echo "<div class='container'><p class='text-center'>Tidak ada anak yang ditemukan untuk burung ini.</p></div>";
    }
} else {
    echo "<div class='container'><p class='text-center'>ID burung tidak dipilih.</p></div>";
}

// Tutup koneksi database
$koneksi->close();
?>
          </div>
      </div>
  </div>
  <!-- Service End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-white mb-4"><i class="fa fa-dove text-primary me-3"></i>POMP CIBEK</h1>
                    <p>Persatuan Olahraga Pos Merpati Cikarang Bekasi Karawang</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-primary me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>PERUM GCC 2 - CIKARANG</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+62852 1215 2397</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">POMP CIBEK</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <a href="https://htmlcodex.com"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


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