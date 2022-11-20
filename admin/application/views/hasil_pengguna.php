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
                          <th>Id Diagnosa</th>
                          <th>Tanggal</th>
                          <th>Indikasi Penyakit</th>
						  <th>Akurasi</th>
						<th style="text-align: center;">Action</th>
                        </tr>
                      </thead>


                      <tbody>
<?php
     $id_pengguna=$_SESSION["id_masuk"];
  $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpenyakit where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_pengguna='$id_pengguna'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='6' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><a href='dashboard.php?module=diagnosa_pengguna&stt=akhir&idg=<?php echo $r['id_diagnosa'] ?>' title="Detail Diagnosa"><?php echo $r['id_diagnosa'] ?></a></td>    
  <td><?php 
  $tanggal=$r['tanggal'];
  
   $pisah=explode("-",$tanggal);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  
  echo $tgl1 ; ?></td>    
  <td><?php echo $r['nama_penyakit'] ?></td>    
  <td><?php
     $hasil_diagnosa=$r['hasil_diagnosa'];
   $hasil_diagnosa=$hasil_diagnosa*100;
  echo $hasil_diagnosa." %";
  ?></td>    
   <td align="center">
    <a href="<?php echo "application/views/cetak.php?id=".$r['id_diagnosa'] ?>" target="_blank"><i class="fa fa-print"></i></a> 
 <a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_pengguna&stt=hapus&id=".$r['id_diagnosa'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Penyakit <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" name="nama_penyakit" class="form-control ">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
												<a href="dashboard.php?module=hasil_pengguna"><button class="btn btn-primary" type="button">Batal</button></a>
												
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
  $nama_penyakit=$_POST['nama_penyakit'];
  $id_penyakit=$_POST['id_penyakit'];
  $username=$_POST['username'];
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbpenyakit VALUES('', '$nama_penyakit')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=hasil_pengguna';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=hasil_pengguna';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbdiagnosa WHERE `id_diagnosa` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=hasil_pengguna';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=hasil_pengguna';</script>";
 }

}
else if($stt=="edit"){
$id_penyakit=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit where id_penyakit='$id_penyakit'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_penyakit=$d["id_penyakit"];
	$nama_penyakit=$d["nama_penyakit"];
    $username=$d["username"];
	
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Penyakit <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" value="<?php echo $nama_penyakit;?>" name="nama_penyakit" class="form-control ">
											</div>
										</div>
										
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="Update" class="btn btn-success">Update</button>
												<a href="dashboard.php?module=hasil_pengguna"><button class="btn btn-primary" type="button">Batal</button></a>
												
												 <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                                 <input type="hidden" name="id_penyakit" value="<?php echo"$id_penyakit";?>">
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
  $nama_penyakit=$_POST['nama_penyakit'];
  $username=$_POST['username'];
  

$queryupdate = mysqli_query($koneksi, "UPDATE tbpenyakit SET 
						   nama_penyakit='$nama_penyakit'
						   WHERE id_penyakit = '$id_penyakit'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=hasil_pengguna';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=hasil_pengguna&stt=edit&id=$id_penyakit';</script>";

   }
  }
 ?>	

<?php
}
?>
