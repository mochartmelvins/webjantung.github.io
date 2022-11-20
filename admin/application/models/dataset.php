<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=dataset&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=dataset&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id dataset</th>
                                                    <th scope="col">Nama produk</th>
													<th scope="col">Merk</th>
													<th scope="col">Rincian produk</th>
													<th scope="col">Warna</th>
													<th scope="col">kategori</th>
													<th scope="col">Sub kategori</th>
													<th scope="col">Sub Detail kategori</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbdataset") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='10'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 100;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM tbdataset LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_dataset'] ?></td>
  <td align="center"><?php echo $r['nama_produk'] ?></td>  
  <td align="center"><?php echo $r['merk'] ?></td>  
  <td align="center"><?php echo $r['rincian_produk'] ?></td> 
  <td align="center"><?php echo $r['warna'] ?></td> 
  <td align="center"><?php echo $r['kategori'] ?></td> 
  <td align="center"><?php echo $r['sub_kategori'] ?></td>
  <td align="center"><?php echo $r['subdetail_kategori'] ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=dataset&stt=edit&id=".$r['id_dataset'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=dataset&stt=hapus&id=".$r['id_dataset'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=dataset&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // rincian_produk_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=dataset&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=dataset&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata dataset";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbdataset order by `id_dataset` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="T".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_dataset="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_dataset=$d["id_dataset"];
            if(substr($id_dataset,3,2)==$bl){
                $urut=substr($id_dataset,5,4)+1;
                    if($urut<10){$id_dataset="$kd"."00".$urut;}
                    else if($urut<100){$id_dataset="$kd"."0".$urut;}
                    else{$id_dataset="$kd".$urut;}
                }
            else{$id_dataset="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input dataset</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id dataset</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_dataset" value="<?php echo $id_dataset;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama produk</label>
                                            <input class="form-control" required  type="text" name="nama_produk" />
                                        </div>
										
										<div class="form-group">
                                            <label>Merk</label>
                                            <input class="form-control" required  type="text" name="merk" />
                                        </div>
										<div class="form-group">
                                            <label>Rincian produk</label>
                                            <input class="form-control" required  type="text" name="rincian_produk" />
                                        </div>
										<div class="form-group">
                                            <label>Warna</label>
                                            <input class="form-control" required  type="text" name="warna" />
                                        </div>
										<div class="form-group">
                                            <label>Kategori</label>
                                            <input class="form-control" required  type="text" name="kategori" />
                                        </div>
										<div class="form-group">
                                            <label>Sub Kategori</label>
                                            <input class="form-control" required  type="text" name="sub_kategori" />
                                        </div>
										<div class="form-group">
                                            <label>Sub Detail kategori</label>
                                            <input class="form-control" required  type="text" name="subdetail_kategori" />
                                        </div>
                                        
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=dataset"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_dataset=$_POST['id_dataset'];
  $nama_produk=$_POST['nama_produk'];
  $merk=$_POST['merk'];
  $rincian_produk=$_POST['rincian_produk'];
  $warna=$_POST['warna'];
  $kategori=$_POST['kategori'];
  $sub_kategori=$_POST['sub_kategori'];
  $subdetail_kategori=$_POST['subdetail_kategori'];
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbdataset VALUES('$id_dataset', '$nama_produk', '$merk', '$rincian_produk', '$warna', '$kategori', '$sub_kategori', '$subdetail_kategori')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=dataset';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=dataset';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbdataset WHERE `id_dataset` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=dataset';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=dataset';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_dataset=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbdataset where id_dataset='$id_dataset'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_dataset=$d["id_dataset"];
    $nama_produk=$d["nama_produk"];
	$merk=$d["merk"];
	$rincian_produk=$d["rincian_produk"];
	$warna=$d["warna"];
	$kategori=$d["kategori"];
	$sub_kategori=$d["sub_kategori"];
	$subdetail_kategori=$d["subdetail_kategori"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit dataset</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id dataset</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_dataset" value="<?php echo $id_dataset;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama produk</label>
                                            <input class="form-control"  type="text" name="nama_produk" value="<?php echo $nama_produk;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Merk</label>
                                            <input class="form-control"  type="text" name="merk" value="<?php echo $merk;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Rincian produk</label>
                                            <input class="form-control"  type="text" name="rincian_produk" value="<?php echo $rincian_produk;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Warna</label>
                                            <input class="form-control"  type="text" name="warna" value="<?php echo $warna;?>" />
                                        </div>
										<div class="form-group">
                                            <label>kategori</label>
                                            <input class="form-control"  type="text" name="kategori" value="<?php echo $kategori;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Sub kategori</label>
                                            <input class="form-control"  type="text" name="sub_kategori" value="<?php echo $sub_kategori;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Sub Detail kategori</label>
                                            <input class="form-control"  type="text" name="subdetail_kategori" value="<?php echo $subdetail_kategori;?>" />
                                        </div>
                                        
                                        
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_dataset" value="<?php echo"$id_dataset";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=dataset";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_dataset=$_POST['id_dataset'];
  $nama_produk=$_POST['nama_produk'];
  $merk=$_POST['merk'];
  $rincian_produk=$_POST['rincian_produk'];
  $warna=$_POST['warna'];
  $kategori=$_POST['kategori'];
  $sub_kategori=$_POST['sub_kategori'];
  $subdetail_kategori=$_POST['subdetail_kategori'];


  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbdataset SET 
                           nama_produk='$nama_produk',
						   merk='$merk',
						   rincian_produk='$rincian_produk',
						   warna='$warna',
						   kategori='$kategori',
						   sub_kategori='$sub_kategori',
						   subdetail_kategori='$subdetail_kategori'
						   WHERE id_dataset = '$id_dataset'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=dataset';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=dataset';</script>";

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
                             <h4>Pencarian dataset</h4>
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
                                                <option value="nama_produk">Nama produk</option>
												<option value="merk">merk</option>
												<option value="rincian_produk">rincian_produk</option>
												<option value="warna">warna</option>
												<option value="kategori">kategori</option>
												<option value="kategori">Sub kategori</option>
												<option value="kategori">Sub Detail kategori</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=dataset";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id dataset</th>
                                                    <th scope="col">Nama produk</th>
													<th scope="col">Merk</th>
													<th scope="col">Rincian produk</th>
													<th scope="col">Warna</th>
													<th scope="col">Kategori</th>
													<th scope="col">Sub Kategori</th>
													<th scope="col">Sub Detail Kategori</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbdataset WHERE `$listcari` like '%$txtcari%' order by `id_dataset` asc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['id_dataset'] ?></td>
  <td align="center"><?php echo $r['nama_produk'] ?></td>  
  <td align="center"><?php echo $r['merk'] ?></td>  
    <td align="center"><?php echo $r['rincian_produk'] ?></td> 
<td align="center"><?php echo $r['warna'] ?></td> 
<td align="center"><?php echo $r['kategori'] ?></td>
<td align="center"><?php echo $r['sub_kategori'] ?></td> 
	
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=dataset&stt=edit&id=".$r['id_dataset'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=dataset&stt=hapus&id=".$r['id_dataset'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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