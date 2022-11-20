<div class="card mt-5">
                        <div class="card-body">
						
						

						
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
													<th scope="col">Action</th>
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $no=1;
									   $id_masuk=$_SESSION['id_masuk'];
									   $module=$_GET['mn'];
									   $jns=$_GET['jns'];
									   $txt=$_GET['txt'];


  if($jns=="1"){
	    $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbpengunjung where tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung and tbkonsultasi.tgl_konsul='$txt' order by tbkonsultasi.id_konsultasi desc") or die (mysqli_error());
	  
  }									   
  else{
	  if($txt=="sama"){
		  	    $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbpengunjung where tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung and tbkonsultasi.nilai='1' order by tbkonsultasi.id_konsultasi desc") or die (mysqli_error());
	  }
	  else if($txt=="bawah"){
		    $q3 = mysqli_query($koneksi, "SELECT * FROM tbthreshold where id='1'") or die (mysqli_error());
			$r3 = mysqli_fetch_array($q3);
			$nilai_t=$r3['nilai'];
	        $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbpengunjung where tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung and tbkonsultasi.nilai<'$nilai_t' order by tbkonsultasi.id_konsultasi desc") or die (mysqli_error());
	  }
	  else if($txt=="atas"){
		    $q3 = mysqli_query($koneksi, "SELECT * FROM tbthreshold where id='1'") or die (mysqli_error());
			$r3 = mysqli_fetch_array($q3);
			$nilai_t=$r3['nilai'];
	        $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi,tbpengunjung where tbkonsultasi.id_pengunjung=tbpengunjung.id_pengunjung and tbkonsultasi.nilai>'$nilai_t' and tbkonsultasi.nilai<1 order by tbkonsultasi.id_konsultasi desc") or die (mysqli_error());
	  }
	  
	  
	  
  }
									   
									   
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
     <a href="<?php echo "$_SERVER[PHP_SELF]?module=hasil_pakar&stt=hapus&id=".$r['id_konsultasi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="ti-trash"></i></a>
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
  <?php
  }
  else{
	  ?>
	  <?php $id_konsultasi=$r["id_konsultasi"]; ?>
  <a href="media.php?module=tampil_detail&mn=hasil_pakar&idk=<?php echo $id_konsultasi ;?>" class="menu"><button type="button" class="btn btn-primary mb-3">Detail</button></a></td> 
  
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
                        <a href="<?php 
						  
						  $module=$_GET['mn'];
						  
						  echo "media.php?module=$module";?>" class="menu"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
                            
							
                        
                    </div>
                </div>