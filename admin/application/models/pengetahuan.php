<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>
<div class="card mt-5">
                        <div class="card-body">
						<a href="media.php?module=pengetahuan&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
						<a href="media.php?module=pengetahuan&stt=cari" class="menu"><button type="button" class="btn btn-warning mb-3">Cari Data</button></a>
                        <div class="table-responsive">
                            <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Type Jamur</th>
													<th scope="col">Collection</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
  $q33 = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan order by id desc") or die (mysqli_error());
   if(mysqli_num_rows($q33) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='4'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

//$s2 = $query." LIMIT $posawal,$batas";
$q34  = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan order by id desc LIMIT $posawal,$batas") or die (mysqli_error());
$no = $posawal+1;
//--------------------------------------------------------------------------------------------   
   
		
		
      while($r = mysqli_fetch_array($q34)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['type_jamur'] ?></td>  
  <td align="center"><?php $data=$r['collection'];
  
  
	
	
	$t=explode("}",$data);
	  
	  $string1 = $t[0];
      $result1 = preg_replace("/[^0-9]/", "", $string1);
	  $r1=explode("{",$t[0]);
	  $t1=',"1":{'.$r1[2];
	  $s1=substr($t1,11,2);
	  $kasus1 = preg_replace("/[^0-9]/", "", $s1);
	  #echo "1. ".$kasus1."<br>";
	  
	 
	  
	  #echo $t[1]."<br>";
	  $s2=substr($t[1],11,2);
	  $kasus2 = preg_replace("/[^0-9]/", "", $s2);
	  #echo "2. ".$kasus2."<br>";
	  
	  
	  
	 # echo $t[2]."<br>";
	  $s3=substr($t[2],11,2);
	  $kasus3 = preg_replace("/[^0-9]/", "", $s3);
	  #echo "3. ".$kasus3."<br>";
	  
	  #echo $t[3]."<br>";
	  $s4=substr($t[3],11,2);
	  $kasus4 = preg_replace("/[^0-9]/", "", $s4);
	  #echo "4. ".$kasus4."<br>";
	  
	  #echo $t[4]."<br>";
	  $s5=substr($t[4],11,2);
	  $kasus5 = preg_replace("/[^0-9]/", "", $s5);
	  #echo "5. ".$kasus5."<br>";
	  
	  #echo $t[5]."<br>";
	  $s6=substr($t[5],11,2);
	  $kasus6 = preg_replace("/[^0-9]/", "", $s6);
	  #echo "6. ".$kasus6."<br>";
	  
	  #echo $t[6]."<br>";
	  $s7=substr($t[6],11,2);
	  $kasus7 = preg_replace("/[^0-9]/", "", $s7);
	  #echo "7. ".$kasus7."<br>";
	  
	  #echo $t[7]."<br>";
	  $s8=substr($t[7],11,2);
	  $kasus8 = preg_replace("/[^0-9]/", "", $s8);
	  #echo "8. ".$kasus8."<br>";
	  
	  #echo $t[8]."<br>";
	  $s9=substr($t[8],11,2);
	  $kasus9 = preg_replace("/[^0-9]/", "", $s9);
	  #echo "9. ".$kasus9."<br>";
	  
	  #echo $t[9]."<br>";
	  $s10=substr($t[9],12,2);
	  $kasus10 = preg_replace("/[^0-9]/", "", $s10);
	  #echo "10. ".$kasus10."<br>";
	  
	  	  
	  #echo $t[10]."<br>";
	  $s11=substr($t[10],12,2);
	  $kasus11 = preg_replace("/[^0-9]/", "", $s11);
	  #echo "11. ".$kasus11."<br>";
	  
	  #echo $t[11]."<br>";
	  $s12=substr($t[11],12,2);
	  $kasus12 = preg_replace("/[^0-9]/", "", $s12);
	  #echo "12. ".$kasus12."<br>";
	  
	  #echo $t[12]."<br>";
	  $s13=substr($t[12],12,2);
	  $kasus13 = preg_replace("/[^0-9]/", "", $s13);
	  #echo "13. ".$kasus13."<br>";
	  
	  #echo $t[13]."<br>";
	  $s14=substr($t[13],12,2);
	  $kasus14 = preg_replace("/[^0-9]/", "", $s14);
	  #echo "14. ".$kasus14."<br>";
	  
	  #echo $t[14]."<br>";
	  $s15=substr($t[14],12,2);
	  $kasus15 = preg_replace("/[^0-9]/", "", $s15);
	  #echo "15. ".$kasus15."<br>";
	  
	  #echo $t[15]."<br>";
	  $s16=substr($t[15],12,2);
	  $kasus16 = preg_replace("/[^0-9]/", "", $s16);
	  #echo "16. ".$kasus16."<br>";
	  
	  #echo $t[16]."<br>";
	  $s17=substr($t[16],12,2);
	  $kasus17 = preg_replace("/[^0-9]/", "", $s17);
	  #echo "17. ".$kasus17."<br>";
	  
	  #echo $t[17]."<br>";
	  $s18=substr($t[17],12,2);
	  $kasus18 = preg_replace("/[^0-9]/", "", $s18);
	  #echo "18. ".$kasus18."<br>";
	  
	  #echo $t[18]."<br>";
	  $s19=substr($t[18],12,2);
	  $kasus19 = preg_replace("/[^0-9]/", "", $s19);
	  #echo "19. ".$kasus19."<br>";
	  
	  #echo $t[19]."<br>";
	  $s20=substr($t[19],12,2);
	  $kasus20 = preg_replace("/[^0-9]/", "", $s20);
	  #echo "20. ".$kasus20."<br>";
	  
	  #echo $t[20]."<br>";
	  $s21=substr($t[20],12,2);
	  $kasus21 = preg_replace("/[^0-9]/", "", $s21);
	  #echo "21. ".$kasus21."<br>";
	  
	  # echo $t[21]."<br>";
	  $s22=substr($t[21],12,2);
	  $kasus22 = preg_replace("/[^0-9]/", "", $s22);
	  #echo "22. ".$kasus22."<br>";
	  
	 

// Nomor 1	  
$q1 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus1'") or die (mysqli_error());
$d1=mysqli_fetch_array($q1); 
$id_1=$d1['id'];
$nama_f_1=$d1['name'];
$Q1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' and fitur_id='$kasus1'") or die (mysqli_error());
$d1=mysqli_fetch_array($Q1); 
$bobot_1=$d1['bobot'];
#echo "1. $nama_f_1 $bobot_1<br>";

//nomor 2
$q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus2'") or die (mysqli_error());
$d2=mysqli_fetch_array($q2); 
$id_2=$d2['id'];
$nama_f_2=$d2['name'];

$Q2 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' and fitur_id='$kasus2'") or die (mysqli_error());
$d2=mysqli_fetch_array($Q2); 
$bobot_2=$d2['bobot'];

#echo "2. $nama_f_2 $bobot_2<br>";

// Nomor 3	  
$q3 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus3'") or die (mysqli_error());
$d3=mysqli_fetch_array($q3); 
$id_3=$d3['id'];
$nama_f_3=$d3['name'];
$Q3 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' and fitur_id='$kasus3'") or die (mysqli_error());
$d3=mysqli_fetch_array($Q3); 
$bobot_3=$d3['bobot'];
#echo "3. $nama_f_3 $bobot_3<br>";

// Nomor 4	  
$q4 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus4'") or die (mysqli_error());
$d4=mysqli_fetch_array($q4); 
$id_4=$d4['id'];
$nama_f_4=$d4['name'];
$Q4 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' and fitur_id='$kasus4'") or die (mysqli_error());
$d4=mysqli_fetch_array($Q4); 
$bobot_4=$d4['bobot'];
#echo "4. $nama_f_4 $bobot_4<br>";
// Nomor 5	  
$q5 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus5'") or die (mysqli_error());
$d5=mysqli_fetch_array($q5); 
$id_5=$d5['id'];
$nama_f_5=$d5['name'];
$Q5 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' and fitur_id='$kasus5'") or die (mysqli_error());
$d5=mysqli_fetch_array($Q5); 
$bobot_5=$d5['bobot'];
#echo "5. $nama_f_5 $bobot_5<br>";
// Nomor 6	  
$q6 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus6'") or die (mysqli_error());
$d6=mysqli_fetch_array($q6); 
$id_6=$d6['id'];
$nama_f_6=$d6['name'];
$Q6 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' and fitur_id='$kasus6'") or die (mysqli_error());
$d6=mysqli_fetch_array($Q6); 
$bobot_6=$d6['bobot'];
#echo "6. $nama_f_6 $bobot_6<br>";
// Nomor 7	  
$q7 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus7'") or die (mysqli_error());
$d7=mysqli_fetch_array($q7); 
$id_7=$d7['id'];
$nama_f_7=$d7['name'];
$Q7 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' and fitur_id='$kasus7'") or die (mysqli_error());
$d7=mysqli_fetch_array($Q7); 
$bobot_7=$d7['bobot'];
#echo "7. $nama_f_7 $bobot_7<br>";
// Nomor 8	  
$q8 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus8'") or die (mysqli_error());
$d8=mysqli_fetch_array($q8); 
$id_8=$d8['id'];
$nama_f_8=$d8['name'];
$Q8 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' and fitur_id='$kasus8'") or die (mysqli_error());
$d8=mysqli_fetch_array($Q8); 
$bobot_8=$d8['bobot'];
#echo "8. $nama_f_8 $bobot_8<br>";
// Nomor 9	  
$q9 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus9'") or die (mysqli_error());
$d9=mysqli_fetch_array($q9); 
$id_9=$d9['id'];
$nama_f_9=$d9['name'];
$Q9 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' and fitur_id='$kasus9'") or die (mysqli_error());
$d9=mysqli_fetch_array($Q9); 
$bobot_9=$d9['bobot'];
#echo "9. $nama_f_9 $bobot_9<br>";
// Nomor 10	  
$q10 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus10'") or die (mysqli_error());
$d10=mysqli_fetch_array($q10); 
$id_10=$d10['id'];
$nama_f_10=$d10['name'];
$Q10 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' and fitur_id='$kasus10'") or die (mysqli_error());
$d10=mysqli_fetch_array($Q10); 
$bobot_10=$d10['bobot'];
#echo "10. $nama_f_10 $bobot_10<br>";
// Nomor 11	  
$q11 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus11'") or die (mysqli_error());
$d11=mysqli_fetch_array($q11); 
$id_11=$d11['id'];
$nama_f_11=$d11['name'];
$Q11 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' and fitur_id='$kasus11'") or die (mysqli_error());
$d11=mysqli_fetch_array($Q11); 
$bobot_11=$d11['bobot'];
#echo "11. $nama_f_11 $bobot_11<br>";
// Nomor 12	  
$q12 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus12'") or die (mysqli_error());
$d12=mysqli_fetch_array($q12); 
$id_12=$d12['id'];
$nama_f_12=$d12['name'];
$Q12 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' and fitur_id='$kasus12'") or die (mysqli_error());
$d12=mysqli_fetch_array($Q12); 
$bobot_12=$d12['bobot'];
#echo "12. $nama_f_12 $bobot_12<br>";
// Nomor 13	  
$q13 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus13'") or die (mysqli_error());
$d13=mysqli_fetch_array($q13); 
$id_13=$d13['id'];
$nama_f_13=$d13['name'];
$Q13 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' and fitur_id='$kasus13'") or die (mysqli_error());
$d13=mysqli_fetch_array($Q13); 
$bobot_13=$d13['bobot'];
#echo "13. $nama_f_13 $bobot_13<br>";
// Nomor 14	  
$q14 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus14'") or die (mysqli_error());
$d14=mysqli_fetch_array($q14); 
$id_14=$d14['id'];
$nama_f_14=$d14['name'];
$Q14 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' and fitur_id='$kasus14'") or die (mysqli_error());
$d14=mysqli_fetch_array($Q14); 
$bobot_14=$d14['bobot'];
#echo "14. $nama_f_14 $bobot_14<br>";
// Nomor 15	  

$q15 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus15'") or die (mysqli_error());
$d15=mysqli_fetch_array($q15); 
$id_15=$d15['id'];
$nama_f_15=$d15['name'];
$Q15 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' and fitur_id='$kasus15'") or die (mysqli_error());
$d15=mysqli_fetch_array($Q15); 
$bobot_15=$d15['bobot'];
#echo "15. $nama_f_15 $bobot_15<br>";
// Nomor 16	  

$q16 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus16'") or die (mysqli_error());
$d16=mysqli_fetch_array($q16); 
$id_16=$d16['id'];
$nama_f_16=$d16['name'];
$Q16 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' and fitur_id='$kasus16'") or die (mysqli_error());
$d16=mysqli_fetch_array($Q16); 
$bobot_16=$d16['bobot'];
#echo "16. $nama_f_16 $bobot_16<br>";
// Nomor 17	  

$q17 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus17'") or die (mysqli_error());
$d17=mysqli_fetch_array($q17); 
$id_17=$d17['id'];
$nama_f_17=$d17['name'];
$Q17 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' and fitur_id='$kasus17'") or die (mysqli_error());
$d17=mysqli_fetch_array($Q17); 
$bobot_17=$d17['bobot'];
#echo "17. $nama_f_17 $bobot_17<br>";
// Nomor 18	  

$q18 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus18'") or die (mysqli_error());
$d18=mysqli_fetch_array($q18); 
$id_18=$d18['id'];
$nama_f_18=$d18['name'];
$Q18 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' and fitur_id='$kasus18'") or die (mysqli_error());
$d18=mysqli_fetch_array($Q18); 
$bobot_18=$d18['bobot'];
#echo "18. $nama_f_18 $bobot_18<br>";
// Nomor 19	  

$q19 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus19'") or die (mysqli_error());
$d19=mysqli_fetch_array($q19); 
$id_19=$d19['id'];
$nama_f_19=$d19['name'];
$Q19 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' and fitur_id='$kasus19'") or die (mysqli_error());
$d19=mysqli_fetch_array($Q19); 
$bobot_19=$d19['bobot'];
#echo "19. $nama_f_19 $bobot_19<br>";
// Nomor 20	  

$q20 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus20'") or die (mysqli_error());
$d20=mysqli_fetch_array($q20); 
$id_20=$d20['id'];
$nama_f_20=$d20['name'];
$Q20 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' and fitur_id='$kasus20'") or die (mysqli_error());
$d20=mysqli_fetch_array($Q20); 
$bobot_20=$d20['bobot'];
#echo "20. $nama_f_20 $bobot_20<br>";
// Nomor 21	  

$q21 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus21'") or die (mysqli_error());
$d21=mysqli_fetch_array($q21); 
$id_21=$d21['id'];
$nama_f_21=$d21['name'];
$Q21 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' and fitur_id='$kasus21'") or die (mysqli_error());
$d21=mysqli_fetch_array($Q21); 
$bobot_21=$d21['bobot'];
#echo "21. $nama_f_21 $bobot_21<br>";

// Nomor 22	  

$q22 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus22'") or die (mysqli_error());
$d22=mysqli_fetch_array($q22); 
$id_22=$d22['id'];
$nama_f_22=$d22['name'];
$Q22 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' and fitur_id='$kasus22'") or die (mysqli_error());
$d22=mysqli_fetch_array($Q22); 
$bobot_22=$d22['bobot'];
#echo "22. $nama_f_22 $bobot_22<br>";	 

  ?>
  
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_1 : $bobot_1";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_2 : $bobot_2";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_3 : $bobot_3";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_4 : $bobot_4";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_5 : $bobot_5";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_6 : $bobot_6";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_7 : $bobot_7";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_8 : $bobot_8";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_9 : $bobot_9";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_10 : $bobot_10";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_11 : $bobot_11";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_12 : $bobot_12";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_13 : $bobot_13";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_14 : $bobot_14";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_15 : $bobot_15";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_16 : $bobot_16";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_17 : $bobot_17";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_18 : $bobot_18";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_19 : $bobot_19";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_20 : $bobot_20";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_21 : $bobot_21";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_22 : $bobot_22";?></p>
  
  
  
  </td>
  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengetahuan&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengetahuan&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
$jmldata = mysqli_num_rows($q33);
if($jmldata>0){
    if($batas<1){$batas=1;}
$jmlhal  = ceil($jmldata/$batas);
    echo "<div class='pagination_area pull-right mt-5'><ul>";
    if($page > 1){
        $prev=$page-1;
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=pengetahuan&page=$prev'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // collection_galerikan link page 1,2,3 ...
    for($i=1;$i<=$jmlhal;$i++)
    if ($i != $page){echo "<li><a href='$_SERVER[PHP_SELF]?module=pengetahuan&page=$i'>$i</a></li> ";}
    else{echo " <li class='active'>$i</li> ";}

    // Link kepage berikutnya (Next)
    if($page < $jmlhal){
        $next=$page+1;
        echo "<li class=prevnext><a href='?module=pengetahuan&page=$next'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata = mysqli_num_rows($q33);
}


echo"<br>Jumlah : $jmldata Pengetahuan";
?>
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>

<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan order by `id` desc") or die (mysqli_error());
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
                            <h4>Form Input Pengetahuan</h4>
                        </div>
						<hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" type_jamur="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
										
										
										<div class="form-group">
                                            <label>Type Jamur *</label>
                                            <select class="form-control" name="type_jamur" required>
                                                <option value="">Pilih disini</option>
                                                <option value="edible">edible</option>
                                                <option value="poisonous">poisonous</option>                                         
                                            </select>
                                        </div>

<div class="form-group">
<label>Bentuk Tudung *</label>
<select class="form-control" name="kasus_1" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>
										
<div class="form-group">
<label>Permukaan Tudung *</label>
<select class="form-control" name="kasus_2" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Warna Tudung *</label>
<select class="form-control" name="kasus_3" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Memar *</label>
<select class="form-control" name="kasus_4" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Aroma *</label>
<select class="form-control" name="kasus_5" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Pelekatan Insang *</label>
<select class="form-control" name="kasus_6" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Kerapatan Garis-Garis Insang *</label>
<select class="form-control" name="kasus_7" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>     
  </select>
</div>


<div class="form-group">
<label>Ukuran Insang *</label>
<select class="form-control" name="kasus_8" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Warna Insang *</label>
<select class="form-control" name="kasus_9" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>     
  </select>
</div>


<div class="form-group">
<label>Bentuk Tangkai *</label>
<select class="form-control" name="kasus_10" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Akar Tangkai *</label>
<select class="form-control" name="kasus_11" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Permukaan Tangkai di Atas Cincin *</label>
<select class="form-control" name="kasus_12" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Permukaan Tangkai di Bawah Cincin *</label>
<select class="form-control" name="kasus_13" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Warna Tangkai di Atas Cincin *</label>
<select class="form-control" name="kasus_14" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Warna Tangkai di Bawah Cincin *</label>
<select class="form-control" name="kasus_15" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Jenis Membran Pembungkus *</label>
<select class="form-control" name="kasus_16" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Warna Membran Pembungkus *</label>
<select class="form-control" name="kasus_17" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>	Jumlah Cincin *</label>
<select class="form-control" name="kasus_18" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Jenis Cincin *</label>
<select class="form-control" name="kasus_19" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Warna Cetakan Spora *</label>
<select class="form-control" name="kasus_20" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Populasi *</label>
<select class="form-control" name="kasus_21" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Habitat *</label>
<select class="form-control" name="kasus_22" required>
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>







                                        
										 
                                        <button type="submit" class="btn btn-primary mb-3" name="Simpan">Simpan</button>
										<button type="reset" class="btn btn-primary mb-3">Batal</button>
                                        <a href="media.php?module=pengetahuan"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
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
  $type_jamur=$_POST['type_jamur'];
  $collection=$_POST['collection'];
  $kasus_1=$_POST['kasus_1'];
  $kasus_2=$_POST['kasus_2'];
  $kasus_3=$_POST['kasus_3'];
  $kasus_4=$_POST['kasus_4'];
  $kasus_5=$_POST['kasus_5'];
  $kasus_6=$_POST['kasus_6'];
  $kasus_7=$_POST['kasus_7'];
  $kasus_8=$_POST['kasus_8'];
  $kasus_9=$_POST['kasus_9'];
  $kasus_10=$_POST['kasus_10'];
  $kasus_11=$_POST['kasus_11'];
  $kasus_12=$_POST['kasus_12'];
  $kasus_13=$_POST['kasus_13'];
  $kasus_14=$_POST['kasus_14'];
  $kasus_15=$_POST['kasus_15'];
  $kasus_16=$_POST['kasus_16'];
  $kasus_17=$_POST['kasus_17'];
  $kasus_18=$_POST['kasus_18'];
  $kasus_19=$_POST['kasus_19'];
  $kasus_20=$_POST['kasus_20'];
  $kasus_21=$_POST['kasus_21'];
  $kasus_22=$_POST['kasus_22'];
  
 

// Nomor 1	  
$q1 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_1'") or die (mysqli_error());
$d1=mysqli_fetch_array($q1); 
$id_1=$d1['id'];
$nama_f_1=$d1['name'];
$Q1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' and fitur_id='$kasus_1'") or die (mysqli_error());
$d1=mysqli_fetch_array($Q1); 
$bobot_1=$d1['bobot'];
#echo "1. $nama_f_1 $bobot_1<br>";

//nomor 2
$q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_2'") or die (mysqli_error());
$d2=mysqli_fetch_array($q2); 
$id_2=$d2['id'];
$nama_f_2=$d2['name'];

$Q2 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' and fitur_id='$kasus_2'") or die (mysqli_error());
$d2=mysqli_fetch_array($Q2); 
$bobot_2=$d2['bobot'];

#echo "2. $nama_f_2 $bobot_2<br>";

// Nomor 3	  
$q3 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_3'") or die (mysqli_error());
$d3=mysqli_fetch_array($q3); 
$id_3=$d3['id'];
$nama_f_3=$d3['name'];
$Q3 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' and fitur_id='$kasus_3'") or die (mysqli_error());
$d3=mysqli_fetch_array($Q3); 
$bobot_3=$d3['bobot'];
#echo "3. $nama_f_3 $bobot_3<br>";

// Nomor 4	  
$q4 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_4'") or die (mysqli_error());
$d4=mysqli_fetch_array($q4); 
$id_4=$d4['id'];
$nama_f_4=$d4['name'];
$Q4 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' and fitur_id='$kasus_4'") or die (mysqli_error());
$d4=mysqli_fetch_array($Q4); 
$bobot_4=$d4['bobot'];
#echo "4. $nama_f_4 $bobot_4<br>";
// Nomor 5	  
$q5 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_5'") or die (mysqli_error());
$d5=mysqli_fetch_array($q5); 
$id_5=$d5['id'];
$nama_f_5=$d5['name'];
$Q5 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' and fitur_id='$kasus_5'") or die (mysqli_error());
$d5=mysqli_fetch_array($Q5); 
$bobot_5=$d5['bobot'];
#echo "5. $nama_f_5 $bobot_5<br>";
// Nomor 6	  
$q6 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_6'") or die (mysqli_error());
$d6=mysqli_fetch_array($q6); 
$id_6=$d6['id'];
$nama_f_6=$d6['name'];
$Q6 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' and fitur_id='$kasus_6'") or die (mysqli_error());
$d6=mysqli_fetch_array($Q6); 
$bobot_6=$d6['bobot'];
#echo "6. $nama_f_6 $bobot_6<br>";
// Nomor 7	  
$q7 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_7'") or die (mysqli_error());
$d7=mysqli_fetch_array($q7); 
$id_7=$d7['id'];
$nama_f_7=$d7['name'];
$Q7 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' and fitur_id='$kasus_7'") or die (mysqli_error());
$d7=mysqli_fetch_array($Q7); 
$bobot_7=$d7['bobot'];
#echo "7. $nama_f_7 $bobot_7<br>";
// Nomor 8	  
$q8 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_8'") or die (mysqli_error());
$d8=mysqli_fetch_array($q8); 
$id_8=$d8['id'];
$nama_f_8=$d8['name'];
$Q8 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' and fitur_id='$kasus_8'") or die (mysqli_error());
$d8=mysqli_fetch_array($Q8); 
$bobot_8=$d8['bobot'];
#echo "8. $nama_f_8 $bobot_8<br>";
// Nomor 9	  
$q9 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_9'") or die (mysqli_error());
$d9=mysqli_fetch_array($q9); 
$id_9=$d9['id'];
$nama_f_9=$d9['name'];
$Q9 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' and fitur_id='$kasus_9'") or die (mysqli_error());
$d9=mysqli_fetch_array($Q9); 
$bobot_9=$d9['bobot'];
#echo "9. $nama_f_9 $bobot_9<br>";
// Nomor 10	  
$q10 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_10'") or die (mysqli_error());
$d10=mysqli_fetch_array($q10); 
$id_10=$d10['id'];
$nama_f_10=$d10['name'];
$Q10 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' and fitur_id='$kasus_10'") or die (mysqli_error());
$d10=mysqli_fetch_array($Q10); 
$bobot_10=$d10['bobot'];
#echo "10. $nama_f_10 $bobot_10<br>";
// Nomor 11	  
$q11 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_11'") or die (mysqli_error());
$d11=mysqli_fetch_array($q11); 
$id_11=$d11['id'];
$nama_f_11=$d11['name'];
$Q11 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' and fitur_id='$kasus_11'") or die (mysqli_error());
$d11=mysqli_fetch_array($Q11); 
$bobot_11=$d11['bobot'];
#echo "11. $nama_f_11 $bobot_11<br>";
// Nomor 12	  
$q12 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_12'") or die (mysqli_error());
$d12=mysqli_fetch_array($q12); 
$id_12=$d12['id'];
$nama_f_12=$d12['name'];
$Q12 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' and fitur_id='$kasus_12'") or die (mysqli_error());
$d12=mysqli_fetch_array($Q12); 
$bobot_12=$d12['bobot'];
#echo "12. $nama_f_12 $bobot_12<br>";
// Nomor 13	  
$q13 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_13'") or die (mysqli_error());
$d13=mysqli_fetch_array($q13); 
$id_13=$d13['id'];
$nama_f_13=$d13['name'];
$Q13 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' and fitur_id='$kasus_13'") or die (mysqli_error());
$d13=mysqli_fetch_array($Q13); 
$bobot_13=$d13['bobot'];
#echo "13. $nama_f_13 $bobot_13<br>";
// Nomor 14	  
$q14 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_14'") or die (mysqli_error());
$d14=mysqli_fetch_array($q14); 
$id_14=$d14['id'];
$nama_f_14=$d14['name'];
$Q14 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' and fitur_id='$kasus_14'") or die (mysqli_error());
$d14=mysqli_fetch_array($Q14); 
$bobot_14=$d14['bobot'];
#echo "14. $nama_f_14 $bobot_14<br>";
// Nomor 15	  

$q15 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_15'") or die (mysqli_error());
$d15=mysqli_fetch_array($q15); 
$id_15=$d15['id'];
$nama_f_15=$d15['name'];
$Q15 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' and fitur_id='$kasus_15'") or die (mysqli_error());
$d15=mysqli_fetch_array($Q15); 
$bobot_15=$d15['bobot'];
#echo "15. $nama_f_15 $bobot_15<br>";
// Nomor 16	  

$q16 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_16'") or die (mysqli_error());
$d16=mysqli_fetch_array($q16); 
$id_16=$d16['id'];
$nama_f_16=$d16['name'];
$Q16 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' and fitur_id='$kasus_16'") or die (mysqli_error());
$d16=mysqli_fetch_array($Q16); 
$bobot_16=$d16['bobot'];
#echo "16. $nama_f_16 $bobot_16<br>";
// Nomor 17	  

$q17 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_17'") or die (mysqli_error());
$d17=mysqli_fetch_array($q17); 
$id_17=$d17['id'];
$nama_f_17=$d17['name'];
$Q17 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' and fitur_id='$kasus_17'") or die (mysqli_error());
$d17=mysqli_fetch_array($Q17); 
$bobot_17=$d17['bobot'];
#echo "17. $nama_f_17 $bobot_17<br>";
// Nomor 18	  

$q18 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_18'") or die (mysqli_error());
$d18=mysqli_fetch_array($q18); 
$id_18=$d18['id'];
$nama_f_18=$d18['name'];
$Q18 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' and fitur_id='$kasus_18'") or die (mysqli_error());
$d18=mysqli_fetch_array($Q18); 
$bobot_18=$d18['bobot'];
#echo "18. $nama_f_18 $bobot_18<br>";
// Nomor 19	  

$q19 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_19'") or die (mysqli_error());
$d19=mysqli_fetch_array($q19); 
$id_19=$d19['id'];
$nama_f_19=$d19['name'];
$Q19 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' and fitur_id='$kasus_19'") or die (mysqli_error());
$d19=mysqli_fetch_array($Q19); 
$bobot_19=$d19['bobot'];
#echo "19. $nama_f_19 $bobot_19<br>";
// Nomor 20	  

$q20 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_20'") or die (mysqli_error());
$d20=mysqli_fetch_array($q20); 
$id_20=$d20['id'];
$nama_f_20=$d20['name'];
$Q20 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' and fitur_id='$kasus_20'") or die (mysqli_error());
$d20=mysqli_fetch_array($Q20); 
$bobot_20=$d20['bobot'];
#echo "20. $nama_f_20 $bobot_20<br>";
// Nomor 21	  

$q21 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_21'") or die (mysqli_error());
$d21=mysqli_fetch_array($q21); 
$id_21=$d21['id'];
$nama_f_21=$d21['name'];
$Q21 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' and fitur_id='$kasus_21'") or die (mysqli_error());
$d21=mysqli_fetch_array($Q21); 
$bobot_21=$d21['bobot'];
#echo "21. $nama_f_21 $bobot_21<br>";

// Nomor 22	  

$q22 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_22'") or die (mysqli_error());
$d22=mysqli_fetch_array($q22); 
$id_22=$d22['id'];
$nama_f_22=$d22['name'];
$Q22 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' and fitur_id='$kasus_22'") or die (mysqli_error());
$d22=mysqli_fetch_array($Q22); 
$bobot_22=$d22['bobot'];
#echo "22. $nama_f_22 $bobot_22<br>";	
 

$a1='{"id":'.$id_1.',"name":"'.$nama_f_2.'","bobot":'.$bobot_2.'}';
$data='{"1":{"id":'.$id_1.',"name":"'.$nama_f_1.'","bobot":'.$bobot_1.'},"2":{"id":'.$id_2.',"name":"'.$nama_f_2.'","bobot":'.$bobot_2.'},"3":{"id":'.$id_3.',"name":"'.$nama_f_3.'","bobot":'.$bobot_3.'},"4":{"id":'.$id_4.',"name":"'.$nama_f_4.'","bobot":'.$bobot_4.'},"5":{"id":'.$id_5.',"name":"'.$nama_f_5.'","bobot":'.$bobot_5.'},"6":{"id":'.$id_6.',"name":"'.$nama_f_6.'","bobot":'.$bobot_6.'},"7":{"id":'.$id_7.',"name":"'.$nama_f_7.'","bobot":'.$bobot_7.'},"8":{"id":'.$id_8.',"name":"'.$nama_f_8.'","bobot":'.$bobot_8.'},"9":{"id":'.$id_9.',"name":"'.$nama_f_9.'","bobot":'.$bobot_9.'},"10":{"id":'.$id_10.',"name":"'.$nama_f_10.'","bobot":'.$bobot_10.'},"11":{"id":'.$id_11.',"name":"'.$nama_f_11.'","bobot":'.$bobot_11.'},"12":{"id":'.$id_12.',"name":"'.$nama_f_12.'","bobot":'.$bobot_12.'},"13":{"id":'.$id_13.',"name":"'.$nama_f_13.'","bobot":'.$bobot_13.'},"14":{"id":'.$id_14.',"name":"'.$nama_f_14.'","bobot":'.$bobot_14.'},"15":{"id":'.$id_15.',"name":"'.$nama_f_15.'","bobot":'.$bobot_15.'},"16":{"id":'.$id_16.',"name":"'.$nama_f_16.'","bobot":'.$bobot_16.'},"17":{"id":'.$id_17.',"name":"'.$nama_f_17.'","bobot":'.$bobot_17.'},"18":{"id":'.$id_18.',"name":"'.$nama_f_18.'","bobot":'.$bobot_18.'},"19":{"id":'.$id_19.',"name":"'.$nama_f_19.'","bobot":'.$bobot_19.'},"20":{"id":'.$id_20.',"name":"'.$nama_f_20.'","bobot":'.$bobot_20.'},"21":{"id":'.$id_21.',"name":"'.$nama_f_21.'","bobot":'.$bobot_21.'},"22":{"id":'.$id_22.',"name":"'.$nama_f_22.'","bobot":'.$bobot_22.'}}	  
 ';

 
 
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbpengetahuan VALUES('', '$type_jamur', '$data', 'S')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";

   }
  }
 ?>


<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbpengetahuan WHERE `id` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan where id='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id=$d["id"];
    $type_jamur=$d["type_jamur"];
	$data=$d["collection"];
	
	
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
	  #echo "2. ".$result2."<br>";
	  
	  
	  
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
	  #echo "16. ".$result16."<br>";
	  
	  #echo $t[16]."<br>";
	  $s17=substr($t[16],12,2);
	  $result17 = preg_replace("/[^0-9]/", "", $s17);
	  #echo "17. ".$result17."<br>";
	  
	  #echo $t[17]."<br>";
	  $s18=substr($t[17],12,2);
	  $result18 = preg_replace("/[^0-9]/", "", $s18);
	  #echo "18. ".$result18."<br>";
	  
	  #echo $t[18]."<br>";
	  $s19=substr($t[18],12,2);
	  $result19 = preg_replace("/[^0-9]/", "", $s19);
	  #echo "19. ".$result19."<br>";
	  
	  #echo $t[19]."<br>";
	  $s20=substr($t[19],12,2);
	  $result20 = preg_replace("/[^0-9]/", "", $s20);
	  #echo "20. ".$result20."<br>";
	  
	  #echo $t[20]."<br>";
	  $s21=substr($t[20],12,2);
	  $result21 = preg_replace("/[^0-9]/", "", $s21);
	  #echo "21. ".$result21."<br>";
	  
	  # echo $t[21]."<br>";
	  $s22=substr($t[21],12,2);
	  $result22 = preg_replace("/[^0-9]/", "", $s22);
	  #echo "22. ".$result22."<br>";

?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Pengetahuan</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" type_jamur="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       
										
										<div class="form-group">
                                            <label>Type Jamur</label>
                                            <select class="form-control" name="type_jamur">
<?php
 if($type_jamur==""){
	 echo"<option value=''>-- Pilih disini --</option>";
	 }
 else{
	 
	 echo"<option value='$type_jamur'>$type_jamur</option>";
	 }
 ?>
                                                <option value="">Pilih disini</option>
                                                 <option value="edible">edible</option>
                                                <option value="poisonous">poisonous</option>
                                            </select>
                                        </div>
										
 <div class="form-group">
<label>Bentuk Tudung *</label>
<select class="form-control" name="kasus_1" required>
<?php
  echo"<option value='$result1'>".FIT($tbfitur,$result1)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?> 
        
  </select>
</div>     



										
<div class="form-group">
<label>Permukaan Tudung *</label>
<select class="form-control" name="kasus_2" required>
<?php
  echo"<option value='$result2'>".FIT($tbfitur,$result2)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Warna Tudung *</label>
<select class="form-control" name="kasus_3" required>
<?php
  echo"<option value='$result3'>".FIT($tbfitur,$result3)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Memar *</label>
<select class="form-control" name="kasus_4" required>
<?php
  echo"<option value='$result4'>".FIT($tbfitur,$result4)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Aroma *</label>
<select class="form-control" name="kasus_5" required>
<?php
  echo"<option value='$result5'>".FIT($tbfitur,$result5)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Pelekatan Insang *</label>
<select class="form-control" name="kasus_6" required>
<?php
  echo"<option value='$result6'>".FIT($tbfitur,$result6)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
</div>


<div class="form-group">
<label>Kerapatan Garis-Garis Insang *</label>
<select class="form-control" name="kasus_7" required>
<?php
  echo"<option value='$result7'>".FIT($tbfitur,$result7)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>     
  </select>
</div>


<div class="form-group">
<label>Ukuran Insang *</label>
<select class="form-control" name="kasus_8" required>
<?php
  echo"<option value='$result8'>".FIT($tbfitur,$result8)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Warna Insang *</label>
<select class="form-control" name="kasus_9" required>
<?php
  echo"<option value='$result9'>".FIT($tbfitur,$result9)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>     
  </select>
</div>


<div class="form-group">
<label>Bentuk Tangkai *</label>
<select class="form-control" name="kasus_10" required>
<?php
  echo"<option value='$result10'>".FIT($tbfitur,$result10)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Akar Tangkai *</label>
<select class="form-control" name="kasus_11" required>
<?php
  echo"<option value='$result11'>".FIT($tbfitur,$result11)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Permukaan Tangkai di Atas Cincin *</label>
<select class="form-control" name="kasus_12" required>
<?php
  echo"<option value='$result12'>".FIT($tbfitur,$result12)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Permukaan Tangkai di Bawah Cincin *</label>
<select class="form-control" name="kasus_13" required>
<?php
  echo"<option value='$result13'>".FIT($tbfitur,$result13)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Warna Tangkai di Atas Cincin *</label>
<select class="form-control" name="kasus_14" required>
<?php
  echo"<option value='$result14'>".FIT($tbfitur,$result14)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Warna Tangkai di Bawah Cincin *</label>
<select class="form-control" name="kasus_15" required>
<?php
  echo"<option value='$result15'>".FIT($tbfitur,$result15)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Jenis Membran Pembungkus *</label>
<select class="form-control" name="kasus_16" required>
<?php
  echo"<option value='$result16'>".FIT($tbfitur,$result16)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Warna Membran Pembungkus *</label>
<select class="form-control" name="kasus_17" required>
<?php
  echo"<option value='$result17'>".FIT($tbfitur,$result17)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>	Jumlah Cincin *</label>
<select class="form-control" name="kasus_18" required>
<?php
  echo"<option value='$result18'>".FIT($tbfitur,$result18)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Jenis Cincin *</label>
<select class="form-control" name="kasus_19" required>
<?php
  echo"<option value='$result19'>".FIT($tbfitur,$result19)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Warna Cetakan Spora *</label>
<select class="form-control" name="kasus_20" required>
<?php
  echo"<option value='$result20'>".FIT($tbfitur,$result20)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>      
  </select>
</div>


<div class="form-group">
<label>Populasi *</label>
<select class="form-control" name="kasus_21" required>
<?php
  echo"<option value='$result21'>".FIT($tbfitur,$result21)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>


<div class="form-group">
<label>Habitat *</label>
<select class="form-control" name="kasus_22" required>
<?php
  echo"<option value='$result22'>".FIT($tbfitur,$result22)."</option>";
?>  
<option value="">-- Pilih Fitur --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' order by `id` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "
	<option value=''>Fitur masih kosong</option>";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):  
 $fitur_id=$r['fitur_id'];
 $q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$fitur_id' order by `id` asc") or die (mysqli_error());
 $r2 = mysqli_fetch_array($q2);
 ?>
  <option value="<?php echo $r2['id'] ?>"><?php echo $r2['name']; ?></option>
 <?php
 endwhile;
 
}	
		?>       
  </select>
</div>
                                      <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id" value="<?php echo"$id";?>">
                                        <a href="<?php echo"$_SERVER[PHP_SELF]?module=pengetahuan";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $type_jamur=$_POST['type_jamur'];
  $kasus_1=$_POST['kasus_1'];
  $kasus_2=$_POST['kasus_2'];
  $kasus_3=$_POST['kasus_3'];
  $kasus_4=$_POST['kasus_4'];
  $kasus_5=$_POST['kasus_5'];
  $kasus_6=$_POST['kasus_6'];
  $kasus_7=$_POST['kasus_7'];
  $kasus_8=$_POST['kasus_8'];
  $kasus_9=$_POST['kasus_9'];
  $kasus_10=$_POST['kasus_10'];
  $kasus_11=$_POST['kasus_11'];
  $kasus_12=$_POST['kasus_12'];
  $kasus_13=$_POST['kasus_13'];
  $kasus_14=$_POST['kasus_14'];
  $kasus_15=$_POST['kasus_15'];
  $kasus_16=$_POST['kasus_16'];
  $kasus_17=$_POST['kasus_17'];
  $kasus_18=$_POST['kasus_18'];
  $kasus_19=$_POST['kasus_19'];
  $kasus_20=$_POST['kasus_20'];
  $kasus_21=$_POST['kasus_21'];
  $kasus_22=$_POST['kasus_22'];
  
 

// Nomor 1	  
$q1 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_1'") or die (mysqli_error());
$d1=mysqli_fetch_array($q1); 
$id_1=$d1['id'];
$nama_f_1=$d1['name'];
$Q1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' and fitur_id='$kasus_1'") or die (mysqli_error());
$d1=mysqli_fetch_array($Q1); 
$bobot_1=$d1['bobot'];
#echo "1. $nama_f_1 $bobot_1<br>";

//nomor 2
$q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_2'") or die (mysqli_error());
$d2=mysqli_fetch_array($q2); 
$id_2=$d2['id'];
$nama_f_2=$d2['name'];

$Q2 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' and fitur_id='$kasus_2'") or die (mysqli_error());
$d2=mysqli_fetch_array($Q2); 
$bobot_2=$d2['bobot'];

#echo "2. $nama_f_2 $bobot_2<br>";

// Nomor 3	  
$q3 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_3'") or die (mysqli_error());
$d3=mysqli_fetch_array($q3); 
$id_3=$d3['id'];
$nama_f_3=$d3['name'];
$Q3 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' and fitur_id='$kasus_3'") or die (mysqli_error());
$d3=mysqli_fetch_array($Q3); 
$bobot_3=$d3['bobot'];
#echo "3. $nama_f_3 $bobot_3<br>";

// Nomor 4	  
$q4 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_4'") or die (mysqli_error());
$d4=mysqli_fetch_array($q4); 
$id_4=$d4['id'];
$nama_f_4=$d4['name'];
$Q4 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' and fitur_id='$kasus_4'") or die (mysqli_error());
$d4=mysqli_fetch_array($Q4); 
$bobot_4=$d4['bobot'];
#echo "4. $nama_f_4 $bobot_4<br>";
// Nomor 5	  
$q5 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_5'") or die (mysqli_error());
$d5=mysqli_fetch_array($q5); 
$id_5=$d5['id'];
$nama_f_5=$d5['name'];
$Q5 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' and fitur_id='$kasus_5'") or die (mysqli_error());
$d5=mysqli_fetch_array($Q5); 
$bobot_5=$d5['bobot'];
#echo "5. $nama_f_5 $bobot_5<br>";
// Nomor 6	  
$q6 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_6'") or die (mysqli_error());
$d6=mysqli_fetch_array($q6); 
$id_6=$d6['id'];
$nama_f_6=$d6['name'];
$Q6 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' and fitur_id='$kasus_6'") or die (mysqli_error());
$d6=mysqli_fetch_array($Q6); 
$bobot_6=$d6['bobot'];
#echo "6. $nama_f_6 $bobot_6<br>";
// Nomor 7	  
$q7 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_7'") or die (mysqli_error());
$d7=mysqli_fetch_array($q7); 
$id_7=$d7['id'];
$nama_f_7=$d7['name'];
$Q7 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' and fitur_id='$kasus_7'") or die (mysqli_error());
$d7=mysqli_fetch_array($Q7); 
$bobot_7=$d7['bobot'];
#echo "7. $nama_f_7 $bobot_7<br>";
// Nomor 8	  
$q8 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_8'") or die (mysqli_error());
$d8=mysqli_fetch_array($q8); 
$id_8=$d8['id'];
$nama_f_8=$d8['name'];
$Q8 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' and fitur_id='$kasus_8'") or die (mysqli_error());
$d8=mysqli_fetch_array($Q8); 
$bobot_8=$d8['bobot'];
#echo "8. $nama_f_8 $bobot_8<br>";
// Nomor 9	  
$q9 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_9'") or die (mysqli_error());
$d9=mysqli_fetch_array($q9); 
$id_9=$d9['id'];
$nama_f_9=$d9['name'];
$Q9 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' and fitur_id='$kasus_9'") or die (mysqli_error());
$d9=mysqli_fetch_array($Q9); 
$bobot_9=$d9['bobot'];
#echo "9. $nama_f_9 $bobot_9<br>";
// Nomor 10	  
$q10 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_10'") or die (mysqli_error());
$d10=mysqli_fetch_array($q10); 
$id_10=$d10['id'];
$nama_f_10=$d10['name'];
$Q10 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' and fitur_id='$kasus_10'") or die (mysqli_error());
$d10=mysqli_fetch_array($Q10); 
$bobot_10=$d10['bobot'];
#echo "10. $nama_f_10 $bobot_10<br>";
// Nomor 11	  
$q11 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_11'") or die (mysqli_error());
$d11=mysqli_fetch_array($q11); 
$id_11=$d11['id'];
$nama_f_11=$d11['name'];
$Q11 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' and fitur_id='$kasus_11'") or die (mysqli_error());
$d11=mysqli_fetch_array($Q11); 
$bobot_11=$d11['bobot'];
#echo "11. $nama_f_11 $bobot_11<br>";
// Nomor 12	  
$q12 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_12'") or die (mysqli_error());
$d12=mysqli_fetch_array($q12); 
$id_12=$d12['id'];
$nama_f_12=$d12['name'];
$Q12 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' and fitur_id='$kasus_12'") or die (mysqli_error());
$d12=mysqli_fetch_array($Q12); 
$bobot_12=$d12['bobot'];
#echo "12. $nama_f_12 $bobot_12<br>";
// Nomor 13	  
$q13 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_13'") or die (mysqli_error());
$d13=mysqli_fetch_array($q13); 
$id_13=$d13['id'];
$nama_f_13=$d13['name'];
$Q13 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' and fitur_id='$kasus_13'") or die (mysqli_error());
$d13=mysqli_fetch_array($Q13); 
$bobot_13=$d13['bobot'];
#echo "13. $nama_f_13 $bobot_13<br>";
// Nomor 14	  
$q14 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_14'") or die (mysqli_error());
$d14=mysqli_fetch_array($q14); 
$id_14=$d14['id'];
$nama_f_14=$d14['name'];
$Q14 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' and fitur_id='$kasus_14'") or die (mysqli_error());
$d14=mysqli_fetch_array($Q14); 
$bobot_14=$d14['bobot'];
#echo "14. $nama_f_14 $bobot_14<br>";
// Nomor 15	  

$q15 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_15'") or die (mysqli_error());
$d15=mysqli_fetch_array($q15); 
$id_15=$d15['id'];
$nama_f_15=$d15['name'];
$Q15 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' and fitur_id='$kasus_15'") or die (mysqli_error());
$d15=mysqli_fetch_array($Q15); 
$bobot_15=$d15['bobot'];
#echo "15. $nama_f_15 $bobot_15<br>";
// Nomor 16	  

$q16 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_16'") or die (mysqli_error());
$d16=mysqli_fetch_array($q16); 
$id_16=$d16['id'];
$nama_f_16=$d16['name'];
$Q16 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' and fitur_id='$kasus_16'") or die (mysqli_error());
$d16=mysqli_fetch_array($Q16); 
$bobot_16=$d16['bobot'];
#echo "16. $nama_f_16 $bobot_16<br>";
// Nomor 17	  

$q17 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_17'") or die (mysqli_error());
$d17=mysqli_fetch_array($q17); 
$id_17=$d17['id'];
$nama_f_17=$d17['name'];
$Q17 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' and fitur_id='$kasus_17'") or die (mysqli_error());
$d17=mysqli_fetch_array($Q17); 
$bobot_17=$d17['bobot'];
#echo "17. $nama_f_17 $bobot_17<br>";
// Nomor 18	  

$q18 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_18'") or die (mysqli_error());
$d18=mysqli_fetch_array($q18); 
$id_18=$d18['id'];
$nama_f_18=$d18['name'];
$Q18 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' and fitur_id='$kasus_18'") or die (mysqli_error());
$d18=mysqli_fetch_array($Q18); 
$bobot_18=$d18['bobot'];
#echo "18. $nama_f_18 $bobot_18<br>";
// Nomor 19	  

$q19 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_19'") or die (mysqli_error());
$d19=mysqli_fetch_array($q19); 
$id_19=$d19['id'];
$nama_f_19=$d19['name'];
$Q19 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' and fitur_id='$kasus_19'") or die (mysqli_error());
$d19=mysqli_fetch_array($Q19); 
$bobot_19=$d19['bobot'];
#echo "19. $nama_f_19 $bobot_19<br>";
// Nomor 20	  

$q20 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_20'") or die (mysqli_error());
$d20=mysqli_fetch_array($q20); 
$id_20=$d20['id'];
$nama_f_20=$d20['name'];
$Q20 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' and fitur_id='$kasus_20'") or die (mysqli_error());
$d20=mysqli_fetch_array($Q20); 
$bobot_20=$d20['bobot'];
#echo "20. $nama_f_20 $bobot_20<br>";
// Nomor 21	  

$q21 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_21'") or die (mysqli_error());
$d21=mysqli_fetch_array($q21); 
$id_21=$d21['id'];
$nama_f_21=$d21['name'];
$Q21 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' and fitur_id='$kasus_21'") or die (mysqli_error());
$d21=mysqli_fetch_array($Q21); 
$bobot_21=$d21['bobot'];
#echo "21. $nama_f_21 $bobot_21<br>";

// Nomor 22	  

$q22 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus_22'") or die (mysqli_error());
$d22=mysqli_fetch_array($q22); 
$id_22=$d22['id'];
$nama_f_22=$d22['name'];
$Q22 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' and fitur_id='$kasus_22'") or die (mysqli_error());
$d22=mysqli_fetch_array($Q22); 
$bobot_22=$d22['bobot'];
#echo "22. $nama_f_22 $bobot_22<br>";	
 

$a1='{"id":'.$id_1.',"name":"'.$nama_f_2.'","bobot":'.$bobot_2.'}';
$data='{"1":{"id":'.$id_1.',"name":"'.$nama_f_1.'","bobot":'.$bobot_1.'},"2":{"id":'.$id_2.',"name":"'.$nama_f_2.'","bobot":'.$bobot_2.'},"3":{"id":'.$id_3.',"name":"'.$nama_f_3.'","bobot":'.$bobot_3.'},"4":{"id":'.$id_4.',"name":"'.$nama_f_4.'","bobot":'.$bobot_4.'},"5":{"id":'.$id_5.',"name":"'.$nama_f_5.'","bobot":'.$bobot_5.'},"6":{"id":'.$id_6.',"name":"'.$nama_f_6.'","bobot":'.$bobot_6.'},"7":{"id":'.$id_7.',"name":"'.$nama_f_7.'","bobot":'.$bobot_7.'},"8":{"id":'.$id_8.',"name":"'.$nama_f_8.'","bobot":'.$bobot_8.'},"9":{"id":'.$id_9.',"name":"'.$nama_f_9.'","bobot":'.$bobot_9.'},"10":{"id":'.$id_10.',"name":"'.$nama_f_10.'","bobot":'.$bobot_10.'},"11":{"id":'.$id_11.',"name":"'.$nama_f_11.'","bobot":'.$bobot_11.'},"12":{"id":'.$id_12.',"name":"'.$nama_f_12.'","bobot":'.$bobot_12.'},"13":{"id":'.$id_13.',"name":"'.$nama_f_13.'","bobot":'.$bobot_13.'},"14":{"id":'.$id_14.',"name":"'.$nama_f_14.'","bobot":'.$bobot_14.'},"15":{"id":'.$id_15.',"name":"'.$nama_f_15.'","bobot":'.$bobot_15.'},"16":{"id":'.$id_16.',"name":"'.$nama_f_16.'","bobot":'.$bobot_16.'},"17":{"id":'.$id_17.',"name":"'.$nama_f_17.'","bobot":'.$bobot_17.'},"18":{"id":'.$id_18.',"name":"'.$nama_f_18.'","bobot":'.$bobot_18.'},"19":{"id":'.$id_19.',"name":"'.$nama_f_19.'","bobot":'.$bobot_19.'},"20":{"id":'.$id_20.',"name":"'.$nama_f_20.'","bobot":'.$bobot_20.'},"21":{"id":'.$id_21.',"name":"'.$nama_f_21.'","bobot":'.$bobot_21.'},"22":{"id":'.$id_22.',"name":"'.$nama_f_22.'","bobot":'.$bobot_22.'}}	  
 ';

  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbpengetahuan SET 
                           type_jamur='$type_jamur',
						   collection='$data'
						   WHERE id = '$id'");
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";

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
                             <h4>Pencarian Pengetahuan</h4>
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
                                                <option value="type_jamur">Type Jamur</option>
												<option value="collection">Collection</option>
												
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketik disini</label>
                                            <input class="form-control"  type="text" name="txtcari" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3" name="Cari">Cari</button>
<a href="<?php echo"$_SERVER[PHP_SELF]?module=pengetahuan";?>"><button type="button" class="btn btn-primary mb-3">Batal Cari</button></a>
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

echo"<script>location.href='$_SERVER[PHP_SELF]?module=pengetahuan&stt=hasil_cari&list=$listcari&txt=$txtcari';</script>";
?>


	
<?php	

	


}

