<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=fasilitas&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=fasilitas&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Fasilitas</th>
                                                    <th scope="col">Nama Fasilitas</th>
													<th scope="col">lokasi</th>
													<th scope="col">Nama Kontak</th>
													<th scope="col">Telepon</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbfasilitas") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='7'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM tbfasilitas LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_fasilitas'] ?></td>
  <td align="center"><?php echo $r['nama_fasilitas'] ?></td>  
  <td align="center"><?php echo $r['lokasi'] ?></td>  
  <td align="center"><?php echo $r['nama_kontak'] ?></td>  
  <td align="center"><?php echo $r['telp'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=fasilitas&stt=edit&id=".$r['id_fasilitas'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=fasilitas&stt=hapus&id=".$r['id_fasilitas'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=fasilitas&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=fasilitas&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=fasilitas&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata User";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbfasilitas order by `id_fasilitas` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="F".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_fasilitas="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_fasilitas=$d["id_fasilitas"];
            if(substr($id_fasilitas,3,2)==$bl){
                $urut=substr($id_fasilitas,5,4)+1;
                    if($urut<10){$id_fasilitas="$kd"."00".$urut;}
                    else if($urut<100){$id_fasilitas="$kd"."0".$urut;}
                    else{$id_fasilitas="$kd".$urut;}
                }
            else{$id_fasilitas="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Fasilitas</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Fasilitas</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_fasilitas" value="<?php echo $id_fasilitas;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Fasilitas</label>
                                            <input class="form-control" required  type="text" name="nama_fasilitas" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>lokasi</label>
                                            <input class="form-control" required  type="text" name="lokasi"/>
                                        </div>
                                        
                                      <div class="form-group">
                                            <label>Nama Kontak</label>
                                            <input class="form-control" required  type="text" name="nama_kontak"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Telepon</label>
                                            <input class="form-control" required  type="text" name="telp"/>
                                        </div>
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=fasilitas"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_fasilitas=$_POST['id_fasilitas'];
  $nama_fasilitas=$_POST['nama_fasilitas'];
  $lokasi=$_POST['lokasi'];
  $nama_kontak=$_POST['nama_kontak'];
  $telp=$_POST['telp'];

  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbfasilitas VALUES('$id_fasilitas', '$nama_fasilitas', '$lokasi', '$nama_kontak', '$telp')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=fasilitas';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=fasilitas';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbfasilitas WHERE `id_fasilitas` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=fasilitas';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=fasilitas';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_fasilitas=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbfasilitas where id_fasilitas='$id_fasilitas'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_fasilitas=$d["id_fasilitas"];
    $nama_fasilitas=$d["nama_fasilitas"];
	$lokasi=$d["lokasi"];
	$nama_kontak=$d["nama_kontak"];
	$telp=$d["telp"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Fasilitas</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Fasilitas</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_fasilitas" value="<?php echo $id_fasilitas;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Fasilitas</label>
                                            <input class="form-control"  type="text" name="nama_fasilitas" value="<?php echo $nama_fasilitas;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Lokasi</label>
                                            <input class="form-control"  type="text" name="lokasi" value="<?php echo $lokasi;?>"/>
                                        </div>
                                       
									   <div class="form-group">
                                            <label>Nama Kontak</label>
                                            <input class="form-control"  type="text" name="nama_kontak" value="<?php echo $nama_kontak;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>telp</label>
                                            <input class="form-control"  type="text" name="telp" value="<?php echo $telp;?>"/>
                                        </div>
                                      
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_fasilitas" value="<?php echo"$id_fasilitas";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=fasilitas";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_fasilitas=$_POST['id_fasilitas'];
  $nama_fasilitas=$_POST['nama_fasilitas'];
  $lokasi=$_POST['lokasi'];
  $nama_kontak=$_POST['nama_kontak'];
  $telp=$_POST['telp'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"application/gambar/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbfasilitas SET 
                           nama_fasilitas='$nama_fasilitas',
						   lokasi='$lokasi',
						   nama_kontak='$nama_kontak',
						   telp='$telp'
						  
						   WHERE id_fasilitas = '$id_fasilitas'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=fasilitas';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=fasilitas';</script>";

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
                             <h4>Pencarian User</h4>
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
                                                <option value="nama_fasilitas">Nama Fasilitas</option>
												<option value="lokasi">lokasi</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=fasilitas";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id Fasilitas</th>
                                                    <th scope="col">nama_fasilitas fasilitas</th>
													<th scope="col">lokasi</th>
													<th scope="col">nama_fasilitas Kontak</th>
													<th scope="col">Telepon</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbfasilitas WHERE `$listcari` like '%$txtcari%' order by `id_fasilitas` asc") or die (mysqli_error());
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
   <td align="center"><?php echo $r['id_fasilitas'] ?></td>
  <td align="center"><?php echo $r['nama_fasilitas'] ?></td>  
  <td align="center"><?php echo $r['lokasi'] ?></td>  
  <td align="center"><?php echo $r['nama_kontak'] ?></td>  
  <td align="center"><?php echo $r['telp'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=fasilitas&stt=edit&id=".$r['id_fasilitas'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=fasilitas&stt=hapus&id=".$r['id_fasilitas'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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