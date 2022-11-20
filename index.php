<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"admin/application/config/koneksi.php";
$module="module";
$module=$_GET["module"];
$id_masuk=$_SESSION['id_masuk'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Heart Disease Decision Support System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Sistem Pendukung Keputusan Penyakit Jantung" name="keywords">
    <meta content="Sistem Pendukung Keputusan Penyakit Jantung" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Heart </span> Diagnosis</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Opening Hours</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email Us</h6>
                        <p class="m-0">info@example.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Call Us</h6>
                        <p class="m-0">+012 345 6789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
			<?php
						$module=$_GET["module"];
						if($module=="home"){$tan_home="active";}
						else if($module=="daftar"){$tan_daftar="active";}
						else if($module=="informasi"){$tan_informasi="active";}
						else if($module=="login"){$tan_login="active";}
						else{$tan_home="active";}
						
						?>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php?module=home" class="nav-item nav-link <?php if($module=="home"){echo $tan_home;} else {}?>">Home</a>
                    <a href="index.php?module=informasi" class="nav-item nav-link <?php if($module=="informasi"){echo $tan_informasi;} else {}?>">Information</a>
                    <a href="index.php?module=daftar" class="nav-item nav-link <?php if($module=="daftar"){echo $tan_daftar;} else {}?>">Registration</a>
                    <a href="index.php?module=login" class="nav-item nav-link <?php if($module=="login"){echo $tan_login;} else {}?>">Login</a>
               
                </div>
               
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    

             <?php
				$module=$_GET["module"];

				if($module=="home"){ $judul_masuk="Heart Disease";}
				else if($module=="informasi"){$judul_masuk="Heart Disease Information";}
				else if($module=="daftar"){$judul_masuk="User Registration";}
				else if($module=="login"){$judul_masuk="System Login";}
				else{
					
					$judul_masuk="Heart Disease";
				}
				?>
    


    <!-- About Start -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                
                <h1 class="display-4 mb-4"><span class="text-primary"><?php  echo $judul_masuk; ?></span> </h1>
                
				
				
                <p class="mb-4">
				<?php
			


	
	if($module=="home"){include"data/home.php";}
	else if($module=="informasi"){include"data/informasi.php";}
	
	else if($module=="daftar"){include"data/daftar.php";}
	else if($module=="login"){include"data/login.php";}
	else {
		
		include"data/home.php";
	}
					
					?>
				
				</p>
               
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100" src="img/jantung1.jpg" alt="">
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


   


   


   


   


    


   


    
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    Copyright © 2022 Heart Disease Decision Support System
                </p>
            </div>
            
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>