<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=korban&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=korban&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Korban</th>
                                                    <th scope="col">Nama Korban</th>
													<th scope="col">Usia</th>
													<th scope="col">Jenis Kelamin</th>
													<th scope="col">Alamat</th>
													<th scope="col">Kondisi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbkorban") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='8'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM tbkorban LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_korban'] ?></td>
  <td align="center"><?php echo $r['nama_korban'] ?></td>  
  <td align="center"><?php echo $r['usia'] ?></td>  
  <td align="center"><?php echo $r['jenis_kelamin'] ?></td>  
  <td align="center"><?php echo $r['alamat'] ?></td>  
  <td align="center"><?php echo $r['kondisi'] ?></td>    
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=korban&stt=edit&id=".$r['id_korban'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=korban&stt=hapus&id=".$r['id_korban'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=korban&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=korban&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=korban&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Korban";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbkorban order by `id_korban` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="K".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_korban="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_korban=$d["id_korban"];
            if(substr($id_korban,3,2)==$bl){
                $urut=substr($id_korban,5,4)+1;
                    if($urut<10){$id_korban="$kd"."00".$urut;}
                    else if($urut<100){$id_korban="$kd"."0".$urut;}
                    else{$id_korban="$kd".$urut;}
                }
            else{$id_korban="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Korban</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Korban</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_korban" value="<?php echo $id_korban;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Korban</label>
                                            <input class="form-control" required  type="text" name="nama_korban"/>
                                        </div>
										<div class="form-group">
                                            <label>Usia</label>
                                            <select class="form-control" name="usia">

                                                <option value="">Pilih disini</option>
                                                 <option value="0-2">0-2</option>
                                                <option value="3-5">3-5</option>
												<option value="6-12">6-12</option>  
												<option value="13-15">13-15</option>  
												<option value="16-18">16-18</option>  
												<option value="19-55">19-55</option>  
												
												
                                            </select>
                                        </div>
										
										<div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="jenis_kelamin" id="jenis_kelaminya" value="L" />Laki-laki</label>

                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamintid" value="P"/>Perempuan
                                                </label>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" aria-label="With textarea"><?php echo $alamat;?></textarea>
                                        </div>
                                       
										 <div class="form-group">
                                            <label>Kondisi</label>
                                            <select class="form-control" name="kondisi">

                                                <option value="">Pilih disini</option>
                                                 <option value="Lansia">Lansia</option>
                                                <option value="Ibu Hamil">Ibu Hamil</option>
												<option value="Rentan">Rentan</option>  
												<option value="Disabilitas">Disabilitas</option>  
												
                                            </select>
                                        </div>
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=korban"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_korban=$_POST['id_korban'];
  $nama_korban=$_POST['nama_korban'];
  $usia=$_POST['usia'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $alamat=$_POST['alamat'];
  $kondisi=$_POST['kondisi'];
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbkorban VALUES('$id_korban', '$nama_korban', '$usia', '$jenis_kelamin', '$alamat', '$kondisi')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=korban';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=korban';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbkorban WHERE `id_korban` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=korban';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=korban';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_korban=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbkorban where id_korban='$id_korban'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_korban=$d["id_korban"];
    $nama_korban=$d["nama_korban"];
	$usia=$d["usia"];
	$jenis_kelamin=$d["jenis_kelamin"];
	$alamat=$d["alamat"];
	$kondisi=$d["kondisi"];
	

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Korban</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Korban</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_korban" value="<?php echo $id_korban;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Korban</label>
                                            <input class="form-control"  type="text" name="nama_korban" value="<?php echo $nama_korban;?>"/>
                                        </div>
                                       
										
										<div class="form-group">
                                            <label>Usia</label>
                                            <select class="form-control" name="usia">
<?php
 if($usia==""){
	 echo"<option value=''>-- Pilih disini --</option>";
	 }
 else{
	 
	 echo"<option value='$usia'>$usia</option>";
	 }
 ?>
                                                <option value="0-2">0-2</option>
                                                <option value="3-5">3-5</option>
												<option value="6-12">6-12</option>  
												<option value="13-15">13-15</option>  
												<option value="16-18">16-18</option>  
												<option value="19-55">19-55</option> 
												
                                            </select>
                                        </div>
										
										<div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="radio">
                                                <label>
<input type="radio" name="jenis_kelamin" id="jenis_kelaminya" value="L" <?php if($jenis_kelamin=="L"){echo"checked";}?>/>Laki-laki
                                                </label>

                                            </div>
                                            <div class="radio">
                                                <label>
<input type="radio" name="jenis_kelamin" id="jenis_kelamintidak" value="P" <?php if($jenis_kelamin=="P"){echo"checked";}?>/>Perempuan
                                                </label>
                                            </div>
                                            
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" aria-label="With textarea"><?php echo $alamat;?></textarea>
                                        </div>
                                        
										<div class="form-group">
                                            <label>Kondisi</label>
                                            <select class="form-control" name="kondisi">
<?php
 if($kondisi==""){
	 echo"<option value=''>-- Pilih disini --</option>";
	 }
 else{
	 
	 echo"<option value='$kondisi'>$kondisi</option>";
	 }
 ?>

                                                 <option value="Lansia">Lansia</option>
                                                <option value="Ibu Hamil">Ibu Hamil</option>
												<option value="Rentan">Rentan</option>  
												<option value="Disabilitas">Disabilitas</option>  
												
                                               
												
                                            </select>
                                        </div>	
                                        
                                        
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_korban" value="<?php echo"$id_korban";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=korban";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_korban=$_POST['id_korban'];
  $nama_korban=$_POST['nama_korban'];
  $usia=$_POST['usia'];
  $alamat=$_POST['alamat'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $kondisi=$_POST['kondisi'];
  
  
    	
  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbkorban SET 
                           nama_korban='$nama_korban',
						   usia='$usia',
						   jenis_kelamin='$jenis_kelamin',
						   alamat='$alamat',
						   kondisi='$kondisi'
						   WHERE id_korban = '$id_korban'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=korban';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=korban';</script>";

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
                             <h4>Pencarian Korban</h4>
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
                                                <option value="nama_korban">Nama Korban</option>
												<option value="usia">Usia</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=korban";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id Korban</th>
                                                    <th scope="col">Nama Korban</th>
													<th scope="col">Usia</th>
													<th scope="col">Jenis Kelamin</th>
													<th scope="col">Alamat</th>
													<th scope="col">Kondisi</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbkorban WHERE `$listcari` like '%$txtcari%' order by `id_korban` asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='8'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_korban'] ?></td>
  <td align="center"><?php echo $r['nama_korban'] ?></td>  
  <td align="center"><?php echo $r['usia'] ?></td>  
    <td align="center"><?php echo $r['jenis_kelamin'] ?></td>  
  <td align="center"><?php echo $r['alamat'] ?></td>  
  <td align="center"><?php echo $r['kondisi'] ?></td>  

  <td align="center">
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=korban&stt=edit&id=".$r['id_korban'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=korban&stt=hapus&id=".$r['id_korban'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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