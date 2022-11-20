<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
<a href="media.php?module=bayar_hamil&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						
<!--
<a href="media.php?module=bayar_hamil&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
-->						
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Atas Nama</th>
													<th scope="col">Nama pembayar</th>
													<th scope="col">Nominal</th>
                                                    <th scope="col">Tgl Pembayaran</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM bayar_kehamilan,catatan_kehamilan,pendaftaran where bayar_kehamilan.id_ctt_kehamilan=catatan_kehamilan.id_ctt_kehamilan and bayar_kehamilan.id=pendaftaran.id order by bayar_kehamilan.id_bk desc") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM bayar_kehamilan,catatan_kehamilan,pendaftaran where bayar_kehamilan.id_ctt_kehamilan=catatan_kehamilan.id_ctt_kehamilan and bayar_kehamilan.id=pendaftaran.id order by bayar_kehamilan.id_bk desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  
  <td align="center">
    <?php echo $r['nama_ibu'] ?>
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_hamil&stt=detail&id=".$r['id'] ?>" title="Detail">

  </a>
  <td align="center"><?php echo $r['nama_pembayar'] ?></td>
  </td>
   
  <td align="center"><?php 

 $harga_imunisasi=$r['nominal'];
  echo "Rp.".number_format($harga_imunisasi,0,".",".");

  ?></td> 
  <td align="center"><?php 
  $tgl_lahir_ibu=$r['tgl_bayar'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_hamil&stt=edit&id=".$r['id_bk'] ?>" title="Edit"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_hamil&stt=hapus&id=".$r['id_bk'] ?>" title="Hapus" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=bayar_hamil&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // keterangan_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=bayar_hamil&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=bayar_hamil&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Pembayaran Kehamilan";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
	$id=$_GET['id'];
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM bayar_kehamilan order by `id_bk` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="NF-";
       if(mysqli_num_rows($q) == 0){
            $id_bk="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_bk=$d["id_bk"];
           
                $urut=substr($id_bk,3,3)+1;
                    if($urut<10){$id_bk="$kd"."00".$urut;}
                    else if($urut<100){$id_bk="$kd"."0".$urut;}
                    else{$id_bk="$kd".$urut;}
					
           
			}
			
			#echo $id_ctt_persalinan;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Pembayaran Kehamilan</h4>
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
										<input type="hidden" name="id_bk" value="<?php echo"$id_bk";?>">
                                        <a href="media.php?module=bayar_hamil"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
	
  $id_bk=$_POST['id_bk'];
  $id=$_POST['id'];
  $tgl_bayar=$_POST['tgl_bayar'];
  $nama_pembayar=$_POST['nama_pembayar'];
  $nominal=$_POST['nominal'];

  
  
  

  $q1 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  $id_ctt_kehamilan=$c['id_ctt_kehamilan'];
 
  $querytambah = mysqli_query($koneksi, "INSERT INTO bayar_kehamilan VALUES('', '$id_ctt_kehamilan', '$nama_pembayar', '$nominal', '$tgl_bayar', '$id')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=bayar_hamil';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=bayar_hamil';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM bayar_kehamilan WHERE `id_bk` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=bayar_hamil';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=bayar_hamil';</script>";
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
$query = mysqli_query($koneksi, "SELECT * FROM bayar_kehamilan where id_bk='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
  $id_bk=$d['id_bk'];
  $id=$d['id'];
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
                            <h4>Form Edit Pembayaran Kehamilan</h4>
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
                                        <input type="hidden" name="id_bk" value="<?php echo"$id_bk";?>">
										<input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php  echo"$_SERVER[PHP_SELF]?module=bayar_hamil";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_bk=$_POST['id_bk'];
  $id=$_POST['id'];
  $tgl_bayar=$_POST['tgl_bayar'];
  $nama_pembayar=$_POST['nama_pembayar'];
  $nominal=$_POST['nominal'];
  
  
  

  $q1 = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan where id='$id'") or die (mysqli_error());
  $c = mysqli_fetch_array($q1);
  $id_ctt_kehamilan=$c['id_ctt_kehamilan'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE bayar_kehamilan SET 
                           id='$id',
						   id_ctt_kehamilan='$id_ctt_kehamilan',
						   tgl_bayar='$tgl_bayar',
						   nama_pembayar='$nama_pembayar',
						   nominal='$nominal'	   
						   WHERE id_bk = '$id_bk'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=bayar_hamil';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=bayar_hamil';</script>";

   }
  }
 ?>



<?php
}
else if ($stt=="detail2"){
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM bayar_kehamilan,catatan_persalinan,pendaftaran where bayar_kehamilan.id_ctt_persalinan=catatan_persalinan.id_ctt_persalinan and bayar_kehamilan.id=pendaftaran.id and bayar_kehamilan.id_bk='$id'") or die (mysqli_error());
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

										
<a href="<?php $id=$d['id']; echo"$_SERVER[PHP_SELF]?module=bayar_hamil";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=bayar_hamil";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=bayar_hamil&stt=cari2&L=$listcari&T=$txtcari';</script>";
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
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_hamil&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=bayar_hamil&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
<a href="<?php echo"$_SERVER[PHP_SELF]?module=bayar_hamil&stt=cari";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>

 </div>

 </div>

<?php
}
?>