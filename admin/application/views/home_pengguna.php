<?php
$id_pengguna=$_SESSION['id_masuk'];

 $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa where id_pengguna='$id_pengguna'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_diagnosa="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_diagnosa=$r;   }

   
 $query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_penyakit="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_penyakit=$r;   }

   
   
   ?>

 <div class="clearfix"></div>
		
<div class="row">
                      
                      <!--
					  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-desktop"></i>
                          </div>
                          <div class="count">< ?php echo $rekap_penyakit; ?></div>

                         
                          <p>Disease</p>
                        </div>
                      </div>
					  -->
					  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-desktop"></i>
                          </div>
                          <div class="count"><?php echo $rekap_diagnosa; ?></div>

                          
                          <p>Diagnosis</p>
                        </div>
                      </div>
                     
                      <!--
					  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-group"></i>
                          </div>
                          <div class="count">179</div>

                          <h3>New Sign ups</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>
					  -->
                    </div>