<?php
$stt=$_GET["stt"];

$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where status_konsul='T'") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
  }
else {
	$r = mysqli_fetch_array($query);
    $id_k=$r['id_konsultasi'];
$q7 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_k'") or die (mysqli_error());
 while($r7 = mysqli_fetch_array($q7)){
	 $queryhapus = mysqli_query($koneksi, "DELETE FROM tbdetail_konsultasi WHERE `id_konsultasi` ='$id_k'");
	
	 }	
 $queryhapus = mysqli_query($koneksi, "DELETE FROM tbkonsultasi WHERE `id_konsultasi` ='$id_k'");
 
} 

?>

<?php
if($stt==""){
	
	
	
	
?>
<div class="card mt-5">
                        <div class="card-body">
						
						
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4>Pencarian Fitur</h4>
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
                                                <option value="tgl_konsul">Tanggal</option>
												<option value="kondisi">Kondisi (atas/bawah/sama)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label></label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
                                    </form>

									

<?php
if(isset($_POST['Cari'])){


 $txtcari=$_POST['txtcari'];
 $listcari=$_POST['listcari'];
 echo"<script>location.href='$_SERVER[PHP_SELF]?module=hasil_konsul&stt=cari&txt=$txtcari&list=$listcari';</script>";
}
?>


 </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>						
					    <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Id Konsultasi</th>
													<th scope="col">Tanggal</th>
													<th scope="col">Nomor Kasus</th>
													<th scope="col">Nilai</th>
													<th scope="col">Type Jamur</th>
													<th scope="col">Kondisi</th>
													<th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $no=1;
									   $id_masuk=$_SESSION['id_masuk'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where id_pengunjung='$id_masuk' order by id_konsultasi desc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='8'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
	
		
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_konsultasi'] ?></td>  
 <td align="center"><?php 
 $tgl_konsul=$r["tgl_konsul"];
	   $pisah=explode("-",$tgl_konsul);
	   echo $pisah[2]."-".$pisah[1]."-".$pisah[0];
  ?></td>  
 <td align="center"><?php 
  $no_kasus=$r['no_kasus'];
  echo $no_kasus;
   ?></td>
 
  <td align="center"><?php 

  $nilai=$r['nilai'];
  
  
  echo $nilai; ?></td>
  <td align="center"><?php 

  $type=$r['type_jamur'];
  
  
  echo $type;
   ?></td>
   
  <td align="center"><?php 
  
  
  $q3 = mysqli_query($koneksi, "SELECT * FROM tbthreshold where id='1'") or die (mysqli_error());
$r3 = mysqli_fetch_array($q3);
$nilai_t=$r3['nilai'];

if($nilai<$nilai_t){echo"dibawah Batas Threshold"; $T="K";}
else if($nilai>$nilai_t){
	
	if($nilai=="1"){echo"Ada Kasus Sama"; $T="P";}
	else {echo"Hasil di atas Batas Threshold"; $T="M";}
	
	
	
	}



  ?></td>  
 
 
  <td align="center">
  <?php $id_konsultasi=$r["id_konsultasi"]; ?>
  <a href="media.php?module=tampil_detail&mn=hasil_konsul&idk=<?php echo $id_konsultasi ;?>" class="menu"><i class="ti-view-list"></i></a></td> 
  
   
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>			
											
								</table>			
                        </div>
                        
                            
							
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbatribut order by `id` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="A".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id=$d["id"];
            if(substr($id,3,2)==$bl){
                $urut=substr($id,5,4)+1;
                    if($urut<10){$id="$kd"."00".$urut;}
                    else if($urut<100){$id="$kd"."0".$urut;}
                    else{$id="$kd".$urut;}
                }
            else{$id="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Input Atribut</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
										
										<div class="form-group">
                                            <label>Nama Atribut</label>
                                            <input class="form-control" required  type="text" name="name" />
                                        </div>
										
										<div class="form-group">
                                            <label>Keterangan</label>
                                           <textarea class="form-control" name="keterangan"></textarea>
                                        </div>
										
                                        
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=atribut"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $id=$_POST['id'];
  $name=$_POST['name'];
   $foto=$_POST['foto'];
  $keterangan=$_POST['keterangan'];
 
 
 
  if ($_FILES["foto"] != "") {
	
        @copy($_FILES["foto"]["tmp_name"],"application/gambar/".$_FILES["foto"]["name"]);
        $foto=$_FILES["foto"]["name"];
        }
    else
    {

   
		$foto="noimages.jpg";}
    if(strlen($foto)<1){$foto="noimages.jpg";}
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbatribut VALUES('', '$name', '$keterangan', 'B')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=atribut';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=atribut';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbatribut WHERE `id` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=atribut';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=atribut';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbatribut where id='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id=$d["id"];
    $name=$d["name"];
	$keterangan=$d["keterangan"];
$gambar=$d["gambar"];
	$gambar0=$d["gambar"];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Atribut</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
										
										<div class="form-group">
                                            <label>Nama Atribut</label>
                                            <input class="form-control"  type="text" name="name" value="<?php echo $name;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Keterangan</label>
                                             <textarea class="form-control" name="keterangan"><?php echo $keterangan;?></textarea>
                                        </div>
                                        
                                       
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id" value="<?php echo"$id";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=atribut";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $name=$_POST['name'];
  $keterangan=$_POST['keterangan'];

$gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"application/gambar/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}
  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbatribut SET 
                           name='$name',
						   keterangan='$keterangan'
						   WHERE id = '$id'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=atribut';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=atribut';</script>";

   }
  }
 ?>



<?php
}
else if ($stt=="cari"){

?>
<div class="card mt-5">
                    <div class="card-body">


<hr>


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
                                                    <th scope="col">Id Konsultasi</th>
													<th scope="col">Tanggal</th>
													<th scope="col">Nomor Kasus</th>
													<th scope="col">Nilai</th>
													<th scope="col">Type Jamur</th>
													<th scope="col">Kondisi</th>
													<th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$listcari=$_GET['list'];									   
$txtcari=$_GET['txt'];									   
$id_masuk=$_SESSION['id_masuk'];

$q3 = mysqli_query($koneksi, "SELECT * FROM tbthreshold where id='1'") or die (mysqli_error());
$r3 = mysqli_fetch_array($q3);
$nilai=$r3['nilai'];

if(($listcari=="kondisi")&&($txtcari=="atas")){
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE id_pengunjung='$id_masuk' and nilai<1 and nilai>$nilai order by `id_konsultasi` desc") or die (mysqli_error());
}
else if(($listcari=="kondisi")&&($txtcari=="bawah")){
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE id_pengunjung='$id_masuk' and nilai<$nilai order by `id_konsultasi` desc") or die (mysqli_error());
}
else if(($listcari=="kondisi")&&($txtcari=="sama")){
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE id_pengunjung='$id_masuk' and nilai='1' order by `id_konsultasi` desc") or die (mysqli_error());
}
else if($listcari=="tgl_konsul"){
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE id_pengunjung='$id_masuk' and `$listcari` like '%$txtcari%' order by `id_konsultasi` desc") or die (mysqli_error());
}
else {
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE id_pengunjung='0' and `$listcari` like '%$txtcari%' order by `id_konsultasi` desc") or die (mysqli_error());
	
	
}


									   

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
  <td align="center"><?php echo $r['id_konsultasi'] ?></td>  
 <td align="center"><?php 
 $tgl_konsul=$r["tgl_konsul"];
	   $pisah=explode("-",$tgl_konsul);
	   echo $pisah[2]."-".$pisah[1]."-".$pisah[0];
  ?></td>  
 <td align="center"><?php 
  $no_kasus=$r['no_kasus'];
  echo $no_kasus;
   ?></td>
 
  <td align="center"><?php 

  $nilai=$r['nilai'];
  
  
  echo $nilai; ?></td>
  <td align="center"><?php 

  $type=$r['type_jamur'];
  
  
  echo $type;
   ?></td>
   
  <td align="center"><?php 
  
  
  $q3 = mysqli_query($koneksi, "SELECT * FROM tbthreshold where id='1'") or die (mysqli_error());
$r3 = mysqli_fetch_array($q3);
$nilai_t=$r3['nilai'];

if($nilai<$nilai_t){echo"dibawah Batas Threshold"; $T="K";}
else if($nilai>$nilai_t){
	
	if($nilai=="1"){echo"Ada Kasus Sama"; $T="P";}
	else {echo"Hasil di atas Batas Threshold"; $T="M";}
	
	
	
	}



  ?></td>    
 
 
  <td align="center">
  <?php $id_konsultasi=$r["id_konsultasi"]; ?>
  <a href="media.php?module=tampil_detail&mn=hasil_konsul&idk=<?php echo $id_konsultasi ;?>" class="menu"><i class="ti-view-list"></i></a></td> 
  
   
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>
                                </table>
                                </form>
  <a href="<?php echo"$_SERVER[PHP_SELF]?module=hasil_konsul";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>                             
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