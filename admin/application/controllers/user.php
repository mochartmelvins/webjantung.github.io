<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=user&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=user&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Username</th>
                                                    <th scope="col">Nama</th>
													<th scope="col">Alamat</th>
													<th scope="col">Level</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM user order by id_user desc") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM user order by id_user desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['username'] ?></td>
  <td align="center"><?php echo $r['nama'] ?></td>  
  <td align="center"><?php echo $r['alamat'] ?></td>  
  <td align="center"><?php echo $r['level'] ?></td>   
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=user&stt=edit&id=".$r['id_user'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=user&stt=hapus&id=".$r['id_user'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=user&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=user&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=user&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
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


  $q = mysqli_query($koneksi, "SELECT * FROM user order by `id_user` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="U".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_user="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_user=$d["id_user"];
            if(substr($id_user,3,2)==$bl){
                $urut=substr($id_user,5,4)+1;
                    if($urut<10){$id_user="$kd"."00".$urut;}
                    else if($urut<100){$id_user="$kd"."0".$urut;}
                    else{$id_user="$kd".$urut;}
                }
            else{$id_user="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input User</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
										<div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" required  type="text" name="username"/>
                                        </div>
										 <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" required  type="password" name="password" />
                                        </div>
										<div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" required  type="text" name="nama" />
                                        </div>
										
										<div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" required  type="text" name="alamat" />
                                        </div>
										
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level" required>
                                                <option value="">Pilih disini</option>
                                                 <option value="Bidan">Bidan</option>
                                                <option value="Asisten">Asisten</option>                                     
                                            </select>
                                        </div>
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=user"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_user=$_POST['id_user'];
  $nama=$_POST['nama'];
  $username=$_POST['username'];
# $password=md5($_POST['password']);
  $password=$_POST['password'];
  $alamat=$_POST['alamat'];
  $level=$_POST['level'];
 
 
 
  if ($_FILES["foto"] != "") {
	
        @copy($_FILES["foto"]["tmp_name"],"application/gambar/".$_FILES["foto"]["name"]);
        $foto=$_FILES["foto"]["name"];
        }
    else
    {

   
		$foto="noimages.jpg";}
    if(strlen($foto)<1){$foto="noimages.jpg";}
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password', '$nama', '$alamat', '$level')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=user';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM user WHERE `id_user` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_user=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM user where id_user='$id_user'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_user=$d["id_user"];
    $nama=$d["nama"];
	$alamat=$d["alamat"];
	$password=$d["password"];
	$username=$d["username"];
	$gambar0=$d["gambar"];
	$level=$d["level"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit User</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control"  type="text" name="username" value="<?php echo $username;?>"/>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control"  type="password" name="password"  value="<?php echo $password;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control"  type="text" name="nama" value="<?php echo $nama;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control"  type="text" name="alamat" value="<?php echo $alamat;?>" />
                                        </div>
										
                                        
                                        
											
                                        
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level">
<?php
 if($level==""){
	 echo"<option value=''>-- Pilih disini --</option>";
	 }
 else{
	 
	 echo"<option value='$level'>$level</option>";
	 }
 ?>
                                                <option value="">Pilih disini</option>
                                                 <option value="Bidan">Bidan</option>
                                                <option value="Asisten">Asisten</option>
                                            </select>
                                        </div>
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_user" value="<?php echo"$id_user";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=user";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_user=$_POST['id_user'];
  $nama=$_POST['nama'];
  $alamat=$_POST['alamat'];
  #$password=md5($_POST['password']);
  $password=$_POST['password'];
  $level=$_POST['level'];
  $username=$_POST['username'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"application/gambar/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

  
  $queryupdate = mysqli_query($koneksi, "UPDATE user SET 
                           nama='$nama',
						   alamat='$alamat',
						   password='$password',
						   username='$username',
						   level='$level'
						   WHERE id_user = '$id_user'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=user';</script>";

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
                                                <option value="nama">Nama</option>
												<option value="username">Username</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=user";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Username</th>
                                                    <th scope="col">Nama</th>
													<th scope="col">Alamat</th>
													<th scope="col">Level</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE `$listcari` like '%$txtcari%' order by `id_user` desc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['username'] ?></td>
  <td align="center"><?php echo $r['nama'] ?></td>  
  <td align="center"><?php echo $r['alamat'] ?></td>  
  <td align="center"><?php echo $r['level'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=user&stt=edit&id=".$r['id_user'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=user&stt=hapus&id=".$r['id_user'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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