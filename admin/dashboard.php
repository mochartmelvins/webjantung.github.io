<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"application/config/koneksi.php";
$module="module";
$module=$_GET["module"];
$id_masuk=$_SESSION['id_masuk'];
if($id_masuk==""){echo "<script>location.href='index.php';</script>";}
else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Heart Disease Decision Support System</title>

    <!-- Bootstrap -->
	 <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	 <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	
	
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md" style="background-color: #181818;">
    <div class="container body" style="background-color: #ffffff;">
      <div class="main_container" style="background-color: #181818;">
        <div class="col-md-3 left_col" style="background-color: #181818;">
          <div class="left_col scroll-view" style="background-color: #181818;">
            <div class="navbar nav_title" style="border: 0; background-color: #181818;">
			<?php
			$level=$_SESSION['level_masuk'];
			if($level=="Admin"){$ms="Administrator";}
			else{$ms="Patient";}
			?>
              <a href="#" class="site_title"><i class="fa fa-laptop"></i> <span><?php echo $ms; ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!--
			<div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
			-->
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include"application/views/menu.php"; ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           <!--
		    <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
		   -->
            <!-- /menu footer buttons -->
          </div>
        </div>
<?php
$level=$_SESSION['level_masuk'];
$id=$_SESSION["id_masuk"];
if($level=="Admin"){
$query = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $nama_user=$d["nama"];
    $gambar_user=$d["gambar"];

}
else if($level=="Pengguna"){
$query = mysqli_query($koneksi, "SELECT * FROM tbpengguna where id_pengguna='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $nama_user=$d["nama"];
    $gambar_user="avatar.png";

}

?>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo"assets/images/$gambar_user";?>" alt=""><?php echo"$nama_user";?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
					<?php
					$level=$_SESSION['level_masuk'];

                    if($level=="Admin"){
					echo"<a class='dropdown-item'  href='dashboard.php?module=profil'> Profile</a>";
					}
					else{
						echo"<a class='dropdown-item'  href='dashboard.php?module=profil_pengguna'> Profile</a>";
					
					}
					?>
                      
                        
                    
                      <a class="dropdown-item"  href="dashboard.php?module=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
 <?php
$level_masuk=$_SESSION['level_masuk'];
	
	
	$module=$_GET["module"];

if($module=="home"){
	
	
	if($level_masuk=="Admin") {	$judul_masuk="Welcome Admin";}
    else {$judul_masuk="Welcome Patient";}
	}
	else if($module=="user"){$judul_masuk="Manage User Page";}
	else if($module=="profil"){$judul_masuk="Profile Page";}
	else if($module=="penyakit"){$judul_masuk="Diseases Page";}
	else if($module=="gejala"){$judul_masuk="Symptoms Page";}
	else if($module=="solusi"){$judul_masuk="Solutions Page";}
	else if($module=="konsultasi"){$judul_masuk="Disease Diagnosis Page";}
	else if($module=="laporan"){$judul_masuk="Report Page";}
    else if($module=="pengetahuan"){$judul_masuk="Knowledge Page";}
else if($module=="penyakit_pengguna"){$judul_masuk="Disease Data Page";}
else if($module=="profil_pengguna"){$judul_masuk="Profile Page";}
else if($module=="diagnosa_pengguna"){$judul_masuk="Disease Diagnosis Page";}
else if($module=="hasil_pengguna"){$judul_masuk="Diagnostic Results Page";}
else if($module=="hasil_admin"){$judul_masuk="Diagnostic Results Page";}
else if($module=="pengguna"){$judul_masuk="Patient Page";}

	else {
		if($level_masuk=="Admin") {	$judul_masuk="Welcome Admin";}
	else {$judul_masuk="Welcome Patient";}
	}
			  
?>            

           <div class="page-title">
						<div class="title_left">
							
							<?php
					echo"<h3>$judul_masuk</h3>";
					?>  
						</div>

						<!--
						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
						-->
					</div> 


<?php


	//-----------------------------------------
	if($module=="utama"){include"application/views/home.php";}
	else if($module=="profil"){include"application/views/profil.php";}
else if($module=="user"){include"application/views/user.php";}
	else if($module=="penyakit"){include"application/views/penyakit.php";}
	else if($module=="gejala"){include"application/views/gejala.php";}
	else if($module=="solusi"){include"application/views/solusi.php";}
	else if($module=="konsultasi"){include"application/views/konsultasi.php";}
	else if($module=="laporan"){include"application/views/laporan.php";}
	
	else if($module=="penyakit_pengguna"){include"application/views/penyakit_pengguna.php";}
	else if($module=="diagnosa_pengguna"){include"application/views/konsultasi.php";}
	else if($module=="pengetahuan"){include"application/views/pengetahuan.php";}
    else if($module=="profil_pengguna"){include"application/views/profil_pengguna.php";}
	else if($module=="hasil_pengguna"){include"application/views/hasil_pengguna.php";}
	else if($module=="hasil_admin"){include"application/views/hasil_admin.php";}
else if($module=="pengguna"){include"application/views/pengguna.php";}
	
	


	
	
	else if($module=="logout"){
	$terakhir=date('d-m-Y h:i:s');
	$id_masuk=$_SESSION['id_masuk'];
	#$queryupdate = mysqli_query($koneksi, "UPDATE tbuser SET terakhir_login='$terakhir' WHERE id_user = '$id_masuk'");
	
	session_destroy();
	echo"<script>location.href='../index.php';</script>";  
	#alert('Akses anda Telah Berakhir.');

	}
	
	
	
	
	
	else {
		if($level_masuk=="Admin")
		{		include"application/views/home.php";}
		else{		include"application/views/home_pengguna.php";}
		
		
		
		}
	
	
	?>
            



            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            2020 - Heart Disease Decision Support System
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    
	<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
	<!--
	    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	-->
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>
<?php
}
?>