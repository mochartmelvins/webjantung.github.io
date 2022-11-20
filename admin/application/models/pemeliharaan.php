<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=pemeliharaan&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=pemeliharaan&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Pemeliharaan</th>
                                                    <th scope="col">Nama Barang</th>
													<th scope="col">Kondisi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbpemeliharaan,tbbarang where tbpemeliharaan.id_barang=tbbarang.id_barang order by tbpemeliharaan.id_pemeliharaan desc") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM tbpemeliharaan,tbbarang where tbpemeliharaan.id_barang=tbbarang.id_barang order by tbpemeliharaan.id_pemeliharaan desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_pemeliharaan'] ?></td>
  <td align="center"><?php echo $r['nama_barang'] ?></td>  
    <td align="center"><?php echo $r['kondisi'] ?></td> 
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pemeliharaan&stt=edit&id=".$r['id_pemeliharaan'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pemeliharaan&stt=hapus&id=".$r['id_pemeliharaan'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=pemeliharaan&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=pemeliharaan&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=pemeliharaan&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Pemeliharaan";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbpemeliharaan order by `id_pemeliharaan` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="P".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_pemeliharaan="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_pemeliharaan=$d["id_pemeliharaan"];
            if(substr($id_pemeliharaan,3,2)==$bl){
                $urut=substr($id_pemeliharaan,5,4)+1;
                    if($urut<10){$id_pemeliharaan="$kd"."00".$urut;}
                    else if($urut<100){$id_pemeliharaan="$kd"."0".$urut;}
                    else{$id_pemeliharaan="$kd".$urut;}
                }
            else{$id_pemeliharaan="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Pemeliharaan</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Pemeliharaan</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_pemeliharaan" value="<?php echo $id_pemeliharaan;?>" />
                                        </div>
										
										
										<div class="form-group">
<label>Nama Barang</label>
<select class="form-control" name="id_barang" required>
<option value="">-- Pilih Barang --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbbarang order by `nama_barang` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Barang masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_barang'] ?>"><?php echo $r['nama_barang'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>	
										
										
                                       <div class="form-group">
                                            <label>Kondisi</label>
                                            <input class="form-control"  type="text" name="kondisi" required />
                                        </div>
                                      
									   
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=pemeliharaan"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_pemeliharaan=$_POST['id_pemeliharaan'];
  $id_barang=$_POST['id_barang'];
  $kondisi=$_POST['kondisi'];
  
  
   
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbpemeliharaan VALUES('$id_pemeliharaan', '$id_barang', '$kondisi')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=pemeliharaan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=pemeliharaan';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbpemeliharaan WHERE `id_pemeliharaan` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=pemeliharaan';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=pemeliharaan';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_pemeliharaan=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbpemeliharaan where id_pemeliharaan='$id_pemeliharaan'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_pemeliharaan=$d["id_pemeliharaan"];
    $ruang_awal=$d["ruang_awal"];
	$id_barang=$d["id_barang"];
	$kondisi=$d["kondisi"];
	

	

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Pemeliharaan</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Pemeliharaan</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_pemeliharaan" value="<?php echo $id_pemeliharaan;?>" />
                                        </div>
										
										
										
										<div class="form-group">
<label>Nama Barang</label>
<select class="form-control" name="id_barang">
<?php
  echo"<option value='$id_barang'>".BAR($tbbarang,$id_barang)."</option>";
?>  
<option value="">-- Pilih Barang --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbbarang  order by `nama_barang` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Barang masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_barang'] ?>"><?php echo $r['nama_barang'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div> 
                                       
										  <div class="form-group">
                                            <label>Kondisi</label>
                                            <input class="form-control"  type="text" name="kondisi" value="<?php echo $kondisi;?>" />
                                        </div>
										
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_pemeliharaan" value="<?php echo"$id_pemeliharaan";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=pemeliharaan";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_pemeliharaan=$_POST['id_pemeliharaan'];
  $ruang_awal=$_POST['ruang_awal'];
  $id_barang=$_POST['id_barang'];
  $kondisi=$_POST['kondisi'];
  
  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbpemeliharaan SET 
						   id_barang='$id_barang',
						   kondisi='$kondisi'						   
						   WHERE id_pemeliharaan = '$id_pemeliharaan'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=pemeliharaan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=pemeliharaan';</script>";

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
                             <h4>Pencarian Pemeliharaan</h4>
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
                                                <option value="nama_barang">Nama Barang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-default" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=pemeliharaan";?>"><button type="button" class="btn btn-primary">Batal Cari</button></a>
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
													<th scope="col">Id Pemeliharaan</th>
                                                    <th scope="col">Nama Barang</th>
													<th scope="col">Kondisi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpemeliharaan,tbbarang WHERE tbpemeliharaan.id_barang=tbbarang.id_barang and tbbarang.`$listcari` like '%$txtcari%' order by tbpemeliharaan.`id_pemeliharaan` asc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['id_pemeliharaan'] ?></td>
  <td align="center"><?php echo $r['nama_barang'] ?></td>  
    <td align="center"><?php echo $r['kondisi'] ?></td> 
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pemeliharaan&stt=edit&id=".$r['id_pemeliharaan'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pemeliharaan&stt=hapus&id=".$r['id_pemeliharaan'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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