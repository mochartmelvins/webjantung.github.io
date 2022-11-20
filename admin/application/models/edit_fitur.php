<?php
$id_detail=$_GET["id"];
$id_konsultasi=$_GET["idk"];

$query = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_detail='$id_detail' and id_konsultasi='$id_konsultasi'") or die (mysqli_error());
$d=mysqli_fetch_array($query);
$id_atribut=$d["id_atribut"];
$id_fitur=$d["id_fitur"];

?>
<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Fitur</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" type_jamur="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
										
										
										
 <div class="form-group">
<label>
<?php
$qq = mysqli_query($koneksi, "SELECT * FROM tbatribut where id='$id_atribut'") or die (mysqli_error());
$dq=mysqli_fetch_array($qq);
$name=$dq['name'];

?>

<?php echo $name ?> *</label>
<select class="form-control" name="kasus_1" required>
<?php
  echo"<option value='$result1'>".FIT($tbfitur,$id_fitur)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='$id_atribut' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?> 
        
  </select>
</div>     



										

                                      <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        
                                        <a href="<?php echo"$_SERVER[PHP_SELF]?module=konsul_user&stt=hasil&idk=".$id_konsultasi;?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_detail=$_GET["id"];
  $id_konsultasi=$_GET["idk"];

  $kasus_1=$_POST['kasus_1'];

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbdetail_konsultasi SET id_fitur='$kasus_1' WHERE id_detail = '$id_detail' and id_konsultasi='$id_konsultasi'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=konsul_user&stt=hasil&idk=$id_konsultasi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=konsul_user&stt=hasil&idk=$id_konsultasi';</script>";

   }
  }
 ?>