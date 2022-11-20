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
 echo"<script>location.href='$_SERVER[PHP_SELF]?module=hasil_pakar&stt=cari&txt=$txtcari&list=$listcari';</script>";
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
													<th scope="col">Nama</th>
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
  $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbpengunjung where tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung order by tbkonsultasi.id_konsultasi desc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='9'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
	
		
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_konsultasi'] ?>
  <br>
     
  </td> 
    <td align="center"><?php echo $r['nama'] ?></td> 
 <td align="center"><?php 
 $tgl_konsul=$r["tgl_konsul"];
	   $pisah=explode("-",$tgl_konsul);
	   echo $pisah[2]."-".$pisah[1]."-".$pisah[0];
  ?></td>  
 <td align="center"><?php 
  $no_kasus=$r["no_kasus"];
  
  
  echo $no_kasus; ?></td>
 
  <td align="center"><?php 
    $nilai=$r["nilai"];
  
  
  echo $nilai; ?></td>
  <td align="center"><?php 
    $type_jamur=$r["type_jamur"];
  
  echo $type_jamur;
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
 <?php
  $status_konsul=$r['status_konsul'];
  if($status_konsul=="K"){
 ?>
 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_pakar&stt=edit&id=".$r['id_konsultasi'] ?>"><i class="fa fa-edit"></i></a> 
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_pakar&stt=hapus&id=".$r['id_konsultasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
  <?php $id_konsultasi=$r["id_konsultasi"]; ?>
  <a href="media.php?module=tampil_detail&mn=hasil_pakar&idk=<?php echo $id_konsultasi ;?>" class="menu"><i class="ti-view-list"></i></a></td> 
  <?php
  }
  else{
	  ?>
	<a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_pakar&stt=hapus&id=".$r['id_konsultasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
  <?php $id_konsultasi=$r["id_konsultasi"]; ?>
  <a href="media.php?module=tampil_detail&mn=hasil_pakar&idk=<?php echo $id_konsultasi ;?>" class="menu"><i class="ti-view-list"></i></a></td> 
  
	<?php  
  }
  ?>
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
                        
                            
							
                        
                    </div>
                </div>





<?php
}
else if($stt=="tambah"){
?>




<?php }
else if($stt=="hapus"){
 ?>

<?php
  $id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbkonsultasi WHERE `id_konsultasi` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=hasil_pakar';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=hasil_pakar';</script>";
 }

?>


