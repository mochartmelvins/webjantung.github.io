<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
<a href="media.php?module=ctt_nifas&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						
<!--
<a href="media.php?module=ctt_nifas&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Nifas</th>
													<th scope="col">Nama Ibu</th>
													<th scope="col">Catatan Persalinan</th>
                                                    <th scope="col">Tgl Nifas</th>
													<th scope="col">Tekanan darah</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM catatan_nifas,catatan_persalinan,pendaftaran where catatan_nifas.id_ctt_persalinan=catatan_persalinan.id_ctt_persalinan and catatan_nifas.id=pendaftaran.id   order by catatan_nifas.id_ctt_nifas desc") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM catatan_nifas,catatan_persalinan,pendaftaran where catatan_nifas.id_ctt_persalinan=catatan_persalinan.id_ctt_persalinan and catatan_nifas.id=pendaftaran.id   order by catatan_nifas.id_ctt_nifas desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_ctt_nifas'] ?></td>
  <td align="center">
    <?php echo $r['nama_ibu'] ?>
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=detail&id=".$r['id'] ?>" title="Detail">

  </a>
  <td align="center"><?php echo $r['ket_tambahan'] ?></td>
  </td>
   <td align="center"><?php 
  $tgl_lahir_ibu=$r['tgl_nifas'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center"><?php echo $r['tekanan_darah'] ?></td>
  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=detail2&id=".$r['id_ctt_nifas'] ?>" title="Detail"><i class="fa fa-folder-o"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=edit&id=".$r['id_ctt_nifas'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=hapus&id=".$r['id_ctt_nifas'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=ctt_nifas&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // keterangan_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=ctt_nifas&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=ctt_nifas&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Catatan Nifas";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
	$id=$_GET['id'];
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM catatan_nifas order by `id_ctt_nifas` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="NF-";
       if(mysqli_num_rows($q) == 0){
            $id_ctt_nifas="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_ctt_nifas=$d["id_ctt_nifas"];
           
                $urut=substr($id_ctt_nifas,3,3)+1;
                    if($urut<10){$id_ctt_nifas="$kd"."00".$urut;}
                    else if($urut<100){$id_ctt_nifas="$kd"."0".$urut;}
                    else{$id_ctt_nifas="$kd".$urut;}
					
           
			}
			
			#echo $id_ctt_persalinan;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Tambah Catatan Nifas</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       <div class="form-group">
                                            <label>Id NF</label>
                                            <input class="form-control" disabled  type="text" name="id_ctt_nifas" value="<?php echo $id_ctt_nifas ;?>"/>
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
                                            <label>Tgl Nifas</label>
                                            <input class="form-control" required  type="date" name="tgl_nifas" />
                                        </div>
										
										<div class="form-group">
                                            <label>Tekanan Darah</label>
                                            <input class="form-control" required  type="text" name="tekanan_darah" />
                                        </div>
										
										<div class="form-group">
                                            <label>Suhu Tubuh</label>
                                            <input class="form-control" required  type="text" name="suhu_tubuh" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>Respirasi</label>
                                            <input class="form-control" required  type="text" name="respirasi" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>Nadi</label>
                                            <input class="form-control" required  type="text" name="nadi" />
                                        </div>
										
										<div class="form-group">
                                            <label>Pendarahan Pervaginaan</label>
                                            <input class="form-control" required  type="text" name="pendarahan_pervaginaan" />
                                        </div>
										
										<div class="form-group">
                                            <label>Kondisi Perinium</label>
                                            <input class="form-control" required  type="text" name="kondisi_perineum" />
                                        </div>
										
											<div class="form-group">
                                            <label>Tanda Infeksi</label>
                                            <input class="form-control" required  type="text" name="tanda_infeksi" />
                                        </div>
										<div class="form-group">
                                            <label>Kontraksi Uteri</label>
                                            <input class="form-control" required  type="text" name="kontraksi_uteri" />
                                        </div>
										<div class="form-group">
                                            <label>Tinggi Fundus</label>
                                            <input class="form-control" required  type="text" name="tinggi_fundus" />
                                        </div>
										<div class="form-group">
                                            <label>Lokhia</label>
                                            <input class="form-control" required  type="text" name="lokhia" />
                                        </div>
										<div class="form-group">
                                            <label>Pemeriksaan Jln Lahir</label>
                                            <input class="form-control" required  type="text" name="pemeriksaan_jln_lahir" />
                                        </div>
										<div class="form-group">
                                            <label>Pemeriksaan Payudara</label>
                                            <input class="form-control" required  type="text" name="pemeriksaan_payudara" />
                                        </div>
										<div class="form-group">
                                            <label>Produksi Asi</label>
                                            <input class="form-control" required  type="text" name="produksi_asi" />
                                        </div>
										<div class="form-group">
                                            <label>Kapsul Vit</label>
                                            <input class="form-control" required  type="text" name="kapsul_vit" />
                                        </div>
										<div class="form-group">
                                            <label>Pelayanan Kontrasepsi</label>
                                            <input class="form-control" required  type="text" name="pelayanan_kontrasepsi" />
                                        </div>
										<div class="form-group">
                                            <label>Penanganan Resiko</label>
                                            <input class="form-control" required  type="text" name="penanganan_resiko" />
                                        </div>
										<div class="form-group">
                                            <label>Buang Air Besar</label>
                                            <input class="form-control" required  type="text" name="bab" />
                                        </div>
										<div class="form-group">
                                            <label>Buang Air Kecil</label>
                                            <input class="form-control" required  type="text" name="bak" />
                                        </div>
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<input type="hidden" name="id_ctt_nifas" value="<?php echo"$id_ctt_nifas";?>">
                                        <a href="media.php?module=ctt_nifas"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
	
  $id_ctt_nifas=$_POST['id_ctt_nifas'];
  $id=$_POST['id'];
  $tgl_nifas=$_POST['tgl_nifas'];
  $tekanan_darah=$_POST['tekanan_darah'];
  $suhu_tubuh=$_POST['suhu_tubuh'];
  $respirasi=$_POST['respirasi'];
  $nadi=$_POST['nadi'];
  $pendarahan_pervaginaan=$_POST['pendarahan_pervaginaan'];
  $kondisi_perineum=$_POST['kondisi_perineum'];
  
  $tanda_infeksi=$_POST['tanda_infeksi'];
  $kontraksi_uteri=$_POST['kontraksi_uteri'];
  $tinggi_fundus=$_POST['tinggi_fundus'];
  $lokhia=$_POST['lokhia'];
  $pemeriksaan_jln_lahir=$_POST['pemeriksaan_jln_lahir'];
  $pemeriksaan_payudara=$_POST['pemeriksaan_payudara'];
  $produksi_asi=$_POST['produksi_asi'];
  $kapsul_vit=$_POST['kapsul_vit'];
  $pelayanan_kontrasepsi=$_POST['pelayanan_kontrasepsi'];
  $penanganan_resiko=$_POST['penanganan_resiko'];
  $bab=$_POST['bab'];
  $bak=$_POST['bak'];
  
  
  

  $q1 = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan where id='$id'") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  $id_ctt_persalinan=$c['id_ctt_persalinan'];
 
  $querytambah = mysqli_query($koneksi, "INSERT INTO catatan_nifas VALUES('$id_ctt_nifas', '$id', '$id_ctt_persalinan', '$tgl_nifas', '$tekanan_darah', '$suhu_tubuh', '$respirasi', '$nadi', '$pendarahan_pervaginaan', '$kondisi_perineum', '$tanda_infeksi', '$kontraksi_uteri', '$tinggi_fundus', '$lokhia', '$pemeriksaan_jln_lahir', '$pemeriksaan_payudara', '$produksi_asi', '$kapsul_vit', '$pelayanan_kontrasepsi', '$penanganan_resiko', '$bab', '$bak')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_nifas';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=ctt_nifas';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM catatan_nifas WHERE `id_ctt_nifas` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=ctt_nifas';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=ctt_nifas';</script>";
 }

?>


<?php } 
else if($stt=="detail"){

   
	?>
	
<div class="card mt-5">
                        <div class="card-body">

<a href="<?php $id=$_GET['id']; echo"media.php?module=ctt_nifas&stt=tambah&id=$id";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data Kehamilan</button></a>						
<!--

<a href="media.php?module=ctt_nifas&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=detail2&id=".$r['id_ctt_kehamilan'] ?>" title="Detail"><i class="fa fa-folder-o"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=edit&id=".$r['id_ctt_kehamilan'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=hapus&id=".$r['id_ctt_kehamilan'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_nifas";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>	
                    </div>
                </div>
	
<?php
}	
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM catatan_nifas where id_ctt_nifas='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  $id_ctt_nifas=$d['id_ctt_nifas'];
  $id=$d['id'];
  $tgl_nifas=$d['tgl_nifas'];
  $tekanan_darah=$d['tekanan_darah'];
  $suhu_tubuh=$d['suhu_tubuh'];
  $respirasi=$d['respirasi'];
  $nadi=$d['nadi'];
  $pendarahan_pervaginaan=$d['pendarahan_pervaginaan'];
  $kondisi_perineum=$d['kondisi_perineum'];  
  $tanda_infeksi=$d['tanda_infeksi'];
  $kontraksi_uteri=$d['kontraksi_uteri'];
  $tinggi_fundus=$d['tinggi_fundus'];
  $lokhia=$d['lokhia'];
  $pemeriksaan_jln_lahir=$d['pemeriksaan_jln_lahir'];
  $pemeriksaan_payudara=$d['pemeriksaan_payudara'];
  $produksi_asi=$d['produksi_asi'];
  $kapsul_vit=$d['kapsul_vit'];
  $pelayanan_kontrasepsi=$d['pelayanan_kontrasepsi'];
  $penanganan_resiko=$d['penanganan_resiko'];
  $bab=$d['bab'];
  $bak=$d['bak'];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Catatan Nifas</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        

 <div class="form-group">
                                            <label>Id NF</label>
                                            <input class="form-control" disabled  type="text" name="id_ctt_nifas" value="<?php echo $id_ctt_nifas ;?>"/>
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
                                            <label>Tgl Nifas</label>
                                            <input class="form-control" required  type="date" name="tgl_nifas" value="<?php echo $tgl_nifas; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Umur Kehamilan</label>
                                            <input class="form-control" required  type="text" name="tekanan_darah" value="<?php echo $tekanan_darah; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Suhu Tubuh</label>
                                            <input class="form-control" required  type="text" name="suhu_tubuh" value="<?php echo $suhu_tubuh; ?>"/>
                                        </div>
										
										
										<div class="form-group">
                                            <label>Respirasi</label>
                                            <input class="form-control" required  type="text" name="respirasi" value="<?php echo $respirasi; ?>"/>
                                        </div>
										
										
										<div class="form-group">
                                            <label>Nadi</label>
                                            <input class="form-control" required  type="text" name="nadi" value="<?php echo $nadi; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Pendarahan Pervaginaan</label>
                                            <input class="form-control" required  type="text" name="pendarahan_pervaginaan" value="<?php echo $pendarahan_pervaginaan; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Kondisi Perinium</label>
                                            <input class="form-control" required  type="text" name="kondisi_perineum" value="<?php echo $kondisi_perineum; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Tanda Infeksi</label>
                                            <input class="form-control" required  type="text" name="tanda_infeksi" value="<?php echo $tanda_infeksi; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Kontraksi Uteri</label>
                                            <input class="form-control" required  type="text" name="kontraksi_uteri" value="<?php echo $kontraksi_uteri; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Tinggi Fundus</label>
                                            <input class="form-control" required  type="text" name="tinggi_fundus" value="<?php echo $tinggi_fundus; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Lokhia</label>
                                            <input class="form-control" required  type="text" name="lokhia" value="<?php echo $lokhia; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Pemeriksaan Jln Lahir</label>
                                            <input class="form-control" required  type="text" name="pemeriksaan_jln_lahir" value="<?php echo $pemeriksaan_jln_lahir; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Pemeriksaan Payudara</label>
                                            <input class="form-control" required  type="text" name="pemeriksaan_payudara" value="<?php echo $pemeriksaan_payudara; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Produksi Asi</label>
                                            <input class="form-control" required  type="text" name="produksi_asi" value="<?php echo $produksi_asi; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Kapsul Vit</label>
                                            <input class="form-control" required  type="text" name="kapsul_vit" value="<?php echo $kapsul_vit; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Pelayanan Kontrasepsi</label>
                                            <input class="form-control" required  type="text" name="pelayanan_kontrasepsi" value="<?php echo $pelayanan_kontrasepsi; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Penanganan Resiko</label>
                                            <input class="form-control" required  type="text" name="penanganan_resiko" value="<?php echo $penanganan_resiko; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Buang Air Besar</label>
                                            <input class="form-control" required  type="text" name="bab" value="<?php echo $bab; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Buang Air Kecil</label>
                                            <input class="form-control" required  type="text" name="bak" value="<?php echo $bak; ?>"/>
                                        </div>
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_ctt_nifas" value="<?php echo"$id_ctt_nifas";?>">
										<input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php  echo"$_SERVER[PHP_SELF]?module=ctt_nifas";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_ctt_nifas=$_POST['id_ctt_nifas'];
  $id=$_POST['id'];
  $tgl_nifas=$_POST['tgl_nifas'];
  $tekanan_darah=$_POST['tekanan_darah'];
  $suhu_tubuh=$_POST['suhu_tubuh'];
  $respirasi=$_POST['respirasi'];
  $nadi=$_POST['nadi'];
  $pendarahan_pervaginaan=$_POST['pendarahan_pervaginaan'];
  $kondisi_perineum=$_POST['kondisi_perineum'];
  
  $tanda_infeksi=$_POST['tanda_infeksi'];
  $kontraksi_uteri=$_POST['kontraksi_uteri'];
  $tinggi_fundus=$_POST['tinggi_fundus'];
  $lokhia=$_POST['lokhia'];
  $pemeriksaan_jln_lahir=$_POST['pemeriksaan_jln_lahir'];
  $pemeriksaan_payudara=$_POST['pemeriksaan_payudara'];
  $produksi_asi=$_POST['produksi_asi'];
  $kapsul_vit=$_POST['kapsul_vit'];
  $pelayanan_kontrasepsi=$_POST['pelayanan_kontrasepsi'];
  $penanganan_resiko=$_POST['penanganan_resiko'];
  $bab=$_POST['bab'];
  $bak=$_POST['bak'];
  
  
  

  $q1 = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan where id='$id'") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  $id_ctt_persalinan=$c['id_ctt_persalinan'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE catatan_nifas SET 
                           id='$id',
						   id_ctt_persalinan='$id_ctt_persalinan',
						   tgl_nifas='$tgl_nifas',
						   tekanan_darah='$tekanan_darah',
						   suhu_tubuh='$suhu_tubuh',
						   respirasi='$respirasi',
						   nadi='$nadi',
						   pendarahan_pervaginaan='$pendarahan_pervaginaan',
						   kondisi_perineum='$kondisi_perineum',
						   tanda_infeksi='$tanda_infeksi',
						   kontraksi_uteri='$kontraksi_uteri',
						   tinggi_fundus='$tinggi_fundus',
						   lokhia='$lokhia',
						   pemeriksaan_jln_lahir='$pemeriksaan_jln_lahir',
						   pemeriksaan_payudara='$pemeriksaan_payudara',
						   produksi_asi='$produksi_asi',
						   kapsul_vit='$kapsul_vit',
						   pelayanan_kontrasepsi='$pelayanan_kontrasepsi',
						   penanganan_resiko='$penanganan_resiko',
						   bab='$bab',
						   bak='$bak'			   
						   WHERE id_ctt_nifas = '$id_ctt_nifas'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=ctt_nifas';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=ctt_nifas';</script>";

   }
  }
 ?>



