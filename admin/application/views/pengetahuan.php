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
						<a href="dashboard.php?module=pengetahuan&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
					
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
						  <th>Nama Penyakit</th>
                          <th>Nama Gejala</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                      </thead>


                      <tbody>
<?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan,tbpenyakit,tbgejala where tbpengetahuan.id_penyakit=tbpenyakit.id_penyakit and tbpengetahuan.id_gejala=tbgejala.id_gejala order by tbpengetahuan.id_pengetahuan asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='4' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama_penyakit'] ?></td>  
  <td><?php echo $r['nama_gejala'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengetahuan&stt=edit&id=".$r['id_pengetahuan'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengetahuan&stt=hapus&id=".$r['id_pengetahuan'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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

									
<div class="form-group row ">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penyakit <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="id_penyakit" required>
													<option>Pilih Penyakit</option>
													
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit order by `id_penyakit` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Penyakit Kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_penyakit'] ?>"><?php echo $r['nama_penyakit']; ?></option>
 <?php
 endwhile;
 
}	
		?>
													
													
												</select>
											</div>
										</div>	
<div class="form-group row ">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Gejala <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="id_gejala" required>
													<option>Pilih Gejala</option>
													
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbgejala order by `id_gejala` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Gejala Kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_gejala'] ?>"><?php echo $r['nama_gejala']; ?></option>
 <?php
 endwhile;
 
}	
		?>
													
													
												</select>
											</div>
										</div>										
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
												<a href="dashboard.php?module=pengetahuan"><button class="btn btn-primary" type="button">Batal</button></a>
												
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
  $nama_pegawai=$_POST['nama_pegawai'];
  $id_pengetahuan=$_POST['id_pengetahuan'];
  $grade=$_POST['grade'];
  $bulan=$_POST['bulan'];
  $id_penyakit=$_POST['id_penyakit'];
  $id_gejala=$_POST['id_gejala'];
  $satker=$_POST['satker'];
  $id_masuk=$_SESSION['id_masuk'];
  
  $query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan where id_pengetahuan='$id_pengetahuan'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
  
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbpengetahuan VALUES('', '$id_penyakit', '$id_gejala')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";

   }
   }
   else{
	echo"<script>alert('NRD Sudah Terdaftar');location.href='$_SERVER[PHP_SELF]?module=tambah';</script>";   
	   
   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbpengetahuan WHERE `id_pengetahuan` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
 }

}
else if($stt=="edit"){
$id_pengetahuan=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan where id_pengetahuan='$id_pengetahuan'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_pengetahuan=$d["id_pengetahuan"];
	$id_gejala=$d["id_gejala"];
	$id_penyakit=$d["id_penyakit"];
	
	
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

									
										<div class="form-group row ">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penyakit <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="id_penyakit" required>
<?php
  echo"<option value='$id_penyakit'>".PEN($tbpenyakit,$id_penyakit)."</option>";
?> 												
													<option>Pilih Penyakit</option>
													
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit order by `id_penyakit` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Penyakit Kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_penyakit'] ?>"><?php echo $r['nama_penyakit']; ?></option>
 <?php
 endwhile;
 
}	
		?>
													
													
												</select>
											</div>
										</div>
<div class="form-group row ">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Gejala <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="id_gejala" required>
<?php
  echo"<option value='$id_gejala'>".GEJ($tbgejala,$id_gejala)."</option>";
?> 												
													<option>Pilih Gejala</option>
													
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbgejala order by `id_gejala` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Gejala Kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_gejala'] ?>"><?php echo $r['nama_gejala']; ?></option>
 <?php
 endwhile;
 
}	
		?>
													
													
												</select>
											</div>
										</div>										
										
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="Update" class="btn btn-success">Update</button>
												<a href="dashboard.php?module=pengetahuan"><button class="btn btn-primary" type="button">Batal</button></a>
												
												 <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                                 <input type="hidden" name="id_pengetahuan" value="<?php echo"$id_pengetahuan";?>">
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
  $id_penyakit=$_POST['id_penyakit'];
  $id_pengetahuan=$_POST['id_pengetahuan'];
  $id_gejala=$_POST['id_gejala'];
  

$queryupdate = mysqli_query($koneksi, "UPDATE tbpengetahuan SET 
                           id_penyakit='$id_penyakit',
						   id_gejala='$id_gejala'
						   WHERE id_pengetahuan = '$id_pengetahuan'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=pengetahuan&stt=edit&id=$id_pengetahuan';</script>";

   }
  }
 ?>	

<?php
}
?>