<?php } 
else if($stt=="edit"){
?>

<?php
$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where id_konsultasi='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_konsultasi=$d["id_konsultasi"];
    $tgl_konsul=$d["tgl_konsul"];
	$nilai=$d["nilai"];
    $type_jamur=$d["type_jamur"];
	$no_kasus=$d["no_kasus"];

$query = mysqli_query($koneksi, "SELECT * FROM tbthreshold") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $nilai_t=$d["nilai"];
	
	?>

<div class="card mt-5">
                    <div class="card-body">
<div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Form Edit Konsultasi</h4>
							 <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        
                                       <div class="form-group">
                                            <label>Batas Threshold</label>
                                            <input class="form-control"  disabled type="text" name="nilai_t" value="<?php echo $nilai_t;?>" />
                                        </div>
										<div class="form-group">
                                            <label>Nilai</label>
                                            <input class="form-control" disabled type="text" name="nilai" value="<?php echo $nilai;?>" />
                                        </div>
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
										
										
                                        <button type="submit" class="btn btn-primary mb-3" name="Update">Simpan</button>
                                        <input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                                        <input type="hidden" name="id_konsultasi" value="<?php echo"$id_konsultasi";?>">
<a href="<?php echo"$_SERVER[PHP_SELF]?module=hasil_pakar";?>"><button type="button" class="btn btn-primary mb-3">Batal</button></a>
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
  $id_konsultasi=$_POST['id_konsultasi'];
  $type_jamur=$_POST['type_jamur'];
  $nilai_k=$_POST['nilai'];

  $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where id_konsultasi='$id_konsultasi'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id=$d["id"];
    $tgl_konsul=$d["tgl_konsul"];
	$no_kasus=$d["no_kasus"];
	$type=$d["type_jamur"];
	$nilai=$d["nilai"];
	

  $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "";
    }else{

   
		
		$no=1;
      while($r = mysqli_fetch_array($query)){
   
 
  $id_fitur=$r['id_fitur'];
 $q = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
 $d=mysqli_fetch_array($q); 
 $id=$d['id'];
 $name_f=$d['name'];
#echo $name_f."($id)";
#echo $name_f;

  

$id_fitur=$r['id_fitur'];
 $q = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='$no' and fitur_id='$id_fitur'") or die (mysqli_error());
 $d=mysqli_fetch_array($q); 
 $id=$d['id'];
 $bobot=$d['bobot'];
#echo $bobot;


 
  

 $no++;
	  }
// Nomor 1	  
$q1 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='1'") or die (mysqli_error());
$d1=mysqli_fetch_array($q1); 
$id_fitur=$d1['id_fitur'];
$q1 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d1=mysqli_fetch_array($q1); 
$id_1=$d1['id'];
$nama_f_1=$d1['name'];
$Q1 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='1' and fitur_id='$id_fitur'") or die (mysqli_error());
$d1=mysqli_fetch_array($Q1); 
$bobot_1=$d1['bobot'];
#echo "1. $nama_f_1 $bobot_1<br>";

//nomor 2
$q2 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='2'") or die (mysqli_error());
$d2=mysqli_fetch_array($q2); 
$id_fitur=$d2['id_fitur'];

$q2 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d2=mysqli_fetch_array($q2); 
$id_2=$d2['id'];
$nama_f_2=$d2['name'];

$Q2 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='2' and fitur_id='$id_fitur'") or die (mysqli_error());
$d2=mysqli_fetch_array($Q2); 
$bobot_2=$d2['bobot'];

#echo "2. $nama_f_2 $bobot_2<br>";

// Nomor 3	  
$q3 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='3'") or die (mysqli_error());
$d3=mysqli_fetch_array($q3); 
$id_fitur=$d3['id_fitur'];
$q3 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d3=mysqli_fetch_array($q3); 
$id_3=$d3['id'];
$nama_f_3=$d3['name'];
$Q3 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='3' and fitur_id='$id_fitur'") or die (mysqli_error());
$d3=mysqli_fetch_array($Q3); 
$bobot_3=$d3['bobot'];
#echo "3. $nama_f_3 $bobot_3<br>";

// Nomor 4	  
$q4 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='4'") or die (mysqli_error());
$d4=mysqli_fetch_array($q4); 
$id_fitur=$d4['id_fitur'];
$q4 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d4=mysqli_fetch_array($q4); 
$id_4=$d4['id'];
$nama_f_4=$d4['name'];
$Q4 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='4' and fitur_id='$id_fitur'") or die (mysqli_error());
$d4=mysqli_fetch_array($Q4); 
$bobot_4=$d4['bobot'];
#echo "4. $nama_f_4 $bobot_4<br>";
// Nomor 5	  
$q5 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='5'") or die (mysqli_error());
$d5=mysqli_fetch_array($q5); 
$id_fitur=$d5['id_fitur'];
$q5 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d5=mysqli_fetch_array($q5); 
$id_5=$d5['id'];
$nama_f_5=$d5['name'];
$Q5 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='5' and fitur_id='$id_fitur'") or die (mysqli_error());
$d5=mysqli_fetch_array($Q5); 
$bobot_5=$d5['bobot'];
#echo "5. $nama_f_5 $bobot_5<br>";
// Nomor 6	  
$q6 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='6'") or die (mysqli_error());
$d6=mysqli_fetch_array($q6); 
$id_fitur=$d6['id_fitur'];
$q6 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d6=mysqli_fetch_array($q6); 
$id_6=$d6['id'];
$nama_f_6=$d6['name'];
$Q6 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='6' and fitur_id='$id_fitur'") or die (mysqli_error());
$d6=mysqli_fetch_array($Q6); 
$bobot_6=$d6['bobot'];
#echo "6. $nama_f_6 $bobot_6<br>";
// Nomor 7	  
$q7 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='7'") or die (mysqli_error());
$d7=mysqli_fetch_array($q7); 
$id_fitur=$d7['id_fitur'];
$q7 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d7=mysqli_fetch_array($q7); 
$id_7=$d7['id'];
$nama_f_7=$d7['name'];
$Q7 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='7' and fitur_id='$id_fitur'") or die (mysqli_error());
$d7=mysqli_fetch_array($Q7); 
$bobot_7=$d7['bobot'];
#echo "7. $nama_f_7 $bobot_7<br>";
// Nomor 8	  
$q8 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='8'") or die (mysqli_error());
$d8=mysqli_fetch_array($q8); 
$id_fitur=$d8['id_fitur'];
$q8 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d8=mysqli_fetch_array($q8); 
$id_8=$d8['id'];
$nama_f_8=$d8['name'];
$Q8 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='8' and fitur_id='$id_fitur'") or die (mysqli_error());
$d8=mysqli_fetch_array($Q8); 
$bobot_8=$d8['bobot'];
#echo "8. $nama_f_8 $bobot_8<br>";
// Nomor 9	  
$q9 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='9'") or die (mysqli_error());
$d9=mysqli_fetch_array($q9); 
$id_fitur=$d9['id_fitur'];
$q9 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d9=mysqli_fetch_array($q9); 
$id_9=$d9['id'];
$nama_f_9=$d9['name'];
$Q9 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='9' and fitur_id='$id_fitur'") or die (mysqli_error());
$d9=mysqli_fetch_array($Q9); 
$bobot_9=$d9['bobot'];
#echo "9. $nama_f_9 $bobot_9<br>";
// Nomor 10	  
$q10 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='10'") or die (mysqli_error());
$d10=mysqli_fetch_array($q10); 
$id_fitur=$d10['id_fitur'];
$q10 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d10=mysqli_fetch_array($q10); 
$id_10=$d10['id'];
$nama_f_10=$d10['name'];
$Q10 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='10' and fitur_id='$id_fitur'") or die (mysqli_error());
$d10=mysqli_fetch_array($Q10); 
$bobot_10=$d10['bobot'];
#echo "10. $nama_f_10 $bobot_10<br>";
// Nomor 11	  
$q11 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='11'") or die (mysqli_error());
$d11=mysqli_fetch_array($q11); 
$id_fitur=$d11['id_fitur'];
$q11 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d11=mysqli_fetch_array($q11); 
$id_11=$d11['id'];
$nama_f_11=$d11['name'];
$Q11 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='11' and fitur_id='$id_fitur'") or die (mysqli_error());
$d11=mysqli_fetch_array($Q11); 
$bobot_11=$d11['bobot'];
#echo "11. $nama_f_11 $bobot_11<br>";
// Nomor 12	  
$q12 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='12'") or die (mysqli_error());
$d12=mysqli_fetch_array($q12); 
$id_fitur=$d12['id_fitur'];
$q12 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d12=mysqli_fetch_array($q12); 
$id_12=$d12['id'];
$nama_f_12=$d12['name'];
$Q12 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='12' and fitur_id='$id_fitur'") or die (mysqli_error());
$d12=mysqli_fetch_array($Q12); 
$bobot_12=$d12['bobot'];
#echo "12. $nama_f_12 $bobot_12<br>";
// Nomor 13	  
$q13 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='13'") or die (mysqli_error());
$d13=mysqli_fetch_array($q13); 
$id_fitur=$d13['id_fitur'];
$q13 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d13=mysqli_fetch_array($q13); 
$id_13=$d13['id'];
$nama_f_13=$d13['name'];
$Q13 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='13' and fitur_id='$id_fitur'") or die (mysqli_error());
$d13=mysqli_fetch_array($Q13); 
$bobot_13=$d13['bobot'];
#echo "13. $nama_f_13 $bobot_13<br>";
// Nomor 14	  
$q14 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='14'") or die (mysqli_error());
$d14=mysqli_fetch_array($q14); 
$id_fitur=$d14['id_fitur'];
$q14 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d14=mysqli_fetch_array($q14); 
$id_14=$d14['id'];
$nama_f_14=$d14['name'];
$Q14 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='14' and fitur_id='$id_fitur'") or die (mysqli_error());
$d14=mysqli_fetch_array($Q14); 
$bobot_14=$d14['bobot'];
#echo "14. $nama_f_14 $bobot_14<br>";
// Nomor 15	  
$q15 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='15'") or die (mysqli_error());
$d15=mysqli_fetch_array($q15); 
$id_fitur=$d15['id_fitur'];
$q15 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d15=mysqli_fetch_array($q15); 
$id_15=$d15['id'];
$nama_f_15=$d15['name'];
$Q15 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='15' and fitur_id='$id_fitur'") or die (mysqli_error());
$d15=mysqli_fetch_array($Q15); 
$bobot_15=$d15['bobot'];
#echo "15. $nama_f_15 $bobot_15<br>";
// Nomor 16	  
$q16 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='16'") or die (mysqli_error());
$d16=mysqli_fetch_array($q16); 
$id_fitur=$d16['id_fitur'];
$q16 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d16=mysqli_fetch_array($q16); 
$id_16=$d16['id'];
$nama_f_16=$d16['name'];
$Q16 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='16' and fitur_id='$id_fitur'") or die (mysqli_error());
$d16=mysqli_fetch_array($Q16); 
$bobot_16=$d16['bobot'];
#echo "16. $nama_f_16 $bobot_16<br>";
// Nomor 17	  
$q17 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='17'") or die (mysqli_error());
$d17=mysqli_fetch_array($q17); 
$id_fitur=$d17['id_fitur'];
$q17 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d17=mysqli_fetch_array($q17); 
$id_17=$d17['id'];
$nama_f_17=$d17['name'];
$Q17 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='17' and fitur_id='$id_fitur'") or die (mysqli_error());
$d17=mysqli_fetch_array($Q17); 
$bobot_17=$d17['bobot'];
#echo "17. $nama_f_17 $bobot_17<br>";
// Nomor 18	  
$q18 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='18'") or die (mysqli_error());
$d18=mysqli_fetch_array($q18); 
$id_fitur=$d18['id_fitur'];
$q18 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d18=mysqli_fetch_array($q18); 
$id_18=$d18['id'];
$nama_f_18=$d18['name'];
$Q18 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='18' and fitur_id='$id_fitur'") or die (mysqli_error());
$d18=mysqli_fetch_array($Q18); 
$bobot_18=$d18['bobot'];
#echo "18. $nama_f_18 $bobot_18<br>";
// Nomor 19	  
$q19 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='19'") or die (mysqli_error());
$d19=mysqli_fetch_array($q19); 
$id_fitur=$d19['id_fitur'];
$q19 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d19=mysqli_fetch_array($q19); 
$id_19=$d19['id'];
$nama_f_19=$d19['name'];
$Q19 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='19' and fitur_id='$id_fitur'") or die (mysqli_error());
$d19=mysqli_fetch_array($Q19); 
$bobot_19=$d19['bobot'];
#echo "19. $nama_f_19 $bobot_19<br>";
// Nomor 20	  
$q20 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='20'") or die (mysqli_error());
$d20=mysqli_fetch_array($q20); 
$id_fitur=$d20['id_fitur'];
$q20 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d20=mysqli_fetch_array($q20); 
$id_20=$d20['id'];
$nama_f_20=$d20['name'];
$Q20 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='20' and fitur_id='$id_fitur'") or die (mysqli_error());
$d20=mysqli_fetch_array($Q20); 
$bobot_20=$d20['bobot'];
#echo "20. $nama_f_20 $bobot_20<br>";
// Nomor 21	  
$q21 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='21'") or die (mysqli_error());
$d21=mysqli_fetch_array($q21); 
$id_fitur=$d21['id_fitur'];
$q21 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d21=mysqli_fetch_array($q21); 
$id_21=$d21['id'];
$nama_f_21=$d21['name'];
$Q21 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='21' and fitur_id='$id_fitur'") or die (mysqli_error());
$d21=mysqli_fetch_array($Q21); 
$bobot_21=$d21['bobot'];
#echo "21. $nama_f_21 $bobot_21<br>";

// Nomor 22	  
$q22 = mysqli_query($koneksi, "SELECT * FROM tbdetail_konsultasi where id_konsultasi='$id_konsultasi' and id_atribut='22'") or die (mysqli_error());
$d22=mysqli_fetch_array($q22); 
$id_fitur=$d22['id_fitur'];
$q22 = mysqli_query($koneksi, "SELECT * FROM tbfitur where id='$id_fitur'") or die (mysqli_error());
$d22=mysqli_fetch_array($q22); 
$id_22=$d22['id'];
$nama_f_22=$d22['name'];
$Q22 = mysqli_query($koneksi, "SELECT * FROM tbrelasi_atribut_fitur where attribute_id='22' and fitur_id='$id_fitur'") or die (mysqli_error());
$d22=mysqli_fetch_array($Q22); 
$bobot_22=$d22['bobot'];
#echo "22. $nama_f_22 $bobot_22<br>";	

  
//

$a1='{"id":'.$id_1.',"name":"'.$nama_f_2.'","bobot":'.$bobot_2.'}';
$data='{"1":{"id":'.$id_1.',"name":"'.$nama_f_1.'","bobot":'.$bobot_1.'},"2":{"id":'.$id_2.',"name":"'.$nama_f_2.'","bobot":'.$bobot_2.'},"3":{"id":'.$id_3.',"name":"'.$nama_f_3.'","bobot":'.$bobot_3.'},"4":{"id":'.$id_4.',"name":"'.$nama_f_4.'","bobot":'.$bobot_4.'},"5":{"id":'.$id_5.',"name":"'.$nama_f_5.'","bobot":'.$bobot_5.'},"6":{"id":'.$id_6.',"name":"'.$nama_f_6.'","bobot":'.$bobot_6.'},"7":{"id":'.$id_7.',"name":"'.$nama_f_7.'","bobot":'.$bobot_7.'},"8":{"id":'.$id_8.',"name":"'.$nama_f_8.'","bobot":'.$bobot_8.'},"9":{"id":'.$id_9.',"name":"'.$nama_f_9.'","bobot":'.$bobot_9.'},"10":{"id":'.$id_10.',"name":"'.$nama_f_10.'","bobot":'.$bobot_10.'},"11":{"id":'.$id_11.',"name":"'.$nama_f_11.'","bobot":'.$bobot_11.'},"12":{"id":'.$id_12.',"name":"'.$nama_f_12.'","bobot":'.$bobot_12.'},"13":{"id":'.$id_13.',"name":"'.$nama_f_13.'","bobot":'.$bobot_13.'},"14":{"id":'.$id_14.',"name":"'.$nama_f_14.'","bobot":'.$bobot_14.'},"15":{"id":'.$id_15.',"name":"'.$nama_f_15.'","bobot":'.$bobot_15.'},"16":{"id":'.$id_16.',"name":"'.$nama_f_16.'","bobot":'.$bobot_16.'},"17":{"id":'.$id_17.',"name":"'.$nama_f_17.'","bobot":'.$bobot_17.'},"18":{"id":'.$id_18.',"name":"'.$nama_f_18.'","bobot":'.$bobot_18.'},"19":{"id":'.$id_19.',"name":"'.$nama_f_19.'","bobot":'.$bobot_19.'},"20":{"id":'.$id_20.',"name":"'.$nama_f_20.'","bobot":'.$bobot_20.'},"21":{"id":'.$id_21.',"name":"'.$nama_f_21.'","bobot":'.$bobot_21.'},"22":{"id":'.$id_22.',"name":"'.$nama_f_22.'","bobot":'.$bobot_22.'}}	  
 ';
#echo $data;	  
 
//{"1":{"id":3,"name":"CONVEX","bobot":0.55},"2":{"id":10,"name":"SMOOTH","bobot":0.53},"3":{"id":19,"name":"WHITE","bobot":0.69},"4":{"id":21,"name":"BRUISES","bobot":0.82},"5":{"id":23,"name":"ALMOND","bobot":1},"6":{"id":35,"name":"FREE","bobot":0.52},"7":{"id":38,"name":"CROWDED","bobot":0.93},"8":{"id":41,"name":"NARROW","bobot":0.88},"9":{"id":19,"name":"WHITE","bobot":0.8},"10":{"id":47,"name":"TAPERING","bobot":0.59},"11":{"id":48,"name":"BULBOUS","bobot":0.51},"12":{"id":10,"name":"SMOOTH","bobot":0.71},"13":{"id":10,"name":"SMOOTH","bobot":0.7},"14":{"id":19,"name":"WHITE","bobot":0.64},"15":{"id":19,"name":"WHITE","bobot":0.64},"16":{"id":58,"name":"PARTIAL","bobot":0.53},"17":{"id":19,"name":"WHITE","bobot":0.52},"18":{"id":60,"name":"ONE","bobot":0.51},"19":{"id":66,"name":"PENDANT","bobot":0.79},"20":{"id":17,"name":"PURPLE","bobot":1},"21":{"id":73,"name":"SEVERAL","bobot":0.7},"22":{"id":81,"name":"WOODS","bobot":0.59}}	  
 $querytambah = mysqli_query($koneksi, "INSERT INTO tbpengetahuan VALUES('', '$type_jamur', '$data', 'S')") or die(mysqli_error()); 
 }
  
  
   
   $queryupdate = mysqli_query($koneksi, "UPDATE tbkonsultasi SET 
                           status_konsul='S',
						   type_jamur='$type_jamur'
						   WHERE id_konsultasi = '$id_konsultasi'");
						   
	$queryupdate = mysqli_query($koneksi, "UPDATE tbhasil_cek SET 
                           type='$type_jamur'
						   WHERE id_kasus = '$no_kasus' and id_konsultasi='$id_konsultasi'");					   
   
   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=hasil_pakar';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=hasil_pakar';</script>";

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
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE nilai<1 and nilai>$nilai order by `id_konsultasi` desc") or die (mysqli_error());
}
else if(($listcari=="kondisi")&&($txtcari=="bawah")){
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE nilai<$nilai order by `id_konsultasi` desc") or die (mysqli_error());
}
else if(($listcari=="kondisi")&&($txtcari=="sama")){
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE nilai='1' order by `id_konsultasi` desc") or die (mysqli_error());
}
else if($listcari=="tgl_konsul"){
$query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi WHERE `$listcari` like '%$txtcari%' order by `id_konsultasi` desc") or die (mysqli_error());
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
 <?php
  $status_konsul=$r['status_konsul'];
  if($status_konsul=="K"){
 ?>
 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_pakar&stt=edit&id=".$r['id_konsultasi'] ?>"><i class="fa fa-edit"></i></a> 
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_pakar&stt=hapus&id=".$r['id_konsultasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
  <?php $id_konsultasi=$r["id_konsultasi"]; ?>
  <a href="media.php?module=tampil_detail&mn=hasil_pakar&idk=<?php echo $id_konsultasi ;?>" class="menu"><i class="ti-view-list"></i></a></td> 
  <?php
  }
  else{
	  ?>
	<a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_pakar&stt=hapus&id=".$r['id_konsultasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
  <?php $id_konsultasi=$r["id_konsultasi"]; ?>
  <a href="media.php?module=tampil_detail&mn=hasil_pakar&idk=<?php echo $id_konsultasi ;?>" class="menu"><i class="ti-view-list"></i></a></td> 
  
	<?php  
  }
  ?>
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
  <a href="<?php echo"$_SERVER[PHP_SELF]?module=hasil_pakar";?>"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>                             
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