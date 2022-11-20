 <table class="table1" width="100%">
									
                                            
                                                <tr>
                                                    
													<td scope="col" align="center">Data Baru</td>
                                                    <td scope="col" align="center">Data Kasus</td>
                                                </tr>
<tr>
  <td align="center"><?php
$id_konsultasi=$_GET["idk"];
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where id_konsultasi='$id_konsultasi'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id=$d["id"];
    $tgl_konsul=$d["tgl_konsul"];
?>
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
                                     
                                   	
											
								</table></td>
  <td align="center">
  <?php
	
$id_konsultasi=$_GET['idk'];
$q4 = mysqli_query($koneksi, "SELECT * FROM tbhasil_cek WHERE id_konsultasi='$id_konsultasi' order by hasil desc limit 1") or die (mysqli_error());
$r4 = mysqli_fetch_array($q4);
$hasil=$r4['hasil'];
$type=$r4['type'];
$id_kasus=$r4['id_kasus'];
	
	?>
	
	
	<?php
						
  $query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan where id='$id_kasus'") or die (mysqli_error());
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
	  #echo "1. ".$result1."<br>";
	  
	 
	  
	  #echo $t[1]."<br>";
	  $s2=substr($t[1],11,2);
	  $result2 = preg_replace("/[^0-9]/", "", $s2);
	 # echo "2. ".$result2."<br>";
	  
	  
	  
	 # echo $t[2]."<br>";
	  $s3=substr($t[2],11,2);
	  $result3 = preg_replace("/[^0-9]/", "", $s3);
	  #echo "3. ".$result3."<br>";
	  
	  #echo $t[3]."<br>";
	  $s4=substr($t[3],11,2);
	  $result4 = preg_replace("/[^0-9]/", "", $s4);
	  #echo "4. ".$result4."<br>";
	  
	  #echo $t[4]."<br>";
	  $s5=substr($t[4],11,2);
	  $result5 = preg_replace("/[^0-9]/", "", $s5);
	  #echo "5. ".$result5."<br>";
	  
	  #echo $t[5]."<br>";
	  $s6=substr($t[5],11,2);
	  $result6 = preg_replace("/[^0-9]/", "", $s6);
	  #echo "6. ".$result6."<br>";
	  
	  #echo $t[6]."<br>";
	  $s7=substr($t[6],11,2);
	  $result7 = preg_replace("/[^0-9]/", "", $s7);
	  #echo "7. ".$result7."<br>";
	  
	  #echo $t[7]."<br>";
	  $s8=substr($t[7],11,2);
	  $result8 = preg_replace("/[^0-9]/", "", $s8);
	  #echo "8. ".$result8."<br>";
	  
	  #echo $t[8]."<br>";
	  $s9=substr($t[8],11,2);
	  $result9 = preg_replace("/[^0-9]/", "", $s9);
	  #echo "9. ".$result9."<br>";
	  
	  #echo $t[9]."<br>";
	  $s10=substr($t[9],12,2);
	  $result10 = preg_replace("/[^0-9]/", "", $s10);
	  #echo "10. ".$result10."<br>";
	  
	  	  
	  #echo $t[10]."<br>";
	  $s11=substr($t[10],12,2);
	  $result11 = preg_replace("/[^0-9]/", "", $s11);
	  #echo "11. ".$result11."<br>";
	  
	  #echo $t[11]."<br>";
	  $s12=substr($t[11],12,2);
	  $result12 = preg_replace("/[^0-9]/", "", $s12);
	  #echo "12. ".$result12."<br>";
	  
	  #echo $t[12]."<br>";
	  $s13=substr($t[12],12,2);
	  $result13 = preg_replace("/[^0-9]/", "", $s13);
	  #echo "13. ".$result13."<br>";
	  
	  #echo $t[13]."<br>";
	  $s14=substr($t[13],12,2);
	  $result14 = preg_replace("/[^0-9]/", "", $s14);
	 #echo "14. ".$result14."<br>";
	  
	  #echo $t[14]."<br>";
	  $s15=substr($t[14],12,2);
	  $result15 = preg_replace("/[^0-9]/", "", $s15);
	  #echo "15. ".$result15."<br>";
	  
	  #echo $t[15]."<br>";
	  $s16=substr($t[15],12,2);
	  $result16 = preg_replace("/[^0-9]/", "", $s16);
	 # echo "16. ".$result16."<br>";
	  
	  #echo $t[16]."<br>";
	  $s17=substr($t[16],12,2);
	  $result17 = preg_replace("/[^0-9]/", "", $s17);
	 # echo "17. ".$result17."<br>";
	  
	  #echo $t[17]."<br>";
	  $s18=substr($t[17],12,2);
	  $result18 = preg_replace("/[^0-9]/", "", $s18);
	 # echo "18. ".$result18."<br>";
	  
	  #echo $t[18]."<br>";
	  $s19=substr($t[18],12,2);
	  $result19 = preg_replace("/[^0-9]/", "", $s19);
	 # echo "19. ".$result19."<br>";
	  
	  #echo $t[19]."<br>";
	  $s20=substr($t[19],12,2);
	  $result20 = preg_replace("/[^0-9]/", "", $s20);
	 # echo "20. ".$result20."<br>";
	  
	  #echo $t[20]."<br>";
	  $s21=substr($t[20],12,2);
	  $result21 = preg_replace("/[^0-9]/", "", $s21);
	 # echo "21. ".$result21."<br>";
	  
	  # echo $t[21]."<br>";
	  $s22=substr($t[21],12,2);
	  $result22 = preg_replace("/[^0-9]/", "", $s22);
	  #echo "22. ".$result22."<br>";
	  
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
  </td>
  </tr>												
</table>												





                                   