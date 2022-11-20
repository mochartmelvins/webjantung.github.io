<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

 <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  
                    <!--
					
					-->
                    
                 <div class="row">
						<div class="col-md-6 ">
							<div class="x_panel">
               
                  <div class="x_content">
									
									 <form role="form" name="form1" method="post" action="" enctype="multipart/form-data">

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="date" class="form-control has-feedback-left" required name="tgl1" id="inputSuccess2" placeholder="First Name">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>
                                       <div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="date" class="form-control has-feedback-left" required name="tgl2" id="inputSuccess2" placeholder="First Name">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>
										
										<div class="ln_solid"></div>
										<div class="form-group row">
											 <div class="col-md-6 col-sm-6  form-group has-feedback">
											
												<button type="submit" name="Simpan" class="btn btn-success">View</button>
											</div>
										</div>

									</form>
								</div>
									</div>
										</div>
											</div>
                </div>
              </div>
	 <div class="clearfix"></div>	
<?php 
if(isset($_POST['Simpan'])){
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];

 
echo"<script>location.href='$_SERVER[PHP_SELF]?module=laporan&stt=tampil&T1=$tgl1&T2=$tgl2';</script>";
  
  
  }
 ?>
	 
<?php
}
else if($stt=="tampil"){
$tgl1=$_GET['T1'];	
$tgl2=$_GET['T2'];	

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
                    
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
						  <th>Id Diagnosa</th>
                          <th>Nama Pengguna</th>
						  <th>Tanggal</th>
						  <th>Hasil Diagnosa Penyakit</th>
						  <th style="text-align: center;">Akurasi</th>
						  
                        </tr>
                      </thead>


                      <tbody>
<?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpenyakit,tbpengguna where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_pengguna=tbpengguna.id_pengguna  and tbdiagnosa.tanggal BETWEEN '$tgl1' and '$tgl2' order by tbdiagnosa.id_diagnosa asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='6' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['id_diagnosa'] ?></td>  
  <td><?php echo $r['nama'] ?></td>  
   <td align="center"><?php 
  $tanggal=$r['tanggal'];
  
   $pisah=explode("-",$tanggal);
	   $tgl11=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  
  echo $tgl11 ; ?></td>  
  <td align="center"><?php echo $r['nama_penyakit'] ?></td>  
  <td align="center">
  <?php
     $hasil_diagnosa=$r['hasil_diagnosa'];
   $hasil_diagnosa=$hasil_diagnosa*100;
  echo $hasil_diagnosa." %";
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
<center><a href="<?php echo "application/views/cetak_admin.php?T1=$tgl1&T2=$tgl2"; ?>" target="_blank" class="menu"><button type="button" class="btn btn-primary mb-3">Cetak</button></a></center>
			  
            </div>
                </div>
              </div>
	 <div class="clearfix"></div>


  
<?php
}
else if($stt=="hapus"){



}
else if($stt=="edit"){

	
?>


<?php
}
?>
