<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
	 $id_masuk=$_SESSION['id_masuk'];
 #echo $id_masuk;
?>
<div class="card mt-5">
                    <div class="card-body">
					
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Perhitungan</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                        
                                        
                                        <div class="form-group">
<label>Kasus Konsultasi</label>
<select class="form-control" name="id_konsultasi" required>
<option value="">-- Pilih Kasus --</option>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where id_pengunjung='$id_masuk' and status_konsul='B' order by `id_konsultasi` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Kasus masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_konsultasi'] ?>"><?php echo "$no. Konsultasi (".$r['tgl_konsul'].")"; ?></option>
 <?php
 $no++;
 endwhile;
 
}	
		?>
        
  </select>
</div>	
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Tampilkan</button>
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
	
  $id_konsultasi=$_POST['id_konsultasi'];
  if($id_konsultasi==""){
	  
	    echo"<script>alert('Id Konsultasi Kosong');location.href='$_SERVER[PHP_SELF]?module=hitung_user';</script>";
  }
  else{
  
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=hitung_user&stt=tampil&idk=$id_konsultasi';</script>";
  }
  
  }
 ?>





<?php
}
else if($stt=="tampil"){
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
                                   
                                    <table class="table1">
									
                                            
                                                <tr>
                                                    <th scope="col">No</th>
													<th scope="col">Ciri-ciri</th>
                                                    <th scope="col">Bobot</th>
                                                </tr>
                                            
                                       
                                       
                                       <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='3'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{

   
		
		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr>
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
 $q = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='$no' and fitur_id='$id_fitur'") or die (mysqli_error());
 $d=mysqli_fetch_array($q); 
 $id=$d['id'];
 $bobot=$d['bobot'];
echo $bobot;

  ?></td>  
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                   	
											
								</table>
	
	<hr>
	Data Kasus Lama 1
	<hr>
	
	<?php
	
	 $q4 = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan") or die (mysqli_error());
     $jmldata = mysqli_num_rows($q4);

	for ($i= 1; $i <=$jmldata; $i++)
{
 
	
	?>
	
	
	<?php
						
  $query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan where id='$i'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){}
   else{
	   
	  $r = mysqli_fetch_array($query);
	  $data=$r['collection'];
	  $type=$r['type_jamur'];
	  #echo $data."<hr>";
	  $t=explode("}",$data);
	  
	  $string1 = $t[0];
      $result1 = preg_replace("/[^0-9]/", "", $string1);
	  $r1=explode("{",$t[0]);
	  $t1=',"1":{'.$r1[2];
	  $s1=substr($t1,11,2);
	  $result1 = preg_replace("/[^0-9]/", "", $s1);
	  echo "1. ".$result1."<br>";
	  
	 
	  
	  #echo $t[1]."<br>";
	  $s2=substr($t[1],11,2);
	  $result2 = preg_replace("/[^0-9]/", "", $s2);
	  echo "2. ".$result2."<br>";
	  
	  
	  
	 # echo $t[2]."<br>";
	  $s3=substr($t[2],11,2);
	  $result3 = preg_replace("/[^0-9]/", "", $s3);
	  echo "3. ".$result3."<br>";
	  
	  #echo $t[3]."<br>";
	  $s4=substr($t[3],11,2);
	  $result4 = preg_replace("/[^0-9]/", "", $s4);
	  echo "4. ".$result4."<br>";
	  
	  #echo $t[4]."<br>";
	  $s5=substr($t[4],11,2);
	  $result5 = preg_replace("/[^0-9]/", "", $s5);
	  echo "5. ".$result5."<br>";
	  
	  #echo $t[5]."<br>";
	  $s6=substr($t[5],11,2);
	  $result6 = preg_replace("/[^0-9]/", "", $s6);
	  echo "6. ".$result6."<br>";
	  
	  #echo $t[6]."<br>";
	  $s7=substr($t[6],11,2);
	  $result7 = preg_replace("/[^0-9]/", "", $s7);
	  echo "7. ".$result7."<br>";
	  
	  #echo $t[7]."<br>";
	  $s8=substr($t[7],11,2);
	  $result8 = preg_replace("/[^0-9]/", "", $s8);
	  echo "8. ".$result8."<br>";
	  
	  #echo $t[8]."<br>";
	  $s9=substr($t[8],11,2);
	  $result9 = preg_replace("/[^0-9]/", "", $s9);
	  echo "9. ".$result9."<br>";
	  
	  #echo $t[9]."<br>";
	  $s10=substr($t[9],12,2);
	  $result10 = preg_replace("/[^0-9]/", "", $s10);
	  echo "10. ".$result10."<br>";
	  
	  	  
	  #echo $t[10]."<br>";
	  $s11=substr($t[10],12,2);
	  $result11 = preg_replace("/[^0-9]/", "", $s11);
	  echo "11. ".$result11."<br>";
	  
	  #echo $t[11]."<br>";
	  $s12=substr($t[11],12,2);
	  $result12 = preg_replace("/[^0-9]/", "", $s12);
	  echo "12. ".$result12."<br>";
	  
	  #echo $t[12]."<br>";
	  $s13=substr($t[12],12,2);
	  $result13 = preg_replace("/[^0-9]/", "", $s13);
	  echo "13. ".$result13."<br>";
	  
	  #echo $t[13]."<br>";
	  $s14=substr($t[13],12,2);
	  $result14 = preg_replace("/[^0-9]/", "", $s14);
	  echo "14. ".$result14."<br>";
	  
	  #echo $t[14]."<br>";
	  $s15=substr($t[14],12,2);
	  $result15 = preg_replace("/[^0-9]/", "", $s15);
	  echo "15. ".$result15."<br>";
	  
	  #echo $t[15]."<br>";
	  $s16=substr($t[15],12,2);
	  $result16 = preg_replace("/[^0-9]/", "", $s16);
	  echo "16. ".$result16."<br>";
	  
	  #echo $t[16]."<br>";
	  $s17=substr($t[16],12,2);
	  $result17 = preg_replace("/[^0-9]/", "", $s17);
	  echo "17. ".$result17."<br>";
	  
	  #echo $t[17]."<br>";
	  $s18=substr($t[17],12,2);
	  $result18 = preg_replace("/[^0-9]/", "", $s18);
	  echo "18. ".$result18."<br>";
	  
	  #echo $t[18]."<br>";
	  $s19=substr($t[18],12,2);
	  $result19 = preg_replace("/[^0-9]/", "", $s19);
	  echo "19. ".$result19."<br>";
	  
	  #echo $t[19]."<br>";
	  $s20=substr($t[19],12,2);
	  $result20 = preg_replace("/[^0-9]/", "", $s20);
	  echo "20. ".$result20."<br>";
	  
	  #echo $t[20]."<br>";
	  $s21=substr($t[20],12,2);
	  $result21 = preg_replace("/[^0-9]/", "", $s21);
	  echo "21. ".$result21."<br>";
	  
	  # echo $t[21]."<br>";
	  $s22=substr($t[21],12,2);
	  $result22 = preg_replace("/[^0-9]/", "", $s22);
	  echo "22. ".$result22."<br>";
	  
   }
    
     
						
						?>
						
						
		<table class="table1">
									
                                            
                                                <tr>
                                                    <th scope="col">No</th>
													<th scope="col">Ciri-ciri</th>
                                                    <th scope="col">Bobot</th>
                                                </tr>
                                            
  
 <tr>
  <td align="center">1.</td>
  <td align="center"><?php 
 $q1 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result1'") or die (mysqli_error());
   $r1 = mysqli_fetch_array($q1);
	  $name1=$r1['name'];
	  echo $name1;

  ?></td>
  <td align="center"><?php 
 $q1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' and fitur_id='$result1'") or die (mysqli_error());
   $r1 = mysqli_fetch_array($q1);
	  $bobot1=$r1['bobot'];
	  echo $bobot1;

  ?></td>  
 </tr>
 
 
 <tr>
  <td align="center">2.</td>
  <td align="center"><?php 
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result2'") or die (mysqli_error());
   $r2 = mysqli_fetch_array($q2);
	  $name2=$r2['name'];
	  echo $name2;

  ?></td>
  <td align="center"><?php 
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' and fitur_id='$result2'") or die (mysqli_error());
   $r2 = mysqli_fetch_array($q2);
	  $bobot2=$r2['bobot'];
	  echo $bobot2;

  ?></td>  
 </tr>
 
 
 <tr>
  <td align="center">3.</td>
  <td align="center"><?php 
 $q3 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result3'") or die (mysqli_error());
   $r3 = mysqli_fetch_array($q3);
	  $name3=$r3['name'];
	  echo $name3;

  ?></td>
  <td align="center"><?php 
 $q3 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' and fitur_id='$result3'") or die (mysqli_error());
   $r3 = mysqli_fetch_array($q3);
	  $bobot3=$r3['bobot'];
	  echo $bobot3;

  ?></td>  
 </tr>
 
 
 <tr>
  <td align="center">4.</td>
  <td align="center"><?php 
 $q4 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result4'") or die (mysqli_error());
   $r4 = mysqli_fetch_array($q4);
	  $name4=$r4['name'];
	  echo $name4;

  ?></td>
  <td align="center"><?php 
 $q4 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' and fitur_id='$result4'") or die (mysqli_error());
   $r4 = mysqli_fetch_array($q4);
	  $bobot4=$r4['bobot'];
	  echo $bobot4;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">5.</td>
  <td align="center"><?php 
 $q5 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result5'") or die (mysqli_error());
   $r5 = mysqli_fetch_array($q5);
	  $name5=$r5['name'];
	  echo $name5;

  ?></td>
  <td align="center"><?php 
 $q5 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' and fitur_id='$result5'") or die (mysqli_error());
   $r5 = mysqli_fetch_array($q5);
	  $bobot5=$r5['bobot'];
	  echo $bobot5;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">6.</td>
  <td align="center"><?php 
 $q6 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result6'") or die (mysqli_error());
   $r6 = mysqli_fetch_array($q6);
	  $name6=$r6['name'];
	  echo $name6;

  ?></td>
  <td align="center"><?php 
 $q6 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' and fitur_id='$result6'") or die (mysqli_error());
   $r6 = mysqli_fetch_array($q6);
	  $bobot6=$r6['bobot'];
	  echo $bobot6;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">7.</td>
  <td align="center"><?php 
 $q7 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result7'") or die (mysqli_error());
   $r7 = mysqli_fetch_array($q7);
	  $name7=$r7['name'];
	  echo $name7;

  ?></td>
  <td align="center"><?php 
 $q7 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' and fitur_id='$result7'") or die (mysqli_error());
   $r7 = mysqli_fetch_array($q7);
	  $bobot7=$r7['bobot'];
	  echo $bobot7;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">8.</td>
  <td align="center"><?php 
 $q8 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result8'") or die (mysqli_error());
   $r8 = mysqli_fetch_array($q8);
	  $name8=$r8['name'];
	  echo $name8;

  ?></td>
  <td align="center"><?php 
 $q8 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' and fitur_id='$result8'") or die (mysqli_error());
   $r8 = mysqli_fetch_array($q8);
	  $bobot8=$r8['bobot'];
	  echo $bobot8;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">9.</td>
  <td align="center"><?php 
 $q9 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result9'") or die (mysqli_error());
   $r9 = mysqli_fetch_array($q9);
	  $name9=$r9['name'];
	  echo $name9;

  ?></td>
  <td align="center"><?php 
 $q9 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' and fitur_id='$result9'") or die (mysqli_error());
   $r9 = mysqli_fetch_array($q9);
	  $bobot9=$r9['bobot'];
	  echo $bobot9;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">10.</td>
  <td align="center"><?php 
 $q10 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result10'") or die (mysqli_error());
   $r10 = mysqli_fetch_array($q10);
	  $name10=$r10['name'];
	  echo $name10;

  ?></td>
  <td align="center"><?php 
 $q10 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' and fitur_id='$result10'") or die (mysqli_error());
   $r10 = mysqli_fetch_array($q10);
	  $bobot10=$r10['bobot'];
	  echo $bobot10;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">11.</td>
  <td align="center"><?php 
 $q11 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result11'") or die (mysqli_error());
   $r11 = mysqli_fetch_array($q11);
	  $name11=$r11['name'];
	  echo $name11;

  ?></td>
  <td align="center"><?php 
 $q11 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' and fitur_id='$result11'") or die (mysqli_error());
   $r11 = mysqli_fetch_array($q11);
	  $bobot11=$r11['bobot'];
	  echo $bobot11;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">12.</td>
  <td align="center"><?php 
 $q12 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result12'") or die (mysqli_error());
   $r12 = mysqli_fetch_array($q12);
	  $name12=$r12['name'];
	  echo $name12;

  ?></td>
  <td align="center"><?php 
 $q12 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' and fitur_id='$result12'") or die (mysqli_error());
   $r12 = mysqli_fetch_array($q12);
	  $bobot12=$r12['bobot'];
	  echo $bobot12;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">13.</td>
  <td align="center"><?php 
 $q13 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result13'") or die (mysqli_error());
   $r13 = mysqli_fetch_array($q13);
	  $name13=$r13['name'];
	  echo $name13;

  ?></td>
  <td align="center"><?php 
 $q13 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' and fitur_id='$result13'") or die (mysqli_error());
   $r13 = mysqli_fetch_array($q13);
	  $bobot13=$r13['bobot'];
	  echo $bobot13;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">14.</td>
  <td align="center"><?php 
 $q14 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result14'") or die (mysqli_error());
   $r14 = mysqli_fetch_array($q14);
	  $name14=$r14['name'];
	  echo $name14;

  ?></td>
  <td align="center"><?php 
 $q14 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' and fitur_id='$result14'") or die (mysqli_error());
   $r14 = mysqli_fetch_array($q14);
	  $bobot14=$r14['bobot'];
	  echo $bobot14;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">15.</td>
  <td align="center"><?php 
 $q15 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result15'") or die (mysqli_error());
   $r15 = mysqli_fetch_array($q15);
	  $name15=$r15['name'];
	  echo $name15;

  ?></td>
  <td align="center"><?php 
 $q15 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' and fitur_id='$result15'") or die (mysqli_error());
   $r15 = mysqli_fetch_array($q15);
	  $bobot15=$r15['bobot'];
	  echo $bobot15;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">16.</td>
  <td align="center"><?php 
 $q16 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result16'") or die (mysqli_error());
   $r16 = mysqli_fetch_array($q16);
	  $name16=$r16['name'];
	  echo $name16;

  ?></td>
  <td align="center"><?php 
 $q16 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' and fitur_id='$result16'") or die (mysqli_error());
   $r16 = mysqli_fetch_array($q16);
	  $bobot16=$r16['bobot'];
	  echo $bobot16;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">17.</td>
  <td align="center"><?php 
 $q17 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result17'") or die (mysqli_error());
   $r17 = mysqli_fetch_array($q17);
	  $name17=$r17['name'];
	  echo $name17;

  ?></td>
  <td align="center"><?php 
 $q17 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' and fitur_id='$result17'") or die (mysqli_error());
   $r17 = mysqli_fetch_array($q17);
	  $bobot17=$r17['bobot'];
	  echo $bobot17;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">18.</td>
  <td align="center"><?php 
 $q18 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result18'") or die (mysqli_error());
   $r18 = mysqli_fetch_array($q18);
	  $name18=$r18['name'];
	  echo $name18;

  ?></td>
  <td align="center"><?php 
 $q18 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' and fitur_id='$result18'") or die (mysqli_error());
   $r18 = mysqli_fetch_array($q18);
	  $bobot18=$r18['bobot'];
	  echo $bobot18;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">19.</td>
  <td align="center"><?php 
 $q19 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result19'") or die (mysqli_error());
   $r19 = mysqli_fetch_array($q19);
	  $name19=$r19['name'];
	  echo $name19;

  ?></td>
  <td align="center"><?php 
 $q19 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' and fitur_id='$result19'") or die (mysqli_error());
   $r19 = mysqli_fetch_array($q19);
	  $bobot19=$r19['bobot'];
	  echo $bobot19;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">20.</td>
  <td align="center"><?php 
 $q20 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result20'") or die (mysqli_error());
   $r20 = mysqli_fetch_array($q20);
	  $name20=$r20['name'];
	  echo $name20;

  ?></td>
  <td align="center"><?php 
 $q20 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' and fitur_id='$result20'") or die (mysqli_error());
   $r20 = mysqli_fetch_array($q20);
	  $bobot20=$r20['bobot'];
	  echo $bobot20;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">21.</td>
  <td align="center"><?php 
 $q21 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result21'") or die (mysqli_error());
   $r21 = mysqli_fetch_array($q21);
	  $name21=$r21['name'];
	  echo $name21;

  ?></td>
  <td align="center"><?php 
 $q21 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' and fitur_id='$result21'") or die (mysqli_error());
   $r21 = mysqli_fetch_array($q21);
	  $bobot21=$r21['bobot'];
	  echo $bobot21;

  ?></td>  
 </tr>
 
 <tr>
  <td align="center">22.</td>
  <td align="center"><?php 
 $q22 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$result22'") or die (mysqli_error());
   $r22 = mysqli_fetch_array($q22);
	  $name22=$r22['name'];
	  echo $name22;

  ?></td>
  <td align="center"><?php 
 $q22 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' and fitur_id='$result22'") or die (mysqli_error());
   $r22 = mysqli_fetch_array($q22);
	  $bobot22=$r22['bobot'];
	  echo $bobot22;

  ?></td>  
 </tr>
 	
								</table>				
	
	<br>
	
	<?php
	#$pangkat=2;
	
	$qK1 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='1'") or die (mysqli_error());
	$h1 = mysqli_fetch_array($qK1);
	$id_fitur1=$h1['id_fitur'];
	
	$qK2 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='2'") or die (mysqli_error());
	$h2 = mysqli_fetch_array($qK2);
	$id_fitur2=$h2['id_fitur'];
	
	$qK3 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='3'") or die (mysqli_error());
	$h3 = mysqli_fetch_array($qK3);
	$id_fitur3=$h3['id_fitur'];
	
	$qK4 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='4'") or die (mysqli_error());
	$h4 = mysqli_fetch_array($qK4);
	$id_fitur4=$h4['id_fitur'];
	
	$qK5 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='5'") or die (mysqli_error());
	$h5 = mysqli_fetch_array($qK5);
	$id_fitur5=$h5['id_fitur'];
	
	$qK6 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='6'") or die (mysqli_error());
	$h6 = mysqli_fetch_array($qK6);
	$id_fitur6=$h6['id_fitur'];
	
	$qK7 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='7'") or die (mysqli_error());
	$h7 = mysqli_fetch_array($qK7);
	$id_fitur7=$h7['id_fitur'];
	
	$qK8 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='8'") or die (mysqli_error());
	$h8 = mysqli_fetch_array($qK8);
	$id_fitur8=$h8['id_fitur'];
	
	$qK9 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='9'") or die (mysqli_error());
	$h9 = mysqli_fetch_array($qK9);
	$id_fitur9=$h9['id_fitur'];
	
	$qK10 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='10'") or die (mysqli_error());
	$h10 = mysqli_fetch_array($qK10);
	$id_fitur10=$h10['id_fitur'];
	
	$qK11 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='11'") or die (mysqli_error());
	$h11 = mysqli_fetch_array($qK11);
	$id_fitur11=$h11['id_fitur'];
	
	$qK12 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='12'") or die (mysqli_error());
	$h12 = mysqli_fetch_array($qK12);
	$id_fitur12=$h12['id_fitur'];
	
	$qK13 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='13'") or die (mysqli_error());
	$h13 = mysqli_fetch_array($qK13);
	$id_fitur13=$h13['id_fitur'];
	
	$qK14 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='14'") or die (mysqli_error());
	$h14 = mysqli_fetch_array($qK14);
	$id_fitur14=$h14['id_fitur'];
	
	$qK15 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='15'") or die (mysqli_error());
	$h15 = mysqli_fetch_array($qK15);
	$id_fitur15=$h15['id_fitur'];
	
	$qK16 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='16'") or die (mysqli_error());
	$h16 = mysqli_fetch_array($qK16);
	$id_fitur16=$h16['id_fitur'];
	
	$qK17 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='17'") or die (mysqli_error());
	$h17 = mysqli_fetch_array($qK17);
	$id_fitur17=$h17['id_fitur'];
	
	$qK18 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='18'") or die (mysqli_error());
	$h18 = mysqli_fetch_array($qK18);
	$id_fitur18=$h18['id_fitur'];
	
	$qK19 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='19'") or die (mysqli_error());
	$h19 = mysqli_fetch_array($qK19);
	$id_fitur19=$h19['id_fitur'];
	
	$qK20 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='20'") or die (mysqli_error());
	$h20 = mysqli_fetch_array($qK20);
	$id_fitur20=$h20['id_fitur'];
	
	$qK21 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='21'") or die (mysqli_error());
	$h21 = mysqli_fetch_array($qK21);
	$id_fitur21=$h21['id_fitur'];
	
	$qK22 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='22'") or die (mysqli_error());
	$h22 = mysqli_fetch_array($qK22);
	$id_fitur22=$h22['id_fitur'];
	//--------------------------------------------------------
	
	
	$b1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' and fitur_id='$id_fitur1'") or die (mysqli_error());
    $c1 = mysqli_fetch_array($b1);
	$bob_c1=$c1['bobot'];
	
	$b2 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' and fitur_id='$id_fitur2'") or die (mysqli_error());
    $c2 = mysqli_fetch_array($b2);
	$bob_c2=$c2['bobot'];
	
	$b3 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' and fitur_id='$id_fitur3'") or die (mysqli_error());
    $c3 = mysqli_fetch_array($b3);
	$bob_c3=$c3['bobot'];
	
	$b4 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' and fitur_id='$id_fitur4'") or die (mysqli_error());
    $c4 = mysqli_fetch_array($b4);
	$bob_c4=$c4['bobot'];
	
	$b5 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' and fitur_id='$id_fitur5'") or die (mysqli_error());
    $c5 = mysqli_fetch_array($b5);
	$bob_c5=$c5['bobot'];
	
	$b6 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' and fitur_id='$id_fitur6'") or die (mysqli_error());
    $c6 = mysqli_fetch_array($b6);
	$bob_c6=$c6['bobot'];
	
	$b7 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' and fitur_id='$id_fitur7'") or die (mysqli_error());
    $c7 = mysqli_fetch_array($b7);
	$bob_c7=$c7['bobot'];
	
	$b8 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' and fitur_id='$id_fitur8'") or die (mysqli_error());
    $c8 = mysqli_fetch_array($b8);
	$bob_c8=$c8['bobot'];
	
	$b9 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' and fitur_id='$id_fitur9'") or die (mysqli_error());
    $c9 = mysqli_fetch_array($b9);
	$bob_c9=$c9['bobot'];
	
	$b10 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' and fitur_id='$id_fitur10'") or die (mysqli_error());
    $c10 = mysqli_fetch_array($b10);
	$bob_c10=$c10['bobot'];
	
	$b11 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' and fitur_id='$id_fitur11'") or die (mysqli_error());
    $c11 = mysqli_fetch_array($b11);
	$bob_c11=$c11['bobot'];
	
	$b12 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' and fitur_id='$id_fitur12'") or die (mysqli_error());
    $c12 = mysqli_fetch_array($b12);
	$bob_c12=$c12['bobot'];
	
	$b13 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' and fitur_id='$id_fitur13'") or die (mysqli_error());
    $c13 = mysqli_fetch_array($b13);
	$bob_c13=$c13['bobot'];
	
	$b14 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' and fitur_id='$id_fitur14'") or die (mysqli_error());
    $c14 = mysqli_fetch_array($b14);
	$bob_c14=$c14['bobot'];
	
	$b15 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' and fitur_id='$id_fitur15'") or die (mysqli_error());
    $c15 = mysqli_fetch_array($b15);
	$bob_c15=$c15['bobot'];
	
	$b16 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' and fitur_id='$id_fitur16'") or die (mysqli_error());
    $c16 = mysqli_fetch_array($b16);
	$bob_c16=$c16['bobot'];
	
	$b17 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' and fitur_id='$id_fitur17'") or die (mysqli_error());
    $c17 = mysqli_fetch_array($b17);
	$bob_c17=$c17['bobot'];
	
	$b18 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' and fitur_id='$id_fitur18'") or die (mysqli_error());
    $c18 = mysqli_fetch_array($b18);
	$bob_c18=$c18['bobot'];
	
	$b19 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' and fitur_id='$id_fitur19'") or die (mysqli_error());
    $c19 = mysqli_fetch_array($b19);
	$bob_c19=$c19['bobot'];
	
	$b20 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' and fitur_id='$id_fitur20'") or die (mysqli_error());
    $c20 = mysqli_fetch_array($b20);
	$bob_c20=$c20['bobot'];
	
	$b21 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' and fitur_id='$id_fitur21'") or die (mysqli_error());
    $c21 = mysqli_fetch_array($b21);
	$bob_c21=$c21['bobot'];
	
	$b22 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' and fitur_id='$id_fitur22'") or die (mysqli_error());
    $c22 = mysqli_fetch_array($b22);
	$bob_c22=$c22['bobot'];
	
	
	
	
	//--------------------------------------------------
	if($id_fitur1==$result1){$n1=1;} else {$n1=0;}
	if($id_fitur2==$result2){$n2=1;} else {$n2=0;}
	if($id_fitur3==$result3){$n3=1;} else {$n3=0;}
	if($id_fitur4==$result4){$n4=1;} else {$n4=0;}
	if($id_fitur5==$result5){$n5=1;} else {$n5=0;}
	if($id_fitur6==$result6){$n6=1;} else {$n6=0;}
	if($id_fitur7==$result7){$n7=1;} else {$n7=0;}
	if($id_fitur8==$result8){$n8=1;} else {$n8=0;}
	if($id_fitur9==$result9){$n9=1;} else {$n9=0;}
	if($id_fitur10==$result10){$n10=1;} else {$n10=0;}
	if($id_fitur11==$result11){$n11=1;} else {$n11=0;}
	if($id_fitur12==$result12){$n12=1;} else {$n12=0;}
	if($id_fitur13==$result13){$n13=1;} else {$n13=0;}
	if($id_fitur14==$result14){$n14=1;} else {$n14=0;}
	if($id_fitur15==$result15){$n15=1;} else {$n15=0;}
	if($id_fitur16==$result16){$n16=1;} else {$n16=0;}
	if($id_fitur17==$result17){$n17=1;} else {$n17=0;}
	if($id_fitur18==$result18){$n18=1;} else {$n18=0;}
	if($id_fitur19==$result19){$n19=1;} else {$n19=0;}
	if($id_fitur20==$result20){$n20=1;} else {$n20=0;}
	if($id_fitur21==$result21){$n21=1;} else {$n21=0;}
	if($id_fitur22==$result22){$n22=1;} else {$n22=0;}
	
	echo"Data Baru = $id_fitur1 dan Data Lama = $result1<br>";
	
	echo"N= 1.$n1, 2.$n2, 3.$n3, 4.$n4, 5.$n5, 6.$n6, 7.$n7, 8.$n8, 9.$n9, 10.$n10, 11.$n11, 12.$n12, 13.$n13, 14.$n14, 15.$n15, 16.$n16, 17.$n17, 18.$n18, 19.$n19, 20.$n20, 21.$n21, 22.$n22";

	$h1=pow($bobot1,2); $n1=pow($n1,2); $has1=$h1*$n1; 
	$h2=pow($bobot2,2); $n2=pow($n2,2); $has2=$h2*$n2; 
	$h3=pow($bobot3,2); $n3=pow($n3,2); $has3=$h3*$n3; 
	$h4=pow($bobot4,2); $n4=pow($n4,2); $has4=$h4*$n4; 
	$h5=pow($bobot5,2); $n5=pow($n5,2); $has5=$h5*$n5; 
	$h6=pow($bobot6,2); $n6=pow($n6,2); $has6=$h6*$n6; 
	$h7=pow($bobot7,2); $n7=pow($n7,2); $has7=$h7*$n7; 
	$h8=pow($bobot8,2); $n8=pow($n8,2); $has8=$h8*$n8; 
	$h9=pow($bobot9,2); $n9=pow($n9,2); $has9=$h9*$n9; 
	$h10=pow($bobot10,2); $n10=pow($n10,2); $has10=$h10*$n10; 
	$h11=pow($bobot11,2); $n11=pow($n11,2); $has11=$h11*$n11; 
	$h12=pow($bobot12,2); $n12=pow($n12,2); $has12=$h12*$n12; 
	$h13=pow($bobot13,2); $n13=pow($n13,2); $has13=$h13*$n13; 
	$h14=pow($bobot14,2); $n14=pow($n14,2); $has14=$h14*$n14; 
	$h15=pow($bobot15,2); $n15=pow($n15,2); $has15=$h15*$n15; 
	$h16=pow($bobot16,2); $n16=pow($n16,2); $has16=$h16*$n16; 
	$h17=pow($bobot17,2); $n17=pow($n17,2); $has17=$h17*$n17; 
	$h18=pow($bobot18,2); $n18=pow($n18,2); $has18=$h18*$n18; 
	$h19=pow($bobot19,2); $n19=pow($n19,2); $has19=$h19*$n19; 
	$h20=pow($bobot20,2); $n20=pow($n20,2); $has20=$h20*$n20; 
	$h21=pow($bobot21,2); $n21=pow($n21,2); $has21=$h21*$n21; 
	$h22=pow($bobot22,2); $n22=pow($n22,2); $has22=$h22*$n22; 
	
	
	$nilai=$n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10+$n11+$n12+$n13+$n14+$n15+$n16+$n17+$n18+$n19+$n20+$n21+$n22;
	
	$JST=$nilai/22;
	$JST=round($JST,2);
	
	$pangkat=1/2;
	
	
	
	
	echo "<hr>CEK = $h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8+$h9+$h10+$h11+$h12+$h13+$h14+$h15+$h16+$h17+$h18+$h19+$h20+$h21+$h22<hr>";
	
	$jumlah1=$has1+$has2+$has3+$has4+$has5+$has6+$has7+$has8+$has9+$has10+$has11+$has12+$has13+$has14+$has15+$has16+$has17+$has18+$has19+$has20+$has21+$has22;
	$jumlah2=$h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8+$h9+$h10+$h11+$h12+$h13+$h14+$h15+$h16+$h17+$h18+$h19+$h20+$h21+$h22;
	
	$jumlah1=round($jumlah1,2);
	$jumlah2=round($jumlah2,2);
	
	
	echo "Nilai = $nilai<br>";
	echo "JST = $JST<br>";	
	echo"J1 = $jumlah1<br>J2 = $jumlah2<br>";
	
	
	$sim=$jumlah1/$jumlah2;
	$sim=pow($sim,$pangkat);
	$sim=$sim*100*$JST/100;
	$sim=round($sim,2);
	echo "SIM = $sim<br>";
	
	
	$id_konsultasi=$_GET['idk'];
	$id_masuk=$_SESSION['id_masuk'];
	 
	 
	 
	$querytambah = mysqli_query($koneksi, "INSERT INTO tbhasil_cek VALUES('', '$id_masuk', '$id_konsultasi', '$i', '$sim', '$type')") or die(mysqli_error());
	$queryupdate = mysqli_query($koneksi, "UPDATE tbpengetahuan SET status='S' WHERE id = '$i'");
  
	
	
	?>
	
<?php
	  }
	  
	  echo"<script>alert('Data Berhasil di Hitung');location.href='$_SERVER[PHP_SELF]?module=hitung_user&stt=tampil_hasil&idk=$id_konsultasi';</script>";
	

?>	
	<!--  -->							
	
    </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>

</div>
</div>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbuser WHERE `id_user` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=hitung_user';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=hitung_user';</script>";
 }

