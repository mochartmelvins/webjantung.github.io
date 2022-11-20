<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=imun&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=imun&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Jenis Imunisasi</th>
                                                    <th scope="col">Nama Jenis Imunisasi</th>
													<th scope="col">Harga Imunisasi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi order by id_jenis_imunisasi asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='5'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi order by id_jenis_imunisasi asc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_jenis_imunisasi'] ?></td>
  <td align="center"><?php echo $r['nama_jenis_imunisasi'] ?></td>  
  <td align="center"><?php 

 $harga_imunisasi=$r['harga_imunisasi'];
  echo "Rp.".number_format($harga_imunisasi,0,".",".");

  ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=imun&stt=edit&id=".$r['id_jenis_imunisasi'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=imun&stt=hapus&id=".$r['id_jenis_imunisasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=imun&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=imun&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=imun&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Jenis Imunisasi";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi order by `id_jenis_imunisasi` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="IM-";
       if(mysqli_num_rows($q) == 0){
            $id_jenis_imunisasi="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_jenis_imunisasi=$d["id_jenis_imunisasi"];
           
                $urut=substr($id_jenis_imunisasi,3,3)+1;
                    if($urut<10){$id_jenis_imunisasi="$kd"."00".$urut;}
                    else if($urut<100){$id_jenis_imunisasi="$kd"."0".$urut;}
                    else{$id_jenis_imunisasi="$kd".$urut;}
					
           
			}
			
			#echo $id_jenis_imunisasi;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Jenis Imunisasi</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Jenis Imunisasi</label>
                                            <input class="form-control" disabled placeholder="Please Enter Keyword" type="text" name="id_jenis_imunisasi" value="<?php echo $id_jenis_imunisasi;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Jenis Imunisasi</label>
                                            <input class="form-control" required  type="text" name="nama_jenis_imunisasi" />
                                        </div>
										<div class="form-group">
                                            <label>Harga Imunisasi</label>
                                            <input class="form-control" required  type="number" name="harga_imunisasi" />
                                        </div>
										
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										 <input type="hidden" name="id_jenis_imunisasi" value="<?php echo"$id_jenis_imunisasi";?>">
										
                                        <a href="media.php?module=imun"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $nama_jenis_imunisasi=$_POST['nama_jenis_imunisasi'];
  $harga_imunisasi=$_POST['harga_imunisasi'];
  $tgl=date('Y-m-d');
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO jenis_imunisasi VALUES('$id_jenis_imunisasi', '$nama_jenis_imunisasi', '$harga_imunisasi')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=imun';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=imun';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM jenis_imunisasi WHERE `id_jenis_imunisasi` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=imun';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=imun';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_jenis_imunisasi=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi where id_jenis_imunisasi='$id_jenis_imunisasi'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_jenis_imunisasi=$d["id_jenis_imunisasi"];
    $nama_jenis_imunisasi=$d["nama_jenis_imunisasi"];
	$harga_imunisasi=$d["harga_imunisasi"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Jenis Imunisasi</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Jenis Imunisasi</label>
                                            <input class="form-control" disabled placeholder="Please Enter Keyword" type="text" name="id_jenis_imunisasi" value="<?php echo $id_jenis_imunisasi;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Jenis Imunisasi</label>
                                            <input class="form-control"  type="text" name="nama_jenis_imunisasi" value="<?php echo $nama_jenis_imunisasi;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Harga Imunisasi</label>
                                            <input class="form-control"  type="number" name="harga_imunisasi" value="<?php echo $harga_imunisasi;?>" />
                                        </div>
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_jenis_imunisasi" value="<?php echo"$id_jenis_imunisasi";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=imun";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_jenis_imunisasi=$_POST['id_jenis_imunisasi'];
  $nama_jenis_imunisasi=$_POST['nama_jenis_imunisasi'];
  $harga_imunisasi=$_POST['harga_imunisasi'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE jenis_kelamin SET 
                           nama_jenis_imunisasi='$nama_jenis_imunisasi',
						   harga_imunisasi='$harga_imunisasi'
						   WHERE id_jenis_imunisasi = '$id_jenis_imunisasi'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=imun';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=imun';</script>";

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
                             <h4>Pencarian Jenis Imunisasi</h4>
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
                                                <option value="nama_jenis_imunisasi">Nama Jenis Imunisasi</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=imun";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id Jenis Imunisasi</th>
                                                    <th scope="col">Nama Jenis Imunisasi</th>
													<th scope="col">Harga Imunisasi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin WHERE `$listcari` like '%$txtcari%' order by `id_jenis_imunisasi` asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='5'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
 <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_jenis_imunisasi'] ?></td>
  <td align="center"><?php echo $r['nama_jenis_imunisasi'] ?></td>  
  <td align="center"><?php 
  
  $harga_imunisasi=$r['harga_imunisasi'];
  echo "Rp.".number_format($harga_imunisasi,0,".",".");
   ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=imun&stt=edit&id=".$r['id_jenis_imunisasi'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=imun&stt=hapus&id=".$r['id_jenis_imunisasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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