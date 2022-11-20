<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

$module="module";
?>


<div id="contact-content" class="content">
				<div class="templatemo_contactmap">
					
					<ul class="checkmark pad-left">
						<li>Use the registered email and password.</li>
					</ul>
                    
				</div>
				

				<form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
					
					<div class="templatemo_form">
						<input name="email" type="email" class="form-control p-4" id="email" required placeholder="Email" value="" maxlength="40">
					</div>
					<br>
					<div class="templatemo_form">
						<input name="password" type="password" class="form-control p-4" id="fullname" required placeholder="Password" value="" maxlength="40">
					</div>
					<br>
					<div class="templatemo_form">
					<button type="submit" name="login" class="btn btn-primary">Login</button>
					<button type="reset" class="btn btn-primary">Reset</button>
					 <input type="hidden" name="id_pengguna" value="<?php echo"$id_pengguna";?>">
					</div>
				</form>
			</div>


<br>
<br><br><br>




<?php
if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM tbuser where email='$email' and password='$password'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){


$query = mysqli_query($koneksi, "SELECT * FROM tbpengguna where email='$email' and password='$password'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){

   
echo"<script>alert('Email atau Password Anda Salah, Silahkan Ulangi Kembali.');location.href='index.php?module=login';</script>";  
   }
   else{
	   
	   
	 $data = mysqli_fetch_array($query);
 	$id_pengguna = $data['id_pengguna'];
	$email = $data['email'];
	$nama = $data['nama'];

	
	$_SESSION['nama_masuk']=$nama;
	$_SESSION['level_masuk']="Pengguna";
	$_SESSION['email_masuk']=$email;
	$_SESSION['gambar_masuk']="avatar.png";
	$_SESSION['id_masuk']=$id_pengguna;
	
	echo "<script>location.href='admin/dashboard.php?module=home';</script>";    
	   
	   
	   
   }


	   }
   
   else {
 $data = mysqli_fetch_array($query);
 	$id_user = $data['id_user'];
	$email = $data['email'];
	$nama = $data['nama'];
	$level = $data['level'];
	$gambar = $data['gambar'];
	
	$_SESSION['nama_masuk']=$nama;
	$_SESSION['level_masuk']=$level;
	$_SESSION['email_masuk']=$email;
	$_SESSION['gambar_masuk']=$gambar;
	$_SESSION['id_masuk']=$id_user;
	
	echo "<script>location.href='admin/dashboard.php?module=home';</script>";   
 } 
 
}
?>






                       