?>


<?php } 
else if($stt=="tampil_hasil"){
?>



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
  $queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET status_konsul='S' WHERE id_konsultasi = '$id_konsultasi'");
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
$q4 = mysqli_query($koneksi, "SELECT * FROM tbhasil_cek WHERE id_konsultasi='$id_konsultasi' order by hasil desc limit 1") or die (mysqli_error());
$r4 = mysqli_fetch_array($q4);
$hasil=$r4['hasil'];
$type=$r4['type'];
$id_kasus=$r4['id_kasus'];
$queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET no_kasus='$id_kasus', nilai='$hasil', type_jamur='$type' WHERE id_konsultasi = '$id_konsultasi'");

#$hasil="0.85";


if($hasil=="1"){
	include"data_baru.php";
	echo"Didapatkan Nilai : $hasil <br>Pada Kasus ke : $id_kasus <br> Type : $type<br>";
}
else if($hasil<1){
	

if($hasil>$nilai){
	
	include"masuk_data_master.php";
	echo"Didapatkan Nilai : $hasil <br>Pada Kasus ke : $id_kasus <br> Type : $type<br> diatas Threshold";
	#echo"Data baru ";
	
	
	
	}	
else{
	$queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET status_konsul='K' WHERE id_konsultasi = '$id_konsultasi'");

	echo"Didapatkan Nilai : $hasil <br>Pada Kasus ke : $id_kasus <br> Type : $type<br> di bawah Threshold";}
	
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
						  <a href="<?php echo "media.php?module=hitung_user&stt=ulang&idk=$id_konsultasi";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Ulang</button></a>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

</div>
</div>








<?php
}
else if ($stt=="ulang"){
$id_konsultasi=$_GET['idk'];
$queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET status_konsul='B' WHERE id_konsultasi = '$id_konsultasi'");

$query = mysqli_query($koneksi, "SELECT * FROM tbhasil_cek") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    }else{
      while($r = mysqli_fetch_array($query)){
		  $id_hasil=$r['id_hasil'];
		   $queryhapus = mysqli_query($koneksi, "DELETE FROM tbhasil_cek WHERE `id_hasil` ='$id_hasil'");
		  
		  
	  }     
    echo"<script>location.href='$_SERVER[PHP_SELF]?module=hitung_user';</script>";
	}
	  }
?>