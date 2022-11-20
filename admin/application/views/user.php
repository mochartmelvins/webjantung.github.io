<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

 <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  
                    <!--
					
					-->
                    
                   <div class="x_title">
						<a href="dashboard.php?module=user&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
					
					 <div class="clearfix"></div>
					    </div>
               
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama</th>
						  <th>Email</th>
						  <th style="text-align: center;">Foto</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                      </thead>


                      <tbody>
<?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbuser order by id_user asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='5' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama'] ?></td>  
  <td><?php echo $r['email'] ?></td>  
  <td align="center"><img src="<?php echo"assets/images/".$r['gambar'];?>" width="40" height="35"/></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=user&stt=edit&id=".$r['id_user'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=user&stt=hapus&id=".$r['id_user'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
  </td>
 </tr>
<?php
 $no++;
  endwhile;
  }
 ?>

		
                        
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
<div class="clearfix"></div>			  
<?php
}
else if($stt=="tambah"){
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" name="nama" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" name="email" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" id="first-name" required="required" name="password" class="form-control ">
											</div>
										</div>
											
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Foto <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" name="gambar" id="gambar" class="form-control " />
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
												<a href="dashboard.php?module=user"><button class="btn btn-primary" type="button">Batal</button></a>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

	<div class="clearfix"></div>				
<?php 
if(isset($_POST['Simpan'])){
  $id_user=$_POST['id_user'];
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $gambar=$_POST['gambar'];

  
  
  	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"assets/images/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar="noimages.jpg";}
    if(strlen($gambar)<1){$gambar="noimages.jpg";}
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbuser VALUES('', '$nama', '$email', '$password', '$gambar', 'Admin')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=user';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=user';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbuser WHERE `id_user` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
 }

}
else if($stt=="edit"){
$id_user=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id_user'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_user=$d["id_user"];
	$nama=$d["nama"];
    $email=$d["email"];
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Foto <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" name="gambar" id="gambar" class="form-control " />
												
                                            
                                            <a href="<?php echo"assets/images/$gambar";?>" title="Klik Untuk Perbesar Gambar" target="_blank"><?php echo"<img src='assets/images/$gambar' height='100' width='100'>";?></a>
                                            
												
											</div>
										</div>
									
									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												 <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                                 <input type="hidden" name="id_user" value="<?php echo"$id_user";?>">
												<button type="submit" name="Update" class="btn btn-success">Update</button>
												<a href="dashboard.php?module=user"><button class="btn btn-primary" type="button">Batal</button></a>
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
  $id_user=$_POST['id_user'];
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"assets/images/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

$queryupdate = mysqli_query($koneksi, "UPDATE tbuser SET 
                           nama='$nama',
						   email='$email',
						   gambar='$gambar'
						   WHERE id_user = '$id_user'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=user';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=user&stt=edit&id=$id_user';</script>";

   }
  }
 ?>	

<?php
}
?>
