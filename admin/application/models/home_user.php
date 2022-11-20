<?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbuser") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
   $user_rekap=0;
    }else{
	
	$query = mysqli_query($koneksi, "SELECT * FROM tbuser") or die (mysqli_error());
	$jmldata = mysqli_num_rows($query);
	$user_rekap=$jmldata;
	
	}
   ?>
  <?php
  $id_masuk=$_SESSION['id_masuk'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbkonsultasi where id_pengunjung='$id_masuk'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
   $konsul_rekap=0;
    }else{
	
	$jmldata1 = mysqli_num_rows($query);
	$konsul_rekap=$jmldata1;
	
	}
   ?>
	
<div class="col-lg-8">
                        
                    </div>
					
<div class="card mt-5">

                        <div class="card-body">

                            <div class="card">
                                <div class="card-body">
                                  
                                    <div class="alert-items">
									
									<div class="row">
                            
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">User</div>
											 <h2><?php echo $user_rekap;?></h2>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Konsultasi</div>
											<h2><?php echo $konsul_rekap;?></h2>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
						
                        </div>
									  
									
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						     </div>
							 
						 





	 
							 