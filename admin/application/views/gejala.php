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
						<a href="dashboard.php?module=gejala&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
					
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
                          <th>Nama Gejala</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                      </thead>


                      <tbody>
<?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbgejala order by id_gejala asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='3' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama_gejala'] ?></td>    
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=gejala&stt=edit&id=".$r['id_gejala'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=gejala&stt=hapus&id=".$r['id_gejala'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Gejala <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" name="nama_gejala" class="form-control ">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
												<a href="dashboard.php?module=gejala"><button class="btn btn-primary" type="button">Batal</button></a>
												
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
  $nama_gejala=$_POST['nama_gejala'];
  $id_gejala=$_POST['id_gejala'];
  $username=$_POST['username'];
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbgejala VALUES('', '$nama_gejala')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=gejala';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=gejala';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbgejala WHERE `id_gejala` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=gejala';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=gejala';</script>";
 }

}
else if($stt=="edit"){
$id_gejala=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbgejala where id_gejala='$id_gejala'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_gejala=$d["id_gejala"];
	$nama_gejala=$d["nama_gejala"];
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Gejala <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" value="<?php echo $nama_gejala;?>" name="nama_gejala" class="form-control ">
											</div>
										</div>
										
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="Update" class="btn btn-success">Update</button>
												<a href="dashboard.php?module=gejala"><button class="btn btn-primary" type="button">Batal</button></a>
												
												 <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                                 <input type="hidden" name="id_gejala" value="<?php echo"$id_gejala";?>">
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
  $id_gejala=$_POST['id_gejala'];
  $nama_gejala=$_POST['nama_gejala'];
  $username=$_POST['username'];
  

$queryupdate = mysqli_query($koneksi, "UPDATE tbgejala SET 
						   nama_gejala='$nama_gejala'
						   WHERE id_gejala = '$id_gejala'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=gejala';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=gejala&stt=edit&id=$id_gejala';</script>";

   }
  }
 ?>	

<?php
}
?>