?>

<?php
}
else if($stt=="hasil_cari"){
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
                                                    <th scope="col">Type Jamur</th>
													<th scope="col">Collection</th>
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       
                                       <?php
									   
$listcari=$_GET['list'];									   
$txtcari=$_GET['txt'];									   

$query99 = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan WHERE `$listcari` like '%$txtcari%' order by `id` asc") or die (mysqli_error());
   if(mysqli_num_rows($query99) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='4'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{

//--------------------------------------------------------------------------------------------
$batas1   = 10;
$page1 = $_GET['page1'];
if(empty($page1)){$posawal1  = 0;$page1 = 1;}
else{$posawal1 = ($page1-1) * $batas1;}

//$s2 = $query." LIMIT $posawal,$batas";
$q211  = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan WHERE `$listcari` like '%$txtcari%' order by `id` asc LIMIT $posawal1,$batas1") or die (mysqli_error());
$no1 = $posawal1+1;
//--------------------------------------------------------------------------------------------   
   
	
#$no=1;
      while($r = mysqli_fetch_array($q211)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no1."." ?></td>
  <td align="center"><?php echo $r['type_jamur'] ?></td>  
 <td align="center"><?php $data=$r['collection'];
  
  
	
	
	$t=explode("}",$data);
	  
	  $string1 = $t[0];
      $result1 = preg_replace("/[^0-9]/", "", $string1);
	  $r1=explode("{",$t[0]);
	  $t1=',"1":{'.$r1[2];
	  $s1=substr($t1,11,2);
	  $kasus1 = preg_replace("/[^0-9]/", "", $s1);
	  #echo "1. ".$kasus1."<br>";
	  
	 
	  
	  #echo $t[1]."<br>";
	  $s2=substr($t[1],11,2);
	  $kasus2 = preg_replace("/[^0-9]/", "", $s2);
	  #echo "2. ".$kasus2."<br>";
	  
	  
	  
	 # echo $t[2]."<br>";
	  $s3=substr($t[2],11,2);
	  $kasus3 = preg_replace("/[^0-9]/", "", $s3);
	  #echo "3. ".$kasus3."<br>";
	  
	  #echo $t[3]."<br>";
	  $s4=substr($t[3],11,2);
	  $kasus4 = preg_replace("/[^0-9]/", "", $s4);
	  #echo "4. ".$kasus4."<br>";
	  
	  #echo $t[4]."<br>";
	  $s5=substr($t[4],11,2);
	  $kasus5 = preg_replace("/[^0-9]/", "", $s5);
	  #echo "5. ".$kasus5."<br>";
	  
	  #echo $t[5]."<br>";
	  $s6=substr($t[5],11,2);
	  $kasus6 = preg_replace("/[^0-9]/", "", $s6);
	  #echo "6. ".$kasus6."<br>";
	  
	  #echo $t[6]."<br>";
	  $s7=substr($t[6],11,2);
	  $kasus7 = preg_replace("/[^0-9]/", "", $s7);
	  #echo "7. ".$kasus7."<br>";
	  
	  #echo $t[7]."<br>";
	  $s8=substr($t[7],11,2);
	  $kasus8 = preg_replace("/[^0-9]/", "", $s8);
	  #echo "8. ".$kasus8."<br>";
	  
	  #echo $t[8]."<br>";
	  $s9=substr($t[8],11,2);
	  $kasus9 = preg_replace("/[^0-9]/", "", $s9);
	  #echo "9. ".$kasus9."<br>";
	  
	  #echo $t[9]."<br>";
	  $s10=substr($t[9],12,2);
	  $kasus10 = preg_replace("/[^0-9]/", "", $s10);
	  #echo "10. ".$kasus10."<br>";
	  
	  	  
	  #echo $t[10]."<br>";
	  $s11=substr($t[10],12,2);
	  $kasus11 = preg_replace("/[^0-9]/", "", $s11);
	  #echo "11. ".$kasus11."<br>";
	  
	  #echo $t[11]."<br>";
	  $s12=substr($t[11],12,2);
	  $kasus12 = preg_replace("/[^0-9]/", "", $s12);
	  #echo "12. ".$kasus12."<br>";
	  
	  #echo $t[12]."<br>";
	  $s13=substr($t[12],12,2);
	  $kasus13 = preg_replace("/[^0-9]/", "", $s13);
	  #echo "13. ".$kasus13."<br>";
	  
	  #echo $t[13]."<br>";
	  $s14=substr($t[13],12,2);
	  $kasus14 = preg_replace("/[^0-9]/", "", $s14);
	  #echo "14. ".$kasus14."<br>";
	  
	  #echo $t[14]."<br>";
	  $s15=substr($t[14],12,2);
	  $kasus15 = preg_replace("/[^0-9]/", "", $s15);
	  #echo "15. ".$kasus15."<br>";
	  
	  #echo $t[15]."<br>";
	  $s16=substr($t[15],12,2);
	  $kasus16 = preg_replace("/[^0-9]/", "", $s16);
	  #echo "16. ".$kasus16."<br>";
	  
	  #echo $t[16]."<br>";
	  $s17=substr($t[16],12,2);
	  $kasus17 = preg_replace("/[^0-9]/", "", $s17);
	  #echo "17. ".$kasus17."<br>";
	  
	  #echo $t[17]."<br>";
	  $s18=substr($t[17],12,2);
	  $kasus18 = preg_replace("/[^0-9]/", "", $s18);
	  #echo "18. ".$kasus18."<br>";
	  
	  #echo $t[18]."<br>";
	  $s19=substr($t[18],12,2);
	  $kasus19 = preg_replace("/[^0-9]/", "", $s19);
	  #echo "19. ".$kasus19."<br>";
	  
	  #echo $t[19]."<br>";
	  $s20=substr($t[19],12,2);
	  $kasus20 = preg_replace("/[^0-9]/", "", $s20);
	  #echo "20. ".$kasus20."<br>";
	  
	  #echo $t[20]."<br>";
	  $s21=substr($t[20],12,2);
	  $kasus21 = preg_replace("/[^0-9]/", "", $s21);
	  #echo "21. ".$kasus21."<br>";
	  
	  # echo $t[21]."<br>";
	  $s22=substr($t[21],12,2);
	  $kasus22 = preg_replace("/[^0-9]/", "", $s22);
	  #echo "22. ".$kasus22."<br>";
	  
	 

// Nomor 1	  
$q1 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus1'") or die (mysqli_error());
$d1=mysqli_fetch_array($q1); 
$id_1=$d1['id'];
$nama_f_1=$d1['name'];
$Q1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' and fitur_id='$kasus1'") or die (mysqli_error());
$d1=mysqli_fetch_array($Q1); 
$bobot_1=$d1['bobot'];
#echo "1. $nama_f_1 $bobot_1<br>";

//nomor 2
$q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus2'") or die (mysqli_error());
$d2=mysqli_fetch_array($q2); 
$id_2=$d2['id'];
$nama_f_2=$d2['name'];

$Q2 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' and fitur_id='$kasus2'") or die (mysqli_error());
$d2=mysqli_fetch_array($Q2); 
$bobot_2=$d2['bobot'];

#echo "2. $nama_f_2 $bobot_2<br>";

// Nomor 3	  
$q3 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus3'") or die (mysqli_error());
$d3=mysqli_fetch_array($q3); 
$id_3=$d3['id'];
$nama_f_3=$d3['name'];
$Q3 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' and fitur_id='$kasus3'") or die (mysqli_error());
$d3=mysqli_fetch_array($Q3); 
$bobot_3=$d3['bobot'];
#echo "3. $nama_f_3 $bobot_3<br>";

// Nomor 4	  
$q4 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus4'") or die (mysqli_error());
$d4=mysqli_fetch_array($q4); 
$id_4=$d4['id'];
$nama_f_4=$d4['name'];
$Q4 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' and fitur_id='$kasus4'") or die (mysqli_error());
$d4=mysqli_fetch_array($Q4); 
$bobot_4=$d4['bobot'];
#echo "4. $nama_f_4 $bobot_4<br>";
// Nomor 5	  
$q5 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus5'") or die (mysqli_error());
$d5=mysqli_fetch_array($q5); 
$id_5=$d5['id'];
$nama_f_5=$d5['name'];
$Q5 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' and fitur_id='$kasus5'") or die (mysqli_error());
$d5=mysqli_fetch_array($Q5); 
$bobot_5=$d5['bobot'];
#echo "5. $nama_f_5 $bobot_5<br>";
// Nomor 6	  
$q6 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus6'") or die (mysqli_error());
$d6=mysqli_fetch_array($q6); 
$id_6=$d6['id'];
$nama_f_6=$d6['name'];
$Q6 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' and fitur_id='$kasus6'") or die (mysqli_error());
$d6=mysqli_fetch_array($Q6); 
$bobot_6=$d6['bobot'];
#echo "6. $nama_f_6 $bobot_6<br>";
// Nomor 7	  
$q7 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus7'") or die (mysqli_error());
$d7=mysqli_fetch_array($q7); 
$id_7=$d7['id'];
$nama_f_7=$d7['name'];
$Q7 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' and fitur_id='$kasus7'") or die (mysqli_error());
$d7=mysqli_fetch_array($Q7); 
$bobot_7=$d7['bobot'];
#echo "7. $nama_f_7 $bobot_7<br>";
// Nomor 8	  
$q8 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus8'") or die (mysqli_error());
$d8=mysqli_fetch_array($q8); 
$id_8=$d8['id'];
$nama_f_8=$d8['name'];
$Q8 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' and fitur_id='$kasus8'") or die (mysqli_error());
$d8=mysqli_fetch_array($Q8); 
$bobot_8=$d8['bobot'];
#echo "8. $nama_f_8 $bobot_8<br>";
// Nomor 9	  
$q9 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus9'") or die (mysqli_error());
$d9=mysqli_fetch_array($q9); 
$id_9=$d9['id'];
$nama_f_9=$d9['name'];
$Q9 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' and fitur_id='$kasus9'") or die (mysqli_error());
$d9=mysqli_fetch_array($Q9); 
$bobot_9=$d9['bobot'];
#echo "9. $nama_f_9 $bobot_9<br>";
// Nomor 10	  
$q10 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus10'") or die (mysqli_error());
$d10=mysqli_fetch_array($q10); 
$id_10=$d10['id'];
$nama_f_10=$d10['name'];
$Q10 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' and fitur_id='$kasus10'") or die (mysqli_error());
$d10=mysqli_fetch_array($Q10); 
$bobot_10=$d10['bobot'];
#echo "10. $nama_f_10 $bobot_10<br>";
// Nomor 11	  
$q11 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus11'") or die (mysqli_error());
$d11=mysqli_fetch_array($q11); 
$id_11=$d11['id'];
$nama_f_11=$d11['name'];
$Q11 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' and fitur_id='$kasus11'") or die (mysqli_error());
$d11=mysqli_fetch_array($Q11); 
$bobot_11=$d11['bobot'];
#echo "11. $nama_f_11 $bobot_11<br>";
// Nomor 12	  
$q12 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus12'") or die (mysqli_error());
$d12=mysqli_fetch_array($q12); 
$id_12=$d12['id'];
$nama_f_12=$d12['name'];
$Q12 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' and fitur_id='$kasus12'") or die (mysqli_error());
$d12=mysqli_fetch_array($Q12); 
$bobot_12=$d12['bobot'];
#echo "12. $nama_f_12 $bobot_12<br>";
// Nomor 13	  
$q13 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus13'") or die (mysqli_error());
$d13=mysqli_fetch_array($q13); 
$id_13=$d13['id'];
$nama_f_13=$d13['name'];
$Q13 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' and fitur_id='$kasus13'") or die (mysqli_error());
$d13=mysqli_fetch_array($Q13); 
$bobot_13=$d13['bobot'];
#echo "13. $nama_f_13 $bobot_13<br>";
// Nomor 14	  
$q14 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus14'") or die (mysqli_error());
$d14=mysqli_fetch_array($q14); 
$id_14=$d14['id'];
$nama_f_14=$d14['name'];
$Q14 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' and fitur_id='$kasus14'") or die (mysqli_error());
$d14=mysqli_fetch_array($Q14); 
$bobot_14=$d14['bobot'];
#echo "14. $nama_f_14 $bobot_14<br>";
// Nomor 15	  

$q15 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus15'") or die (mysqli_error());
$d15=mysqli_fetch_array($q15); 
$id_15=$d15['id'];
$nama_f_15=$d15['name'];
$Q15 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' and fitur_id='$kasus15'") or die (mysqli_error());
$d15=mysqli_fetch_array($Q15); 
$bobot_15=$d15['bobot'];
#echo "15. $nama_f_15 $bobot_15<br>";
// Nomor 16	  

$q16 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus16'") or die (mysqli_error());
$d16=mysqli_fetch_array($q16); 
$id_16=$d16['id'];
$nama_f_16=$d16['name'];
$Q16 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' and fitur_id='$kasus16'") or die (mysqli_error());
$d16=mysqli_fetch_array($Q16); 
$bobot_16=$d16['bobot'];
#echo "16. $nama_f_16 $bobot_16<br>";
// Nomor 17	  

$q17 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus17'") or die (mysqli_error());
$d17=mysqli_fetch_array($q17); 
$id_17=$d17['id'];
$nama_f_17=$d17['name'];
$Q17 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' and fitur_id='$kasus17'") or die (mysqli_error());
$d17=mysqli_fetch_array($Q17); 
$bobot_17=$d17['bobot'];
#echo "17. $nama_f_17 $bobot_17<br>";
// Nomor 18	  

$q18 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus18'") or die (mysqli_error());
$d18=mysqli_fetch_array($q18); 
$id_18=$d18['id'];
$nama_f_18=$d18['name'];
$Q18 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' and fitur_id='$kasus18'") or die (mysqli_error());
$d18=mysqli_fetch_array($Q18); 
$bobot_18=$d18['bobot'];
#echo "18. $nama_f_18 $bobot_18<br>";
// Nomor 19	  

$q19 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus19'") or die (mysqli_error());
$d19=mysqli_fetch_array($q19); 
$id_19=$d19['id'];
$nama_f_19=$d19['name'];
$Q19 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' and fitur_id='$kasus19'") or die (mysqli_error());
$d19=mysqli_fetch_array($Q19); 
$bobot_19=$d19['bobot'];
#echo "19. $nama_f_19 $bobot_19<br>";
// Nomor 20	  

$q20 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus20'") or die (mysqli_error());
$d20=mysqli_fetch_array($q20); 
$id_20=$d20['id'];
$nama_f_20=$d20['name'];
$Q20 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' and fitur_id='$kasus20'") or die (mysqli_error());
$d20=mysqli_fetch_array($Q20); 
$bobot_20=$d20['bobot'];
#echo "20. $nama_f_20 $bobot_20<br>";
// Nomor 21	  

$q21 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus21'") or die (mysqli_error());
$d21=mysqli_fetch_array($q21); 
$id_21=$d21['id'];
$nama_f_21=$d21['name'];
$Q21 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' and fitur_id='$kasus21'") or die (mysqli_error());
$d21=mysqli_fetch_array($Q21); 
$bobot_21=$d21['bobot'];
#echo "21. $nama_f_21 $bobot_21<br>";

// Nomor 22	  

$q22 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$kasus22'") or die (mysqli_error());
$d22=mysqli_fetch_array($q22); 
$id_22=$d22['id'];
$nama_f_22=$d22['name'];
$Q22 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' and fitur_id='$kasus22'") or die (mysqli_error());
$d22=mysqli_fetch_array($Q22); 
$bobot_22=$d22['bobot'];
#echo "22. $nama_f_22 $bobot_22<br>";	 

  ?>
  
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_1 : $bobot_1";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_2 : $bobot_2";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_3 : $bobot_3";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_4 : $bobot_4";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_5 : $bobot_5";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_6 : $bobot_6";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_7 : $bobot_7";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_8 : $bobot_8";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_9 : $bobot_9";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_10 : $bobot_10";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_11 : $bobot_11";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_12 : $bobot_12";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_13 : $bobot_13";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_14 : $bobot_14";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_15 : $bobot_15";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_16 : $bobot_16";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_17 : $bobot_17";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_18 : $bobot_18";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_19 : $bobot_19";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_20 : $bobot_20";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_21 : $bobot_21";?></p>
  <p class="btn btn-danger btn-xs mb-3"><?php echo "$nama_f_22 : $bobot_22";?></p>
  
  
  
  </td>
  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengetahuan&stt=edit&id=".$r['id'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengetahuan&stt=hapus&id=".$r['id'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
  </td>
 </tr>
 <?php
 $no1++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>
                                </table>
                                </form>
                               
                            </div>
   <?php
//$s2 = mysqli_query($query);
$jmldata1 = mysqli_num_rows($query99);
if($jmldata1>0){
    if($batas1<1){$batas1=1;}
$jmlhal1  = ceil($jmldata1/$batas1);
    echo "<div class='pagination_area pull-right mt-5'><ul>";
    if($page1 > 1){
        $prev1=$page1-1;
        echo "<li class=prevnext><a href='$_SERVER[PHP_SELF]?module=pengetahuan&stt=hasil_cari&list=$listcari&txt=$txtcari&page1=$prev1'><i class='fa fa-chevron-left'></i></a></li> ";
    }
    else{echo "<li class='page-item disabled'><i class='fa fa-chevron-left'></i></li> ";}

    // collection_galerikan link page 1,2,3 ...
    for($i1=1;$i1<=$jmlhal1;$i1++)
    if ($i1 != $page1){echo "<li><a href='$_SERVER[PHP_SELF]?module=pengetahuan&stt=hasil_cari&list=$listcari&txt=$txtcari&page1=$i1'>$i1</a></li> ";}
    else{echo " <li class='active'>$i1</li> ";}

    // Link kepage berikutnya (Next)
    if($page1 < $jmlhal1){
        $next1=$page1+1;
        echo "<li class=prevnext><a href='?module=pengetahuan&stt=hasil_cari&list=$listcari&txt=$txtcari&page1=$next1'><i class='fa fa-chevron-right'></i></a></li>";
    }
    else{ echo "<li class='page-item disabled'><i class='fa fa-chevron-right'></i></li>";}
    echo "</ul></div>";
    }//if jmldata

else{
//$s2 = mysqli_query($query);
$jmldata1 = mysqli_num_rows($query99);
}


echo"<br>Jumlah : $jmldata1 Pengetahuan";
?>                         
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>


 </div>

 </div>
<?php
}
?>