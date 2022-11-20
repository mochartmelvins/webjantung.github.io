<?php
 $query = mysqli_query($koneksi, "SELECT * FROM tbuser") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_user="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_user=$r;   }

   
 $query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_penyakit="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_penyakit=$r;   }

   $query = mysqli_query($koneksi, "SELECT * FROM tbgejala") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_gejala="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_gejala=$r;   }
   
   $query = mysqli_query($koneksi, "SELECT * FROM tbsolusi") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_solusi="0";
   }
	   
   else{  $r = mysqli_num_rows($query); $rekap_solusi=$r;   }
   
   $query = mysqli_query($koneksi, "SELECT * FROM tbpengguna") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_pengguna="0";
   }
	   
   else{  $r = mysqli_num_rows($query); $rekap_pengguna=$r;   }
   
   $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_diagnosa="0";
   }
	   
   else{  $r = mysqli_num_rows($query); $rekap_diagnosa=$r;   }
   
   ?>

 <div class="clearfix"></div>
		
<div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-user"></i>
                          </div>
                          <div class="count"><?php echo $rekap_user; ?></div>

                          
                          <p>User</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-group"></i>
                          </div>
                          <div class="count"><?php echo $rekap_pengguna; ?></div>

                         
                          <p>Patient</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-desktop"></i>
                          </div>
                          <div class="count"><?php echo $rekap_gejala; ?></div>

                        
                          <p>Symptom</p>
                        </div>
                      </div>
					  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-share-alt"></i>
                          </div>
                          <div class="count"><?php echo $rekap_solusi; ?></div>

                        
                          <p>Solution</p>
                        </div>
                      </div>
					   <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-desktop"></i>
                          </div>
                          <div class="count"><?php echo $rekap_penyakit; ?></div>

                         
                          <p>Disease</p>
                        </div>
                      </div>
					   <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-edit"></i>
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