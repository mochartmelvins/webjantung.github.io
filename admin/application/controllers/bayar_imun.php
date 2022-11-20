<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
<a href="media.php?module=bayar_imun&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						
<!--
<a href="media.php?module=bayar_imun&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Nama Ibu</th>
													<th scope="col">Nama Anak</th>
													<th scope="col">Jenis Imunisasi</th>
													<th scope="col">Biaya</th>
													<th scope="col">Dibayar</th>
													<th scope="col">Kembalian</th>
                                                    <th scope="col">Tgl Pembayaran</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM bayar_imunisasi,pendaftaran,jenis_imunisasi,anak where bayar_imunisasi.id=pendaftaran.id and bayar_imunisasi.id_anak=anak.id_anak and bayar_imunisasi.id_jenis_imunisasi=jenis_imunisasi.id_jenis_imunisasi order by bayar_imunisasi.id_im desc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='9'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 100;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM bayar_imunisasi,pendaftaran,jenis_imunisasi,anak where bayar_imunisasi.id=pendaftaran.id and bayar_imunisasi.id_anak=anak.id_anak and bayar_imunisasi.id_jenis_imunisasi=jenis_imunisasi.id_jenis_imunisasi order by bayar_imunisasi.id_im desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['nama_ibu'] ?></td>
  <td align="center">
    <?php echo $r['nama_anak'] ?>
  <td align="center"><?php echo $r['nama_jenis_imunisasi'] ?></td>
  <td align="center"><?php 

 $harga_imunisasi=$r['biaya'];
  echo "Rp.".number_format($harga_imunisasi,0,".",".");

  ?></td>
   <td align="center"><?php 

 $harga_imunisasi=$r['nominal'];
  echo "Rp.".number_format($harga_imunisasi,0,".",".");

  ?></td>
  <td align="center"><?php 

 $harga_imunisasi=$r['kembalian'];
  echo "Rp.".number_format($harga_imunisasi,0,".",".");

  ?></td>

   
   
  <td align="center"><?php 
  $tgl_lahir_ibu=$r['tgl_bayar'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_imun&stt=edit&id=".$r['id_im'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_imun&stt=hapus&id=".$r['id_im'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=bayar_imun&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // keterangan_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=bayar_imun&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=bayar_imun&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Pembayaran Imunisasi";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
	$id=$_GET['id'];
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM bayar_imunisasi order by `id_im` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="NF-";
       if(mysqli_num_rows($q) == 0){
            $id_im="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_im=$d["id_im"];
           
                $urut=substr($id_im,3,3)+1;
                    if($urut<10){$id_im="$kd"."00".$urut;}
                    else if($urut<100){$id_im="$kd"."0".$urut;}
                    else{$id_im="$kd".$urut;}
					
           
			}
			
			#echo $id_imunisasi;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Pembayaran Imunisasi</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                      									

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
<label>Nama Anak</label>
<select class="form-control" name="id_anak" required>
<option value="">-- Pilih Anak --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM anak order by `id_anak` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Anak masih kosong</option>";
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
<option value="">-- Pilih Imunisasi --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi order by `id_jenis_imunisasi` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Imunisasi masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_jenis_imunisasi'] ?>"><?php echo $r['nama_jenis_imunisasi']." Harga ( ".$r['harga_imunisasi']." )"; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>	
								

                                         <div class="form-group">
                                            <label>Tgl Pembayaran</label>
                                            <input class="form-control" required  type="date" name="tgl_bayar" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Pembayar</label>
                                            <input class="form-control" required  type="text" name="nama_pembayar" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nominal</label>
                                            <input class="form-control" required  type="number" name="nominal" />
                                        </div>
										
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<input type="hidden" name="id_im" value="<?php echo"$id_im";?>">
                                        <a href="media.php?module=bayar_imun"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
	
  $id_jenis_imunisasi=$_POST['id_jenis_imunisasi'];
  $id_anak=$_POST['id_anak'];
  $id=$_POST['id'];
  $tgl_bayar=$_POST['tgl_bayar'];
  $nama_pembayar=$_POST['nama_pembayar'];
  $nominal=$_POST['nominal'];

  
  
  

  $q1 = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi where id_jenis_imunisasi='$id_jenis_imunisasi'") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  $harga_imunisasi=$c['harga_imunisasi'];
  
  $kembalian=$nominal-$harga_imunisasi;
 
  $querytambah = mysqli_query($koneksi, "INSERT INTO bayar_imunisasi VALUES('', '$id', '$nama_pembayar', '$nominal', '$tgl_bayar', '$id_anak', '$id_jenis_imunisasi', '$harga_imunisasi', '$kembalian')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=bayar_imun';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=bayar_imun';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM bayar_imunisasi WHERE `id_im` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=bayar_imun';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=bayar_imun';</script>";
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
$query = mysqli_query($koneksi, "SELECT * FROM bayar_imunisasi where id_im='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  $id_im=$d['id_im'];
  $id_anak=$d['id_anak'];
  $id=$d['id'];
  $id_jenis_imunisasi=$d['id_jenis_imunisasi'];
  $tgl_bayar=$d['tgl_bayar'];
  $nama_pembayar=$d['nama_pembayar'];
  $nominal=$d['nominal'];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Pembayaran Imunisasi</h4>
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
  <option value="<?php echo $r['id'] ?>"><?php echo $r['nama_ibu']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>	
 									
                                        <div class="form-group">
<label>Nama Anak</label>
<select class="form-control" name="id_anak" disabled required>
<?php
  echo"<option value='$id_anak'>".ANK($anak,$id_anak)."</option>";
?>
<option value="">-- Pilih Anak --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM anak order by `id_anak` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Anak masih kosong</option>";
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
<?php
  echo"<option value='$id_jenis_imunisasi'>".IMN($jenis_imunisasi,$id_jenis_imunisasi)."</option>";
?>
<option value="">-- Pilih  Imunisasi --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi order by `id_jenis_imunisasi` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''> Imunisasi masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_jenis_imunisasi'] ?>"><?php echo $r['nama_ibu']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>								

                                         <div class="form-group">
                                            <label>Tgl Pembayaran</label>
                                            <input class="form-control" required  type="date" name="tgl_bayar" value="<?php echo $tgl_bayar; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Pembayar</label>
                                            <input class="form-control" required  type="text" name="nama_pembayar" value="<?php echo $nama_pembayar; ?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Nominal</label>
                                            <input class="form-control" required  type="number" name="nominal" value="<?php echo $nominal; ?>"/>
                                        </div>
										
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_im" value="<?php echo"$id_im";?>">
										<input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php  echo"$_SERVER[PHP_SELF]?module=bayar_imun";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_im=$_POST['id_im'];
  $id_jenis_imunisasi=$_POST['id_jenis_imunisasi'];
  $id_anak=$_POST['id_anak'];
  $id=$_POST['id'];
  $tgl_bayar=$_POST['tgl_bayar'];
  $nama_pembayar=$_POST['nama_pembayar'];
  $nominal=$_POST['nominal'];

  
  
  

  $q1 = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi where id_jenis_imunisasi='$id_jenis_imunisasi'") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  $harga_imunisasi=$c['harga_imunisasi'];
  
  $kembalian=$nominal-$harga_imunisasi;
  
  $queryupdate = mysqli_query($koneksi, "UPDATE bayar_imunisasi SET 
						   tgl_bayar='$tgl_bayar',
						   nama_pembayar='$nama_pembayar',
						   id_anak='$id_anak',
						   id='$id',
						   biaya='$harga_imunisasi',
						   kembalian='$kembalian',
						   nominal='$nominal'	   
						   WHERE id_im = '$id_im'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=bayar_imun';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=bayar_imun';</script>";

   }
  }
 ?>



<?php
}
else if ($stt=="detail2"){
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM bayar_imunisasi,catatan_imunisasi,anak where bayar_imunisasi.id_imunisasi=catatan_imunisasi.id_imunisasi and bayar_imunisasi.id=anak.id and bayar_imunisasi.id_im='$id'") or die (mysqli_error());
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
<td align="left" width="40%"><?php echo $d['nama_anak']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Catatan Persalinan</td>
<td align="left" width="40%"><?php echo $d['ket_tambahan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tgl Nifas</td>
<td align="left" width="40%"><?php echo $d['tgl_bayar']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tekanan Darah</td>
<td align="left" width="40%"><?php echo $d['nama_pembayar']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Suhu Tubuh</td>
<td align="left" width="40%"><?php 

  echo $d['nominal']
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

										
<a href="<?php $id=$d['id']; echo"$_SERVER[PHP_SELF]?module=bayar_imun";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=bayar_imun";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=bayar_imun&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_imun&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_imun&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=bayar_imun&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>