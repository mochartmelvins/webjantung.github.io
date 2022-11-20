<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"application/config/koneksi.php";
#$module="module";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pendukung Keputusan Penyakit Jantung</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login" style="background-color: #181818;">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action=''>
			 <!-- <img src="application/gambar/LOGO.png" alt="">< ?php echo"$nama_user";?> -->
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" value="admin@gmail.com" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" value="admin" name="password" />
              </div>
              <div>
			  <button id="form_submit" type="submit" class="btn btn-default submit" name='login' style="background-color: #ED6436;">Login <i class="ti-arrow-right"></i></button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--
				<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>
				-->

                <div class="clearfix"></div>
                <br /><div>
                  
                  <p>© 2022 Sistem Pendukung Keputusan Penyakit Jantung</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form  method="POST" action=''>
			<img src="application/gambar/LOGO.png" alt=""><?php echo"$nama_user";?>
              <h1>Create Account</h1>
			   <div>
                <input type="text" class="form-control" placeholder="NIM" required="" name="nim" />
              </div>
			   <div>
                <input type="text" class="form-control" placeholder="Nama" required="" name="nama" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
             
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
			  <button id="form_submit" type="submit" class="btn btn-default submit" name='simpan'>Submit <i class="ti-arrow-right"></i></button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  
                  <p>©2020 Sistem Pendukung Keputusan Penyakit Jantung</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM tbuser where email='$email' and password='$password'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   

echo"<script>alert('Username atau Password Anda Salah, Silahkan Ulangi Kembali.');location.href='$_SERVER[PHP_SELF]?module=home';</script>";  

	   }
   
   else {
   $data = mysqli_fetch_array($query);
 	$id_user = $data['id_user'];
	$username = $data['username'];
	$nama = $data['nama'];
	$level = $data['level'];
	$gambar = $data['gambar'];
	
	$_SESSION['nama_masuk']=$nama;
	$_SESSION['level_masuk']=$level;
	$_SESSION['username_masuk']=$username;
	$_SESSION['gambar_masuk']=$gambar;
	$_SESSION['id_masuk']=$id_user;
	
	echo "<script>location.href='dashboard.php?module=home';</script>";   
 } 
 
}
?>


<?php
if(isset($_POST['simpan'])){

$nim=$_POST['nim'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM tbuser where nim='$nim' or username='$username'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   
	   
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbuser VALUES('$nim', '$nama', '$username', '$password', 'avatar.png')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='index.php';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='#signup';</script>";

   }
 
	   
	   
	   }
   
   else {
echo"<script>alert('NIM atau Username Anda Salah Sudah Terdaftar.');location.href='#signup';</script>";  
 
 } 
 
}
?>