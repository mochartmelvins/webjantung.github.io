<?php
  $query = mysqli_query($koneksi, "SELECT * FROM ibu") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
   $ibu_rekap=0;
    }else{
	$jmldata = mysqli_num_rows($query);
	$ibu_rekap=$jmldata;
	
	}
   ?>

   <?php
  $query = mysqli_query($koneksi, "SELECT * FROM anak") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
   $anak_rekap=0;
    }else{
	$jmldata = mysqli_num_rows($query);
	$anak_rekap=$jmldata;
	
	}
   ?>

   <?php
  $query = mysqli_query($koneksi, "SELECT * FROM catatan_imunisasi") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
   $imun_rekap=0;
    }else{
	$jmldata = mysqli_num_rows($query);
	$imun_rekap=$jmldata;
	
	}
   ?>

   
   <?php
  $query = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
   $hamil_rekap=0;
    }else{
	$jmldata = mysqli_num_rows($query);
	$hamil_rekap=$jmldata;
	
	}
   ?>

   <?php
  $query = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
   $salin_rekap=0;
    }else{
	$jmldata = mysqli_num_rows($query);
	$salin_rekap=$jmldata;
	
	}
   ?>

   <?php
  $query = mysqli_query($koneksi, "SELECT * FROM catatan_nifas") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
   $nifas_rekap=0;
    }else{
	$jmldata = mysqli_num_rows($query);
	$nifas_rekap=$jmldata;
	
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
                            
                            <div class="col-md-4 mb-3 mb-lg-0">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Data Ibu</div>
											 <h2><?php echo $ibu_rekap;?></h2>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Data Anak</div>
											<h2><?php echo $anak_rekap;?></h2>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
						<div class="col-md-4">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Data Imunisasi</div>
											<h2><?php echo $imun_rekap;?></h2>
                                           
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
							 


<div class="card mt-5">

                        <div class="card-body">

                            <div class="card">
                                <div class="card-body">
                                  
                                    <div class="alert-items">
									
									<div class="row">
                            
                            <div class="col-md-4 mb-3 mb-lg-0">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Data Kehamilan</div>
											 <h2><?php echo $hamil_rekap;?></h2>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Data Persalinan</div>
											<h2><?php echo $salin_rekap;?></h2>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
						<div class="col-md-4">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Data Nifas</div>
											<h2><?php echo $nifas_rekap;?></h2>
                                           
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

	 
							 