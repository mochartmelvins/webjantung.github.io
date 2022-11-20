<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=jaw_konsultasi&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=jaw_konsultasi&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Id Jawaban</th>
													<th scope="col">Isi Konsultasi</th>
                                                    <th scope="col">Isi Jawaban</th>
													<th scope="col">Status Jawaban</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbjawaban_konsultasi,tbkonsultasi where tbjawaban_konsultasi.id_konsultasi=tbkonsultasi.id_konsultasi order by tbjawaban_konsultasi.id_jawaban asc") or die (mysqli_error());
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
$q2  = mysqli_query($koneksi, "SELECT * FROM tbjawaban_konsultasi,tbkonsultasi where tbjawaban_konsultasi.id_konsultasi=tbkonsultasi.id_konsultasi order by tbjawaban_konsultasi.id_jawaban asc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_jawaban'] ?></td>
  <td align="center"><?php echo $r['isi_konsultasi'] ?></td>  
  <td align="center"><?php echo $r['isi_jawaban'] ?></td> 
  <td align="center"><?php echo $r['status_jawaban'] ?></td>
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=jaw_konsultasi&stt=edit&id=".$r['id_jawaban'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=jaw_konsultasi&stt=hapus&id=".$r['id_jawaban'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=jaw_konsultasi&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // status_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=jaw_konsultasi&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=jaw_konsultasi&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($query);
}


echo"<br>Jumlah : $jmldata Jawaban";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbjawaban_konsultasi order by `id_jawaban` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="J".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_jawaban="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_jawaban=$d["id_jawaban"];
            if(substr($id_jawaban,3,2)==$bl){
                $urut=substr($id_jawaban,5,4)+1;
                    if($urut<10){$id_jawaban="$kd"."00".$urut;}
                    else if($urut<100){$id_jawaban="$kd"."0".$urut;}
                    else{$id_jawaban="$kd".$urut;}
                }
            else{$id_jawaban="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Jawaban</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Id Jawaban</label>
                                            <input class="form-control" placeholder="Please Enter Keyword" type="text" name="id_jawaban" value="<?php echo $id_jawaban;?>" />
                                        </div>
										
										
<div class="form-group">
<label>Isi Konsultasi</label>
<select class="form-control" name="id_konsultasi" required>
<option value="">-- Pilih Kategori --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi order by `id_konsultasi` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Kategori masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_konsultasi'] ?>"><?php echo $r['isi_konsultasi'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>	
										
										
										<div class="form-group">
                                            <label>Isi Jawaban</label>
                                            <textarea class="form-control" required  name="isi_jawaban"></textarea>
                                        </div>
                                     
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=jaw_konsultasi"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id_jawaban=$_POST['id_jawaban'];
  $isi_jawaban=$_POST['isi_jawaban'];
  $id_konsultasi=$_POST['id_konsultasi'];
   
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbjawaban_konsultasi VALUES('$id_jawaban', '$id_konsultasi', '$isi_jawaban', '', 'B')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=jaw_konsultasi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=jaw_konsultasi';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbjawaban_konsultasi WHERE `id_jawaban` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=jaw_konsultasi';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=jaw_konsultasi';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id_jawaban=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbjawaban_konsultasi where id_jawaban='$id_jawaban'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_jawaban=$d["id_jawaban"];
    $isi_jawaban=$d["isi_jawaban"];
	$id_konsultasi=$d["id_konsultasi"];


	

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Jawaban</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
<div class="form-group">
<label>Isi Konsultasi</label>
<select class="form-control" name="id_konsultasi">
<?php
  echo"<option value='$id_konsultasi'>".KON($tbkonsultasi,$id_konsultasi)."</option>";
?>  
<option value="">-- Pilih Konsultasi --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi  order by `id_konsultasi` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Konsultasi masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_konsultasi'] ?>"><?php echo $r['isi_konsultasi'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div> 
									   
										<div class="form-group">
                                            <label>Isi Jawaban</label>
                                           	<textarea class="form-control" required  name="isi_jawaban"><?php echo"$isi_jawaban";?></textarea>
                                        </div>
										   
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="id_jawaban" value="<?php echo"$id_jawaban";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=jaw_konsultasi";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_jawaban=$_POST['id_jawaban'];
  $isi_jawaban=$_POST['isi_jawaban'];
  $id_konsultasi=$_POST['id_konsultasi'];
  

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbjawaban_konsultasi SET 
                           isi_jawaban='$isi_jawaban',
						   id_konsultasi='$id_konsultasi'
						   WHERE id_jawaban = '$id_jawaban'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=jaw_konsultasi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=jaw_konsultasi';</script>";

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
                             <h4>Pencarian Jawaban</h4>
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
                                                <option value="isi_konsultasi">Isi Konsultasi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=jaw_konsultasi";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
													<th scope="col">Id Jawaban</th>
													<th scope="col">Isi Konsultasi</th>
                                                    <th scope="col">Isi Jawaban</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbjawaban_konsultasi,tbkonsultasi WHERE tbjawaban_konsultasi.id_konsultasi=tbkonsultasi.id_konsultasi and tbkonsultasi.`$listcari` like '%$txtcari%' order by tbjawaban_konsultasi.`id_jawaban` asc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['id_jawaban'] ?></td>
  <td align="center"><?php echo $r['isi_konsultasi'] ?></td>  
  <td align="center"><?php echo $r['isi_jawaban'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=jaw_konsultasi&stt=edit&id=".$r['id_jawaban'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=jaw_konsultasi&stt=hapus&id=".$r['id_jawaban'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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