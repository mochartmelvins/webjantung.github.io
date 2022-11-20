<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=konsultasi&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=konsultasi&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Konsultasi</th>
                                                    <th scope="col">Tgl Konsul</th>
													<th scope="col">Nama Pengunjung</th>
													<th scope="col">Nama Dokter</th>
													<th scope="col">Isi Konsultasi</th>
													<th scope="col">Status</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbpengunjung,tbdokter where tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung and tbkonsultasi.id_dokter=tbdokter.id_dokter order by tbkonsultasi.id_konsultasi asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='8'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbpengunjung,tbdokter where tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung and tbkonsultasi.id_dokter=tbdokter.id_dokter order by tbkonsultasi.id_konsultasi asc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_konsultasi'] ?></td>
  <td align="center"><?php echo $r['tgl_konsul'] ?></td>  
  <td align="center"><?php echo $r['nama_pengunjung'] ?></td> 
  <td align="center"><?php echo $r['nama_dokter'] ?></td> 
  <td align="center"><?php echo $r['isi_konsultasi'] ?></td> 
  <td align="center"><?php echo $r['status_konsul'] ?></td> 
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=konsultasi&stt=edit&id=".$r['id_konsultasi'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=konsultasi&stt=hapus&id=".$r['id_konsultasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=konsultasi&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=konsultasi&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=konsultasi&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Konsultasi";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi order by `id_konsultasi` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="K".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_konsultasi="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_konsultasi=$d["id_konsultasi"];
            if(substr($id_konsultasi,3,2)==$bl){
                $urut=substr($id_konsultasi,5,4)+1;
                    if($urut<10){$id_konsultasi="$kd"."00".$urut;}
                    else if($urut<100){$id_konsultasi="$kd"."0".$urut;}
                    else{$id_konsultasi="$kd".$urut;}
                }
            else{$id_konsultasi="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Konsultasi</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Konsultasi</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_konsultasi" value="<?php echo $id_konsultasi;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Tanggal Konsul</label>
                                            <input class="form-control" required  type="date" name="tgl_konsul" />
                                        </div>
										
<div class="form-group">
<label>Nama Pengunjung</label>
<select class="form-control" name="id_pengunjung" required>
<option value="">-- Pilih Pengunjung --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpengunjung order by `id_pengunjung` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Pengunjung masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_pengunjung'] ?>"><?php echo $r['nama_pengunjung'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>	

<div class="form-group">
<label>Nama Dokter</label>
<select class="form-control" name="id_dokter" required>
<option value="">-- Pilih Dokter --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbdokter order by `id_dokter` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Dokter masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_dokter'] ?>"><?php echo $r['nama_dokter'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>										
										<div class="form-group">
                                            <label>Isi Konsultasi</label>
											<textarea class="form-control" required  name="isi_konsultasi"></textarea>
                                           
                                        </div>
										
										
                                      
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=konsultasi"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_konsultasi=$_POST['id_konsultasi'];
  $id_pengunjung=$_POST['id_pengunjung'];
  $id_dokter=$_POST['id_dokter'];
  $tgl_konsul=$_POST['tgl_konsul'];
  $isi_konsultasi=$_POST['isi_konsultasi'];
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbkonsultasi VALUES('$id_konsultasi', '$tgl_konsul', '$id_pengunjung', '$id_dokter', '$isi_konsultasi', '', 'B')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=konsultasi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=konsultasi';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbkonsultasi WHERE `id_konsultasi` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=konsultasi';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=konsultasi';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_konsultasi=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where id_konsultasi='$id_konsultasi'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_konsultasi=$d["id_konsultasi"];
    $id_pengunjung=$d["id_pengunjung"];
	$tgl_konsul=$d["tgl_konsul"];
	$id_dokter=$d["id_dokter"];
	$isi_konsultasi=$d["isi_konsultasi"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Konsultasi</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        
                                       
										<div class="form-group">
                                            <label>Tanggal Konsul</label>
                                            <input class="form-control" required  type="date" name="tgl_konsul" value="<?php echo $tgl_konsul;?>"/>
                                        </div>
										
<div class="form-group">
<label>Nama Pengunjung</label>
<select class="form-control" name="id_pengunjung">
<?php
  echo"<option value='$id_pengunjung'>".PEG($tbpengunjung,$id_pengunjung)."</option>";
?>  
<option value="">-- Pilih Pengunjung --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpengunjung  order by `id_pengunjung` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Pengunjung masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_pengunjung'] ?>"><?php echo $r['nama_pengunjung'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div> 
                                        
<div class="form-group">
<label>Nama Dokter</label>
<select class="form-control" name="id_dokter">
<?php
  echo"<option value='$id_dokter'>".DOK($tbdokter,$id_dokter)."</option>";
?>  
<option value="">-- Pilih Dokter --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbdokter  order by `id_dokter` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Dokter masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_dokter'] ?>"><?php echo $r['nama_dokter'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>                                      
  <div class="form-group">
                                            <label>Isi Konsultasi</label>
											<textarea class="form-control" required  name="isi_konsultasi"><?php echo"$isi_konsultasi";?></textarea>
                                           
                                        </div>                                      
											
                                        
    
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar" value="<?php echo"$gambar";?>">
                                        <input type="hidden" name="id_konsultasi" value="<?php echo"$id_konsultasi";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=konsultasi";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_konsultasi=$_POST['id_konsultasi'];
  $tgl_konsul=$_POST['tgl_konsul'];
  $id_pengunjung=$_POST['id_pengunjung'];
  $id_dokter=$_POST['id_dokter'];
  $isi_konsultasi=$_POST['isi_konsultasi'];

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET 
                           tgl_konsul='$tgl_konsul',
						   id_pengunjung='$id_pengunjung',
						   id_dokter='$id_dokter',
						   isi_konsultasi='$isi_konsultasi'
						   WHERE id_konsultasi = '$id_konsultasi'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=konsultasi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=konsultasi';</script>";

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
                             <h4>Pencarian Konsultasi</h4>
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
                                                <option value="nama_dokter">Nama Dokter</option>
												<option value="nama_pengunjung">Nama Pengunjung</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=konsultasi";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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


?>

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
													<th scope="col">Id Konsultasi</th>
                                                    <th scope="col">Tgl Konsul</th>
													<th scope="col">Nama Pengunjung</th>
													<th scope="col">Nama Dokter</th>
													<th scope="col">Isi Konsultasi</th>
													<th scope="col">Status</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
if($listcari=="nama_dokter"){
	$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbdokter,tbpengunjung WHERE tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung and tbkonsultasi.id_dokter=tbdokter.id_dokter  and tbdokter.`$listcari` like '%$txtcari%' order by tbkonsultasi.`id_konsultasi` asc") or die (mysqli_error());
}
else {
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbdokter,tbpengunjung WHERE tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung and tbkonsultasi.id_dokter=tbdokter.id_dokter  and tbpengunjung.`$listcari` like '%$txtcari%' order by tbkonsultasi.`id_konsultasi` asc") or die (mysqli_error());	
	
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
  <td align="center"><?php echo $r['id_konsultasi'] ?></td>
  <td align="center"><?php echo $r['tgl_konsul'] ?></td>  
  <td align="center"><?php echo $r['nama_pengunjung'] ?></td> 
  <td align="center"><?php echo $r['nama_dokter'] ?></td> 
  <td align="center"><?php echo $r['isi_konsultasi'] ?></td> 
  <td align="center"><?php echo $r['status_konsul'] ?></td> 
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=konsultasi&stt=edit&id=".$r['id_konsultasi'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=konsultasi&stt=hapus&id=".$r['id_konsultasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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


 </div>

 </div>
	
<?php	

	


}

?>

<?php
}
?>