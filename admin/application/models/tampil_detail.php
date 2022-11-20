
<div class="card mt-5">
                    <div class="card-body">
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
													<th scope="col">Id Kasus</th>
                                                    <th scope="col">Hasil</th>
													<th scope="col">Type</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
									   $id_konsultasi=$_GET['idk'];
  $q9 = mysqli_query($koneksi, "SELECT * FROM tbhasil_cek WHERE id_konsultasi='$id_konsultasi' order by hasil desc limit 1") or die (mysqli_error());
   if(mysqli_num_rows($q9) == 0){}
   else{
	   $r9 = mysqli_fetch_array($q9);
	   $hasil=$r9['hasil'];
	   
   }

									   
									   
									   
   $query = mysqli_query($koneksi, "SELECT * FROM tbhasil_cek WHERE id_konsultasi='$id_konsultasi' and hasil='$hasil' order by hasil desc limit 2") or die (mysqli_error());
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
  <td align="center"><?php echo $r['id_kasus'] ?></td>
  <td align="center"><?php echo $r['hasil'] ?></td>  
  <td align="center"><?php echo $r['type'] ?></td>  
 </tr>
 <?php
 $id_kasus=$r['id_kasus'];
 $queryupdate = mysqli_query($koneksi, "UPDATE tbpengetahuan SET status='B' WHERE id = '$id_kasus'");
 
 $no++;
  endwhile;
  #$queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET status_konsul='S' WHERE id_konsultasi = '$id_konsultasi'");
  }
 ?>
 
 
                                     
                                    </tbody>
                                </table>
                                </form>
								
								
<?php
$q3 = mysqli_query($koneksi, "SELECT * FROM tbthreshold where id='1'") or die (mysqli_error());
$r3 = mysqli_fetch_array($q3);
$nilai=$r3['nilai'];
echo"Batas Threshold : $nilai<br><br>";





$id_konsultasi=$_GET['idk'];

$q9 = mysqli_query($koneksi, "SELECT * FROM tbhasil_cek WHERE id_konsultasi='$id_konsultasi' order by hasil desc limit 1") or die (mysqli_error());
   if(mysqli_num_rows($q9) == 0){}
   else{
	   $r9 = mysqli_fetch_array($q9);
	   $hasil=$r9['hasil'];
	   
   }

   
   
$q4 = mysqli_query($koneksi, "SELECT * FROM tbhasil_cek WHERE id_konsultasi='$id_konsultasi' and hasil='$hasil' order by hasil desc limit 1") or die (mysqli_error());
$r4 = mysqli_fetch_array($q4);
$hasil1=$r4['hasil'];
$type1=$r4['type'];
$id_kasus1=$r4['id_kasus'];
$queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET no_kasus='$id_kasus1', nilai='$hasil1' WHERE id_konsultasi = '$id_konsultasi'");

#$hasil="0.85";
#echo "OK : $id_kasus";

if($hasil=="1"){
	include"data_baru.php";
	echo"Didapatkan Nilai : $hasil <br>Pada Kasus ke : $id_kasus1 <br> Type : $type1<br>";
}
else if($hasil<1){
	

if($hasil>$nilai){
		include"data_baru.php";
	#include"masuk_data_master.php";
	echo"Didapatkan Nilai : $hasil <br>Pada Kasus ke : $id_kasus1 <br> Type : $type1<br> diatas Threshold";
	#echo"Data baru ";
	
	
	
	}	
else{
		include"data_baru.php";

	echo"Didapatkan Nilai : $hasil <br>Pada Kasus ke : $id_kasus1 <br> Type : $type1<br> di bawah Threshold";}
	
}


?>								
<hr>	


<?php
$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];
$load = microtime();
$loadtime = explode(' ', microtime()); 
$loadtime = $loadtime[0]+$loadtime[1]-$starttime; 

echo "Waktu Proses ".number_format($load,2)." seconds";
$id_konsultasi=$_GET['idk'];
?><hr>
						  <a href="<?php 
						  
						  $module=$_GET['mn'];
						  
						  echo "media.php?module=$module";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

</div>
</div>