<?php
}
else if ($stt=="detail2"){
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM catatan_nifas,catatan_persalinan,pendaftaran where catatan_nifas.id_ctt_persalinan=catatan_persalinan.id_ctt_persalinan and catatan_nifas.id=pendaftaran.id and catatan_nifas.id_ctt_nifas='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  
?>


<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Detail Catatan Nifas</h4>
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
<td align="left" width="60%">Catatan Persalinan</td>
<td align="left" width="40%"><?php echo $d['ket_tambahan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tgl Nifas</td>
<td align="left" width="40%"><?php echo $d['tgl_nifas']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tekanan Darah</td>
<td align="left" width="40%"><?php echo $d['tekanan_darah']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Suhu Tubuh</td>
<td align="left" width="40%"><?php 

  echo $d['suhu_tubuh']
 ?></td>
</tr>
<tr>
<td align="left" width="60%">Respirasi</td>
<td align="left" width="40%"><?php echo $d['respirasi']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Nadi</td>
<td align="left" width="40%"><?php echo $d['nadi']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Pendarahan Pervaginaan</td>
<td align="left" width="40%"><?php echo $d['pendarahan_pervaginaan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kondisi Perinium</td>
<td align="left" width="40%"><?php echo $d['kondisi_perineum']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tanda Infeksi</td>
<td align="left" width="40%"><?php echo $d['tanda_infeksi']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kontraksi Uteri</td>
<td align="left" width="40%"><?php echo $d['kontraksi_uteri']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tinggi Fundus</td>
<td align="left" width="40%"><?php echo $d['tinggi_fundus']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Lokhia</td>
<td align="left" width="40%"><?php echo $d['lokhia']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Pemeriksaan Jln Lahir</td>
<td align="left" width="40%"><?php echo $d['pemeriksaan_jln_lahir']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Pemeriksaan Payudara</td>
<td align="left" width="40%"><?php echo $d['pemeriksaan_payudara']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Produksi Asi</td>
<td align="left" width="40%"><?php echo $d['produksi_asi']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kapsul Vit</td>
<td align="left" width="40%"><?php echo $d['kapsul_vit']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Pelayanan Kontrasepsi</td>
<td align="left" width="40%"><?php echo $d['pelayanan_kontrasepsi']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Penanganan Resiko</td>
<td align="left" width="40%"><?php echo $d['penanganan_resiko']; ?></td>
</tr>
<tr>
<td align="left" width="60%">BAB</td>
<td align="left" width="40%"><?php echo $d['bab']; ?></td>
</tr>
<tr>
<td align="left" width="60%">BAK</td>
<td align="left" width="40%"><?php echo $d['bak']; ?></td>
</tr>

</table>

										
<a href="<?php $id=$d['id']; echo"$_SERVER[PHP_SELF]?module=ctt_nifas";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_nifas";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=ctt_nifas&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_nifas&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=ctt_nifas&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>