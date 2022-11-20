 <?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<center><a href="dashboard.php?module=konsultasi&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Start Diagnosis</button></a></center>
					    <div class="table-responsive">
                          			
                        </div>
                        
                                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa order by `id_diagnosa` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="D".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_diagnosa="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_diagnosa=$d["id_diagnosa"];
            if(substr($id_diagnosa,3,2)==$bl){
                $urut=substr($id_diagnosa,5,4)+1;
                    if($urut<10){$id_diagnosa="$kd"."00".$urut;}
                    else if($urut<100){$id_diagnosa="$kd"."0".$urut;}
                    else{$id_diagnosa="$kd".$urut;}
                }
            else{$id_diagnosa="$kd"."001";}
			}
?>



<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Diagnosa</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Nama Gejala</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbgejala") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='3'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 70;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q2  = mysqli_query($koneksi, "SELECT * FROM tbgejala LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q2)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['nama_gejala']?></td>
  <td align="center"><input type="checkbox" name="id_gejala[]" value="<?php echo $r['id_gejala']?>"></td>
  
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>			
											
								</table><center>
                                        <button type="submit" class="btn btn-primary mb-3 mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3 mb-3">Batal</button>
								</center>
								</form>	
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>

     </div>
                </div>


<?php 
if(isset($_POST['Simpan'])){
  $q = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa order by `id_diagnosa` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="D".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_diagnosa="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_diagnosa=$d["id_diagnosa"];
            if(substr($id_diagnosa,3,2)==$bl){
                $urut=substr($id_diagnosa,5,4)+1;
                    if($urut<10){$id_diagnosa="$kd"."00".$urut;}
                    else if($urut<100){$id_diagnosa="$kd"."0".$urut;}
                    else{$id_diagnosa="$kd".$urut;}
                }
            else{$id_diagnosa="$kd"."001";}
			}
			$tgl=date('Y-m-d');
			$id_masuk=$_SESSION['id_masuk'];
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbdiagnosa VALUES('$id_diagnosa', '$tgl', '$id_masuk', '', '')") or die(mysqli_error()); 
   $jumlah = count($_POST['id_gejala']); 
   $hobi = $_POST["id_gejala"];
   foreach ($hobi as $nilai) {
	   
	   
	   
      $querytambah = mysqli_query($koneksi, "INSERT INTO tbdetail_diagnosa VALUES('', '$id_diagnosa', '$nilai')") or die(mysqli_error()); 
   }
   
   
  echo"<script>location.href='$_SERVER[PHP_SELF]?module=konsultasi&stt=tampil&idg=$id_diagnosa';</script>";
  
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbdiagnosa WHERE `id_diagnosa` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=konsultasi';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=konsultasi';</script>";
 }

?>


