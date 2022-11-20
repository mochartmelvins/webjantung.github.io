<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
<a href="<?php    $id=$_GET['id']; echo"media.php?module=tambah_periksa&stt=tambah&id=$id";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Pemeriksaan</button></a>
				

				<?php
$id=$_GET['id'];						
$qc = mysqli_query($koneksi, "SELECT * FROM pendaftaran where id='$id'") or die (mysqli_error());
$rc = mysqli_fetch_array($qc);
echo "<br>Nama Ibu : ".$rc['nama_ibu']."<br><hr>";
						?>
<!--
<a href="media.php?module=tambah_periksa&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tgl Pemeriksaan</th>
													<th scope="col">Waktu Kembali</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $id=$_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM data_kehamilan,pendaftaran where data_kehamilan.id=pendaftaran.id and pendaftaran.id='$id' order by data_kehamilan.id_periksa asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='4'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		

		
		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>

   <td align="center"><?php 
  $tgl_lahir_ibu=$r['tgl_pemeriksaan'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center"><?php 
  $tgl_lahir_ibu=$r['waktu_kembali'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=tambah_periksa&stt=detail2&id=$id&idp=".$r['id_periksa'] ?>" title="Detail"><i class="fa fa-folder-o"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=tambah_periksa&stt=edit&id=$id&idp=".$r['id_periksa'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=tambah_periksa&stt=hapus&id=$id&idp=".$r['id_periksa'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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


$jmldata = mysqli_num_rows($query);


echo"<br>Jumlah : $jmldata Data Pemeriksaan";
?>
<hr>
<a href="<?php    $id=$_GET['id']; echo"media.php?module=ctt_hamil&stt=detail&id=$id";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
                        
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
			
			#$umur_kehamilan="1 Minggu";
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
                            <h4>Form Pemeriksaan Kehamilan</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                      									
                                         <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input class="form-control" disabled  type="text" name="tgl_lahir_ibu" value="<?php echo PEN($pendaftaran,$id);?>"/>
                                        </div>										

                                         <div class="form-group">
                                            <label>Tgl Pemeriksaan</label>
                                            <input class="form-control" required  type="date" name="tgl_pemeriksaan" />
                                        </div>
										
										<div class="form-group">
                                            <label>Keluhan Sekarang</label>
                                            <input class="form-control" required  type="text" name="keluhan_sekarang" />
                                        </div>
										
										<div class="form-group">
                                            <label>Tekanan Darah</label>
                                            <input class="form-control" required  type="text" name="tekanan_darah" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>Berat Badan</label>
                                            <input class="form-control" required  type="text" name="berat_badan" />
                                        </div>
<?php
$qcek = mysqli_query($koneksi, "SELECT * FROM data_kehamilan where id='$id'") or die (mysqli_error());
 if(mysqli_num_rows($qcek) == 0){
 
 $qcek2 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
 $r = mysqli_fetch_array($qcek2);
 $hpht=$r['hpht'];
 $tgl_akhir=date('Y-m-d');
 $jumlah_hari=hitungHari($hpht,$tgl_akhir);
 
 $umur_kehamilan=$jumlah_hari/7;
 $umur=round($umur_kehamilan,0);
 $umur=$umur." Minggu";
 ?>
 
                                        <div class="form-group">
                                            <label>Umur kehamilan</label>
                                            <input class="form-control" required disabled type="text" name="umur_kehamilan" value="<?php echo $umur; ?>"/>
                                        </div>
 
<?php
 }
 else
 {
	
$qcek2 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
 $r = mysqli_fetch_array($qcek2);
 $hpht=$r['hpht'];
 $tgl_akhir=date('Y-m-d');
 $jumlah_hari=hitungHari($hpht,$tgl_akhir);
 
 $umur_kehamilan=$jumlah_hari/7;
 $umur=round($umur_kehamilan,0);
 $umur=$umur." Minggu";	
 
 ?>
  <div class="form-group">
                                            <label>Umur kehamilan</label>
                                            <input class="form-control" required  disabled type="text" name="umur_kehamilan" value="<?php echo $umur; ?>"/>
                                        </div>
 
 <?php
	 
 }

  
?>										
										
										
										
										<div class="form-group">
                                            <label>Tinggi Fundus</label>
                                            <input class="form-control" required  type="text" name="tinggi_fundus" />
                                        </div>
										
										<div class="form-group">
                                            <label>Letak Janin</label>
                                            <input class="form-control" required  type="text" name="letak_janin" />
                                        </div>
										
										<div class="form-group">
                                            <label>Denyut Jantung</label>
                                            <input class="form-control" required  type="text" name="denyut_jantung" />
                                        </div>
										
										<div class="form-group">
                                            <label>Kaki Bengkak</label>
                                            <input class="form-control" required  type="text" name="kaki_bengkak" />
                                        </div>
										
										<div class="form-group">
                                            <label>Hasil Periksa LAB</label>
                                            <input class="form-control" required  type="text" name="hasil_periksa_lab" />
                                        </div>
										
										<div class="form-group">
                                            <label>Tindakan</label>
                                            <input class="form-control" required  type="text" name="tindakan" />
                                        </div>
										<div class="form-group">
                                            <label>Nasihat</label>
                                            <input class="form-control" required  type="text" name="nasihat" />
                                        </div>
										<div class="form-group">
                                            <label>Keterangan</label>
                                            <input class="form-control" required  type="text" name="keterangan" />
                                        </div>
										
<div class="form-group">
<label>Waktu Kembali</label>
<select class="form-control" name="waktu_kembali" required>
<option value="">-- Pilih Waktu --</option>
<option value="1">Minggu</option>
<option value="2">Bulan</option>
  </select>
</div>
										
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<input type="hidden" name="id_ctt_kehamilan" value="<?php echo"$id_ctt_kehamilan";?>">
                                        <a href="<?php $id=$_GET['id']; echo"media.php?module=tambah_periksa&id=$id";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $tgl_pemeriksaan=$_POST['tgl_pemeriksaan'];
  $keluhan_sekarang=$_POST['keluhan_sekarang'];
  $tekanan_darah=$_POST['tekanan_darah'];
  $berat_badan=$_POST['berat_badan'];
  $umur_kehamilan=$_POST['umur_kehamilan'];
  $tinggi_fundus=$_POST['tinggi_fundus'];
  $letak_janin=$_POST['letak_janin'];
  $denyut_jantung=$_POST['denyut_jantung'];
  $kaki_bengkak=$_POST['kaki_bengkak'];
  $hasil_periksa_lab=$_POST['hasil_periksa_lab'];
  $tindakan=$_POST['tindakan'];
  $nasihat=$_POST['nasihat'];
  $keterangan=$_POST['keterangan'];
$waktu_kembali=$_POST['waktu_kembali'];

  date_default_timezone_get('Asia/Jakarta');
 

  $tgl1 = "2013-01-23";// pendefinisian tanggal awal
  
  if($waktu_kembali=="1"){
$waktu_kembali = date('Y-m-d', strtotime('+7 days', strtotime($tgl_pemeriksaan)));
  }
  else{
	  $waktu_kembali = date('Y-m-d', strtotime('+30 days', strtotime($tgl_pemeriksaan)));
	  
  }
  
  $qcek2 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
 $r = mysqli_fetch_array($qcek2);
 $hpht=$r['hpht'];
 $tgl_akhir=date('Y-m-d');
 $jumlah_hari=hitungHari($hpht,$tgl_akhir);
 
 $umur_kehamilan=$jumlah_hari/7;
 $umur=round($umur_kehamilan,0);
 $umur=$umur." Minggu";
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO data_kehamilan VALUES('', '$id', '$tgl_pemeriksaan', '$keluhan_sekarang', '$tekanan_darah', '$berat_badan', '$umur', '$tinggi_fundus', '$letak_janin', '$denyut_jantung', '$kaki_bengkak', '$hasil_periksa_lab', '$tindakan', '$nasihat', '$keterangan', '$waktu_kembali')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=tambah_periksa&id=$id';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=tambah_periksa&id=$id';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $id_periksa = $_GET['idp'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM data_kehamilan WHERE `id_periksa` ='$id_periksa'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=tambah_periksa&id=$id';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=tambah_periksa&id=$id';</script>";
 }

?>


<?php } 
else if($stt=="detail"){

   
	?>
	
<div class="card mt-5">
                        <div class="card-body">

<a href="<?php $id=$_GET['id']; echo"media.php?module=tambah_periksa&stt=tambah&id=$id";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data Kehamilan</button></a>						
<!--

<a href="media.php?module=tambah_periksa&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
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
  <a href="<?php $id=$_GET['id']; echo"media.php?module=tambah_periksa&stt=tambah&id=$id";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Data Pemeriksaan</button></a>						
  
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=tambah_periksa&stt=detail2&id=".$r['id_ctt_kehamilan'] ?>" title="Detail"><i class="fa fa-folder-o"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=tambah_periksa&stt=edit&id=".$r['id_ctt_kehamilan'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=tambah_periksa&stt=hapus&id=".$r['id_ctt_kehamilan'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=tambah_periksa";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>	
                    </div>
                </div>
	
<?php
}	
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$id_periksa=$_GET["idp"];

$query = mysqli_query($koneksi, "SELECT * FROM data_kehamilan where id_periksa='$id_periksa'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  $id_periksa=$d['id_periksa'];
  $tgl_pemeriksaan=$d['tgl_pemeriksaan'];
  $keluhan_sekarang=$d['keluhan_sekarang'];
  $tekanan_darah=$d['tekanan_darah'];
  $berat_badan=$d['berat_badan'];
  $umur_kehamilan=$d['umur_kehamilan'];
  $tinggi_fundus=$d['tinggi_fundus'];
  $letak_janin=$d['letak_janin'];
  $denyut_jantung=$d['denyut_jantung'];
  $kaki_bengkak=$d['kaki_bengkak'];
  $hasil_periksa_lab=$d['hasil_periksa_lab'];
  $tindakan=$d['tindakan'];
  $nasihat=$d['nasihat'];
  $keterangan=$d['keterangan'];
$waktu_kembali=$d['waktu_kembali'];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Pemeriksaan Kehamilan</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        

                                          <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input class="form-control" disabled  type="text" name="tgl_lahir_ibu" value="<?php echo PEN($pendaftaran,$id);?>"/>
                                        </div>										

                                         <div class="form-group">
                                            <label>Tgl Pemeriksaan</label>
                                            <input class="form-control" required  type="date" name="tgl_pemeriksaan" value="<?php echo $tgl_pemeriksaan; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Keluhan Sekarang</label>
                                            <input class="form-control" required  type="text" name="keluhan_sekarang" value="<?php echo $keluhan_sekarang; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Tekanan Darah</label>
                                            <input class="form-control" required  type="text" name="tekanan_darah" value="<?php echo $tekanan_darah; ?>"/>
                                        </div>
										
										
										<div class="form-group">
                                            <label>Berat Badan</label>
                                            <input class="form-control" required  type="text" name="berat_badan" value="<?php echo $berat_badan; ?>"/>
                                        </div>
<?php
$qcek = mysqli_query($koneksi, "SELECT * FROM data_kehamilan where id='$id'") or die (mysqli_error());
 if(mysqli_num_rows($qcek) == 0){
 
 $qcek2 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
 $r = mysqli_fetch_array($qcek2);
 $hpht=$r['hpht'];
 $tgl_akhir=date('Y-m-d');
 $jumlah_hari=hitungHari($hpht,$tgl_pemeriksaan);
 
 $umur_kehamilan=$jumlah_hari/7;
 $umur=round($umur_kehamilan,0);
 $umur=$umur." Minggu";
 ?>
 
                                        <div class="form-group">
                                            <label>Umur kehamilan</label>
                                            <input class="form-control" required disabled type="text" name="umur_kehamilan" value="<?php echo $umur; ?>"/>
                                        </div>
 
<?php
 }
 else
 {
	
$qcek2 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
 $r = mysqli_fetch_array($qcek2);
 $hpht=$r['hpht'];
 $tgl_akhir=date('Y-m-d');
 $jumlah_hari=hitungHari($hpht,$tgl_pemeriksaan);
 
 $umur_kehamilan=$jumlah_hari/7;
 $umur=round($umur_kehamilan,0);
 $umur=$umur." Minggu";	
 
 ?>
  <div class="form-group">
                                            <label>Umur kehamilan</label>
                                            <input class="form-control" required disabled type="text" name="umur_kehamilan" value="<?php echo $umur; ?>"/>
                                        </div>
 
 <?php
	 
 }

  
?>										
										
										
										
										<div class="form-group">
                                            <label>Tinggi Fundus</label>
                                            <input class="form-control" required  type="text" name="tinggi_fundus" value="<?php echo $tinggi_fundus; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Letak Janin</label>
                                            <input class="form-control" required  type="text" name="letak_janin" value="<?php echo $letak_janin; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Denyut Jantung</label>
                                            <input class="form-control" required  type="text" name="denyut_jantung" value="<?php echo $denyut_jantung; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Kaki Bengkak</label>
                                            <input class="form-control" required  type="text" name="kaki_bengkak" value="<?php echo $kaki_bengkak; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Hasil Periksa LAB</label>
                                            <input class="form-control" required  type="text" name="hasil_periksa_lab" value="<?php echo $hasil_periksa_lab; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Tindakan</label>
                                            <input class="form-control" required  type="text" name="tindakan" value="<?php echo $tindakan; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Nasihat</label>
                                            <input class="form-control" required  type="text" name="nasihat" value="<?php echo $nasihat; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Keterangan</label>
                                            <input class="form-control" required  type="text" name="keterangan" value="<?php echo $keterangan; ?>"/>
                                        </div>
										
<!--
<div class="form-group">
<label>Waktu Kembali</label>
<select class="form-control" name="waktu_kembali" required>
<option value="">-- Pilih Waktu --</option>
<option value="1">Minggu</option>
<option value="2">Bulan</option>
  </select>
</div>
-->

										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_periksa" value="<?php echo"$id_periksa";?>">
										<input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php  echo"$_SERVER[PHP_SELF]?module=tambah_periksa&id=$id";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id=$_GET['id'];
  $id_periksa=$_GET['idp'];
  $tgl_pemeriksaan=$_POST['tgl_pemeriksaan'];
  $keluhan_sekarang=$_POST['keluhan_sekarang'];
  $tekanan_darah=$_POST['tekanan_darah'];
  $berat_badan=$_POST['berat_badan'];
  $umur_kehamilan=$_POST['umur_kehamilan'];
  $tinggi_fundus=$_POST['tinggi_fundus'];
  $letak_janin=$_POST['letak_janin'];
  $denyut_jantung=$_POST['denyut_jantung'];
  $kaki_bengkak=$_POST['kaki_bengkak'];
  $hasil_periksa_lab=$_POST['hasil_periksa_lab'];
  $tindakan=$_POST['tindakan'];
  $nasihat=$_POST['nasihat'];
  $keterangan=$_POST['keterangan'];
$waktu_kembali=$_POST['waktu_kembali'];

  date_default_timezone_get('Asia/Jakarta');
 

  $tgl1 = "2013-01-23";// pendefinisian tanggal awal
  
  if($waktu_kembali=="1"){
$waktu_kembali = date('Y-m-d', strtotime('+7 days', strtotime($tgl_pemeriksaan)));
  }
  else{
	  $waktu_kembali = date('Y-m-d', strtotime('+30 days', strtotime($tgl_pemeriksaan)));
	  
  }
  
   $qcek2 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
 $r = mysqli_fetch_array($qcek2);
 $hpht=$r['hpht'];
 $tgl_akhir=date('Y-m-d');
 $jumlah_hari=hitungHari($hpht,$tgl_pemeriksaan);
 
 $umur_kehamilan=$jumlah_hari/7;
 $umur=round($umur_kehamilan,0);
 $umur=$umur." Minggu";
  
  $queryupdate = mysqli_query($koneksi, "UPDATE data_kehamilan SET 
                           tgl_pemeriksaan='$tgl_pemeriksaan',
						   keluhan_sekarang='$keluhan_sekarang',
						   tekanan_darah='$tekanan_darah',
						   berat_badan='$berat_badan',
						   umur_kehamilan='$umur',
						   tinggi_fundus='$tinggi_fundus',
						   letak_janin='$letak_janin',
						   denyut_jantung='$denyut_jantung',
						   kaki_bengkak='$kaki_bengkak',
						   hasil_periksa_lab='$hasil_periksa_lab',
						   tindakan='$tindakan',
						   nasihat='$nasihat',
						   keterangan='$keterangan'
						   
						   WHERE id_periksa = '$id_periksa'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=tambah_periksa&id=$id';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=tambah_periksa&id=$id';</script>";

   }
  }
 ?>



<?php
}
else if ($stt=="detail2"){
	$id=$_GET["id"];
$id=$_GET["id"];
$id_periksa=$_GET["idp"];

$query = mysqli_query($koneksi, "SELECT * FROM data_kehamilan where id_periksa='$id_periksa'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  $id_periksa=$d['id_periksa'];
  $tgl_pemeriksaan=$d['tgl_pemeriksaan'];
  

  $pisah=explode("-",$tgl_pemeriksaan);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  #echo $tgl1;
  
  $keluhan_sekarang=$d['keluhan_sekarang'];
  $tekanan_darah=$d['tekanan_darah'];
  $berat_badan=$d['berat_badan'];
  $umur_kehamilan=$d['umur_kehamilan'];
  $tinggi_fundus=$d['tinggi_fundus'];
  $letak_janin=$d['letak_janin'];
  $denyut_jantung=$d['denyut_jantung'];
  $kaki_bengkak=$d['kaki_bengkak'];
  $hasil_periksa_lab=$d['hasil_periksa_lab'];
  $tindakan=$d['tindakan'];
  $nasihat=$d['nasihat'];
  $keterangan=$d['keterangan'];
$waktu_kembali=$d['waktu_kembali'];
$pisah=explode("-",$waktu_kembali);
	   $tgl2=$pisah[2]."-".$pisah[1]."-".$pisah[0];
?>


<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Detail Pemeriksaan Kehamilan</h4>
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
<td align="left" width="40%"><?php echo PEN($pendaftaran,$id);?></td>
</tr>
<tr>
<td align="left" width="60%">Tgl Pemeriksaan</td>
<td align="left" width="40%"><?php echo $tgl1; ?></td>
</tr>
<tr>
<td align="left" width="60%">Keluhan Sekarang</td>
<td align="left" width="40%"><?php echo $keluhan_sekarang; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tekanan Darah</td>
<td align="left" width="40%"><?php echo $tekanan_darah; ?></td>
</tr>
<tr>
<td align="left" width="60%">Berat Badan</td>
<td align="left" width="40%"><?php 

  echo $berat_badan
 ?></td>
</tr>
<tr>
<td align="left" width="60%">Umur Kehamilan</td>
<td align="left" width="40%"><?php echo $umur_kehamilan ?></td>
</tr>
<tr>
<td align="left" width="60%">Tinggi Fundus</td>
<td align="left" width="40%"><?php echo $tinggi_fundus; ?></td>
</tr>
<tr>
<td align="left" width="60%">Letak Janin</td>
<td align="left" width="40%"><?php echo $letak_janin; ?></td>
</tr>
<tr>
<td align="left" width="60%">Denyut Jantung</td>
<td align="left" width="40%"><?php echo $denyut_jantung; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kaki Bengkak</td>
<td align="left" width="40%"><?php echo $kaki_bengkak; ?></td>
</tr>
<tr>
<td align="left" width="60%">Hasil Periksa Lab</td>
<td align="left" width="40%"><?php echo $hasil_periksa_lab; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tindakan</td>
<td align="left" width="40%"><?php echo $tindakan; ?></td>
</tr>
<tr>
<td align="left" width="60%">Nasihat</td>
<td align="left" width="40%"><?php echo $nasihat; ?></td>
</tr>
<tr>
<td align="left" width="60%">Keterangan</td>
<td align="left" width="40%"><?php echo $keterangan; ?></td>
</tr>
<tr>
<td align="left" width="60%">Waktu Kembali</td>
<td align="left" width="40%"><?php echo $tgl2; ?></td>
</tr>


</table>

										
<a href="<?php $id=$d['id']; echo"$_SERVER[PHP_SELF]?module=tambah_periksa&id=$id";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=tambah_periksa";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=tambah_periksa&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=tambah_periksa&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=tambah_periksa&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=tambah_periksa&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>