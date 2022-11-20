<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"../config/koneksi.php";
$module="module";
$module=$_GET["module"];
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Laporan Data Ibu - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
     <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../../assets/css/typography.css">
    <link rel="stylesheet" href="../../assets/css/default-css.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<div class="card mt-5">
                        <div class="card-body">
<?php



$awal=$_POST["tgl1"];
$akhir=$_POST["tgl2"];



?>


<center>
Laporan Data Ibu Dari Tanggal <?php  echo $awal." Sampai Tanggal : $akhir";?>
<hr>


<table width="980" border="0">
<tr>
<td>
<form action="" method="POST">

 
 <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr>
                                                     <th scope="col">No</th>
													<th scope="col">Nama Ibu</th>
													<th scope="col">Tgl Lahir</th>
                                                    <th scope="col">Goldar</th>
													<th scope="col">Agama</th>
													<th scope="col">Pendidikan</th>
													<th scope="col">Pekerjaan</th>
													<th scope="col">No JKN</th>
													<th scope="col">Nama Suami</th>
													<th scope="col">Alamat</th>
													<th scope="col">Kec</th>
													<th scope="col">Kab/Kota</th>
													<th scope="col">No Telp</th>
                                                </tr>
                                            </thead>
								<tbody>
 
  <?php
 $query = mysqli_query($koneksi, "SELECT * FROM ibu,pendaftaran,gol_darah,agama,pendidikan,pekerjaan,kecamatan,kab_kota where ibu.id=pendaftaran.id and ibu.id_goldar=gol_darah.id_goldar and ibu.id_agama=agama.id_agama and ibu.id_pendidikan=pendidikan.id_pendidikan and ibu.id_pekerjaan=pekerjaan.id_pekerjaan and ibu.id_kecamatan=kecamatan.id_kecamatan and ibu.id_kab_kota=kab_kota.id_kab_kota  and pendaftaran.tgl_pendaftaran BETWEEN '$awal' and '$akhir' order by ibu.id_ibu asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='13'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr style="text-align:center">
  <td><?php echo $no."." ?></td>
   <td align="center"><?php echo $r['nama_ibu'] ?></td>
   <td align="center"><?php 
  $tgl_lahir_ibu=$r['tgl_lahir_ibu'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center"><?php echo $r['nama_goldar'] ?></td>
  <td align="center"><?php echo $r['nama_agama'] ?></td>
  <td align="center"><?php echo $r['nama_pendidikan'] ?></td>
  <td align="center"><?php echo $r['nama_pekerjaan'] ?></td>
  <td align="center"><?php echo $r['no_jkn'] ?></td>
  <td align="center"><?php echo $r['nama_suami'] ?></td>
  <td align="center"><?php echo $r['alamat'] ?></td>
  <td align="center"><?php echo $r['nama_kecamatan'] ?></td>
  <td align="center"><?php echo $r['nama_kab_kota'] ?></td>
  <td align="center"><?php echo $r['no_tlp'] ?></td>
 
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
 
 
</table>
</form>
</td>
</tr>
</table>
</center>
 </div>
  </div>
  <script>
		window.print();
	</script>
	</body>
	</html>