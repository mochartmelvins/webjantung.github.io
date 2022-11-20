<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						
						
						
						<a href="media.php?module=ctt_imun&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
<!--
<a href="media.php?module=ctt_imun&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Nama Anak</th>
                                                    <th scope="col">Tgl Imunisasi</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM catatan_imunisasi,anak,jenis_imunisasi where catatan_imunisasi.id_anak=anak.id_anak and catatan_imunisasi.id_jenis_imunisasi=jenis_imunisasi.id_jenis_imunisasi group by anak.id_anak desc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='8'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 100;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM catatan_imunisasi,anak,jenis_imunisasi where catatan_imunisasi.id_anak=anak.id_anak and catatan_imunisasi.id_jenis_imunisasi=jenis_imunisasi.id_jenis_imunisasi group by anak.id_anak desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center">
  <a href="media.php?module=ctt_imun&stt=detail&idm=<?php echo $r['id_anak'] ?>" class="menu">
  <?php echo $r['nama_anak'] ?>
  </a>
  
  </td>
   <td align="center"><?php 
  $tgl_imunisasi=$r['tgl_imunisasi'];
  $pisah=explode("-",$tgl_imunisasi);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>

 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>			
											
								</table>			
                        </div>
                        
                            
							<?php
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
if($jmldata>0){
    if($batas<1){$batas=1;}
$jmlhal  = ceil($jmldata/$batas);
    echo "<div class='pagination_area pull-right mt-5'><ul>";
    if($page > 1){
        $prev=$page-1;
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=ctt_imun&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // keterangan_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=ctt_imun&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=ctt_imun&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Imunisasi Anak";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM catatan_imunisasi order by `id_imunisasi` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="IM-";
       if(mysqli_num_rows($q) == 0){
            $id_imunisasi="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_imunisasi=$d["id_imunisasi"];
           
                $urut=substr($id_imunisasi,5,4)+1;
                    if($urut<10){$id_imunisasi="$kd"."00".$urut;}
                    else if($urut<100){$id_imunisasi="$kd"."0".$urut;}
                    else{$id_imunisasi="$kd".$urut;}
					
           
			}
			
			#echo $id_anak;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Catatan Imunisasi</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
<div class="form-group">
<label>Nama Anak</label>
<select class="form-control" name="id_anak" required>
<option value="">-- Pilih Nama Anak --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM anak order by `id_anak` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Nama Anak masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_anak'] ?>"><?php echo $r['nama_anak']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>	
										
																		
<div class="form-group">
<label>Jenis Imunisasi</label>
<select class="form-control" name="id_jenis_imunisasi" required>
<option value="">-- Pilih Jenis Imunisasi --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi order by `id_jenis_imunisasi` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Jenis Imunisasi masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_jenis_imunisasi'] ?>"><?php echo $r['nama_jenis_imunisasi']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										 <input type="hidden" name="id_imunisasi" value="<?php echo"$id_imunisasi";?>">
                                        <a href="media.php?module=ctt_imun"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
if(isset($_POST['Simpan'])){
  $id=$_POST['id'];
  $nama_anak=$_POST['nama_anak'];
  $tgl_imunisasi=$_POST['tgl_imunisasi'];
  $id_imunisasi=$_POST['id_imunisasi'];
  $id_jenis_imunisasi=$_POST['id_jenis_imunisasi'];
  $id_anak=$_POST['id_anak'];

  $tgl=date('Y-m-d');;

  $querytambah = mysqli_query($koneksi, "INSERT INTO catatan_imunisasi VALUES('$id_imunisasi', '$id_anak', '$id_jenis_imunisasi', '$tgl')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_imun';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_imun';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM catatan_imunisasi WHERE `id_imunisasi` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=ctt_imun';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=ctt_imun';</script>";
 }

?>


<?php } 
else if($stt=="detail"){

  
	?>

<div class="card mt-5">
                        <div class="card-body">

<?php
$id=$_GET['idm'];						
$qc = mysqli_query($koneksi, "SELECT * FROM anak where id_anak='$id'") or die (mysqli_error());
$rc = mysqli_fetch_array($qc);
echo "<br>Nama Anak : ".$rc['nama_anak']."<br><hr>";
						?>						
						<!--
						<a href="media.php?module=ctt_imun&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>

<a href="media.php?module=ctt_imun&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													
													<th scope="col">Jenis Imunisasi</th>
                                                    <th scope="col">Tgl Imunisasi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $id=$_GET["idm"];
  $query1 = mysqli_query($koneksi, "SELECT * FROM catatan_imunisasi,anak,jenis_imunisasi where catatan_imunisasi.id_anak=anak.id_anak and catatan_imunisasi.id_jenis_imunisasi=jenis_imunisasi.id_jenis_imunisasi and anak.id_anak='$id' order by catatan_imunisasi.id_imunisasi asc") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='4'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{

		
		$no=1;
      while($r = mysqli_fetch_array($query1)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
 
  <td align="center">
  <?php echo $r['nama_jenis_imunisasi'] ?>
  </td>
  
   <td align="center"><?php 
  $tgl_imunisasi=$r['tgl_imunisasi'];
  $pisah=explode("-",$tgl_imunisasi);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?>
  </td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_imun&stt=edit&id=".$r['id_imunisasi'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_imun&stt=hapus&id=".$r['id_imunisasi'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
                        
                            
							<?php
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query1);



echo"<br>Jumlah : $jmldata Imunisasi Anak";
?>
                        
                    </div>
                </div>

	
<?php


  $q = mysqli_query($koneksi, "SELECT * FROM catatan_imunisasi order by `id_imunisasi` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="IM-";
       if(mysqli_num_rows($q) == 0){
            $id_imunisasi="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_imunisasi=$d["id_imunisasi"];
           
                $urut=substr($id_imunisasi,5,4)+1;
                    if($urut<10){$id_imunisasi="$kd"."00".$urut;}
                    else if($urut<100){$id_imunisasi="$kd"."0".$urut;}
                    else{$id_imunisasi="$kd".$urut;}
					
           
			}
			
			#echo $id_anak;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Catatan Imunisasi</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       

										
																		
<div class="form-group">
<label>Jenis Imunisasi</label>
<select class="form-control" name="id_jenis_imunisasi" required>
<option value="">-- Pilih Jenis Imunisasi --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi order by `id_jenis_imunisasi` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Jenis Imunisasi masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_jenis_imunisasi'] ?>"><?php echo $r['nama_jenis_imunisasi']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										 <input type="hidden" name="id_imunisasi" value="<?php echo"$id_imunisasi";?>">
                                        <a href="media.php?module=ctt_imun"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
if(isset($_POST['Simpan'])){
  $id=$_POST['id'];
  $nama_anak=$_POST['nama_anak'];
  $tgl_imunisasi=$_POST['tgl_imunisasi'];
  $id_imunisasi=$_POST['id_imunisasi'];
  $id_jenis_imunisasi=$_POST['id_jenis_imunisasi'];
  $id_anak=$_GET['idm'];

  $tgl=date('Y-m-d');;

  $querytambah = mysqli_query($koneksi, "INSERT INTO catatan_imunisasi VALUES('$id_imunisasi', '$id_anak', '$id_jenis_imunisasi', '$tgl')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_imun&stt=detail&idm=$id_anak';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_imun&stt=detail&idm=$id_anak';</script>";

   }
  }
 ?>
	
<?php
}	
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM catatan_imunisasi where id_imunisasi='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_imunisasi=$d["id_imunisasi"];
  $id_anak=$d['id_anak'];
  $id_jenis_imunisasi=$d['id_jenis_imunisasi'];
  $tgl_imunisasi=$d['tgl_imunisasi'];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Catatan Imunisasi</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        


<div class="form-group">
<label>Jenis Imunisasi</label>
<select class="form-control" name="id_jenis_imunisasi" required>
<?php
  echo"<option value='$id_jenis_imunisasi'>".IMN($jenis_imunisasi,$id_jenis_imunisasi)."</option>";
?> 
<option value="">-- Pilih Jenis Imunisasi --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi order by `id_jenis_imunisasi` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Jenis Imunisasi masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_jenis_imunisasi'] ?>"><?php echo $r['nama_jenis_imunisasi']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>
<div class="form-group">
                                            <label>Tgl Imunisasi</label>
                                            <input class="form-control" required  type="date" name="tgl_imunisasi" value="<?php echo $tgl_imunisasi;?>" />
                                        </div>


										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_imunisasi" value="<?php echo"$id_imunisasi";?>">
										<input type="hidden" name="id_anak" value="<?php echo"$id_anak";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_imun&stt=detail&idm=$id_anak";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_anak=$_POST['id_anak'];
  $id_imunisasi=$_POST['id_imunisasi'];
  $id_jenis_imunisasi=$_POST['id_jenis_imunisasi'];
  $tgl_imunisasi=$_POST['tgl_imunisasi'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE catatan_imunisasi SET 
                           id_anak='$id_anak',
						   tgl_imunisasi='$tgl_imunisasi',
						   id_jenis_imunisasi='$id_jenis_imunisasi'
						   WHERE id_imunisasi = '$id_imunisasi'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=ctt_imun&stt=detail&idm=$id_anak';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=ctt_imun&stt=detail&idm=$id_anak';</script>";

   }
  }
 ?>



<?php
}
else if ($stt=="cari"){

?>
<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4>Pencarian Fitur</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
<form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Cari Berdasarkan</label>
                                            <select class="form-control" name="listcari">
                                                <option value="">Pilih disini</option>
                                                
												<option value="A">Nama Atribut</option>
												<option value="F">Nama Fitur</option>
												
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_imun";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
                                    </form>





 </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>

<hr>
<?php
if(isset($_POST['Cari'])){

 $listcari=$_POST['listcari'];
 $txtcari=$_POST['txtcari'];

echo"<script>location.href='$_SERVER[PHP_SELF]?module=ctt_imun&stt=cari2&L=$listcari&T=$txtcari';</script>";
?>


	
<?php	

	


}

?>

<?php
} else if($stt=="cari2"){
	$listcari=$_GET['L'];
	$txtcari=$_GET['T'];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form action="" method="POST">
                                <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                 <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Atribut</th>
                                                    <th scope="col">Nama Fitur</th>
													<th scope="col">Edible</th>
													<th scope="col">Poison</th>
													<th scope="col">Jumlah</th>
													<th scope="col">Bobot</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
if($listcari=="A"){
$q1 = mysqli_query($koneksi, "SELECT * FROM tbatribut WHERE `name` like '%$txtcari%' order by `id` asc") or die (mysqli_error());	
$r1 = mysqli_fetch_array($q1);
$id=$r1['id'];
	
}
else {
$q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur WHERE `name` like '%$txtcari%' order by `id` asc") or die (mysqli_error());	
$r2 = mysqli_fetch_array($q2);
$id=$r2['id'];	
}


if($listcari=="A"){
									   
$query = mysqli_query($koneksi, "SELECT * FROM ibu WHERE `attribute_id`='$id' order by `id` asc") or die (mysqli_error());	
}
else
{
$query = mysqli_query($koneksi, "SELECT * FROM ibu WHERE `fitur_id`='$id' order by `id` asc") or die (mysqli_error());	
	
	
}
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='8'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php 
  
  $id_a=$r['attribute_id'];
$q1 = mysqli_query($koneksi, "SELECT * FROM tbatribut where id='$id_a'") or die (mysqli_error());
$d1=mysqli_fetch_array($q1);
$name=$d1['name'];
echo $name;
  ?></td>  
  <td align="center"><?php 
  
   $id_a=$r['fitur_id'];
$q1 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_a'") or die (mysqli_error());
$d1=mysqli_fetch_array($q1);
$name=$d1['name'];
echo $name;
 ?></td>  
  <td align="center"><?php echo $r['edible'] ?></td>
  <td align="center"><?php echo $r['poison'] ?></td>
  <td align="center"><?php echo $r['jumlah'] ?></td>
  <td align="center"><?php echo $r['bobot'] ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_imun&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_imun&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
  </td>
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>
                                </table>
                                </form>
                               
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_imun&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>