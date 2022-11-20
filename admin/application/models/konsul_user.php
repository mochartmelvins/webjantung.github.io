<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>


<div class="card mt-5">
                        <div class="card-body">
						<center><a href="media.php?module=konsul_user&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Mulai Konsultasi</button></a></center>
                        <div class="table-responsive">
                           			
                        </div>
                        
                        
                        
                    </div>
                </div>



<?php
}
else if($stt=="tambah"){

$query1 = mysqli_query($koneksi, "SELECT * FROM `tbatribut` order by id asc") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){
     echo"<script>location.href='$_SERVER[PHP_SELF]?module=konsul_user';</script>";
    }
	else{
		
		while($r1 = mysqli_fetch_array($query1)){		 
		  $id=$r1['id'];
		 $queryupdate = mysqli_query($koneksi, "UPDATE tbatribut SET status='B' WHERE id = '$id'");
		  
		}
		
	}
	
	echo"<script>location.href='$_SERVER[PHP_SELF]?module=konsul_user&stt=mulai';</script>";


}
else if($stt=="mulai"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi order by `id_konsultasi` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="K".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_konsultasi="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_konsultasi=$d["id_konsultasi"];
            if(substr($id_konsultasi,3,2)==$bl){
                $urut=substr($id_konsultasi,5,4)+1;
                    if($urut<10){$id_konsultasi="$kd"."00".$urut;}
                    else if($urut<100){$id_konsultasi="$kd"."0".$urut;}
                    else{$id_konsultasi="$kd".$urut;}
                }
            else{$id_konsultasi="$kd"."001";}
			}
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Konsultasi</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
									   <?php
									    $q = mysqli_query($koneksi, "SELECT * FROM tbatribut where status='B' order by `id` asc") or die (mysqli_error());
										if(mysqli_num_rows($q) == 0){}
										else{
											$d=mysqli_fetch_array($q);
											$id=$d['id'];
											$name=$d['name'];
											
											
											
										}
									   ?>
									   
									   
									   
										(Halaman <?php echo $id; ?> dari 22)
										<div class="form-group">
                                            <label>Nama Atribut </label>
                                            <input class="form-control" required  type="text" name="name" value="<?php echo $name; ?>" disabled />
                                        </div>
										<div class="form-group">
                                            <label>Fitur</label>
											<table>
											
											<?php
											$q1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='$id'") or die (mysqli_error());
											$no=1;
											while($d1=mysqli_fetch_array($q1)){
												$fitur_id=$d1['fitur_id'];
												$q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id'") or die (mysqli_error());
												$d2=mysqli_fetch_array($q2);
												$name_f=$d2['name'];
												$nama_indo=$d2['nama_indo'];
												$keterangan=$d2['keterangan'];
												$gambar=$d2['gambar'];
												
												echo"
												<tr>
												<td rowspan='3'>$no.</td>
												<td rowspan='3'><img src='application/gambar/$gambar'></td>
												<td>Nama Fitur : $name_f ($nama_indo)</td>
												</tr>
												<tr>
												
												
												<td>Keterangan: $keterangan</td>
												</tr>
												<tr>
												
												<td><input type='radio' name='fitur_id' value='$fitur_id' required/></td>
												</tr>
												";
												
												
												$no++;
											}
											?>
											</table>
                                           
                                        </div>
										
										
										 
										    <input type="hidden" name="id" value="<?php echo"$id";?>">
											<input type="hidden" name="id_konsultasi" value="<?php echo"$id_konsultasi";?>">
											
                                        <a href="media.php?module=konsul_user"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
										<button type="reset" class="btn btn-primary mb-3">Reset</button>
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Selanjutnya</button>
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
  $fitur_id=$_POST['fitur_id'];
  $id_konsultasi=$_POST['id_konsultasi'];
  $id_masuk=$_SESSION['id_masuk'];
  $tgl=date('Y-m-d');


