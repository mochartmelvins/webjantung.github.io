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
                          <th>Nama Pengguna</th>
						  <th>Tanggal</th>
						  <th>Hasil Diagnosa Penyakit</th>
						  <th style="text-align: center;">Akurasi</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                      </thead>


                      <tbody>
<?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpenyakit,tbpengguna where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_pengguna=tbpengguna.id_pengguna order by tbdiagnosa.id_diagnosa asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='7' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['id_diagnosa'] ?></td>  
  <td><?php echo $r['nama'] ?></td>  
   <td align="center"><?php 
  $tanggal=$r['tanggal'];
  
   $pisah=explode("-",$tanggal);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  
  echo $tgl1 ; ?></td>  
  <td align="center"><?php echo $r['nama_penyakit'] ?></td>  
  <td align="center">
  <?php
     $hasil_diagnosa=$r['hasil_diagnosa'];
   $hasil_diagnosa=$hasil_diagnosa*100;
  echo $hasil_diagnosa." %";
  ?>
  
  </td> 
   <td align="center">
    <a href="<?php echo "application/views/cetak.php?id=".$r['id_diagnosa'] ?>" target="_blank"><i class="fa fa-print"></i></a> 
 <a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_admin&stt=hapus&id=".$r['id_diagnosa'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
				
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbdiagnosa WHERE `id_diagnosa` ='$id'");

    $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_diagnosa where id_diagnosa='$id'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){

   }
   else{
	   
	   while($r = mysqli_fetch_array($query)){
		    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbdetail_diagnosa WHERE `id_diagnosa` ='$id'");
		   
	   }
   }
  
  $query = mysqli_query($koneksi, "SELECT * FROM tbhasil_diagnosa where id_diagnosa='$id'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){

   }
   else{
	   
	   while($r = mysqli_fetch_array($query)){
		    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbhasil_diagnosa WHERE `id_diagnosa` ='$id'");
		   
	   }
   }
  
  $query = mysqli_query($koneksi, "SELECT * FROM tbhasil where id_diagnosa='$id'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){

   }
   else{
	   
	   while($r = mysqli_fetch_array($query)){
		    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbhasil WHERE `id_diagnosa` ='$id'");
		   
	   }
   }
  
  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=hasil_admin';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=hasil_admin';</script>";
 }

}
else if($stt=="edit"){
$id_diagnosa=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa where id_diagnosa='$id_diagnosa'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_diagnosa=$d["id_diagnosa"];
	$id_pengguna=$d["id_pengguna"];
	$nama_pegawai=$d["nama_pegawai"];
    $id_penyakit=$d["id_penyakit"];
	$grade=$d["grade"];
	$bulan=$d["bulan"];
	$satker=$d["satker"];
	
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">id_diagnosa<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" disabled required="required" value="<?php echo $id_diagnosa;?>" name="id_diagnosa" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Pegawai <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" value="<?php echo $nama_pegawai;?>" name="nama_pegawai" class="form-control ">
											</div>
										</div>
										<div class="form-group row ">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pangkat <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="id_penyakit" required>
<?php
  echo"<option value='$id_penyakit'>".PAN($tbpenyakit,$id_penyakit)."</option>";
?> 												
													<option>Pilih Pangkat</option>
													
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit order by `id_penyakit` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Pangkat Kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_penyakit'] ?>"><?php echo $r['nama_pangkat']; ?></option>
 <?php
 endwhile;
 
}	
		?>
													
													
												</select>
											</div>
										</div>
<div class="form-group row ">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jabatan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="id_pengguna" required>
<?php
  echo"<option value='$id_pengguna'>".JAB($tbpengguna,$id_pengguna)."</option>";
?> 												
													<option>Pilih Jabatan</option>
													
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpengguna order by `id_pengguna` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Jabatan Kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_pengguna'] ?>"><?php echo $r['nama_jabatan']; ?></option>
 <?php
 endwhile;
 
}	
		?>
													
													
												</select>
											</div>
										</div>										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Grade <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="first-name" required="required" value="<?php echo $grade;?>" name="grade" class="form-control ">
											</div>
										</div>
											
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bulan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" id="first-name" required="required" value="<?php echo $bulan;?>" name="bulan" class="form-control ">
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Satker <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" value="<?php echo $satker;?>" name="satker" class="form-control ">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="dashboard.php?module=hasil_admin"><button class="btn btn-primary" type="button">Batal</button></a>
												<button class="btn btn-primary" type="reset">Reset</button>
												 <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                                 <input type="hidden" name="id_diagnosa" value="<?php echo"$id_diagnosa";?>">
												<button type="submit" name="Update" class="btn btn-success">Update</button>
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
  $id_diagnosa=$_POST['id_diagnosa'];
  $id_pengguna=$_POST['id_pengguna'];
  $nama_pegawai=$_POST['nama_pegawai'];
  $bulan=$_POST['bulan'];
  $grade=$_POST['grade'];
  $satker=$_POST['satker'];
  

$queryupdate = mysqli_query($koneksi, "UPDATE tbdiagnosa SET 
                           id_penyakit='$id_penyakit',
						   id_pengguna='$id_pengguna',
						   satker='$satker',
						   grade='$grade',
						   bulan='$bulan',
						   nama_pegawai='$nama_pegawai'
						   WHERE id_diagnosa = '$id_diagnosa'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=hasil_admin';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=hasil_admin&stt=edit&id=$id_diagnosa';</script>";

   }
  }
 ?>	

<?php
}
?>
