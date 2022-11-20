<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						
						
						
<a href="media.php?module=redis_ibu&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
<!--
<a href="media.php?module=redis_ibu&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Rekam Medis</th>
													<th scope="col">Nama Ibu</th>
                                                    <th scope="col">Tgl Pemeriksaan</th>
													<th scope="col">Ctt Kehamilan</th>
													<th scope="col">Ctt Persalinan</th>
													<th scope="col">Ctt Nifas</th>
													<th scope="col">Action</th>
                                                </tr>
												
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM redis_ibu,pendaftaran where redis_ibu.id=pendaftaran.id order by redis_ibu.id_redis_ibu desc") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM redis_ibu,pendaftaran where redis_ibu.id=pendaftaran.id order by redis_ibu.id_redis_ibu desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"> <?php echo $r['id_redis_ibu'] ?></td>
  <td align="center"><?php echo $r['nama_ibu'] ?>
  <a href="media.php?module=redis_ibu&stt=detail&idm=<?php echo $r['id'] ?>" class="menu">
  
  </a>
  
  </td>
   <td align="center"><?php 
  $tgl_pemeriksaan=$r['tgl_pemeriksaan'];
  $pisah=explode("-",$tgl_pemeriksaan);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
 <td align="center"> <?php echo $r['ctt_kehamilan'] ?></td>
 <td align="center"> <?php echo $r['ctt_persalinan'] ?></td>
 <td align="center"> <?php echo $r['ctt_nifas'] ?></td>
 
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=redis_ibu&stt=edit&id=".$r['id_redis_ibu'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=redis_ibu&idm=$id&stt=hapus&id=".$r['id_redis_ibu'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=redis_ibu&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // ctt_nifas_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=redis_ibu&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=redis_ibu&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Rekam Medis Ibu";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM redis_ibu order by `id_redis_ibu` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="RM-";
       if(mysqli_num_rows($q) == 0){
            $id_redis_ibu="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_redis_ibu=$d["id_redis_ibu"];
           
                $urut=substr($id_redis_ibu,3,3)+1;
                    if($urut<10){$id_redis_ibu="$kd"."00".$urut;}
                    else if($urut<100){$id_redis_ibu="$kd"."0".$urut;}
                    else{$id_redis_ibu="$kd".$urut;}
					
           
			}
			
			#echo $id_redis_ibu;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Data Rekam Medis Ibu</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
<div class="form-group">
<label>Nama Ibu</label>
<select class="form-control" name="id" required>
<option value="">-- Pilih Nama Ibu --</option>


<?php
$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran order by `id` asc") or die (mysqli_error());

if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Nama Ibu masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id'] ?>"><?php echo $r['nama_ibu']; ?></option>
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
                                            <label>Ctt Kehamilan</label>
                                            <input class="form-control" required  type="text" name="ctt_kehamilan" />
                                        </div>
<div class="form-group">
                                            <label>Ctt Persalinan</label>
                                            <input class="form-control" required  type="text" name="ctt_persalinan" />
                                        </div>
										<div class="form-group">
                                            <label>Ctt Nifas</label>
                                            <input class="form-control" required  type="text" name="ctt_nifas" />
                                        </div>
																		

										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										 <input type="hidden" name="id_redis_ibu" value="<?php echo"$id_redis_ibu";?>">
                                        <a href="media.php?module=redis_ibu"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_redis_ibu=$_POST['id_redis_ibu'];
  $tgl_pemeriksaan=$_POST['tgl_pemeriksaan'];
  $ctt_kehamilan=$_POST['ctt_kehamilan'];
  $ctt_persalinan=$_POST['ctt_persalinan'];
  $ctt_nifas=$_POST['ctt_nifas'];

  $tgl=date('Y-m-d');

  $querytambah = mysqli_query($koneksi, "INSERT INTO redis_ibu VALUES('$id_redis_ibu', '$id', '$tgl_pemeriksaan', '$ctt_kehamilan', '$ctt_persalinan', '$ctt_nifas')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=redis_ibu';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=redis_ibu';</script>";

   }
  }
 ?>


<?php }
else if($stt=="detail2"){
?>
<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Grafik Catatan ctt_kehamilan Anak</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    
                                        
                                       
<?php
#include"grafik.php";
?>


										 
                                       
  <a href="media.php?module=redis_ibu"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>                                 
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>

     </div>
                </div>

<?php
}
else if($stt=="hapus"){
	
 ?>

<?php
  $id = $_GET['id'];
  $idm = $_GET['idm'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM redis_ibu WHERE `id_redis_ibu` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=redis_ibu';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=redis_ibu';</script>";
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
$query = mysqli_query($koneksi, "SELECT * FROM redis_ibu where id_redis_ibu='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_redis_ibu=$d["id_redis_ibu"];
  $id=$d['id'];
  $tgl_pemeriksaan=$d['tgl_pemeriksaan'];
  $ctt_kehamilan=$d['ctt_kehamilan'];
  $ctt_persalinan=$d['ctt_persalinan'];
  $ctt_nifas=$d['ctt_nifas'];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Catatan Rekam Medis Ibu</h4>
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
                                            <label>Ctt Kehamilan</label>
                                            <input class="form-control" required  type="text" name="ctt_kehamilan" value="<?php echo $ctt_kehamilan;?>"/>
                                        </div>
<div class="form-group">
                                            <label>Ctt Persalinan</label>
                                            <input class="form-control" required  type="text" name="ctt_persalinan" value="<?php echo $ctt_persalinan;?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Ctt Nifas</label>
                                            <input class="form-control" required  type="text" name="ctt_nifas" value="<?php echo $ctt_nifas;?>"/>
                                        </div>
																		

										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_redis_ibu" value="<?php echo"$id_redis_ibu";?>">
										<input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=redis_ibu&stt=detail&idm=$id";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
     $id_redis_ibu=$_POST["id_redis_ibu"];
  $id=$_POST['id'];
  $tgl_pemeriksaan=$_POST['tgl_pemeriksaan'];
  $ctt_kehamilan=$_POST['ctt_kehamilan'];
  $ctt_persalinan=$_POST['ctt_persalinan'];
  $ctt_nifas=$_POST['ctt_nifas'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE redis_ibu SET 
                           ctt_kehamilan='$ctt_kehamilan',
						   tgl_pemeriksaan='$tgl_pemeriksaan',
						   ctt_nifas='$ctt_nifas',
						   ctt_persalinan='$ctt_persalinan'
						   WHERE id_redis_ibu = '$id_redis_ibu'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=redis_ibu';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=redis_ibu';</script>";

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=redis_ibu";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=redis_ibu&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=redis_ibu&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=redis_ibu&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=redis_ibu&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>