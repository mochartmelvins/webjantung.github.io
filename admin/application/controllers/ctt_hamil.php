<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						
<!--
<a href="media.php?module=ctt_hamil&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
<a href="media.php?module=ctt_hamil&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Nama Ibu</th>
                                                    <th scope="col">Tgl Pendaftaran</th>
													<th scope="col">Gol Darah</th>
													<th scope="col">Agama</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM ibu,pendaftaran,gol_darah,agama,pendidikan,pekerjaan,kecamatan,kab_kota where ibu.id=pendaftaran.id and ibu.id_goldar=gol_darah.id_goldar and ibu.id_agama=agama.id_agama and ibu.id_pendidikan=pendidikan.id_pendidikan and ibu.id_pekerjaan=pekerjaan.id_pekerjaan and ibu.id_kecamatan=kecamatan.id_kecamatan and ibu.id_kab_kota=kab_kota.id_kab_kota order by ibu.id_ibu asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='6'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 100;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM ibu,pendaftaran,gol_darah,agama,pendidikan,pekerjaan,kecamatan,kab_kota where ibu.id=pendaftaran.id and ibu.id_goldar=gol_darah.id_goldar and ibu.id_agama=agama.id_agama and ibu.id_pendidikan=pendidikan.id_pendidikan and ibu.id_pekerjaan=pekerjaan.id_pekerjaan and ibu.id_kecamatan=kecamatan.id_kecamatan and ibu.id_kab_kota=kab_kota.id_kab_kota order by ibu.id_ibu asc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center">
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail&id=".$r['id'] ?>" title="Detail">
  <?php echo $r['nama_ibu'] ?>
  </a>
  </td>
   <td align="center"><?php 
  $tgl_lahir_ibu=$r['tgl_pendaftaran'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center"><?php echo $r['nama_goldar'] ?></td>
  <td align="center"><?php echo $r['nama_agama'] ?></td>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=ctt_hamil&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // keterangan_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=ctt_hamil&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=ctt_hamil&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Data Ibu";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
	$id=$_GET['id'];
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan order by `id_ctt_kehamilan` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="CK-";
       if(mysqli_num_rows($q) == 0){
            $id_ctt_kehamilan="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_ctt_kehamilan=$d["id_ctt_kehamilan"];
           
                $urut=substr($id_ctt_kehamilan,5,4)+1;
                    if($urut<10){$id_ctt_kehamilan="$kd"."00".$urut;}
                    else if($urut<100){$id_ctt_kehamilan="$kd"."0".$urut;}
                    else{$id_ctt_kehamilan="$kd".$urut;}
					
           
			}
			
			#echo $id_ctt_kehamilan;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Tambah Data Kehamilan</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       <div class="form-group">
                                            <label>Id CK</label>
                                            <input class="form-control" disabled  type="text" name="id_ctt_kehamilan" value="<?php echo $id_ctt_kehamilan ;?>"/>
                                        </div>										
                                         <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input class="form-control" disabled  type="text" name="tgl_lahir_ibu" value="<?php echo PEN($pendaftaran,$id);?>"/>
                                        </div>										

                                         <div class="form-group">
                                            <label>Hari Pertama Haid Terakhir/HPHT</label>
                                            <input class="form-control" required  type="date" name="hpht" />
                                        </div>
										
										<div class="form-group">
                                            <label>Lingkar Lengan Atas</label>
                                            <input class="form-control" required  type="text" name="lingkar_lengan_atas" />
                                        </div>
										
										<div class="form-group">
                                            <label>Penggunaan Kontrasepsi</label>
                                            <input class="form-control" required  type="text" name="penggunaan_kontrasepsi" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>Riwayat Penyakit</label>
                                            <input class="form-control" required  type="text" name="riwayat_penyakit" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>Riwayat Alergi</label>
                                            <input class="form-control" required  type="text" name="riwayat_alergi" />
                                        </div>
										
										<div class="form-group">
                                            <label>Hamil Ke</label>
                                            <input class="form-control" required  type="text" name="hamil_ke" />
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah Persalinan</label>
                                            <input class="form-control" required  type="text" name="jml_persalinan" />
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah Keguguran</label>
                                            <input class="form-control" required  type="text" name="jml_keguguran" />
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah Anak Hidup</label>
                                            <input class="form-control" required  type="text" name="jml_anak_hidup" />
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah Lahir Mati</label>
                                            <input class="form-control" required  type="text" name="jml_lahir_mati" />
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah anak lahir kurang bulan</label>
                                            <input class="form-control" required  type="text" name="jml_anaklahir_krg_bln" />
                                        </div>
										<div class="form-group">
                                            <label>Jarak Kehamilan</label>
                                            <input class="form-control" required  type="text" name="jarak_kehamilan" />
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
										
										<div class="form-group">
                                            <label>Penolong Persalinan</label>
                                            <input class="form-control" required  type="text" name="penolong_persalinan" />
                                        </div>
										
										<div class="form-group">
<label>Jenis Persalinan</label>
<select class="form-control" name="id_jenis_persalinan" required>
<option value="">-- Pilih Jenis Persalinan --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_persalinan order by `id_jenis_persalinan` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Jenis Persalinan masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_jenis_persalinan'] ?>"><?php echo $r['nama_jenis_persalinan']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>
										

										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<input type="hidden" name="id_ctt_kehamilan" value="<?php echo"$id_ctt_kehamilan";?>">
                                        <a href="media.php?module=ctt_hamil"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
	
  $id=$_GET['id'];
  $id_ctt_kehamilan=$_POST['id_ctt_kehamilan'];
  $hpht=$_POST['hpht'];
  $htp=$_POST['htp'];
  $lingkar_lengan_atas=$_POST['lingkar_lengan_atas'];
  $penggunaan_kontrasepsi=$_POST['penggunaan_kontrasepsi'];
  $riwayat_penyakit=$_POST['riwayat_penyakit'];
  $riwayat_alergi=$_POST['riwayat_alergi'];
  $hamil_ke=$_POST['hamil_ke'];
  $jml_persalinan=$_POST['jml_persalinan'];
  $jml_keguguran=$_POST['jml_keguguran'];
  $jml_anak_hidup=$_POST['jml_anak_hidup'];
  $jml_anaklahir_krg_bln=$_POST['jml_anaklahir_krg_bln'];
  $jml_lahir_mati=$_POST['jml_lahir_mati'];
  $jarak_kehamilan=$_POST['jarak_kehamilan'];
  $id_jenis_imunisasi=$_POST['id_jenis_imunisasi'];
  $penolong_persalinan=$_POST['penolong_persalinan'];
  $id_jenis_persalinan=$_POST['id_jenis_persalinan'];
  
 date_default_timezone_get('Asia/Jakarta');
 

  $tgl1 = "2013-01-23";// pendefinisian tanggal awal
$htp = date('Y-m-d', strtotime('+270 days', strtotime($hpht)));

  
  $querytambah = mysqli_query($koneksi, "INSERT INTO catatan_kehamilan VALUES('$id_ctt_kehamilan', '$id', '$hpht', '$htp', '$lingkar_lengan_atas', '$penggunaan_kontrasepsi', '$riwayat_penyakit', '$riwayat_alergi', '$hamil_ke', '$jml_persalinan', '$jml_keguguran', '$jml_anak_hidup', '$jml_lahir_mati', '$jml_anaklahir_krg_bln', '$jarak_kehamilan', '$id_jenis_imunisasi', '$penolong_persalinan', '$id_jenis_persalinan')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail&id=$id';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail&id=$id';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM catatan_kehamilan WHERE `id_ctt_kehamilan` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=ctt_hamil';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=ctt_hamil';</script>";
 }

?>


<?php } 
else if($stt=="detail"){

   
	?>
	
<div class="card mt-5">
                        <div class="card-body">

<a href="<?php $id=$_GET['id']; echo"media.php?module=ctt_hamil&stt=tambah&id=$id";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data Kehamilan</button></a>						
<!--

<a href="media.php?module=ctt_hamil&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
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
  <td colspan='6'>Tidak Ada Data Yang Tersedia</td>
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail2&id=".$r['id_ctt_kehamilan'] ?>" title="Detail"><i class="fa fa-folder-o"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_hamil&stt=edit&id=".$r['id_ctt_kehamilan'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_hamil&stt=hapus&id=".$r['id_ctt_kehamilan'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_hamil";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>	
                    </div>
                </div>
	
<?php
}	
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id_ctt_kehamilan='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  $id=$d['id'];
  $id_ctt_kehamilan=$d['id_ctt_kehamilan'];
  $hpht=$d['hpht'];
  $htp=$d['htp'];
  $lingkar_lengan_atas=$d['lingkar_lengan_atas'];
  $penggunaan_kontrasepsi=$d['penggunaan_kontrasepsi'];
  $riwayat_penyakit=$d['riwayat_penyakit'];
  $riwayat_alergi=$d['riwayat_alergi'];
  $hamil_ke=$d['hamil_ke'];
  $jml_persalinan=$d['jml_persalinan'];
  $jml_keguguran=$d['jml_keguguran'];
  $jml_anak_hidup=$d['jml_anak_hidup'];
  $jml_anaklahir_krg_bln=$d['jml_anaklahir_krg_bln'];
  $jml_lahir_mati=$d['jml_lahir_mati'];
  $jarak_kehamilan=$d['jarak_kehamilan'];
  $id_jenis_imunisasi=$d['id_jenis_imunisasi'];
  $penolong_persalinan=$d['penolong_persalinan'];
  $id_jenis_persalinan=$d['id_jenis_persalinan'];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Catatan Kehamilan</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        

 <div class="form-group">
                                            <label>Id CK</label>
                                            <input class="form-control" disabled  type="text" name="id_ctt_kehamilan" value="<?php echo $id_ctt_kehamilan ;?>"/>
                                        </div>										
                                         <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input class="form-control" disabled  type="text" name="tgl_lahir_ibu" value="<?php echo PEN($pendaftaran,$id);?>"/>
                                        </div>										

                                         <div class="form-group">
                                            <label>Hari Pertama Haid Terakhir/HPHT</label>
                                            <input class="form-control" required  type="date" name="hpht" value="<?php echo $hpht ;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Lingkar Lengan Atas</label>
                                            <input class="form-control" required  type="text" name="lingkar_lengan_atas" value="<?php echo $lingkar_lengan_atas ;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Penggunaan Kontrasepsi</label>
                                            <input class="form-control" required  type="text" name="penggunaan_kontrasepsi" value="<?php echo $penggunaan_kontrasepsi ;?>"/>
                                        </div>
										
										
										<div class="form-group">
                                            <label>Riwayat Penyakit</label>
                                            <input class="form-control" required  type="text" name="riwayat_penyakit" value="<?php echo $riwayat_penyakit ;?>"/>
                                        </div>
										
										
										<div class="form-group">
                                            <label>Riwayat Alergi</label>
                                            <input class="form-control" required  type="text" name="riwayat_alergi" value="<?php echo $riwayat_alergi ;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Hamil Ke</label>
                                            <input class="form-control" required  type="text" name="hamil_ke" value="<?php echo $hamil_ke ;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah Persalinan</label>
                                            <input class="form-control" required  type="text" name="jml_persalinan" value="<?php echo $jml_persalinan ;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah Keguguran</label>
                                            <input class="form-control" required  type="text" name="jml_keguguran" value="<?php echo $jml_keguguran ;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah Anak Hidup</label>
                                            <input class="form-control" required  type="text" name="jml_anak_hidup" value="<?php echo $jml_anak_hidup ;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah Lahir Mati</label>
                                            <input class="form-control" required  type="text" name="jml_lahir_mati" value="<?php echo $jml_lahir_mati ;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Jumlah anak lahir kurang bulan</label>
                                            <input class="form-control" required  type="text" name="jml_anaklahir_krg_bln" value="<?php echo $jml_anaklahir_krg_bln ;?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Jarak Kehamilan</label>
                                            <input class="form-control" required  type="text" name="jarak_kehamilan" value="<?php echo $jarak_kehamilan ;?>"/>
                                        </div>
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
                                            <label>Penolong Persalinan</label>
                                            <input class="form-control" required  type="text" name="penolong_persalinan" value="<?php echo $penolong_persalinan ;?>"/>
                                        </div>
										
										<div class="form-group">
<label>Jenis Persalinan</label>
<select class="form-control" name="id_jenis_persalinan" required>
<?php
  echo"<option value='$id_jenis_persalinan'>".PRS($jenis_persalinan,$id_jenis_persalinan)."</option>";
?> 
<option value="">-- Pilih Jenis Persalinan --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_persalinan order by `id_jenis_persalinan` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Jenis Persalinan masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_jenis_persalinan'] ?>"><?php echo $r['nama_jenis_persalinan']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>

										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_ctt_kehamilan" value="<?php echo"$id_ctt_kehamilan";?>">
										<input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php  echo"$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail&id=$id";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_ctt_kehamilan=$_POST['id_ctt_kehamilan'];
  $hpht=$_POST['hpht'];
  $htp=$_POST['htp'];
  $lingkar_lengan_atas=$_POST['lingkar_lengan_atas'];
  $penggunaan_kontrasepsi=$_POST['penggunaan_kontrasepsi'];
  $riwayat_penyakit=$_POST['riwayat_penyakit'];
  $riwayat_alergi=$_POST['riwayat_alergi'];
  $hamil_ke=$_POST['hamil_ke'];
  $jml_persalinan=$_POST['jml_persalinan'];
  $jml_keguguran=$_POST['jml_keguguran'];
  $jml_anak_hidup=$_POST['jml_anak_hidup'];
  $jml_anaklahir_krg_bln=$_POST['jml_anaklahir_krg_bln'];
  $jml_lahir_mati=$_POST['jml_lahir_mati'];
  $jarak_kehamilan=$_POST['jarak_kehamilan'];
  $id_jenis_imunisasi=$_POST['id_jenis_imunisasi'];
  $penolong_persalinan=$_POST['penolong_persalinan'];
  $id_jenis_persalinan=$_POST['id_jenis_persalinan'];
  
   date_default_timezone_get('Asia/Jakarta');
 

  $tgl1 = "2013-01-23";// pendefinisian tanggal awal
$htp = date('Y-m-d', strtotime('+270 days', strtotime($hpht)));
  
  $queryupdate = mysqli_query($koneksi, "UPDATE catatan_kehamilan SET 
                           id='$id',
						   hpht='$hpht',
						   htp='$htp',
						   lingkar_lengan_atas='$lingkar_lengan_atas',
						   penggunaan_kontrasepsi='$penggunaan_kontrasepsi',
						   riwayat_penyakit='$riwayat_penyakit',
						   riwayat_alergi='$riwayat_alergi',
						   hamil_ke='$hamil_ke',
						   jml_persalinan='$jml_persalinan',
						   jml_keguguran='$jml_keguguran',
						   jml_anak_hidup='$jml_anak_hidup',
						   jml_anaklahir_krg_bln='$jml_anaklahir_krg_bln',
						   jml_lahir_mati='$jml_lahir_mati',
						   jarak_kehamilan='$jarak_kehamilan',
						   id_jenis_imunisasi='$id_jenis_imunisasi',
						   penolong_persalinan='$penolong_persalinan',
						   id_jenis_persalinan='$id_jenis_persalinan'
						   
						   WHERE id_ctt_kehamilan = '$id_ctt_kehamilan'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail&id=$id';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail&id=$id';</script>";

   }
  }
 ?>



