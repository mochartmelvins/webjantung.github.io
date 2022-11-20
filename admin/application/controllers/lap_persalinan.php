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
    <title>Laporan Persalinan - Dashboard</title>
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
Laporan Persalinan Dari Tanggal <?php  echo $awal." Sampai Tanggal : $akhir";?>
<hr>


<table width="980" border="0">
<tr>
<td>
<form action="" method="POST">

 
 <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr>
                                                     <th scope="col">No</th>
													<th scope="col">Id Persalinan</th>
													<th scope="col">Nama Ibu</th>
                                                    <th scope="col">Tgl Persalinan</th>
													<th scope="col">Umur Kehamilan</th>
													<th scope="col">Jenis Persalinan</th>
													<th scope="col">Penolong Persalinan</th>
													<th scope="col">Keadaan Ibu</th>
													<th scope="col">Ket Tambahan</th>
													<th scope="col">Kondisi Bayi Lahir</th>
													<th scope="col">Asuhan Bayi Lahir</th>
                                                </tr>
                                            </thead>
								<tbody>
 
  <?php
 $query = mysqli_query($koneksi, "SELECT * FROM catatan_persalinan,pendaftaran,jenis_persalinan where
catatan_persalinan.id=pendaftaran.id and catatan_persalinan.id_jenis_persalinan=jenis_persalinan.id_jenis_persalinan and catatan_persalinan.tgl_persalinan BETWEEN '$awal' and '$akhir' order by catatan_persalinan.id_ctt_persalinan desc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='11'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		
$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr style="text-align:center">
  <td><?php echo $no."." ?></td>
   <td align="center"><?php echo $r['id_ctt_persalinan'] ?></td>
  <td align="center">
    <?php echo $r['nama_ibu'] ?>
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_salin&stt=detail&id=".$r['id'] ?>" title="Detail">

  </a>
  </td>
   <td align="center"><?php 
  $tgl_lahir_ibu=$r['tgl_persalinan'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  <td align="center"><?php echo $r['umur_kehamilan'] ?></td>
  <td align="center"><?php echo $r['nama_jenis_persalinan'] ?></td>
  <td align="center"><?php echo $r['penolong_persalinan'] ?></td>
  <td align="center"><?php echo $r['keadaan_ibu'] ?></td>
  <td align="center"><?php echo $r['ket_tambahan'] ?></td>
  <td align="center"><?php echo $r['kondisi_bayi_lahir'] ?></td>
  <td align="center"><?php echo $r['asuhan_bayi_lahir'] ?></td>
  
  
  
 
 
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