if($fitur_id==""){
	
echo"<script>alert('Pilih Salah Satu Fitur !');location.href='$_SERVER[PHP_SELF]?module=konsul_user&stt=mulai';</script>";
	
}
else{
  
$querytambah = mysqli_query($koneksi, "INSERT INTO tbkonsultasi VALUES('$id_konsultasi', '$tgl', '$id_masuk', '', '', '', 'T')") or die(mysqli_error());
$querytambah1 = mysqli_query($koneksi, "INSERT INTO tbdetail_konsultasi VALUES('', '$id_konsultasi', '$id', '$fitur_id')") or die(mysqli_error());
$queryupdate = mysqli_query($koneksi, "UPDATE tbatribut SET status='S' WHERE id = '$id'");

echo"<script>location.href='$_SERVER[PHP_SELF]?module=konsul_user&stt=lanjut&idk=$id_konsultasi';</script>";
} 
 
  }
 ?>


<?php
}
else if($stt=="lanjut"){
?>


<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Konsultasi</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
									   <?php
									    $q = mysqli_query($koneksi, "SELECT * FROM tbatribut where status='B' order by `id` asc") or die (mysqli_error());
										if(mysqli_num_rows($q) == 0){
											
											
											
											
										 $id_konsultasi=$_GET['idk'];
                                        $queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET status_konsul='B' WHERE id_konsultasi = '$id_konsultasi'");
                                        echo"<script>location.href='$_SERVER[PHP_SELF]?module=konsul_user&stt=hasil&idk=$id_konsultasi';</script>";	
											
											
										}
										else{
											$d=mysqli_fetch_array($q);
											$id=$d['id'];
											$name=$d['name'];
											
											
											
										
									   ?>
									   
									   
									   
										(Halaman <?php echo $id; ?> dari 22)
										<div class="form-group">
                                            <label>Nama Atribut </label>
                                            <input class="form-control" required  type="text" name="name" value="<?php echo $name; ?>" disabled />
                                        </div>
										<div class="form-group">
                                            <label>Fitur</label>
											<table>
											
											<?php
											$q1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='$id'") or die (mysqli_error());
											$no=1;
											while($d1=mysqli_fetch_array($q1)){
												$fitur_id=$d1['fitur_id'];
												$q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id'") or die (mysqli_error());
												$d2=mysqli_fetch_array($q2);
												$name_f=$d2['name'];
												$nama_indo=$d2['nama_indo'];
												$keterangan=$d2['keterangan'];
												$gambar=$d2['gambar'];
												
												echo"
												<tr>
												<td rowspan='3'>$no.</td>
												<td rowspan='3'>
												";
												
												if(($id=="3")&&($no=="1")){echo"<img src='application/gambar/3/BrownCC.png'>";}
												else if(($id=="3")&&($no=="2")){echo"<img src='application/gambar/3/buffCC.png'>";}
												else if(($id=="3")&&($no=="3")){echo"<img src='application/gambar/3/CinnamonCC.png'>";}
												else if(($id=="3")&&($no=="4")){echo"<img src='application/gambar/3/grayCC.png'>";}
												else if(($id=="3")&&($no=="5")){echo"<img src='application/gambar/3/greenCC.png'>";}
												else if(($id=="3")&&($no=="6")){echo"<img src='application/gambar/3/pinkCC.png'>";}
												else if(($id=="3")&&($no=="7")){echo"<img src='application/gambar/3/purpleCC.png'>";}
												else if(($id=="3")&&($no=="8")){echo"<img src='application/gambar/3/redCC.png'>";}
												else if(($id=="3")&&($no=="9")){echo"<img src='application/gambar/3/whiteCC.png'>";}
												else if(($id=="3")&&($no=="10")){echo"<img src='application/gambar/3/yellowCC.png'>";}
												
												else if(($id=="5")&&($no=="1")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="5")&&($no=="2")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="5")&&($no=="3")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="5")&&($no=="4")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="5")&&($no=="5")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="5")&&($no=="6")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="5")&&($no=="7")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="5")&&($no=="8")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="5")&&($no=="9")){echo"<img src='application/gambar/no.jpg'>";}
												
												else if(($id=="9")&&($no=="1")){echo"<img src='application/gambar/9/blackGC.png'>";}
												else if(($id=="9")&&($no=="2")){echo"<img src='application/gambar/9/brownGC.png'>";}
												else if(($id=="9")&&($no=="3")){echo"<img src='application/gambar/9/buffGC.png'>";}
												else if(($id=="9")&&($no=="4")){echo"<img src='application/gambar/9/chocolateGC.png'>";}
												else if(($id=="9")&&($no=="5")){echo"<img src='application/gambar/9/grayGC.png'>";}
												else if(($id=="9")&&($no=="6")){echo"<img src='application/gambar/9/greenGC.png'>";}
												else if(($id=="9")&&($no=="7")){echo"<img src='application/gambar/9/orangeGC.png'>";}
												else if(($id=="9")&&($no=="8")){echo"<img src='application/gambar/9/pinkGC.png'>";}
												else if(($id=="9")&&($no=="9")){echo"<img src='application/gambar/9/purpleGC.png'>";}
												else if(($id=="9")&&($no=="10")){echo"<img src='application/gambar/9/redGC.png'>";}
												else if(($id=="9")&&($no=="11")){echo"<img src='application/gambar/9/whiteGC.png'>";}
												else if(($id=="9")&&($no=="12")){echo"<img src='application/gambar/9/yellowGC.png'>";}
												
												else if(($id=="11")&&($no=="7")){echo"<img src='application/gambar/no.jpg'>";}
												
												else if(($id=="12")&&($no=="1")){echo"<img src='application/gambar/12/fibrousSSAR.png'>";}
												else if(($id=="12")&&($no=="2")){echo"<img src='application/gambar/12/scalySSAR.png'>";}
												else if(($id=="12")&&($no=="3")){echo"<img src='application/gambar/12/silkySSAR.png'>";}
												else if(($id=="12")&&($no=="4")){echo"<img src='application/gambar/12/smoothSSAR.png'>";}
												
												else if(($id=="13")&&($no=="1")){echo"<img src='application/gambar/13/fibrousSSBR.png'>";}
												else if(($id=="13")&&($no=="2")){echo"<img src='application/gambar/13/scalySSBR.png'>";}
												else if(($id=="13")&&($no=="3")){echo"<img src='application/gambar/13/silkySSBR.png'>";}
												else if(($id=="13")&&($no=="4")){echo"<img src='application/gambar/13/smoothSSBR.png'>";}
												
												else if(($id=="14")&&($no=="1")){echo"<img src='application/gambar/14/brownSCAR.png'>";}
												else if(($id=="14")&&($no=="2")){echo"<img src='application/gambar/14/buffSCAR.png'>";}
												else if(($id=="14")&&($no=="3")){echo"<img src='application/gambar/14/cinnamonSCAR.png'>";}
												else if(($id=="14")&&($no=="4")){echo"<img src='application/gambar/14/graySCAR.png'>";}
												else if(($id=="14")&&($no=="5")){echo"<img src='application/gambar/14/orangeSCAR.png'>";}
												else if(($id=="14")&&($no=="6")){echo"<img src='application/gambar/14/pinkSCAR.png'>";}
												else if(($id=="14")&&($no=="7")){echo"<img src='application/gambar/14/redSCAR.png'>";}
												else if(($id=="14")&&($no=="8")){echo"<img src='application/gambar/14/whiteSCAR.png'>";}
												else if(($id=="14")&&($no=="9")){echo"<img src='application/gambar/14/yellowSCAR.png'>";}
												
												
												else if(($id=="15")&&($no=="1")){echo"<img src='application/gambar/15/brownSCBR.png'>";}
												else if(($id=="15")&&($no=="2")){echo"<img src='application/gambar/15/buffSCBR.png'>";}
												else if(($id=="15")&&($no=="3")){echo"<img src='application/gambar/15/cinnamonSCBR.png'>";}
												else if(($id=="15")&&($no=="4")){echo"<img src='application/gambar/15/graySCBR.png'>";}
												else if(($id=="15")&&($no=="5")){echo"<img src='application/gambar/15/orangeSCBR.png'>";}
												else if(($id=="15")&&($no=="6")){echo"<img src='application/gambar/15/pinkSCBR.png'>";}
												else if(($id=="15")&&($no=="7")){echo"<img src='application/gambar/15/redSCBR.png'>";}
												else if(($id=="15")&&($no=="8")){echo"<img src='application/gambar/15/whiteSCBR.png'>";}
												else if(($id=="15")&&($no=="9")){echo"<img src='application/gambar/15/yellowSCBR.png'>";}
												
												
												else if(($id=="17")&&($no=="1")){echo"<img src='application/gambar/17/brownVC.png'>";}
												else if(($id=="17")&&($no=="2")){echo"<img src='application/gambar/17/orangeVC.png'>";}
												else if(($id=="17")&&($no=="3")){echo"<img src='application/gambar/17/whiteVC.png'>";}
												else if(($id=="17")&&($no=="4")){echo"<img src='application/gambar/17/yellowVC.png'>";}
												
												else if(($id=="19")&&($no=="2")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="19")&&($no=="4")){echo"<img src='application/gambar/no.jpg'>";}
												
												
												else if(($id=="20")&&($no=="1")){echo"<img src='application/gambar/20/blackSPC.png'>";}
												else if(($id=="20")&&($no=="2")){echo"<img src='application/gambar/20/brownSPC.png'>";}
												else if(($id=="20")&&($no=="3")){echo"<img src='application/gambar/20/buffSPC.png'>";}
												else if(($id=="20")&&($no=="4")){echo"<img src='application/gambar/20/chocolateSPC.png'>";}
												else if(($id=="20")&&($no=="5")){echo"<img src='application/gambar/20/greenSPC.png'>";}
												else if(($id=="20")&&($no=="6")){echo"<img src='application/gambar/20/pinkororangeSPC.png'>";}
												else if(($id=="20")&&($no=="7")){echo"<img src='application/gambar/20/purpleSPC.png'>";}
												else if(($id=="20")&&($no=="8")){echo"<img src='application/gambar/20/whiteSPC.png'>";}
												else if(($id=="20")&&($no=="9")){echo"<img src='application/gambar/20/yellowSPC.png'>";}
												
												
												else if(($id=="21")&&($no=="1")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="21")&&($no=="2")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="21")&&($no=="3")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="21")&&($no=="4")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="21")&&($no=="5")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="21")&&($no=="6")){echo"<img src='application/gambar/no.jpg'>";}
												
												
												else if(($id=="22")&&($no=="1")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="22")&&($no=="3")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="22")&&($no=="4")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="22")&&($no=="5")){echo"<img src='application/gambar/no.jpg'>";}
												else if(($id=="22")&&($no=="6")){echo"<img src='application/gambar/no.jpg'>";}
												
												
												

												
												else{
													echo"<img src='application/gambar/$gambar' width='100' height='100'>";
												}
												
												
												echo"
												</td>
												<td>Nama Fitur : $name_f ($nama_indo)</td>
												</tr>
												<tr>";
												
												if(($id=="3")&&($no=="1")){$keterangan="A";}
												else if(($id=="3")&&($no=="2")){$keterangan="A";}
												else if(($id=="3")&&($no=="3")){$keterangan="A";}
												else if(($id=="3")&&($no=="4")){$keterangan="A";}
												else if(($id=="3")&&($no=="5")){$keterangan="A";}
												else if(($id=="3")&&($no=="6")){$keterangan="A";}
												else if(($id=="3")&&($no=="7")){$keterangan="A";}
												else if(($id=="3")&&($no=="8")){$keterangan="A";}
												else if(($id=="3")&&($no=="9")){$keterangan="A";}
												else if(($id=="3")&&($no=="10")){$keterangan="A";}
												
												else if(($id=="5")&&($no=="1")){$keterangan="A";}
												else if(($id=="5")&&($no=="2")){$keterangan="A";}
												else if(($id=="5")&&($no=="3")){$keterangan="A";}
												else if(($id=="5")&&($no=="4")){$keterangan="A";}
												else if(($id=="5")&&($no=="5")){$keterangan="A";}
												else if(($id=="5")&&($no=="6")){$keterangan="A";}
												else if(($id=="5")&&($no=="7")){$keterangan="A";}
												else if(($id=="5")&&($no=="8")){$keterangan="A";}
												else if(($id=="5")&&($no=="9")){$keterangan="A";}
												
												else if(($id=="9")&&($no=="1")){$keterangan="A";}
												else if(($id=="9")&&($no=="2")){$keterangan="A";}
												else if(($id=="9")&&($no=="3")){$keterangan="A";}
												else if(($id=="9")&&($no=="4")){$keterangan="A";}
												else if(($id=="9")&&($no=="5")){$keterangan="A";}
												else if(($id=="9")&&($no=="6")){$keterangan="A";}
												else if(($id=="9")&&($no=="7")){$keterangan="A";}
												else if(($id=="9")&&($no=="8")){$keterangan="A";}
												else if(($id=="9")&&($no=="9")){$keterangan="A";}
												else if(($id=="9")&&($no=="10")){$keterangan="A";}
												else if(($id=="9")&&($no=="11")){$keterangan="A";}
												else if(($id=="9")&&($no=="12")){$keterangan="A";}
												
												else if(($id=="11")&&($no=="7")){$keterangan="A";}
												
												else if(($id=="12")&&($no=="1")){$keterangan="A";}
												else if(($id=="12")&&($no=="2")){$keterangan="A";}
												else if(($id=="12")&&($no=="3")){$keterangan="A";}
												else if(($id=="12")&&($no=="4")){$keterangan="A";}
												
												else if(($id=="13")&&($no=="1")){$keterangan="A";}
												else if(($id=="13")&&($no=="2")){$keterangan="A";}
												else if(($id=="13")&&($no=="3")){$keterangan="A";}
												else if(($id=="13")&&($no=="4")){$keterangan="A";}
												
												else if(($id=="14")&&($no=="1")){$keterangan="A";}
												else if(($id=="14")&&($no=="2")){$keterangan="A";}
												else if(($id=="14")&&($no=="3")){$keterangan="A";}
												else if(($id=="14")&&($no=="4")){$keterangan="A";}
												else if(($id=="14")&&($no=="5")){$keterangan="A";}
												else if(($id=="14")&&($no=="6")){$keterangan="A";}
												else if(($id=="14")&&($no=="7")){$keterangan="A";}
												else if(($id=="14")&&($no=="8")){$keterangan="A";}
												else if(($id=="14")&&($no=="9")){$keterangan="A";}
												
												
												else if(($id=="15")&&($no=="1")){$keterangan="A";}
												else if(($id=="15")&&($no=="2")){$keterangan="A";}
												else if(($id=="15")&&($no=="3")){$keterangan="A";}
												else if(($id=="15")&&($no=="4")){$keterangan="A";}
												else if(($id=="15")&&($no=="5")){$keterangan="A";}
												else if(($id=="15")&&($no=="6")){$keterangan="A";}
												else if(($id=="15")&&($no=="7")){$keterangan="A";}
												else if(($id=="15")&&($no=="8")){$keterangan="A";}
												else if(($id=="15")&&($no=="9")){$keterangan="A";}
												
												
												else if(($id=="17")&&($no=="1")){$keterangan="A";}
												else if(($id=="17")&&($no=="2")){$keterangan="A";}
												else if(($id=="17")&&($no=="3")){$keterangan="A";}
												else if(($id=="17")&&($no=="4")){$keterangan="A";}
												
												else if(($id=="19")&&($no=="2")){$keterangan="A";}
												else if(($id=="19")&&($no=="4")){$keterangan="A";}
												
												
												else if(($id=="20")&&($no=="1")){$keterangan="A";}
												else if(($id=="20")&&($no=="2")){$keterangan="A";}
												else if(($id=="20")&&($no=="3")){$keterangan="A";}
												else if(($id=="20")&&($no=="4")){$keterangan="A";}
												else if(($id=="20")&&($no=="5")){$keterangan="A";}
												else if(($id=="20")&&($no=="6")){$keterangan="A";}
												else if(($id=="20")&&($no=="7")){$keterangan="A";}
												else if(($id=="20")&&($no=="8")){$keterangan="A";}
												else if(($id=="20")&&($no=="9")){$keterangan="A";}
												
												
												else if(($id=="21")&&($no=="1")){$keterangan="A";}
												else if(($id=="21")&&($no=="2")){$keterangan="A";}
												else if(($id=="21")&&($no=="3")){$keterangan="A";}
												else if(($id=="21")&&($no=="4")){$keterangan="A";}
												else if(($id=="21")&&($no=="5")){$keterangan="A";}
												else if(($id=="21")&&($no=="6")){$keterangan="A";}
												
												
												else if(($id=="22")&&($no=="1")){$keterangan="A";}
												else if(($id=="22")&&($no=="3")){$keterangan="A";}
												else if(($id=="22")&&($no=="4")){$keterangan="A";}
												else if(($id=="22")&&($no=="5")){$keterangan="A";}
												else if(($id=="22")&&($no=="6")){$keterangan="A";}
												
												
												

												
												else{
													$keterangan="A";
												}
												
												
												
												echo"
												<td>Keterangan: $keterangan</td>
												</tr>
												<tr>
												
												<td><input type='radio' name='fitur_id' value='$fitur_id' required/></td>
												</tr>
												";
												
												
												$no++;
											}
											?>
											</table>
                                           
                                        </div>
										
										
										 
										    <input type="hidden" name="id" value="<?php echo"$id";?>">
											<input type="hidden" name="id_konsultasi" value="<?php $id_konsultasi=$_GET['idk']; echo"$id_konsultasi";?>">
											
                                        <a href="media.php?module=konsul_user&stt=batal&id=<?php echo"$id_konsultasi";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
										<button type="reset" class="btn btn-primary mb-3">Reset</button>
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Selanjutnya</button>
                                    
									<?php
										}
									?>
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
  $fitur_id=$_POST['fitur_id'];
  $id_konsultasi=$_GET['idk'];
  $id_masuk=$_SESSION['id_masuk'];
  $tgl=date('Y-m-d');


  
