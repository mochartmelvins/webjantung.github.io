<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
	$id_pengguna=$_SESSION["id_masuk"];
$query = mysqli_query($koneksi, "SELECT * FROM tbpengguna where id_pengguna='$id_pengguna'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_pengguna=$d["id_pengguna"];
	$nama=$d["nama"];
    $email=$d["email"];
	$password=$d["password"];
	$gambar=$d["gambar"];
	$gambar0=$d["gambar"];
?>


<div class="clearfix"></div>
<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
								
									
									
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" method="post" action="" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" value="<?php echo $nama;?>" name="nama" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" name="email" value="<?php echo $email;?>" class="form-control ">
											</div>
										</div>
										
											<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" id="first-name" required="required" name="password" value="<?php echo $password;?>" class="form-control ">
											</div>
										</div>
										
									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="Update" class="btn btn-success">Update</button>
												<a href="dashboard.php?module=home"><button class="btn btn-primary" type="button">Cancel</button></a>
												 <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                                 <input type="hidden" name="id_pengguna" value="<?php echo"$id_pengguna";?>">
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

	<div class="clearfix"></div>				
<?php 
if(isset($_POST['Update'])){
  $id_pengguna=$_POST['id_pengguna'];
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"assets/images/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

$queryupdate = mysqli_query($koneksi, "UPDATE tbpengguna SET 
                           nama='$nama',
						   email='$email',
						   password='$password'
						   WHERE id_pengguna = '$id_pengguna'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=profil_pengguna';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=profil_pengguna';</script>";

   }
  }
 ?>	
			  
<?php
}
else if($stt=="tambah"){
  ?>		
				
<?php
}
else if($stt=="hapus"){



}
else if($stt=="edit"){

	
?>


<?php
}
?>
