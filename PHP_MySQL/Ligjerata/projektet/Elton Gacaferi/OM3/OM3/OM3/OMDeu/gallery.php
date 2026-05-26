<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="lightbox-plus-jquery.min.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap"
        rel="stylesheet">

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
      
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 5fr));
        }
        .gallery img {
            width: 100%;
            padding: 30px;
        }
    </style>
</head>

<body>
    
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a href="index.html" class="navbar-brand">
                    <h2 class="text-white">OM-3</h2>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                    <a href="index.php" class="nav-item nav-link active">Startseite</a>
 <a href="gallery.php" class="nav-item nav-link active">Galerie</a>

 <div class="nav-item dropdown">
 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Übersetzen</a>
 <div class="dropdown-menu bg-light mt-2">
 <a href="../OM/index.php" class="dropdown-item">Albanien</a>
 <a href="../OMEng/index.php" class="dropdown-item">Englisch</a>
 <a href="index.php" class="dropdown-item">Deutsch</a>
 </div>
 </div>
 <a href="contact.php" class="nav-item nav-link">Kontakt</a>
                    
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Unsere Arbeit</h1>
            
        </div>
    </div>
    <!-- Hero End -->

        
        <div class="gallery">
            <a href="img1/img12.jpg" data-lightbox="models"><img src="img1/img12.jpg" alt="Image 2"></a>
            <a href="img1/img15.jpg" data-lightbox="models"><img src="img1/img15.jpg" alt="Image 1"></a>
            <a href="img1/img16.jpg" data-lightbox="models"><img src="img1/img16.jpg" alt="Image 2"></a>
            <a href="img1/img17.jpg" data-lightbox="models"><img src="img1/img17.jpg" alt="Image 1"></a>
            <a href="img1/img17.jpg" data-lightbox="models"><img src="img1/img18.jpg" alt="Image 1"></a>
            <a href="img1/img12.jpg" data-lightbox="models"><img src="img1/img19.jpg" alt="Image 2"></a>
            <a href="img1/img15.jpg" data-lightbox="models"><img src="img1/img24.jpg" alt="Image 1"></a>
            <a href="img1/img16.jpg" data-lightbox="models"><img src="img1/img21.jpg" alt="Image 2"></a>
            <a href="img1/img17.jpg" data-lightbox="models"><img src="img1/img22.jpg" alt="Image 1"></a>
            <a href="img1/img17.jpg" data-lightbox="models"><img src="img1/img23.jpg" alt="Image 1"></a>
            </div>
           


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>