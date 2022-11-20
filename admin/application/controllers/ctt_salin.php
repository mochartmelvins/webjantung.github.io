<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
<a href="media.php?module=ctt_salin&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						
<!--
<a href="media.php?module=ctt_salin&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Persalinan</th>
													<th scope="col">Nama Ibu</th>
                                                    <th scope="col">Tgl Persalinan</th>
													<th scope="col">Umur Kehamilan</th>
													<th scope="col">Jenis Persalinan</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan,pendaftaran,catatan_kehamilan,jenis_persalinan where catatan_persalinan.id=pendaftaran.id and catatan_persalinan.id_ctt_kehamilan=catatan_kehamilan.id_ctt_kehamilan and catatan_persalinan.id_jenis_persalinan=jenis_persalinan.id_jenis_persalinan  order by catatan_persalinan.id_ctt_persalinan asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='7'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 100;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan,pendaftaran,catatan_kehamilan,jenis_persalinan where catatan_persalinan.id=pendaftaran.id and catatan_persalinan.id_ctt_kehamilan=catatan_kehamilan.id_ctt_kehamilan and catatan_persalinan.id_jenis_persalinan=jenis_persalinan.id_jenis_persalinan  order by catatan_persalinan.id_ctt_persalinan asc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_ctt_persalinan'] ?></td>
  <td align="center">
    <?php echo $r['nama_ibu'] ?>
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=detail&id=".$r['id'] ?>" title="Detail">

  </a>
  </td>
   <td align="center"><?php 
  $tgl_lahir_ibu=$r['tgl_persalinan'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center"><?php echo $r['umur_kehamilan'] ?></td>
  <td align="center"><?php echo $r['nama_jenis_persalinan'] ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=detail2&id=".$r['id_ctt_persalinan'] ?>" title="Detail"><i class="fa fa-folder-o"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=edit&id=".$r['id_ctt_persalinan'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=hapus&id=".$r['id_ctt_persalinan'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=ctt_salin&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // keterangan_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=ctt_salin&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=ctt_salin&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Catatan Persalinan";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
	$id=$_GET['id'];
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan order by `id_ctt_persalinan` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="PS-";
       if(mysqli_num_rows($q) == 0){
            $id_ctt_persalinan="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_ctt_persalinan=$d["id_ctt_persalinan"];
           
                $urut=substr($id_ctt_persalinan,3,3)+1;
                    if($urut<10){$id_ctt_persalinan="$kd"."00".$urut;}
                    else if($urut<100){$id_ctt_persalinan="$kd"."0".$urut;}
                    else{$id_ctt_persalinan="$kd".$urut;}
					
           
			}
			
			#echo $id_ctt_persalinan;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Tambah Catatan Persalinan</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       <div class="form-group">
                                            <label>Id CP</label>
                                            <input class="form-control" disabled  type="text" name="id_ctt_persalinan" value="<?php echo $id_ctt_persalinan ;?>"/>
                                        </div>										
                                        <div class="form-group">
<label>Nama Ibu</label>
<select class="form-control" name="id" required>
<option value="">-- Pilih Ibu --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Ibu masih kosong</option>";
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
                                            <label>Tgl Persalinan</label>
                                            <input class="form-control" required  type="date" name="tgl_persalinan" />
                                        </div>
										
										<div class="form-group">
                                            <label>Umur Kehamilan</label>
                                            <input class="form-control" required  type="text" name="umur_kehamilan" />
                                        </div>
										
										<div class="form-group">
                                            <label>Penolong Persalinan</label>
                                            <input class="form-control" required  type="text" name="penolong_persalinan" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>Keadaan Ibu</label>
                                            <input class="form-control" required  type="text" name="keadaan_ibu" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>Ket Tambahan</label>
                                            <input class="form-control" required  type="text" name="ket_tambahan" />
                                        </div>
										
										<div class="form-group">
                                            <label>Kondisi Bayi Lahir</label>
                                            <input class="form-control" required  type="text" name="kondisi_bayi_lahir" />
                                        </div>
										
										<div class="form-group">
                                            <label>Asuhan Bayi Lahir</label>
                                            <input class="form-control" required  type="text" name="asuhan_bayi_lahir" />
                                        </div>
										
											

										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<input type="hidden" name="id_ctt_persalinan" value="<?php echo"$id_ctt_persalinan";?>">
                                        <a href="media.php?module=ctt_salin"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_ctt_persalinan=$_POST['id_ctt_persalinan'];
  $tgl_persalinan=$_POST['tgl_persalinan'];
  $umur_kehamilan=$_POST['umur_kehamilan'];
  $penolong_persalinan=$_POST['penolong_persalinan'];
  $keadaan_ibu=$_POST['keadaan_ibu'];
  $ket_tambahan=$_POST['ket_tambahan'];
  $kondisi_bayi_lahir=$_POST['kondisi_bayi_lahir'];
  $asuhan_bayi_lahir=$_POST['asuhan_bayi_lahir'];

  $q1 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  $id_ctt_kehamilan=$c['id_ctt_kehamilan'];
  $id_jenis_persalinan=$c['id_jenis_persalinan'];

  
  $querytambah = mysqli_query($koneksi, "INSERT INTO catatan_persalinan VALUES('$id_ctt_persalinan', '$id', '$id_ctt_kehamilan', '$id_jenis_persalinan', '$tgl_persalinan', '$umur_kehamilan', '$penolong_persalinan', '$keadaan_ibu', '$ket_tambahan', '$kondisi_bayi_lahir', '$asuhan_bayi_lahir')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_salin';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_salin';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM catatan_persalinan WHERE `id_ctt_persalinan` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=ctt_salin';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=ctt_salin';</script>";
 }

?>


<?php } 
else if($stt=="detail"){

   
	?>
	
<div class="card mt-5">
                        <div class="card-body">

<a href="<?php $id=$_GET['id']; echo"media.php?module=ctt_salin&stt=tambah&id=$id";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data Kehamilan</button></a>						
<!--

<a href="media.php?module=ctt_salin&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Hari Pertama Haid Terakhir/HPHT</th>
                                                    <th scope="col">Hari Taksiran Persalinan/HTP</th>
													<th scope="col">Lingkar lengan Atas</th>
													<th scope="col">Gol Darah</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $id=$_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan,pendaftaran,jenis_persalinan where catatan_kehamilan.id=pendaftaran.id and catatan_kehamilan.id_jenis_persalinan=jenis_persalinan.id_jenis_persalinan and pendaftaran.id='$id' order by catatan_kehamilan.id_ctt_kehamilan asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='7'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
   <td align="center"><?php 
  $hpht=$r['hpht'];
  $pisah=explode("-",$hpht);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?>
  <br>
  <a href="<?php $id=$_GET['id']; echo"media.php?module=tambah_periksa&id=$id";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Data Pemeriksaan</button></a>						
  
  </td>
     <td align="center"><?php 
  $htp=$r['htp'];
  $pisah=explode("-",$htp);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>

  <td align="center"><?php echo $r['lingkar_lengan_atas'] ?></td>
  
  <td align="center"><?php 
  $q1 = mysqli_query($koneksi, "SELECT * FROM ibu,pendaftaran,gol_darah where ibu.id=pendaftaran.id and ibu.id_goldar=gol_darah.id_goldar and pendaftaran.id='$id' order by ibu.id_ibu asc") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  
  echo $c['nama_goldar'] ?></td>
<td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=detail2&id=".$r['id_ctt_kehamilan'] ?>" title="Detail"><i class="fa fa-folder-o"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=edit&id=".$r['id_ctt_kehamilan'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=hapus&id=".$r['id_ctt_kehamilan'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
echo"<br>Jumlah : $jmldata Catatan Kehamilan";
?>
<hr>    
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_salin";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>	
                    </div>
                </div>
	
<?php
}	
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan where id_ctt_persalinan='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  $id_ctt_persalinan=$d['id_ctt_persalinan'];
  $id=$d['id'];
  $id_ctt_kehamilan=$d['id_ctt_kehamilan'];
  $tgl_persalinan=$d['tgl_persalinan'];
  $umur_kehamilan=$d['umur_kehamilan'];
  $penolong_persalinan=$d['penolong_persalinan'];
  $keadaan_ibu=$d['keadaan_ibu'];
  $ket_tambahan=$d['ket_tambahan'];
  $kondisi_bayi_lahir=$d['kondisi_bayi_lahir'];
  $asuhan_bayi_lahir=$d['asuhan_bayi_lahir'];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Catatan Persalinan</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        

 <div class="form-group">
                                            <label>Id CP</label>
                                            <input class="form-control" disabled  type="text" name="id_ctt_persalinan" value="<?php echo $id_ctt_persalinan ;?>"/>
                                        </div>										
                                        <div class="form-group">
<label>Nama Ibu</label>
<select class="form-control" name="id" required>
<?php
  echo"<option value='$id'>".PEN($pendaftaran,$id)."</option>";
?>
<option value="">-- Pilih Ibu --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Ibu masih kosong</option>";
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
                                            <label>Tgl Persalinan</label>
                                            <input class="form-control" required  type="date" name="tgl_persalinan" value="<?php echo $tgl_persalinan; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Umur Kehamilan</label>
                                            <input class="form-control" required  type="text" name="umur_kehamilan" value="<?php echo $umur_kehamilan; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Penolong Persalinan</label>
                                            <input class="form-control" required  type="text" name="penolong_persalinan" value="<?php echo $penolong_persalinan; ?>"/>
                                        </div>
										
										
										<div class="form-group">
                                            <label>Keadaan Ibu</label>
                                            <input class="form-control" required  type="text" name="keadaan_ibu" value="<?php echo $keadaan_ibu; ?>"/>
                                        </div>
										
										
										<div class="form-group">
                                            <label>Ket Tambahan</label>
                                            <input class="form-control" required  type="text" name="ket_tambahan" value="<?php echo $ket_tambahan; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Kondisi Bayi Lahir</label>
                                            <input class="form-control" required  type="text" name="kondisi_bayi_lahir" value="<?php echo $kondisi_bayi_lahir; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Asuhan Bayi Lahir</label>
                                            <input class="form-control" required  type="text" name="asuhan_bayi_lahir" value="<?php echo $asuhan_bayi_lahir; ?>"/>
                                        </div>

										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_ctt_persalinan" value="<?php echo"$id_ctt_persalinan";?>">
										<input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php  echo"$_SERVER[PHP_SELF]?module=ctt_salin";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id=$_POST['id'];
  $id_ctt_persalinan=$_POST['id_ctt_persalinan'];
  $tgl_persalinan=$_POST['tgl_persalinan'];
  $umur_kehamilan=$_POST['umur_kehamilan'];
  $penolong_persalinan=$_POST['penolong_persalinan'];
  $keadaan_ibu=$_POST['keadaan_ibu'];
  $ket_tambahan=$_POST['ket_tambahan'];
  $kondisi_bayi_lahir=$_POST['kondisi_bayi_lahir'];
  $asuhan_bayi_lahir=$_POST['asuhan_bayi_lahir'];

  $q1 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  $id_ctt_kehamilan=$c['id_ctt_kehamilan'];
  $id_jenis_persalinan=$c['id_jenis_persalinan'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE catatan_persalinan SET 
                           id='$id',
						   id_ctt_kehamilan='$id_ctt_kehamilan',
						   id_jenis_persalinan='$id_jenis_persalinan',
						   tgl_persalinan='$tgl_persalinan',
						   umur_kehamilan='$umur_kehamilan',
						   penolong_persalinan='$penolong_persalinan',
						   keadaan_ibu='$keadaan_ibu',
						   ket_tambahan='$ket_tambahan',
						   kondisi_bayi_lahir='$kondisi_bayi_lahir',
						   asuhan_bayi_lahir='$asuhan_bayi_lahir'
						   
						   WHERE id_ctt_persalinan = '$id_ctt_persalinan'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=ctt_salin';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=ctt_salin';</script>";

   }
  }
 ?>



<?php
}
else if ($stt=="detail2"){
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan,pendaftaran,catatan_kehamilan,jenis_persalinan where catatan_persalinan.id=pendaftaran.id and catatan_persalinan.id_ctt_kehamilan=catatan_kehamilan.id_ctt_kehamilan and catatan_persalinan.id_jenis_persalinan=jenis_persalinan.id_jenis_persalinan and catatan_persalinan.id_ctt_persalinan='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  
?>


<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Detail Catatan Persalinan</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        

<table class="table text-center" width="100%" border="1">
<tr>
<td align="left" colspan="2"><img src="application/gambar/kopsurat.png" alt="logo"></td>
</tr>
<tr>
<td align="left" width="60%">Id Ibu</td>
<td align="left" width="40%"><?php echo $id; ?></td>
</tr>
<tr>
<td align="left" width="60%">Nama Ibu</td>
<td align="left" width="40%"><?php echo $d['nama_ibu']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Jenis Persalinan</td>
<td align="left" width="40%"><?php echo $d['nama_jenis_persalinan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tgl Persalinan</td>
<td align="left" width="40%"><?php echo $d['tgl_persalinan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Umur Kehamilan</td>
<td align="left" width="40%"><?php echo $d['umur_kehamilan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Penolong Persalinan</td>
<td align="left" width="40%"><?php 

  echo $d['penolong_persalinan']
 ?></td>
</tr>
<tr>
<td align="left" width="60%">Keadaan Ibu</td>
<td align="left" width="40%"><?php echo $d['keadaan_ibu']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Ket Tambahan</td>
<td align="left" width="40%"><?php echo $d['ket_tambahan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kondisi Bayi Lahir</td>
<td align="left" width="40%"><?php echo $d['kondisi_bayi_lahir']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Asuhan Bayi Lahir</td>
<td align="left" width="40%"><?php echo $d['asuhan_bayi_lahir']; ?></td>
</tr>


</table>

										
<a href="<?php $id=$d['id']; echo"$_SERVER[PHP_SELF]?module=ctt_salin";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_salin";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=ctt_salin&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
  <td colspan='7'>Tidak Ada Data Yang Tersedia</td>
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_salin&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>