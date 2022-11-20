<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=data_anak&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
<!--
<a href="media.php?module=data_anak&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Nama Anak</th>
                                                    <th scope="col">Tgl Lahir</th>
													<th scope="col">Jenis Kelamin</th>
													<th scope="col">Anak ke</th>
													<th scope="col">No Akte Kelahiran</th>
													<th scope="col">Anak Ibu</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM anak,pendaftaran,jenis_kelamin where anak.id=pendaftaran.id and anak.id_jk=jenis_kelamin.id_jk order by anak.id_anak asc") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM anak,pendaftaran,jenis_kelamin where anak.id=pendaftaran.id and anak.id_jk=jenis_kelamin.id_jk order by anak.id_anak asc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['nama_anak'] ?></td>
   <td align="center"><?php 
  $tgl_lahir_anak=$r['tgl_lahir_anak'];
  $pisah=explode("-",$tgl_lahir_anak);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center"><?php echo $r['nama_jk'] ?></td>
  <td align="center"><?php echo $r['anak_ke'] ?></td>
  <td align="center"><?php echo $r['no_akte_kelahiran'] ?></td>
  <td align="center"><?php echo $r['nama_ibu'] ?></td>
  <td align="center">
  
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=data_anak&stt=edit&id=".$r['id_anak'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=data_anak&stt=hapus&id=".$r['id_anak'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=data_anak&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // keterangan_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=data_anak&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=data_anak&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Data Anak";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM anak order by `id_anak` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="AN-";
       if(mysqli_num_rows($q) == 0){
            $id_anak="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_anak=$d["id_anak"];
           
                $urut=substr($id_anak,5,4)+1;
                    if($urut<10){$id_anak="$kd"."00".$urut;}
                    else if($urut<100){$id_anak="$kd"."0".$urut;}
                    else{$id_anak="$kd".$urut;}
					
           
			}
			
			#echo $id_anak;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Data Anak</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
                                        <div class="form-group">
                                            <label>Nama Anak</label>
                                            <input class="form-control" required  type="text" name="nama_anak" />
                                        </div>
										<div class="form-group">
                                            <label>Tgl Lahir Anak</label>
                                            <input class="form-control" required  type="date" name="tgl_lahir_anak" />
                                        </div>
										<div class="form-group">
<label>Jenis Kelamin</label>
<select class="form-control" name="id_jk" required>
<option value="">-- Pilih Jenis Kelamin --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin order by `id_jk` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Jenis Kelamin masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_jk'] ?>"><?php echo $r['nama_jk']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>	
<div class="form-group">
                                            <label>Anak Ke</label>
                                            <input class="form-control" required  type="number" name="anak_ke" />
                                        </div>
										<div class="form-group">
                                            <label>No Akte Kelahiran</label>
                                            <input class="form-control" required  type="number" name="no_akte_kelahiran" />
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


										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										 <input type="hidden" name="id_anak" value="<?php echo"$id_anak";?>">
                                        <a href="media.php?module=data_anak"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $tgl_lahir_anak=$_POST['tgl_lahir_anak'];
  $anak_ke=$_POST['anak_ke'];
  $no_akte_kelahiran=$_POST['no_akte_kelahiran'];
  $id_anak=$_POST['id_anak'];

  $id_jk=$_POST['id_jk'];

  $querytambah = mysqli_query($koneksi, "INSERT INTO anak VALUES('$id_anak', '$nama_anak', '$tgl_lahir_anak', '$id_jk', '$anak_ke', '$no_akte_kelahiran', '$id')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=data_anak';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=data_anak';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM ibu WHERE `id_anak` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=data_anak';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=data_anak';</script>";
 }

?>


<?php } 
else if($stt=="detail"){
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM ibu,pendaftaran,gol_darah,agama,pendidikan,pekerjaan,kecamatan,kab_kota where ibu.id=pendaftaran.id and ibu.id_goldar=gol_darah.id_goldar and ibu.id_agama=agama.id_agama and ibu.id_pendidikan=pendidikan.id_pendidikan and ibu.id_anak=pekerjaan.id_anak and ibu.id_anak=kecamatan.id_anak and ibu.id_kab_kota=kab_kota.id_kab_kota and ibu.id_anak='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_anak=$d["id_anak"];
  $id=$d['id'];
  $id_goldar=$d['id_goldar'];
  $tgl_lahir_anak=$d['tgl_lahir_anak'];
  $id_agama=$d['id_agama'];
  $id_pendidikan=$d['id_pendidikan'];
  $id_anak=$d['id_anak'];
  $no_jkn=$d['no_jkn'];
  $nama_suami=$d['nama_suami'];
  $alamat=$d['alamat'];
  $id_anak=$d['id_anak'];
  $id_kab_kota=$d['id_kab_kota'];
  $no_tlp=$d['no_tlp'];	
	?>
	
<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Detail Data Ibu</h4>
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
<td align="left" width="40%"><?php echo $d['nama_anak']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tgl Lahir Ibu</td>
<td align="left" width="40%"><?php echo $d['tgl_lahir_anak']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Golongan Darah</td>
<td align="left" width="40%"><?php echo $d['nama_goldar']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Agama</td>
<td align="left" width="40%"><?php echo $d['nama_agama']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Pendidikan</td>
<td align="left" width="40%"><?php echo $d['nama_pendidikan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Pekerjaan</td>
<td align="left" width="40%"><?php echo $d['nama_pekerjaan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">No JKN</td>
<td align="left" width="40%"><?php echo $d['no_jkn']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Nama Suami</td>
<td align="left" width="40%"><?php echo $d['nama_suami']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Alamat</td>
<td align="left" width="40%"><?php echo $d['alamat']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kecamatan</td>
<td align="left" width="40%"><?php echo $d['nama_kecamatan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kab/Kota</td>
<td align="left" width="40%"><?php echo $d['nama_kab_kota']; ?></td>
</tr>
<tr>
<td align="left" width="60%">No telepon</td>
<td align="left" width="40%"><?php echo $d['no_tlp']; ?></td>
</tr>
</table>

										
<a href="<?php $id_anak=$d['id_anak']; echo"application/controllers/cetak_data_ibu.php?id=$id_anak";?>" target="_blank"><button type="button" class="btn btn-primary mb-3">Print</button></a>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=data_anak";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

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
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM ibu where id_anak='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_anak=$d["id_anak"];
  $id=$d['id'];
  $id_goldar=$d['id_goldar'];
  $tgl_lahir_anak=$d['tgl_lahir_anak'];
  $id_agama=$d['id_agama'];
  $id_pendidikan=$d['id_pendidikan'];
  $id_anak=$d['id_anak'];
  $no_jkn=$d['no_jkn'];
  $nama_suami=$d['nama_suami'];
  $alamat=$d['alamat'];
  $id_anak=$d['id_anak'];
  $id_kab_kota=$d['id_kab_kota'];
  $no_tlp=$d['no_tlp'];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Data Ibu</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        


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
  <option value="<?php echo $r['id'] ?>"><?php echo $r['nama_anak']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>
<div class="form-group">
                                            <label>Tgl Lahir Ibu</label>
                                            <input class="form-control" required  type="date" name="tgl_lahir_anak" value="<?php echo $tgl_lahir_anak;?>" />
                                        </div>
<div class="form-group">
<label>Golongan Darah</label>
<select class="form-control" name="id_goldar" required>
<?php
  echo"<option value='$id_goldar'>".GOL($gol_darah,$id_goldar)."</option>";
?> 
<option value="">-- Pilih Golongan Darah --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM gol_darah order by `id_goldar` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Golongan Darah masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_goldar'] ?>"><?php echo $r['nama_goldar']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>
<div class="form-group">
<label>Agama</label>
<select class="form-control" name="id_agama" required>
<?php
  echo"<option value='$id_agama'>".AGA($agama,$id_agama)."</option>";
?> 
<option value="">-- Pilih Agama --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM agama order by `id_agama` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Agama masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_agama'] ?>"><?php echo $r['nama_agama']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>
<div class="form-group">
<label>Pendidikan</label>
<select class="form-control" name="id_pendidikan" required>
<?php
  echo"<option value='$id_pendidikan'>".PED($pendidikan,$id_pendidikan)."</option>";
?> 
<option value="">-- Pilih Pendidikan --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM pendidikan order by `id_pendidikan` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Pendidikan masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_pendidikan'] ?>"><?php echo $r['nama_pendidikan']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>
<div class="form-group">
<label>Pekerjaan</label>
<select class="form-control" name="id_anak" required>
<?php
  echo"<option value='$id_anak'>".PEK($pekerjaan,$id_anak)."</option>";
?> 
<option value="">-- Pilih Pekerjaan --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM pekerjaan order by `id_anak` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Pekerjaan masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_anak'] ?>"><?php echo $r['nama_pekerjaan']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>

										
										<div class="form-group">
                                            <label>No JKN</label>
                                            <input class="form-control" required  type="number" name="no_jkn" value="<?php echo $no_jkn;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Suami</label>
                                            <input class="form-control" required  type="text" name="nama_suami" value="<?php echo $nama_suami;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" required  type="text" name="alamat" value="<?php echo $alamat;?>" />
                                        </div>
<div class="form-group">
<label>Kecamatan</label>
<select class="form-control" name="id_anak" required>
<?php
  echo"<option value='$id_anak'>".KEC($kecamatan,$id_anak)."</option>";
?> 
<option value="">-- Pilih Kecamatan --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM kecamatan order by `id_anak` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Kecamatan masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_anak'] ?>"><?php echo $r['nama_kecamatan']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>
<div class="form-group">
<label>Kab Kota</label>
<select class="form-control" name="id_kab_kota" required>
<?php
  echo"<option value='$id_kab_kota'>".KAB($kab_kota,$id_kab_kota)."</option>";
?> 
<option value="">-- Pilih Kab Kota --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM kab_kota order by `id_kab_kota` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Kab Kota masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_kab_kota'] ?>"><?php echo $r['nama_kab_kota']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>										
										
										
										<div class="form-group">
                                            <label>No Telp</label>
                                            <input class="form-control" required  type="number" name="no_tlp" value="<?php echo $no_tlp;?>" />
                                        </div>

										

										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_anak" value="<?php echo"$id_anak";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=data_anak";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id=$_POST['id'];
  $id_goldar=$_POST['id_goldar'];
  $tgl_lahir_anak=$_POST['tgl_lahir_anak'];
  $id_agama=$_POST['id_agama'];
  $id_pendidikan=$_POST['id_pendidikan'];
  $id_anak=$_POST['id_anak'];
  $no_jkn=$_POST['no_jkn'];
  $nama_suami=$_POST['nama_suami'];
  $alamat=$_POST['alamat'];
  $id_anak=$_POST['id_anak'];
  $id_kab_kota=$_POST['id_kab_kota'];
  $no_tlp=$_POST['no_tlp'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE ibu SET 
                           id='$id',
						   tgl_lahir_anak='$tgl_lahir_anak',
						   id_goldar='$id_goldar',
						   id_agama='$id_agama',
						   id_pendidikan='$id_pendidikan',
						   id_anak='$id_anak',
						   no_jkn='$no_jkn',
						   nama_suami='$nama_suami',
						   alamat='$alamat',
						   id_anak='$id_anak',
						   id_kab_kota='$id_kab_kota',
						   no_tlp='$no_tlp'
						   WHERE id_anak = '$id_anak'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=data_anak';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=data_anak';</script>";

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=data_anak";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=data_anak&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=data_anak&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=data_anak&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=data_anak&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>