<?php } 
else if($stt=="cek"){
?>

<?php
$id_diagnosa=$_GET["idg"];

$query = mysqli_query($koneksi, "SELECT * FROM `tbdetail_diagnosa` where id_diagnosa='$id_diagnosa'") or die (mysqli_error());
   while($r = mysqli_fetch_array($query)){
	 $id_gejala=$r['id_gejala'];
	 //SELECT * FROM tbpengetahuan WHERE id_penyakit='K1912001'
	 
			 $q1 = mysqli_query($koneksi, "SELECT * FROM tbpenyakit order by id_penyakit asc") or die (mysqli_error());
		   while($r1 = mysqli_fetch_array($q1)){
			 $id_penyakit=$r1['id_penyakit'];

		 $q2 = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan WHERE id_penyakit='$id_penyakit'") or die (mysqli_error());
		   while($r2 = mysqli_fetch_array($q2)){
			    $id_g=$r2['id_gejala'];
				
				if($id_gejala==$id_g){
			 $querytambah = mysqli_query($koneksi, "INSERT INTO tbhasil_diagnosa VALUES('', '$id_diagnosa', '$id_penyakit', '$id_gejala')") or die(mysqli_error());
			 }
			 else{}
				
			   
		   }
	
			
			
			 
		   }
	 
	 

	 
   }
echo"<script>location.href='$_SERVER[PHP_SELF]?module=konsultasi&stt=cek2&idg=$id_diagnosa';</script>";

?>





<?php
}
else if($stt=="tampil"){
?>


<?php

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6>Data Gejala yang dipilih :</h6>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php
								$id_diagnosa=$_GET['idg'];	   
								$no=1;
	  $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_diagnosa,tbdiagnosa,tbgejala where tbdetail_diagnosa.id_diagnosa=tbdiagnosa.id_diagnosa and tbdetail_diagnosa.id_gejala=tbgejala.id_gejala and tbdiagnosa.id_diagnosa='$id_diagnosa' order by tbdetail_diagnosa.id_detail asc") or die (mysqli_error());
      while($r = mysqli_fetch_array($query)){
		$nama_gejala=$r['nama_gejala'];  
		$id_gejala=$r['id_gejala'];
		  echo "$no. ".$nama_gejala." [$id_gejala]<br>";
		  $no++;
	  }  
									   
									   ?>
									   <br>
									   
                            </div>
														
   <a href="<?php echo"$_SERVER[PHP_SELF]?module=konsultasi&stt=cek&idg=$id_diagnosa";?>"><button type="button" class="btn btn-primary mb-3">Proses</button></a>		   

                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>

</div>
</div>







<?php
}	
else if ($stt=="cek2"){

?>
<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Terkait
							 <br>
							 <br>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
							<table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Nama Penyakit</th>
													<th scope="col">Id gejala</th>
													<th scope="col">Hasil</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
									   $id_diagnosa=$_GET['idg'];
$query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit,tbhasil_diagnosa WHERE  tbpenyakit.id_penyakit=tbhasil_diagnosa.id_penyakit and tbhasil_diagnosa.id_diagnosa='$id_diagnosa' group by tbpenyakit.id_penyakit asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='4'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
$noi=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $noi."." ?></td>
  <td align="center"><?php echo $r['nama_penyakit'] ?></td>
  <td align="center"><?php 
  
  
  $id_penyakit=$r['id_penyakit'];
  $no=1;
  
  
  
  $q1 = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan WHERE  id_penyakit='$id_penyakit' order by id_pengetahuan asc") or die (mysqli_error());
  $jumTotal=mysqli_num_rows($q1);
  $tot=0; 
$bot=0;
 while($r1 = mysqli_fetch_array($q1)){
	  $id_gejala=$r1['id_gejala'];
	  $G=$r1['id_gejala'];
	 # $bobot_gejala=$r1['bobot_gejala'];
	  
	  $q2 = mysqli_query($koneksi, "SELECT * FROM tbhasil_diagnosa WHERE  id_penyakit='$id_penyakit' and id_gejala='$id_gejala' and id_diagnosa='$id_diagnosa'") or die (mysqli_error());  
	  if(mysqli_num_rows($q2) == 0)
	  {$isi="Tidak Sama"; $T=0;}
	  else{$isi="Sama"; $T=1;}
	  
	  #$a=$T*$bobot_gejala;
	  $tot+=$T;
	  #$bot+=$bobot_gejala;
	  echo"$no. $G->$isi=$T<br>";
	  
	  $no++;
  }
  
 $q3 = mysqli_query($koneksi, "SELECT * FROM tbdetail_diagnosa WHERE id_diagnosa='$id_diagnosa'") or die (mysqli_error());   
 $jumTotalLama=mysqli_num_rows($q3); 
  
  echo"Total = $jumTotal<br>";
  $jumS=$jumTotal-$tot;
  $jumB=$jumTotalLama-$tot;
  
  
  $atas=2*$tot;
  $baw1=$atas+$jumS+$jumB;
  
  echo "Atas (2 * $tot)=$atas 
  
  <br>Bawah (2 * $tot) + [$jumS + $jumB]=$baw1";
  $has=$atas/$baw1;
  $has=round($has,2);
  #echo"<hr>$has";


  ?></td>
  <td align="center"><?php echo $has ?></td>

 </tr>
 <?php
  $qqw = mysqli_query($koneksi, "SELECT * FROM tbhasil where id_diagnosa='$id_diagnosa' and id_penyakit='$id_penyakit'") or die (mysqli_error());
   if(mysqli_num_rows($qqw) == 0){
	   
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbhasil VALUES('', '$id_diagnosa', '$id_penyakit', '$has')") or die(mysqli_error());
   }
   else{
	$queryupdate = mysqli_query($koneksi, "UPDATE tbhasil SET 
						   hasil='$has'
						   WHERE id_penyakit = '$id_penyakit' and id_diagnosa='$id_diagnosa'");   
	   
   }
 
 $noi++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>
                                </table>	
	

<?php
									   $id_diagnosa=$_GET['idg'];
$q3 = mysqli_query($koneksi, "SELECT * FROM tbhasil WHERE id_diagnosa='$id_diagnosa' order by hasil desc") or die (mysqli_error());
 $r3 = mysqli_fetch_array($q3);  
 $id_penyakit=$r3['id_penyakit'];
 $hasil=$r3['hasil'];
 $akurasi=$hasil*100;
 
 
 $q4 = mysqli_query($koneksi, "SELECT * FROM tbpenyakit,tbsolusi WHERE tbsolusi.id_penyakit=tbpenyakit.id_penyakit and tbpenyakit.id_penyakit='$id_penyakit'") or die (mysqli_error());
  $r4 = mysqli_fetch_array($q4); 
  $nama_penyakit=$r4['nama_penyakit'];
  $nama_solusi=$r4['nama_solusi'];
  
 echo"Anda Terindikasi Penyakit: $nama_penyakit<br>
 Akurasi : $akurasi % <br>
 Solusi : $nama_solusi
 ";
 
 
  $queryupdate = mysqli_query($koneksi, "UPDATE tbdiagnosa SET 
                           id_penyakit='$id_penyakit',
						   hasil_diagnosa='$hasil'
												   
						   WHERE id_diagnosa = '$id_diagnosa'");
 
?>	
								
								
                            </div>
                        </div>
<center><a href="<?php   $id_diagnosa=$_GET['idg']; echo"dashboard.php?module=konsultasi&stt=akhir&idg=$id_diagnosa";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Hasil Akhir</button></a></center>
						</div>
                     <!-- End Form Elements -->
                </div>

<hr>




 </div>

 </div>
	


<?php
} else if ($stt=="akhir"){
	$id_diagnosa=$_GET['idg'];
?>

<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  
                    <!--
					
					-->
                    
                   <div class="x_title">
					
					 <div class="clearfix"></div>
					    </div>
               
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
					<?php
$id_diagnosa=$_GET['idg'];
$id=$_GET['idg'];
#include"hapus_proses_diagnosa.php";

  $query1 = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpengguna where tbdiagnosa.id_pengguna=tbpengguna.id_pengguna and tbdiagnosa.id_diagnosa='$id_diagnosa'") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $nama=$r1['nama'];
   $email=$r1['email'];
   $tinggi_badan=$r1['tinggi_badan'];
   
   $tanggal=$r1['tanggal'];
  
   $pisah=explode("-",$tanggal);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
   $berat_badan=$r1['berat_badan'];
   $jenis_kelamin=$r1['jenis_kelamin'];
   $telepon=$r1['telepon'];   
   
   }

?>	
<table width="780" class="table1" border="1" align="center" cellpadding="10">
  <tr>
    <td>
	<center>

	
 <table width="100%" class="table1" border="1" cellpadding="10">
  <tr>
    <td align="right">
	<center>
	
	
	
	LAPORAN HASIL DIAGNOSA <?php $tgl=date('d-m-Y'); echo"TANGGAL $tgl"; ?>
	</center>
	</td>
    
  </tr>
</table>
<br>

</center>


		
<table width="100%" class="table1" border="1" cellpadding="10">
  <tr>
    <td width="25%" valign="top">Nama Pengguna</td>
    <td width="5" valign="top">:</td>
    <td width="466" valign="top"><?php echo $nama;?></td>
  </tr>
  
   <tr>
    <td valign="top">Email</td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $email;?></td>
  </tr>
 
</table>						
									

<br>
                    <h7>Rincian Gejala :</h7>
                        
                           <table width="50%" class="table1" border="1" style="font-size:14px;">
                                            <thead>
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Gejala yang dialami</th>
													
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $id_diagnosa=$_GET['idg'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_diagnosa,tbgejala where tbdetail_diagnosa.id_gejala=tbgejala.id_gejala and tbdetail_diagnosa.id_diagnosa='$id_diagnosa' order by tbdetail_diagnosa.id_detail asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='2'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{

		
		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['nama_gejala']?></td>
  
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>			
											
								</table>
                                        
								
              <br>          
 <h7>Hasil Diagnosa :</h7><br>
 <?php
 $id_diagnosa=$_GET['idg'];
  $query1 = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpenyakit where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_diagnosa='$id_diagnosa'") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $nama_penyakit=$r1['nama_penyakit'];
   $id_penyakit=$r1['id_penyakit'];
   $hasil_diagnosa=$r1['hasil_diagnosa'];
  $hasil_diagnosa=$hasil_diagnosa*100;

   }
 ?>
 Anda dinyatakan Terindikasi penyakit <?php echo $nama_penyakit; ?> <br>
 Tingkat Akurasi : <?php echo $hasil_diagnosa; ?> %.
 
 
                  
<hr>
 <?php
  $query1 = mysqli_query($koneksi, "SELECT * FROM tbsolusi where id_penyakit='$id_penyakit'") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $nama_solusi=$r1['nama_solusi'];
echo"Solusi: $nama_solusi";
   }
 ?>



    </td>
  </tr>
</table>
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
	 <div class="clearfix"></div>
<?php
}
?>