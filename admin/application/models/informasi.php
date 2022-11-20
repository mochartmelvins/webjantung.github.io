<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=informasi&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=informasi&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Informasi</th>
													<th scope="col">Nama Kategori</th>
                                                    <th scope="col">Judul Informasi</th>
													<th scope="col">Isi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbinformasi,tbkategori_informasi where tbinformasi.id_kategori=tbkategori_informasi.id_kategori order by tbinformasi.id_informasi asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='6'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM tbinformasi,tbkategori_informasi where tbinformasi.id_kategori=tbkategori_informasi.id_kategori order by tbinformasi.id_informasi asc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_informasi'] ?></td>
  <td align="center"><?php echo $r['nama_kategori'] ?></td>  
  <td align="center"><?php echo $r['judul_informasi'] ?></td>  
  <td align="center"><?php echo $r['isi'] ?></td>   
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=informasi&stt=edit&id=".$r['id_informasi'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=informasi&stt=hapus&id=".$r['id_informasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=informasi&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=informasi&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=informasi&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Informasi";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbinformasi order by `id_informasi` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="I".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_informasi="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_informasi=$d["id_informasi"];
            if(substr($id_informasi,3,2)==$bl){
                $urut=substr($id_informasi,5,4)+1;
                    if($urut<10){$id_informasi="$kd"."00".$urut;}
                    else if($urut<100){$id_informasi="$kd"."0".$urut;}
                    else{$id_informasi="$kd".$urut;}
                }
            else{$id_informasi="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Informasi</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Informasi</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_informasi" value="<?php echo $id_informasi;?>" />
                                        </div>
										
										
<div class="form-group">
<label>Nama Kategori</label>
<select class="form-control" name="id_kategori" required>
<option value="">-- Pilih Kategori --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbkategori_informasi order by `id_kategori` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Kategori masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>	
										
										
										<div class="form-group">
                                            <label>Judul Informasi</label>
                                            <input class="form-control"  type="text" name="judul_informasi" required />
                                        </div>
										

										
										<div class="form-group">
                                            <label>Isi </label>
											<textarea class="form-control" required  name="isi"></textarea>
                                           
                                        </div>
                                     
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=informasi"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
                                    </form>
                                   
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>

     </div>
                </div>


<?php if(isset($_POST['Simpan'])){
  $id_informasi=$_POST['id_informasi'];
  $judul_informasi=$_POST['judul_informasi'];
  $id_kategori=$_POST['id_kategori'];
  $isi=$_POST['isi'];
   
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbinformasi VALUES('$id_informasi', '$id_kategori', '$judul_informasi', '$isi')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=informasi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=informasi';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbinformasi WHERE `id_informasi` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=informasi';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=informasi';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_informasi=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbinformasi where id_informasi='$id_informasi'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_informasi=$d["id_informasi"];
    $judul_informasi=$d["judul_informasi"];
	$id_kategori=$d["id_kategori"];
	$isi=$d["isi"];


	

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Informasi</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
<div class="form-group">
<label>Nama Kategori</label>
<select class="form-control" name="id_kategori">
<?php
  echo"<option value='$id_kategori'>".KAT($tbkategori_informasi,$id_kategori)."</option>";
?>  
<option value="">-- Pilih Kategori --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbkategori_informasi  order by `id_kategori` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Kategori masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div> 
									   
										<div class="form-group">
                                            <label>Judul Informasi</label>
                                            <input class="form-control"  type="text" name="judul_informasi" value="<?php echo $judul_informasi;?>" />
                                        </div>
										

                                       
                                        <div class="form-group">
                                            <label>Isi</label>
											<textarea class="form-control" required  name="isi"><?php echo"$isi";?></textarea>
                                           
                                        </div>    
										 
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_informasi" value="<?php echo"$id_informasi";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=informasi";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_informasi=$_POST['id_informasi'];
  $judul_informasi=$_POST['judul_informasi'];
  $id_kategori=$_POST['id_kategori'];
  $isi=$_POST['isi'];
  

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbinformasi SET 
                           judul_informasi='$judul_informasi',
						   id_kategori='$id_kategori',
						   isi='$isi'
						   WHERE id_informasi = '$id_informasi'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=informasi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=informasi';</script>";

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
                             <h4>Pencarian Informasi</h4>
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
                                                <option value="judul_informasi">Judul</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=informasi";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id Informasi</th>
													<th scope="col">Nama Kategori</th>
                                                    <th scope="col">Judul Informasi</th>
													<th scope="col">Isi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbinformasi,tbkategori_informasi WHERE tbinformasi.id_kategori=tbkategori_informasi.id_kategori and tbinformasi.`$listcari` like '%$txtcari%' order by tbinformasi.`id_informasi` asc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['id_informasi'] ?></td>
  <td align="center"><?php echo $r['nama_kategori'] ?></td>  
  <td align="center"><?php echo $r['judul_informasi'] ?></td>  
  <td align="center"><?php echo $r['isi'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=informasi&stt=edit&id=".$r['id_informasi'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=informasi&stt=hapus&id=".$r['id_informasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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