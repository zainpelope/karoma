<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Penerimaan Perserta Didik Baru</title>
    <!-- Font Awesome icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        /* Global Styles */
        body {
            font-family: 'Lato', sans-serif;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .masthead {
            position: relative;
            background-image: url('nurul.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
            text-align: center;
            min-height: 80vh;
            /* Adjust the height to show the entire image */
            padding: 60px 15px;
            margin-top: 70px;
            /* Space between navbar and masthead */
        }

        .masthead::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .masthead .container {
            position: relative;
            z-index: 2;
        }

        .masthead h1 {
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            animation: fadeIn 2s ease-in-out;
        }

        .masthead p {
            font-size: 1.25rem;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #ff9800;
            border-color: #ff9800;
            color: white;
        }

        .btn-primary:hover {
            background-color: #e68900;
            border-color: #e68900;
        }

        .page-section {
            background-color: #ffffff;
            padding: 60px 0;
        }

        .card {
            border-radius: 10px;
        }

        .footer {
            background-color: #000000;
            color: white;
            padding: 40px 0;
        }

        .footer a {
            color: #ff9800;
        }

        .footer a:hover {
            color: white;
        }

        .scroll-to-top {
            background-color: #ff9800;
            color: white;
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px;
            border-radius: 50%;
        }

        .scroll-to-top:hover {
            background-color: #e68900;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#page-top">
                MTS. Nurul Karomah
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#panduan">Panduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead">
        <div class="container">
            <div class="masthead-content">
                <h1 class="fw-bold">Penerimaan Perserta Didik Baru</h1>
                <p class="lead">Tahun Ajaran 2024/2025 - MTS. Nurul Karomah</p>
                <a class="btn btn-primary btn-lg mt-3" href="#panduan"><i class="fas fa-info-circle"></i> Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </header>

    <style>
        /* Masthead styling */
        .masthead {
            position: relative;
            background-image: url('nurul.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
            text-align: center;
            min-height: 80vh;
            /* Adjust the height to show the entire image */
            padding: 0;
            margin-top: 70px;
            /* Space between navbar and masthead */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .masthead .container {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .masthead-content {
            text-align: center;
        }

        .masthead h1 {
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            animation: fadeIn 2s ease-in-out;
        }

        .masthead p {
            font-size: 1.25rem;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #ff9800;
            border-color: #ff9800;
            color: white;
        }

        .btn-primary:hover {
            background-color: #e68900;
            border-color: #e68900;
        }
    </style>


    <!-- Panduan Section -->
    <section class="page-section" id="panduan">
        <div class="container" data-aos="fade-up">
            <h2 class="text-center text-uppercase fw-bold mb-5">Panduan Pendaftaran</h2>
            <div class="row text-center">
                <div class="col-md-6 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <i class="fas fa-info-circle fa-2x text-primary mb-3"></i>
                            <p class="lead">Pendaftaran peserta didik baru dibuka untuk tahun ajaran 2024-2025. Ikuti langkah berikut:</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <i class="fas fa-user-plus fa-2x text-primary mb-3"></i>
                            <p class="lead">Klik tombol <b>Masuk</b> untuk memulai pendaftaran. Daftar jika belum memiliki akun, dan lengkapi formulir yang disediakan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a class="btn btn-primary btn-lg" href="register.php"><i class="fas fa-user-plus"></i> Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('footer.html'); ?>


    <!-- Scroll to Top Button -->
    <a class="scroll-to-top" href="#page-top"><i class="fas fa-chevron-up"></i></a>

    <!-- Bootstrap Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>