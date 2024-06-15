<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Input Merpati</title>
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
    
<title>Form Input Merpati</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 20px;
    }
    h2 {
        color: #333;
        text-align: center;
    }
    table {
        border-collapse: collapse;
        width: 80%;
        border: 2px solid #ffa500;
        background-color: #fff;
    }
    th, td {
        border: 1px solid #ffa500;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #ffa500;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #ffe5b4;
    }
    input[type="text"], input[type="date"], select {
        padding: 6px;
        width: calc(100% - 16px);
        border: 1px solid #ffa500;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #ff4500;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
        background-color: #ff6347;
    }
</style>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-2 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Input Data Merpati</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <form action="proses_input_merpati.php" method="post">
    <table>
        <tr>
            <th>Label</th>
            <th>Input</th>
        </tr>
        <tr>
            <td><label for="nama">Nama Merpati:</label></td>
            <td><input type="text" id="nama" name="nama" required></td>
        </tr>
        <tr>
            <td><label for="tgl_lahir">Tanggal Lahir:</label></td>
            <td><input type="date" id="tgl_lahir" name="tgl_lahir" required></td>
        </tr>
        <tr>
            <td><label for="jenis_kelamin">Jenis Kelamin:</label></td>
            <td>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="jantan">Jantan</option>
                    <option value="betina">Betina</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="warna_bulu">Warna Bulu:</label></td>
            <td><input type="text" id="warna_bulu" name="warna_bulu" required></td>
        </tr>
        <tr>
            <td><label for="warna_mata">Warna Mata:</label></td>
            <td><input type="text" id="warna_mata" name="warna_mata" required></td>
        </tr>
        <tr>
            <td><label for="prestasi">Prestasi:</label></td>
            <td><input type="text" id="prestasi" name="prestasi"></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="Submit">
</form>


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

</body>
</html>
