<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Front End</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets2/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets2/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets2/css/main.css" rel="stylesheet">
    <style>
        .navmenu .nav-item .nav-link {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 10px;
            /* Default border-radius */
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navmenu .nav-item .nav-link:hover {
            border-radius: 0px;
            /* Hover tetap melengkung */
        }

        .navmenu .nav-item.active .nav-link {
            border-radius: 10px !important;
            /* Paksa active untuk melengkung */
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <h1 class="sitename">APP TRPL 2B</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li class="nav-item <?= (!isset($_GET['p']) || $_GET['p'] == 'home') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php?p=home" class="active">Home</a>
                    </li>
                    <li class="nav-item <?= (!isset($_GET['p']) || $_GET['p'] == 'mhs') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php?p=mhs" class="active">Mahasiswa</a>
                    </li>
                    <li class="nav-item <?= (!isset($_GET['p']) || $_GET['p'] == 'prodi') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php?p=prodi" class="active">Program Studi</a>
                    </li>
                    <li class="nav-item <?= (!isset($_GET['p']) || $_GET['p'] == 'dosen') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php?p=dosen" class="active">Dosen</a>
                    </li>
                    <li class="nav-item <?= (!isset($_GET['p']) || $_GET['p'] == 'matkul') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php?p=matkul" class="active">Matakuliah</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="logout.php">Login</a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Politeknik Negeri Padang</h2>
                        <p class="animate__animated animate__fadeInUp">Politeknik Negeri Padang didirikan pada tahun 1987, dimana keberadaan Politeknik merupakan salah satu dari 17 (tujuh belas) Politeknik pertama di Indonesia, yang bertujuan menjawab tantangan perkembangan dunia industri dan dunia usaha yang menuntut kompetensi dari tenaga-tenaga kerja terampil, professional dan mandiri yang lebih mengutamakan attitude, knowledge dan skill serta kompeten dibidangnya.</p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Teknologi Informasi</h2>
                        <p class="animate__animated animate__fadeInUp">Gagasan pendirian jurusan Teknologi informasi sudah ada sejak awal tahun 2000, namun terkendala karena beberapa pertimbangan antara lain ketersediaan Sumber Daya Manusia dan Infra Struktur .Pada Awal bulan Febuari 2005, beberapa orang dosen yang antara lain terdiri dari, Erwadi Bakar , Surfayondri , Andrizal , H A Mooduto , Yulindon, Ahmad Dahlan, Ronal Hadi dan Rahmat Hidayat, atas dukungan yang kuat dari pimpinan Politeknik Suhendrik Hanwar dan pimpinan lainnya membuat proposal pendirian program studi yang berkaitan dengan Teknologi Informasi.</p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Teknologi Rekayasa Perangkat Lunak</h2>
                        <p class="animate__animated animate__fadeInUp">Program studi D4 Teknologi Rekayasa Perangkat Lunak pada jurusan Teknologi Informasi memiliki latar belakang yang kuat dalam menghasilkan tenaga ahli di bidang pengembangan perangkat lunak. Di era informasi digital dan teknologi yang terus berkembang pesat, kebutuhan akan perangkat lunak berkualitas tinggi semakin meningkat. Oleh karena itu, program studi ini dirancang untuk memberikan pemahaman mendalam tentang konsep-konsep dasar teknologi rekayasa perangkat lunak, metodologi pengembangan, kebutuhan, analisis sistem desain, pengujian perangkat lunak, dan manajemen proyek perangkat lunak. </p>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>LIST</h2>
                <p class="mb-5">
                    <?php
                    $page = isset($_GET['p']) ? $_GET['p'] : 'home';
                    // Menentukan title berdasarkan halaman
                    switch ($page) {
                        case 'mhs':
                            echo 'Mahasiswa';
                            break;
                        case 'prodi':
                            echo 'Prodi';
                            break;
                        case 'dosen':
                            echo 'Dosen';
                            break;
                        case 'matkul':
                            echo 'Mata Kuliah';
                            break;
                        default:
                            echo 'Home';
                            break;
                    }
                    ?>
                </p>
                <?php
                $page = isset($_GET['p']) ? $_GET['p'] : 'home.php';
                if ($page == 'home') include 'home.php';
                if ($page == 'mhs') include 'mahasiswa.php';
                if ($page == 'prodi') include 'prodi.php';
                if ($page == 'dosen') include 'dosen.php';
                if ($page == 'matkul') include 'matkul.php';
                ?>
            </div><!-- End Section Title -->
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container">
            <h3 class="sitename">TRPL 2B</h3>
            <p>Muhammad Khairul Iqbal_2311082029</p>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-skype"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                    <i class="bi bi-c-circle"></i>
                    <strong class="px-1 sitename">Jurusan Teknologi Informasi</strong>
                    <span>| Politeknik Negeri Padang</span>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets2/vendor/php-email-form/validate.js"></script>
    <script src="assets2/vendor/aos/aos.js"></script>
    <script src="assets2/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets2/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets2/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets2/js/main.js"></script>

    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        new DataTable('#example');
    </script>

</body>

</html>