<!DOCTYPE html>
<html lang="en">
<?php
include ("send_email.php")
?>
<head>
    <meta charset="utf-8">
    <title>Hairnic - Single Product Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
                        <a href="index.php" class="nav-item nav-link active">Ballina</a>
                        <a href="gallery.php" class="nav-item nav-link active">Galeria</a>
                        
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Përkthe</a>
                            <div class="dropdown-menu bg-light mt-2">
                            <a href="index.php" class="dropdown-item">Shqip</a>
                                <a href="../OMEng/index.php" class="dropdown-item">Anglisht</a>
                                <a href="../OMDeu/index.php" class="dropdown-item">Gjermanisht</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">Kontaktoni</a>
                    
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Kontaktoni</h1>
            
        </div>
    </div>
    <!-- Hero End -->


    <!-- Contact Info Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-map-marker-alt fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Adresa</h5>
                            <h5 class="fw-light text-white">Rruga 123, Qyteti , Gjermani</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-phone-alt fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Numri telefonit</h5>
                            <h5 class="fw-light text-white">+49 176 80270786</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-envelope fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Emaili kontaktues</h5>
                            <h5 class="fw-light text-white">om3.company@gmail.com</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-5"><span class="fw-light text-dark">Që të na gjeni ku jemi,</span> klikoni në hartë</h1></div>
            <div class="row g-5">
               
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5135213.160510916!2d5.1733075485059485!3d51.063643240538816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479a721ec2b1be6b%3A0x75e85d6b8e91e55b!2sGjermani!5e0!3m2!1ssq!2s!4v1722169041026!5m2!1ssq!2s" width="1100" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
        

    <!-- Newsletter Start -->
    <div class="container-fluid newsletter bg-primary py-5 my-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3"><span class="fw-light text-dark">Shkruaj</span> emailin tuaj</h1>
            <p class="text-white mb-4">dhe ne tani do kemi qasje me ju edhe permes emailit</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 wow fadeIn" data-wow-delay="0.5s">
                <div class="position-relative w-100 mt-3 mb-2">
                    <form action="send_email.php" method="POST">
                        <input class="form-control w-100 py-4 ps-4 pe-5" type="email" name="email" placeholder="Shkruani emailin tuaj" required style="height: 48px;">
                        <button type="submit" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2" name="submit">
                            <i class="fa fa-paper-plane text-white fs-4"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Newsletter End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-white footer">
        <div class="container py-5">
            <div class="row g-5">
            
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="mb-4">Na kontaktoni</h5>
                
                    <p><i class="fa fa-phone-alt me-3"></i>+49 176 80270786</p>
                    <p><i class="fa fa-envelope me-3"></i>om3.company@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                
        
    </div>
    <!-- Footer End -->
    <!-- Footer End -->


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