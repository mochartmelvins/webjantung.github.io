<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=cek&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=cek&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
						
						<?php
						
  $query = mysqli_query($koneksi, "SELECT * FROM case_based where id='3'order by id  asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){}
   else{
	   
	  $r = mysqli_fetch_array($query);
	  $data=$r['collection'];
	  echo $data."<hr>";
	  $t=explode("}",$data);
	  $string = $t[0];
      $result = preg_replace("/[^0-9]/", "", $string);
	  #echo $result."<br>";
	  echo $t[0]."<br>";
	  $r=explode("{",$t[0]);
	  echo $r[0]."<br>";
	  echo $r[1]."<br>";
	  echo $r[2]."<br>";
	  
	  $t1=',"1":{'.$r[2];
	  
	  echo"<hr>";
	  echo $t1."<br>";
	  $s=substr($t1,11,2);
	   echo"<hr>";
	  echo $s."<br>";
	  $result = preg_replace("/[^0-9]/", "", $s);
	  echo $result."<br>";
	  
	  
	  
	  
	  
	  echo $t[1]."<br>";
	  echo $t[2]."<br>";
	  echo $t[3]."<br>";
	  echo $t[4]."<br>";
	  echo $t[5]."<br>";
	  echo $t[6]."<br>";
	  echo $t[7]."<br>";
	  echo $t[8]."<br>";
	  echo $t[9]."<br>";
	  echo $t[10]."<br>";
	  echo $t[11]."<br>";
	  echo $t[12]."<br>";
	  echo $t[13]."<br>";
	  echo $t[14]."<br>";
	  echo $t[15]."<br>";
	  echo $t[16]."<br>";
	  echo $t[17]."<br>";
	  echo $t[18]."<br>";
	  echo $t[19]."<br>";
	  echo $t[20]."<br>";
	   echo $t[21]."<br>";
   }
    
     
						
						?>
						
						
						
                            			
                        </div>
                        
                            
							
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbuser order by `id_user` desc") or die (mysqli_error());
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
                                            <label>Id User</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_user" value="<?php echo $id_user;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama User</label>
                                            <input class="form-control" required  type="text" name="nama" />
                                        </div>
										
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" required  type="email" name="email"/>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" required  type="password" name="password" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="foto">
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level" required>
                                                <option value="">Pilih disini</option>
                                                <option value="Admin">Admin</option>
                                                                                         
                                            </select>
                                        </div>
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=cek"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $email=$_POST['email'];
# $password=md5($_POST['password']);
  $password=$_POST['password'];
  $foto=$_POST['foto'];
  $level=$_POST['level'];
 
 
 
  if ($_FILES["foto"] != "") {
	
        @copy($_FILES["foto"]["tmp_name"],"application/gambar/".$_FILES["foto"]["name"]);
        $foto=$_FILES["foto"]["name"];
        }
    else
    {

   
		$foto="noimages.jpg";}
    if(strlen($foto)<1){$foto="noimages.jpg";}
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbuser VALUES('$id_user', '$nama', '$email', '$password', '$foto', '$level')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=cek';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=cek';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbuser WHERE `id_user` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=cek';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=cek';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_user=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id_user'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_user=$d["id_user"];
    $nama=$d["nama"];
	$email=$d["email"];
	$password=$d["password"];
	$gambar=$d["gambar"];
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
                                            <label>Id User</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_user" value="<?php echo $id_user;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama User</label>
                                            <input class="form-control"  type="text" name="nama" value="<?php echo $nama;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"  type="email" name="email" value="<?php echo $email;?>"/>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control"  type="password" name="password"  value="<?php echo $password;?>" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="gambar" id="gambar" class="input" />
                                            
                                            <a href="<?php echo"application/gambar/$gambar";?>" title="Klik Untuk Perbesar Gambar" target="_blank"><?php echo"<img src='application/gambar/$gambar' height='100' width='100'>";?></a>
                                            
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
                                                 <option value="Admin">Admin</option>
                                                
                                            </select>
                                        </div>
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_user" value="<?php echo"$id_user";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=cek";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $email=$_POST['email'];
  #$password=md5($_POST['password']);
  $password=$_POST['password'];
  $level=$_POST['level'];
  $gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"application/gambar/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbuser SET 
                           nama='$nama',
						   email='$email',
						   password='$password',
						   gambar='$gambar',
						   level='$level'
						   WHERE id_user = '$id_user'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=cek';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=cek';</script>";

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
												<option value="email">Email</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=cek";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id User</th>
                                                    <th scope="col">Nama User</th>
													<th scope="col">Email</th>
													<th scope="col">Foto</th>
													<th scope="col">Level</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbuser WHERE `$listcari` like '%$txtcari%' order by `id_user` asc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['id_user'] ?></td>
  <td align="center"><?php echo $r['nama'] ?></td>  
  <td align="center"><?php echo $r['email'] ?></td>  
  <td align="center"><img src="<?php echo"application/gambar/".$r['gambar'];?>"  class="avatar user-thumb"  alt="avatar" width='36' height='36'/></td>  
  <td align="center"><?php echo $r['level'] ?></td>   
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=cek&stt=edit&id=".$r['id_user'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=cek&stt=hapus&id=".$r['id_user'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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