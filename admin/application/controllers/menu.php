<?php
$level_masuk=$_SESSION['level_masuk'];
$module=$_GET["module"];


if($level_masuk=="Asisten"){ 

?>

<nav>
                        <ul class="metismenu" id="menu">
						<li class="<?php echo $t_home; ?>"><a href="media.php?module=home"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
						<li class="<?php echo $t_home; ?>"><a href="media.php?module=daftar"><i class="fa fa-tv"></i> <span>Pendaftaran</span></a></li>
						<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Master</span></a>
                                <ul class="collapse">
                                    <li class="<?php echo $t_user; ?>"><a href="media.php?module=user">User</a></li>
									<li class="<?php echo $t_pengetahuan; ?>"><a href="media.php?module=agama">Agama</a></li>
									<li class="<?php echo $t_atribut; ?>"><a href="media.php?module=pendidikan">Pendidikan</a></li>
									<li class="<?php echo $t_fitur; ?>"><a href="media.php?module=pekerjaan">Pekerjaan</a></li>
									<li class="<?php echo $t_pengetahuan; ?>"><a href="media.php?module=gol_darah">Golongan Darah</a></li>
									<li class="<?php echo $t_relasi_fitur; ?>"><a href="media.php?module=jk">Jenis Kelamin</a></li>
									<li class="<?php echo $t_nilai; ?>"><a href="media.php?module=imun">Jenis Imunisasi</a></li>
									<li class="<?php echo $t_nilai; ?>"><a href="media.php?module=persalinan">Jenis Persalinan</a></li>
									<li class="<?php echo $t_nilai; ?>"><a href="media.php?module=kecamatan">Kecamatan</a></li>
									<li class="<?php echo $t_nilai; ?>"><a href="media.php?module=kab_kota">Kab Kota</a></li>
									
									
									
									
									
                                </ul>
                        </li>
						 
						 
						 <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Data Ibu</span></a>
                                <ul class="collapse">
								   <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=data_ibu">Data Ibu</a></li>
								    <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=ctt_hamil">Catatan Kehamilan</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=ctt_salin">Catatan Persalinan</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=ctt_nifas">Catatan Nifas</a></li>
									
                                </ul>
                        </li>
						  <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Data Anak</span></a>
                                <ul class="collapse">
								   <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=data_anak">Data Anak</a></li>
								    <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=ctt_imun">Catatan Imunisasi</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=ctt_timbang">Catatan Penimbangan</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=ctt_penyakit">Catatan Penyakit Anak</a></li>
									
                                </ul>
                        </li>
                         <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-folder"></i><span>Rekam Medis</span></a>
                                <ul class="collapse">
                                    <li class="<?php echo $t_user; ?>"><a href="media.php?module=redis_ibu">Data Redis Ibu</a></li>
									<li class="<?php echo $t_pengetahuan; ?>"><a href="media.php?module=redis_anak">Data Redis Anak</a></li>
									<li class="<?php echo $t_atribut; ?>"><a href="media.php?module=medis_ibu">Rekam Medis Ibu</a></li>
									<li class="<?php echo $t_fitur; ?>"><a href="media.php?module=medis_anak">Rekam Medis Anak</a></li>
									
                                </ul>
                        </li>
						 
						 
						 <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-credit-card"></i><span>Keuangan</span></a>
                                <ul class="collapse">
								   <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=bayar_hamil">Bayar Kehamilan</a></li>
								    <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=bayar_salin">Bayar Persalinan</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=bayar_periksa">Bayar Periksa Anak</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=bayar_imun">Bayar Imunisasi</a></li>
									
                                </ul>
                        </li>
						  
						  <!--
						  <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cube"></i><span>Grafik</span></a>
                                <ul class="collapse">
								   <li class="< ?php echo $t_hasil_admin; ?>"><a href="media.php?module=grafik_berat">Grafik Berat Badan</a></li>
								    <li class="< ?php echo $t_hasil_admin; ?>"><a href="media.php?module=grafik_umur">Grafik Umur</a></li>
                                </ul>
                        </li>
						  -->
						  
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Laporan</span></a>
                                <ul class="collapse">
								   <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=laporan&stt=1">Lap Kehamilan</a></li>
								    <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=laporan&stt=2">Lap Persalinan</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=laporan&stt=3">Lap Imunisasi</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=laporan&stt=4">Lap Data Ibu</a></li>
									
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
						
						<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-folder"></i><span>Rekam Medis</span></a>
                                <ul class="collapse">
                                    <li class="<?php echo $t_user; ?>"><a href="media.php?module=redis_ibu">Data Redis Ibu</a></li>
									<li class="<?php echo $t_pengetahuan; ?>"><a href="media.php?module=redis_anak">Data Redis Anak</a></li>
									<li class="<?php echo $t_atribut; ?>"><a href="media.php?module=medis_ibu">Rekam Medis Ibu</a></li>
									<li class="<?php echo $t_fitur; ?>"><a href="media.php?module=medis_anak">Rekam Medis Anak</a></li>
									
                                </ul>
                        </li>
						 
						 
						 <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-credit-card"></i><span>Keuangan</span></a>
                                <ul class="collapse">
								   <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=bayar_hamil">Bayar Kehamilan</a></li>
								    <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=bayar_salin">Bayar Persalinan</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=bayar_periksa">Bayar Periksa Anak</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=bayar_imun">Bayar Imunisasi</a></li>
									
                                </ul>
                        </li>
						  
						  <!--
						  <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cube"></i><span>Grafik</span></a>
                                <ul class="collapse">
								   <li class="< ?php echo $t_hasil_admin; ?>"><a href="media.php?module=grafik_berat">Grafik Berat Badan</a></li>
								    <li class="< ?php echo $t_hasil_admin; ?>"><a href="media.php?module=grafik_umur">Grafik Umur</a></li>
                                </ul>
                        </li>
						  -->
						  
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Laporan</span></a>
                                <ul class="collapse">
								   <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=laporan&stt=1">Lap Kehamilan</a></li>
								    <li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=laporan&stt=2">Lap Persalinan</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=laporan&stt=3">Lap Imunisasi</a></li>
									<li class="<?php echo $t_hasil_admin; ?>"><a href="media.php?module=laporan&stt=4">Lap Data Ibu</a></li>
									
                                </ul>
                        </li> 
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