<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						
						
						
<a href="media.php?module=redis_anak&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
<!--
<a href="media.php?module=redis_anak&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Rekam Medis</th>
													<th scope="col">Nama Anak</th>
                                                    <th scope="col">Tgl Pemeriksaan</th>
													<th scope="col">Ctt Imunisasi</th>
													<th scope="col">Ctt Penyakit</th>
													<th scope="col">Ctt Penimbangan</th>
													<th scope="col">Action</th>
                                                </tr>
												
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM redis_anak,anak where redis_anak.id_anak=anak.id_anak order by redis_anak.id_redis_anak desc") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM redis_anak,anak where redis_anak.id_anak=anak.id_anak order by redis_anak.id_redis_anak desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"> <?php echo $r['id_redis_anak'] ?></td>
  <td align="center"><?php echo $r['nama_anak'] ?>
  <a href="media.php?module=redis_anak&stt=detail&idm=<?php echo $r['id'] ?>" class="menu">
  
  </a>
  
  </td>
   <td align="center"><?php 
  $tgl_pemeriksaan=$r['tgl_pemeriksaan'];
  $pisah=explode("-",$tgl_pemeriksaan);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
 <td align="center"> <?php echo $r['ctt_imunisasi'] ?></td>
 <td align="center"> <?php echo $r['ctt_penyakit'] ?></td>
 <td align="center"> <?php echo $r['ctt_penimbangan'] ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=redis_anak&stt=edit&id=".$r['id_redis_anak'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=redis_anak&idm=$id&stt=hapus&id=".$r['id_redis_anak'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
$jmldata = mysqli_num_rows($query);
if($jmldata>0){
    if($batas<1){$batas=1;}
$jmlhal  = ceil($jmldata/$batas);
    echo "<div class='pagination_area pull-right mt-5'><ul>";
    if($page > 1){
        $prev=$page-1;
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=redis_anak&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // ctt_penimbangan_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=redis_anak&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=redis_anak&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Rekam Medis Anak";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM redis_anak order by `id_redis_anak` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="RA-";
       if(mysqli_num_rows($q) == 0){
            $id_redis_anak="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_redis_anak=$d["id_redis_anak"];
           
                $urut=substr($id_redis_anak,3,3)+1;
                    if($urut<10){$id_redis_anak="$kd"."00".$urut;}
                    else if($urut<100){$id_redis_anak="$kd"."0".$urut;}
                    else{$id_redis_anak="$kd".$urut;}
					
           
			}
			
			#echo $id_redis_anak;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Data Rekam Medis Anak</h4>
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
                                            <label>Tgl Pemeriksaan</label>
                                            <input class="form-control" required  type="date" name="tgl_pemeriksaan" />
                                        </div>
										
										<div class="form-group">
                                            <label>Ctt Imunisasi</label>
                                            <input class="form-control" required  type="text" name="ctt_imunisasi" />
                                        </div>
<div class="form-group">
                                            <label>Ctt Penyakit</label>
                                            <input class="form-control" required  type="text" name="ctt_penyakit" />
                                        </div>
										<div class="form-group">
                                            <label>Ctt Penimbangan</label>
                                            <input class="form-control" required  type="text" name="ctt_penimbangan" />
                                        </div>
																		

										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										 <input type="hidden" name="id_redis_anak" value="<?php echo"$id_redis_anak";?>">
                                        <a href="media.php?module=redis_anak"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_anak=$_POST['id_anak'];
  $id_redis_anak=$_POST['id_redis_anak'];
  $tgl_pemeriksaan=$_POST['tgl_pemeriksaan'];
  $ctt_imunisasi=$_POST['ctt_imunisasi'];
  $ctt_penyakit=$_POST['ctt_penyakit'];
  $ctt_penimbangan=$_POST['ctt_penimbangan'];

  $tgl=date('Y-m-d');

  $querytambah = mysqli_query($koneksi, "INSERT INTO redis_anak VALUES('$id_redis_anak', '$id_anak', '$tgl_pemeriksaan', '$ctt_imunisasi', '$ctt_penyakit', '$ctt_penimbangan')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=redis_anak';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=redis_anak';</script>";

   }
  }
 ?>


<?php }
else if($stt=="detail2"){
?>


<?php
}
else if($stt=="hapus"){
	
 ?>

<?php
  $id = $_GET['id'];
  $idm = $_GET['idm'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM redis_anak WHERE `id_redis_anak` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=redis_anak';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=redis_anak';</script>";
 }

?>


<?php } 
else if($stt=="detail"){

  
	?>


	
<?php
}	
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM redis_anak where id_redis_anak='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_redis_anak=$d["id_redis_anak"];
  $id_anak=$d['id_anak'];
  $tgl_pemeriksaan=$d['tgl_pemeriksaan'];
  $ctt_imunisasi=$d['ctt_imunisasi'];
  $ctt_penyakit=$d['ctt_penyakit'];
  $ctt_penimbangan=$d['ctt_penimbangan'];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Catatan Rekam Medis Anak</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        



<div class="form-group">
                                            <label>Tgl Pemeriksaan</label>
                                            <input class="form-control" required  type="date" name="tgl_pemeriksaan" value="<?php echo $tgl_pemeriksaan;?>" />
                                        </div>

<div class="form-group">
                                            <label>Ctt Imunisasi</label>
                                            <input class="form-control" required  type="text" name="ctt_imunisasi" value="<?php echo $ctt_imunisasi;?>"/>
                                        </div>
<div class="form-group">
                                            <label>Ctt Penyakit</label>
                                            <input class="form-control" required  type="text" name="ctt_penyakit" value="<?php echo $ctt_penyakit;?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Ctt Penimbangan</label>
                                            <input class="form-control" required  type="text" name="ctt_penimbangan" value="<?php echo $ctt_penimbangan;?>"/>
                                        </div>
																		

										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_redis_anak" value="<?php echo"$id_redis_anak";?>">
										<input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=redis_anak&stt=detail&idm=$id";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
     $id_redis_anak=$_POST["id_redis_anak"];
  $id=$_POST['id'];
  $tgl_pemeriksaan=$_POST['tgl_pemeriksaan'];
  $ctt_imunisasi=$_POST['ctt_imunisasi'];
  $ctt_penyakit=$_POST['ctt_penyakit'];
  $ctt_penimbangan=$_POST['ctt_penimbangan'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE redis_anak SET 
                           ctt_imunisasi='$ctt_imunisasi',
						   tgl_pemeriksaan='$tgl_pemeriksaan',
						   ctt_penimbangan='$ctt_penimbangan',
						   ctt_penyakit='$ctt_penyakit'
						   WHERE id_redis_anak = '$id_redis_anak'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=redis_anak';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=redis_anak';</script>";

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=redis_anak";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=redis_anak&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
  <td colspan='9'>Tidak Ada Data Yang Tersedia</td>
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=redis_anak&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=redis_anak&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=redis_anak&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>