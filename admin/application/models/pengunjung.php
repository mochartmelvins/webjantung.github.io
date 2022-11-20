<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=pengunjung&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=pengunjung&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
													<th scope="col">Email</th>
													<th scope="col">Telepon</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbpengunjung") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM tbpengunjung LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['nama'] ?></td>
  <td align="center"><?php echo $r['email'] ?></td> 
  <td align="center"><?php echo $r['no_telp'] ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengunjung&stt=edit&id=".$r['id_pengunjung'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengunjung&stt=hapus&id=".$r['id_pengunjung'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=pengunjung&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=pengunjung&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=pengunjung&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Pengunjung";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbpengunjung order by `id_pengunjung` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="P".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_pengunjung="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_pengunjung=$d["id_pengunjung"];
            if(substr($id_pengunjung,3,2)==$bl){
                $urut=substr($id_pengunjung,5,4)+1;
                    if($urut<10){$id_pengunjung="$kd"."00".$urut;}
                    else if($urut<100){$id_pengunjung="$kd"."0".$urut;}
                    else{$id_pengunjung="$kd".$urut;}
                }
            else{$id_pengunjung="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Pengunjung</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                      
										
										<div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" required  type="text" name="nama" />
                                        </div>
										
										
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" required  type="email" name="email"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Telepon</label>
                                            <input class="form-control" required  type="text" name="no_telp" />
                                        </div>
										
										
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" required  type="password" name="password" />
                                        </div>
                                        
                                       
                                        
   
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=pengunjung"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_pengunjung=$_POST['id_pengunjung'];
  $nama=$_POST['nama'];
  $tgl_lahir=$_POST['tgl_lahir'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $alamat=$_POST['alamat'];
  $pekerjaan=$_POST['pekerjaan'];
  $email=$_POST['email'];
  $no_telp=$_POST['no_telp'];
  $username=$_POST['username'];
  $password=$_POST['password'];
 
 
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbpengunjung VALUES('', '$nama', '$email', '$no_telp', '$password')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=pengunjung';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=pengunjung';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbpengunjung WHERE `id_pengunjung` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengunjung';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengunjung';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_pengunjung=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbpengunjung where id_pengunjung='$id_pengunjung'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_pengunjung=$d["id_pengunjung"];
    $nama=$d["nama"];
	$tgl_lahir=$d["tgl_lahir"];
	$jenis_kelamin=$d["jenis_kelamin"];
	$alamat=$d["alamat"];
	$pekerjaan=$d["pekerjaan"];
	$email=$d["email"];
	$no_telp=$d["no_telp"];
	$username=$d["username"];
	$password=$d["password"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Pengunjung</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
										
										<div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control"  type="text" name="nama" value="<?php echo $nama;?>" />
                                        </div>
										
										
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"  type="email" name="email" value="<?php echo $email;?>"/>
                                        </div>
										
										<div class="form-group">
                                            <label>Telepon</label>
                                            <input class="form-control"  type="text" name="no_telp" value="<?php echo $no_telp;?>"/>
                                        </div>
										
										
                                       
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control"  type="password" name="password"  value="<?php echo $password;?>" />
                                        </div>
                                        
                                    
                                        
											
          
                                      
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_pengunjung" value="<?php echo"$id_pengunjung";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=pengunjung";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_pengunjung=$_POST['id_pengunjung'];
  $nama=$_POST['nama'];
  $tgl_lahir=$_POST['tgl_lahir'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $alamat=$_POST['alamat'];
  $pekerjaan=$_POST['pekerjaan'];
  $email=$_POST['email'];
  $no_telp=$_POST['no_telp'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"application/gambar/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbpengunjung SET 
                           nama='$nama',
							   email='$email',
							    no_telp='$no_telp',
						   password='$password'
						   WHERE id_pengunjung = '$id_pengunjung'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=pengunjung';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=pengunjung';</script>";

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
                             <h4>Pencarian Pengunjung</h4>
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
                                                <option value="nama">Nama</option>
												<option value="email">Email</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=pengunjung";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
                                                    <th scope="col">Nama</th>
													<th scope="col">Email</th>
													<th scope="col">Telepon</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpengunjung WHERE `$listcari` like '%$txtcari%' order by `id_pengunjung` asc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['nama'] ?></td>
  <td align="center"><?php echo $r['email'] ?></td> 
  <td align="center"><?php echo $r['no_telp'] ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengunjung&stt=edit&id=".$r['id_pengunjung'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengunjung&stt=hapus&id=".$r['id_pengunjung'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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