<?php
}
else if ($stt=="detail2"){
	$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan,pendaftaran,jenis_persalinan,jenis_imunisasi where catatan_kehamilan.id=pendaftaran.id and catatan_kehamilan.id_jenis_imunisasi=jenis_imunisasi.id_jenis_imunisasi and catatan_kehamilan.id_jenis_persalinan=jenis_persalinan.id_jenis_persalinan and catatan_kehamilan.id_ctt_kehamilan='$id' order by catatan_kehamilan.id_ctt_kehamilan asc") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
?>


<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Detail Catatan Kehamilan</h4>
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
<td align="left" width="60%">Hari pertama haid terakhir</td>
<td align="left" width="40%"><?php echo $d['hpht']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Hari taksiran persalinan</td>
<td align="left" width="40%"><?php echo $d['htp']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Lingkar lengan atas</td>
<td align="left" width="40%"><?php echo $d['lingkar_lengan_atas']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Golongan darah ibu</td>
<td align="left" width="40%"><?php 

$id=$d['id'];
$q1 = mysqli_query($koneksi, "SELECT * FROM ibu,pendaftaran,gol_darah where ibu.id=pendaftaran.id and ibu.id_goldar=gol_darah.id_goldar and pendaftaran.id='$id' order by ibu.id_ibu asc") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  
  echo $c['nama_goldar']
 ?></td>
</tr>
<tr>
<td align="left" width="60%">Penggunaan kontrasepsi sebelum kehamilan ini:</td>
<td align="left" width="40%"><?php echo $d['penggunaan_kontrasepsi']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Riwayat penyakit yang di derita ibu</td>
<td align="left" width="40%"><?php echo $d['riwayat_penyakit']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Riwayat alergi</td>
<td align="left" width="40%"><?php echo $d['riwayat_alergi']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Hamil ke</td>
<td align="left" width="40%"><?php echo $d['hamil_ke']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Jumlah persalinan</td>
<td align="left" width="40%"><?php echo $d['jml_persalinan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Jumlah keguguran</td>
<td align="left" width="40%"><?php echo $d['jml_keguguran']; ?></td>
</tr>
<tr>
<td align="left" width="60%">jumlah anak hidup</td>
<td align="left" width="40%"><?php echo $d['jml_anak_hidup']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Jumlah lahir mati</td>
<td align="left" width="40%"><?php echo $d['jml_lahir_mati']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Jumlah anak lahir kurang bulan</td>
<td align="left" width="40%"><?php echo $d['jml_anaklahir_krg_bln']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Jarak kehamilan</td>
<td align="left" width="40%"><?php echo $d['jarak_kehamilan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Status imunisasi</td>
<td align="left" width="40%"><?php echo $d['nama_jenis_imunisasi']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Penolong persalinan terakhir</td>
<td align="left" width="40%"><?php echo $d['penolong_persalinan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Cara persalinan terakhir</td>
<td align="left" width="40%"><?php echo $d['nama_jenis_persalinan']; ?></td>
</tr>

</table>

										
<a href="<?php $id=$d['id']; echo"$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail&id=$id";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_hamil";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=ctt_hamil&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
  <td colspan='6'>Tidak Ada Data Yang Tersedia</td>
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_hamil&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_hamil&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_hamil&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>