$querytambah1 = mysqli_query($koneksi, "INSERT INTO tbdetail_konsultasi VALUES('', '$id_konsultasi', '$id', '$fitur_id')") or die(mysqli_error());
$queryupdate = mysqli_query($koneksi, "UPDATE tbatribut SET status='S' WHERE id = '$id'");

echo"<script>location.href='$_SERVER[PHP_SELF]?module=konsul_user&stt=lanjut&idk=$id_konsultasi';</script>";

 
  }
 ?>



<?php }
else if($stt=="batal"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbdetail_konsultasi WHERE `id_konsultasi` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Konsultasi dibatalkan');location.href='$_SERVER[PHP_SELF]?module=konsul_user';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=konsul_user';</script>";
 }

?>


<?php } 
else if($stt=="hasil"){
?>

<?php
$id_konsultasi=$_GET["idk"];
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where id_konsultasi='$id_konsultasi'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id=$d["id"];
    $tgl_konsul=$d["tgl_konsul"];
?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Hasil Kasus Baru</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Ciri-ciri</th>
                                                    <th scope="col">Bobot</th>
													<th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='4'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{

   
		
		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php 
  
  $id_fitur=$r['id_fitur'];
 $q = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
 $d=mysqli_fetch_array($q); 
 $id=$d['id'];
 $name_f=$d['name'];
#echo $name_f."($id)";
echo $name_f;

  ?></td>
  <td align="center"><?php 

$id_fitur=$r['id_fitur'];
$id_atribut=$r['id_atribut'];
 $q = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='$id_atribut' and fitur_id='$id_fitur'") or die (mysqli_error());
 $d=mysqli_fetch_array($q); 
 $id=$d['id'];
 $bobot=$d['bobot'];
echo $bobot;

  ?></td>  
   <td align="center">
   <a href="<?php 
   
   $id_detail=$r['id_detail'];
   $id_konsultasi=$r['id_konsultasi'];
   
   echo "$_SERVER[PHP_SELF]?module=edit_fitur&id=".$r['id_detail']."&idk=".$r['id_konsultasi'] ?>"><i class="fa fa-edit"></i></a> 
 </td>
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>			
											
								</table>
	
	
	<a href="media.php?module=hitung_user"><button type="button" class="btn btn-primary mb-3">Lanjut ke Perhitungan</button></a>	
	<!--  -->							
	
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
$nama_indo=$_POST['nama_indo'];
  $nama_indo=strtoupper($nama_indo);
  
$gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"application/gambar/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}
  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET 
                           name='$name',
						   nama_indo='$nama_indo',
						   gambar='$gambar',
						   keterangan='$keterangan'
						   WHERE id = '$id'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=konsul_user';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=konsul_user';</script>";

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
                                                <option value="name">Nama Fitur</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=konsul_user";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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
                                                    <th scope="col">Nama Fitur</th>
													<th scope="col">Nama Indo</th>
													<th scope="col">Keterangan</th>
													<th scope="col">Gambar</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE `$listcari` like '%$txtcari%' order by `id` asc") or die (mysqli_error());
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
  <td align="center"><?php echo $r['name'] ?></td>  
  <td align="center"><?php echo $r['nama_indo'] ?></td>  
  <td align="center"><?php echo $r['keterangan'] ?></td>
  <td align="center"><img src="<?php echo"application/gambar/".$r['gambar'];?>"  class="avatar user-thumb"  alt="avatar" width='36' height='36'/></td>   
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=konsul_user&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=konsul_user&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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