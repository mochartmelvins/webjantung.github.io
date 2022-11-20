<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbthreshold where id='1'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id=$d["id"];
    $nilai=$d["nilai"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Nilai</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        
                                       
										<div class="form-group">
                                            <label>Nilai (0.35 / 0.50 / 0.65 / 0.80 / 0.90)</label>
                                            <input class="form-control" required  type="text" name="nilai" value="<?php echo $nilai;?>"/>
                                        </div>
										
										
										
    
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar" value="<?php echo"$gambar";?>">
                                        <input type="hidden" name="id" value="<?php echo"$id";?>">
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
  $id=$_POST['id'];
  $nilai=$_POST['nilai'];
 

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbthreshold SET 
                           nilai='$nilai'
						   WHERE id = '1'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=nilai';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=nilai';</script>";

   }
  }
 ?>





<?php
}
else if($stt=="tambah"){
?>




<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbthreshold WHERE `id` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=nilai';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=nilai';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
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
                                                <option value="nilai">Nama Dokter</option>
												<option value="Keahlian">Keahlian</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=nilai";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id Dokter</th>
                                                    <th scope="col">nilai Dokter</th>
													<th scope="col">Keahlian</th>
													<th scope="col">Jenis Kelamin</th>
													<th scope="col">Alamat</th>
													<th scope="col">Username</th>
													<th scope="col">Password</th>
													<th scope="col">Gambar</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbthreshold WHERE `$listcari` like '%$txtcari%' order by `id` asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='10'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
 <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id'] ?></td>
  <td align="center"><?php echo $r['nilai'] ?></td>  
  <td align="center"><?php echo $r['keahlian'] ?></td> 
  <td align="center"><?php echo $r['jenis_kelamin'] ?></td> 
  <td align="center"><?php echo $r['alamat'] ?></td> 
  <td align="center"><?php echo $r['username_dokter'] ?></td> 
  <td align="center"><?php echo $r['password_dokter'] ?></td> 
  <td align="center"><img src="<?php echo"application/gambar/".$r['gambar'];?>"  class="avatar user-thumb"  alt="avatar" width='36' height='36'/></td> 
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=nilai&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=nilai&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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