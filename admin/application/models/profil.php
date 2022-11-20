

<?php
$id_user=$_SESSION['id_masuk'];
$akses_user=$_SESSION['level_masuk'];
$query = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id_user'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_user=$d["id_user"];
    $nama=$d["nama"];
	$no_tlp=$d["no_tlp"];
	$email=$d["email"];
	$password=$d["password"];
	$gambar=$d["gambar"];
	$gambar0=$d["gambar"];
	$divisi=$d["divisi"];
	$akses=$d["akses"];
	
	
	$gambar=$d["gambar"];
	$status_penulis=$d["status_penulis"];
	
	
	

?>

<div class="card mt-5">
                        <div class="card-body">

<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Profil User</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id User</label>
                                            <input class="form-control" disabled placeholder="Please Enter Keyword" type="text" name="id_user" value="<?php echo $id_user;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama User</label>
                                            <input class="form-control"  type="text" name="nama" value="<?php echo $nama;?>" />
                                        </div>
										
										
										

<div class="form-group">
<label>Email</label>
<input class="form-control"  type="email" name="email" value="<?php echo $email;?>"/>
</div>
                                       
<div class="form-group">
<label>Password</label>
<input class="form-control"  type="password" name="password"  value="<?php echo $password;?>" />
</div>										
										
                                         										


										<div class="form-group">
                                            <label>gambar</label>
                                            <input type="file" name="gambar" id="gambar" class="input" />
                                            <a href="<?php echo"application/gambar/$gambar";?>" title="Klik Untuk Perbesar Gambar" target="_blank"><?php echo"<img src='application/gambar/$gambar' height='270' width='200'>";?></a>
                                            
                                        </div>

									
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_user" value="<?php echo"$id_user";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=profil";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
                                    </form>
    </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>

 </div>
                    </div>




<?php 
if(isset($_POST['Update'])){

  $nama=$_POST['nama'];
  $tgl_lahir=$_POST['tgl_lahir'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  #$password=md5($_POST['password']);
  $password=$_POST['password'];
  $email=$_POST['email'];
  $gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];

  
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"gambar/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

   $id_user=$_SESSION['id_masuk'];
   
 
	
	  $queryupdate = mysqli_query($koneksi, "UPDATE tbuser SET 
                           nama_penulis='$nama',
						   email='$email',
						   gambar='$gambar',
						   password='$password'
						   WHERE id_user = '$id_user'");
	  
	if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=profil';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=profil';</script>";

   }
  }
 ?>



