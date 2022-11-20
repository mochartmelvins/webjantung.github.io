<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=helpdesk&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=helpdesk&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Helpdesk</th>
                                                    <th scope="col">Nama Helpdesk</th>
													<th scope="col">Deskripsi</th>
													<th scope="col">Status</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbhelpdesk") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM tbhelpdesk LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_helpdesk'] ?></td>
  <td align="center"><?php echo $r['nama_helpdesk'] ?></td>  
  <td align="center"><?php echo $r['deskripsi_helpdesk'] ?></td>  
  <td align="center"><?php echo $r['status'] ?></td>   
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=helpdesk&stt=edit&id=".$r['id_helpdesk'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=helpdesk&stt=hapus&id=".$r['id_helpdesk'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=helpdesk&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=helpdesk&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=helpdesk&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Helpdesk";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbhelpdesk order by `id_helpdesk` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="H".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_helpdesk="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_helpdesk=$d["id_helpdesk"];
            if(substr($id_helpdesk,3,2)==$bl){
                $urut=substr($id_helpdesk,5,4)+1;
                    if($urut<10){$id_helpdesk="$kd"."00".$urut;}
                    else if($urut<100){$id_helpdesk="$kd"."0".$urut;}
                    else{$id_helpdesk="$kd".$urut;}
                }
            else{$id_helpdesk="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Helpdesk</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Helpdesk</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_helpdesk" value="<?php echo $id_helpdesk;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Helpdesk</label>
                                            <input class="form-control" required  type="text" name="nama_helpdesk" />
                                        </div>
										
										<div class="form-group">
                                            <label>Deskripsi</label>
                                            <input class="form-control" required  type="text" name="deskripsi_helpdesk" />
                                        </div>
										
										
                                        
                                       <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="status" id="statusya" value="Aktif" />Aktif</label>

                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="statustid" value="Tidak Aktif"/>Tidak Aktif
                                                </label>
                                            </div>
                                        </div>
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=helpdesk"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_helpdesk=$_POST['id_helpdesk'];
  $nama_helpdesk=$_POST['nama_helpdesk'];
  $deskripsi_helpdesk=$_POST['deskripsi_helpdesk'];
  $status=$_POST['status'];
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbhelpdesk VALUES('$id_helpdesk', '$nama_helpdesk', '$deskripsi_helpdesk', '$status')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=helpdesk';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=helpdesk';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbhelpdesk WHERE `id_helpdesk` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=helpdesk';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=helpdesk';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_helpdesk=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbhelpdesk where id_helpdesk='$id_helpdesk'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_helpdesk=$d["id_helpdesk"];
    $nama_helpdesk=$d["nama_helpdesk"];
	$deskripsi_helpdesk=$d["deskripsi_helpdesk"];
	$status=$d["status"];

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Helpdesk</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Helpdesk</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_helpdesk" value="<?php echo $id_helpdesk;?>" />
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Helpdesk</label>
                                            <input class="form-control"  type="text" name="nama_helpdesk" value="<?php echo $nama_helpdesk;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Deskripsi</label>
                                            <input class="form-control"  type="text" name="deskripsi_helpdesk" value="<?php echo $deskripsi_helpdesk;?>" />
                                        </div>
										
                                        
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
<input type="radio" name="status" id="statusya" value="L" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif
                                                </label>

                                            </div>
                                            <div class="radio">
                                                <label>
<input type="radio" name="status" id="statustidak" value="P" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
                                                </label>
                                            </div>
                                            
                                        </div>
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_helpdesk" value="<?php echo"$id_helpdesk";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=helpdesk";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_helpdesk=$_POST['id_helpdesk'];
  $nama_helpdesk=$_POST['nama_helpdesk'];
  $deskripsi_helpdesk=$_POST['deskripsi_helpdesk'];
  $status=$_POST['status'];


  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbhelpdesk SET 
                           nama_helpdesk='$nama_helpdesk',
						   deskripsi_helpdesk='$deskripsi_helpdesk',
						   status='$status'
						   WHERE id_helpdesk = '$id_helpdesk'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=helpdesk';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=helpdesk';</script>";

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
                             <h4>Pencarian Helpdesk</h4>
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
                                                <option value="nama_helpdesk">Nama Helpdesk</option>
												<option value="deskripsi_helpdesk">Deskripsi</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=helpdesk";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id Helpdesk</th>
                                                    <th scope="col">Nama Helpdesk</th>
													<th scope="col">Deskripsi</th>
													<th scope="col">Status</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbhelpdesk WHERE `$listcari` like '%$txtcari%' order by `id_helpdesk` asc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['id_helpdesk'] ?></td>
  <td align="center"><?php echo $r['nama_helpdesk'] ?></td>  
  <td align="center"><?php echo $r['deskripsi_helpdesk'] ?></td>  
    <td align="center"><?php echo $r['status'] ?></td>   
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=helpdesk&stt=edit&id=".$r['id_helpdesk'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=helpdesk&stt=hapus&id=".$r['id_helpdesk'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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