<?php
$level_masuk=$_SESSION['level_masuk'];

if($level_masuk=="Admin"){ 

?>

<nav>
                        <ul class="metismenu" id="menu">
						<li><a href="media.php?module=home"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
						<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Master Data</span></a>
                                <ul class="collapse">
                                    <li><a href="media.php?module=user&stt=">User</a></li>
									<li><a href="media.php?module=pengunjung">Pengunjung</a></li>
									<li><a href="media.php?module=atribut">Atribut</a></li>
									<li><a href="media.php?module=fitur">Fitur</a></li>
									<li><a href="media.php?module=relasi_fitur">Relasi Atribut Fitur</a></li>
									<li><a href="media.php?module=nilai">Nilai Threshold</a></li>
									
									
									
									
                                </ul>
                        </li>
						 <li><a href="media.php?module=hitung_fold"><i class="ti-receipt"></i><span>Hitung K-Fold</span></a></li>
					
						 
						 <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Konsultasi</span></a>
                                <ul class="collapse">
								   <li><a href="media.php?module=hasil_admin">Hasil Konsultasi</a></li>
								  
								   
								   
                        
									
									
									
                                </ul>
                        </li>
						 
                            
                        </ul>
                    </nav>
<?php
}
else if($level_masuk=="Pengunjung"){ 
?>

<nav>
                        <ul class="metismenu" id="menu">
						<li><a href="media.php?module=home"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
						<li><a href="media.php?module=konsul_user"><i class="ti-receipt"></i><span>Konsultasi</span></a></li>
						<li><a href="media.php?module=hitung_user"><i class="ti-receipt"></i><span>Perhitungan</span></a></li>
					
						<li><a href="media.php?module=hasil_konsul"><i class="ti-receipt"></i><span>Hasil Konsultasi</span></a></li>
									
                            
                        </ul>
                    </nav>

					
					<?php
}
else if($level_masuk=="Pakar"){ 
?>

<nav>
                        <ul class="metismenu" id="menu">
						<li><a href="media.php?module=home"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
						<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Master Data</span></a>
                                <ul class="collapse">
                                    <li><a href="media.php?module=atribut">Atribut</a></li>
									<li><a href="media.php?module=fitur">Fitur</a></li>
									<li><a href="media.php?module=relasi_fitur">Relasi Atribut Fitur</a></li>
									<li><a href="media.php?module=nilai">Nilai Threshold</a></li>
									
									
									
									
                                </ul>
                        </li>
						 
						 <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Konsultasi</span></a>
                                <ul class="collapse">
								   <li><a href="media.php?module=hasil_pakar">Hasil Konsultasi</a></li>
								  
								   
								   
                        
									
									
									
                                </ul>
                        </li>
						 
                            
                        </ul>
                    </nav>


<?php
}
?>