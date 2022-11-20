<?php
$level_masuk=$_SESSION['level_masuk'];
$module=$_GET["module"];
if($module=="home"){$t_home="active";}
else if($module=="user"){$t_user="active";}
else if($module=="pengunjung"){$t_pengunjung="active";}
else if($module=="atribut"){$t_atribut="active";}
else if($module=="fitur"){$t_fitur="active";}
else if($module=="pengetahuan"){$t_pengetahuan="active";}
else if($module=="relasi_fitur"){$t_relasi_fitur="active";}
else if($module=="nilai"){$t_nilai="active";}
else if($module=="hitung_fold"){$t_hitung_fold="active";}
else if($module=="hasil_admin"){$t_hasil_admin="active";}
else if($module=="konsul_user"){$t_konsul_user="active";}
else if($module=="hitung_user"){$t_hitung_user="active";}
else if($module=="hasil_konsul"){$t_hasil_konsul="active";}
else if($module=="hasil_pakar"){$t_hasil_pakar="active";}


else{$t_home="active";}

if($level_masuk=="Asisten"){ 

?>

<nav>
                        <ul class="metismenu" id="menu">
						<li class="<?php echo $t_home; ?>"><a href="media.php?module=home"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
						<li class="<?php echo $t_home; ?>"><a href="media.php?module=daftar"><i class="fa fa-tv"></i> <span>Pendaftaran</span></a></li>
						<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Master Data</span></a>
                                <ul class="collapse">
                                    <li class="<?php echo $t_user; ?>"><a href="media.php?module=user">User</a></li>
									<li class="<?php echo $t_pengetahuan; ?>"><a href="media.php?module=pengunjung">Pengunjung</a></li>
									<li class="<?php echo $t_atribut; ?>"><a href="media.php?module=atribut">Atribut</a></li>
									<li class="<?php echo $t_fitur; ?>"><a href="media.php?module=fitur">Fitur</a></li>
									<li class="<?php echo $t_pengetahuan; ?>"><a href="media.php?module=pengetahuan">Pengetahuan</a></li>
									<li class="<?php echo $t_relasi_fitur; ?>"><a href="media.php?module=relasi_fitur">Relasi Atribut Fitur</a></li>
									<li class="<?php echo $t_nilai; ?>"><a href="media.php?module=nilai">Nilai Threshold</a></li>
									
									
									
									
                                </ul>
                        </li>
						 <li class="<?php echo $t_hitung_fold; ?>"><a href="media.php?module=hitung_fold"><i class="ti-receipt"></i><span>Hitung K-Fold</span></a></li>
					
						 
						 <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Konsultasi</span></a>
                                <ul class="collapse">
								   <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=hasil_admin">Hasil Konsultasi</a></li>
								  
								   
								   
                        
									
									
									
                                </ul>
                        </li>
						 
                            
                        </ul>
                    </nav>
<?php
}
else if($level_masuk=="Bidan"){ 
?>

<nav>
                        <ul class="metismenu" id="menu">
						<li class="<?php echo $t_home; ?>"><a href="media.php?module=home"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
						<li class="<?php echo $t_konsul_user; ?>"><a href="media.php?module=konsul_user"><i class="ti-receipt"></i><span>Konsultasi</span></a></li>
						<li class="<?php echo $t_hitung_user; ?>"><a href="media.php?module=hitung_user"><i class="ti-receipt"></i><span>Perhitungan</span></a></li>
					
						<li class="<?php echo $t_hasil_konsul; ?>"><a href="media.php?module=hasil_konsul"><i class="ti-receipt"></i><span>Hasil Konsultasi</span></a></li>
									
                            
                        </ul>
                    </nav>

					
					<?php
}
else if($level_masuk=="Pakar"){ 
?>

<nav>
                        <ul class="metismenu" id="menu">
						<li class="<?php echo $t_home; ?>"><a href="media.php?module=home"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
						<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Master Data</span></a>
                                <ul class="collapse">
                                    <li class="<?php echo $t_atribut; ?>"><a href="media.php?module=atribut">Atribut</a></li>
									<li class="<?php echo $t_fitur; ?>"><a href="media.php?module=fitur">Fitur</a></li>
									<li class="<?php echo $t_pengetahuan; ?>"><a href="media.php?module=pengetahuan">Pengetahuan</a></li>
									<li class="<?php echo $t_relasi_fitur; ?>"><a href="media.php?module=relasi_fitur">Relasi Atribut Fitur</a></li>
									<li class="<?php echo $t_nilai; ?>"><a href="media.php?module=nilai">Nilai Threshold</a></li>
									
									
									
									
                                </ul>
                        </li>
						 
						 <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Konsultasi</span></a>
                                <ul class="collapse">
								   <li class="<?php echo $t_hasil_pakar; ?>"><a href="media.php?module=hasil_pakar">Hasil Konsultasi</a></li>
								  
								   
								   
                        
									
									
									
                                </ul>
                        </li>
						 
                            
                        </ul>
                    </nav>


<?php
}
?>