<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=kab_kota&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=kab_kota&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Kab Kota</th>
                                                    <th scope="col">Nama Kab Kota</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM kab_kota order by id_kab_kota desc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='4'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM kab_kota order by id_kab_kota desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_kab_kota'] ?></td>
  <td align="center"><?php echo $r['nama_kab_kota'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=kab_kota&stt=edit&id=".$r['id_kab_kota'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=kab_kota&stt=hapus&id=".$r['id_kab_kota'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=kab_kota&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=kab_kota&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=kab_kota&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Kab Kota";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM kab_kota order by `id_kab_kota` desc") or die (mysqli_error());
  #$bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="KB-";
       if(mysqli_num_rows($q) == 0){
            $id_kab_kota="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_kab_kota=$d["id_kab_kota"];
           
                $urut=substr($id_kab_kota,3,3)+1;
                    if($urut<10){$id_kab_kota="$kd"."00".$urut;}
                    else if($urut<100){$id_kab_kota="$kd"."0".$urut;}
                    else{$id_kab_kota="$kd".$urut;}
					
           
			}
			
			#echo $id_kab_kota;
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Kab Kota</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Kab Kota</label>
                                            <input class="form-control" disabled placeholder="Please Enter Keyword" type="text" name="id_kab_kota" value="<?php echo $id_kab_kota;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Kab Kota</label>
                                            <input class="form-control" required  type="text" name="nama_kab_kota" />
                                        </div>
										
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										 <input type="hidden" name="id_kab_kota" value="<?php echo"$id_kab_kota";?>">
										
                                        <a href="media.php?module=kab_kota"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_kab_kota=$_POST['id_kab_kota'];
  $nama_kab_kota=$_POST['nama_kab_kota'];
  $tgl=date('Y-m-d');
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO kab_kota VALUES('$id_kab_kota', '$nama_kab_kota')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=kab_kota';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=kab_kota';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM kab_kota WHERE `id_kab_kota` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=kab_kota';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=kab_kota';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_kab_kota=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM kab_kota where id_kab_kota='$id_kab_kota'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_kab_kota=$d["id_kab_kota"];
    $nama_kab_kota=$d["nama_kab_kota"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Kab Kota</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Kab Kota</label>
                                            <input class="form-control" disabled placeholder="Please Enter Keyword" type="text" name="id_kab_kota" value="<?php echo $id_kab_kota;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Kab Kota</label>
                                            <input class="form-control"  type="text" name="nama_kab_kota" value="<?php echo $nama_kab_kota;?>" />
                                        </div>
										
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_kab_kota" value="<?php echo"$id_kab_kota";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=kab_kota";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_kab_kota=$_POST['id_kab_kota'];
  $nama_kab_kota=$_POST['nama_kab_kota'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE kab_kota SET 
                           nama_kab_kota='$nama_kab_kota'
						   WHERE id_kab_kota = '$id_kab_kota'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=kab_kota';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=kab_kota';</script>";

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
                             <h4>Pencarian Kab Kota</h4>
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
                                                <option value="nama_kab_kota">Nama Kab Kota</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=kab_kota";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id Kab Kota</th>
                                                    <th scope="col">Nama Kab Kota</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM kab_kota WHERE `$listcari` like '%$txtcari%' order by `id_kab_kota` desc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['id_kab_kota'] ?></td>
  <td align="center"><?php echo $r['nama_kab_kota'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=kab_kota&stt=edit&id=".$r['id_kab_kota'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=kab_kota&stt=hapus&id=".$r['id_kab_kota'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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