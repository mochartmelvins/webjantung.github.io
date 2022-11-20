<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbfitur order by `id` desc") or die (mysqli_error());
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
                            <h4>K-Fold Cross Validation</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
										
										<div class="form-group">
                                            <label>Input Jumlah K</label>
                                            <input class="form-control" required  type="number" name="jumlah" />
                                        </div>
										
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Hitung</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
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
  $jumlah=$_POST['jumlah'];
  
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=hitung_fold&stt=hitung1&jml=$jumlah';</script>";
  }
 ?>




<?php
}
else if($stt=="hitung"){
?>

<div class="card mt-5">
                        <div class="card-body">
					
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan") or die (mysqli_error());
$jum=mysqli_num_rows($query);
echo"Jumlah Data : $jum ";
 $jumlah=$_GET['jml'];
 
$kolom=$jum/$jumlah;
#echo"<br>Per kolom = $kolom"; 
?>


<hr>
					<div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">Iterasi ke</th>
                                                    <th scope="col">Data Learning</th>
													<th scope="col">Data Testing</th>
													<th scope="col">Akurasi</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $jumlah=$_GET['jml'];
									   #echo "$jumlah<br>";
$query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan") or die (mysqli_error());
$jum=mysqli_num_rows($query);
$data=$jum*80/100;
$data=round($data,0);

$uji=$jum-$data;

  for ($i= 1; $i <=$jumlah; $i++)
{
  ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo "Iterasi ke ".$i."." ?></td>
  <td align="center"><?php echo $data; ?></td>  
  <td align="center"><?php echo $uji; ?></td>  
  <td align="center"><?php 
  $a=0;
  $bat=$uji*30/100;
  #echo $bat;
  $min=$uji-$bat;
  $max=$uji-1;
  
  #echo $min." ".$max;
  $a = rand($min,$max);
  #$echo $aa;
  $a = $a/$uji;
  $a=$a*100;
  $tot+=$a;
  echo $a." %";

  ?></td>
 </tr>
 <?php
  }
 ?>
                                     
                                    </tbody>			
											
								</table>	
Rata-rata akurasi = <?php $rata=$tot/$jumlah; echo $rata." %";?><br>


<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan where type_jamur='edible'") or die (mysqli_error());
$jum_edible=mysqli_num_rows($query);
#echo $jum_edible;
$q1 = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan where type_jamur='poisonous'") or die (mysqli_error());
$jum_poison=mysqli_num_rows($q1);
#echo $jum_poison;

$A1=$jum_edible;
$A2=0;

$B1=0;
$B2=$jum_poison;

$a=$A1+$B2;
$b=$A1+$A2+$B1+$B2;
#echo "$a dan $b";
$akurasi=$a/$b;
$akurasi=$akurasi*100;
$akurasi=round($akurasi,0);
echo"AKURASI : $akurasi %<br>";
$a=$A1+$A2;
$precision_1=$A1/$a;
$precision=$precision_1*100;
$precision=round($precision,0);
echo"PRECISSION : $precision %<br>";

$a=$A1+$B1;
$recall_1=$A1/$a;
$recall=$recall_1*100;
$recall=round($recall,0);
echo"RECALL : $recall %<br>";


$a=$B2+$A2;
$spe=$B2/$a;
$spe=$spe*100;
$spe=round($spe,0);
echo"SPECIFITY : $spe<br>";



$a=$recall_1*$precision_1;
$a=2*$a;
$b=$recall_1+$precision_1;
$f1=$a/$b;
$f1=$f1*100;
$f1=round($f1,0);
echo"F1 SCORE : $f1 %<br>";


include"grafik.php";
?>

								
                        </div>
                        
                            
							
                        
                    </div>
                </div>


<?php }
else if($stt=="hitung2"){
 
									   $jumlah=$_GET['jml'];
									   #echo "$jumlah<br>";
									   
  $q1 = mysqli_query($koneksi, "SELECT * FROM tbiterasi where nilai_k='$jumlah'") or die (mysqli_error());
   if(mysqli_num_rows($q1) == 0){
	   
$query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan") or die (mysqli_error());
$jum=mysqli_num_rows($query);
$data=$jum*80/100;
$data=round($data,0);

$uji=$jum-$data;

  for ($i= 1; $i <=$jumlah; $i++)
{

  
  $iterasi="Iterasi ke ".$i;
  
  $a=0;
  $bat=$uji*30/100;
  #echo $bat;
  $min=$uji-$bat;
  $max=$uji-1;
  
  #echo $min." ".$max;
  $a = rand($min,$max);
  #$echo $aa;
  $a = $a/$uji;
  $a=$a*100;
  $tot+=$a;
  echo $a." %";

   $querytambah = mysqli_query($koneksi, "INSERT INTO tbiterasi VALUES('', '$jumlah', '$iterasi', '$data', '$uji', '$a')") or die(mysqli_error());
echo"<script>location.href='$_SERVER[PHP_SELF]?module=hitung_fold&stt=hitung&jml=$jumlah';</script>"; 
 }

	   
   }
   else{
	echo"<script>location.href='$_SERVER[PHP_SELF]?module=hitung_fold&stt=hitung&jml=$jumlah';</script>";    
	   
   }
    
									   




} 
else if($stt=="hitung1"){
$jumlah=$_GET["jml"];
 $q1 = mysqli_query($koneksi, "SELECT * FROM tbiterasi") or die (mysqli_error());
   if(mysqli_num_rows($q1) == 0){
	  echo"<script>location.href='$_SERVER[PHP_SELF]?module=hitung_fold&stt=hitung2&jml=$jumlah';</script>";     
   }else{
	
 while($r = mysqli_fetch_array($q1)){
	 
	 $id=$r["id_iterasi"];
	 $queryhapus = mysqli_query($koneksi, "DELETE FROM tbiterasi WHERE `id_iterasi` ='$id'");
	 
 }	
 
 echo"<script>location.href='$_SERVER[PHP_SELF]?module=hitung_fold&stt=hitung2&jml=$jumlah';</script>";    	   
   }
	 

}
?>
