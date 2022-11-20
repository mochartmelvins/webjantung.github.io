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
    <title>Laporan Produksi - Dashboard</title>
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
	
	<style>
	/*design table 1*/
.table1 {
    font-family: sans-serif;
    color: #232323;
    border-collapse: collapse;
}
 
.table1, th, td {
    border: 1px solid #999;
    padding: 8px 20px;
}
	</style>
	
</head>

<body>
<div class="card mt-5">
                        <div class="card-body">
<?php


$tgl1=$_POST["tgl1"];
$tgl2=$_POST["tgl2"];


$pisah=explode("-",$tgl1);
if($pisah[1]=="01"){$bl="Januari";}
else if($pisah[1]=="01"){$bl="Januari";}
else if($pisah[1]=="02"){$bl="Februari";}
else if($pisah[1]=="03"){$bl="Maret";}
else if($pisah[1]=="04"){$bl="April";}
else if($pisah[1]=="05"){$bl="Mei";}
else if($pisah[1]=="06"){$bl="Juni";}
else if($pisah[1]=="07"){$bl="Juli";}
else if($pisah[1]=="08"){$bl="Agustus";}
else if($pisah[1]=="09"){$bl="September";}
else if($pisah[1]=="10"){$bl="Oktober";}
else if($pisah[1]=="11"){$bl="November";}
else if($pisah[1]=="12"){$bl="Desember";}

$tgl_1=$pisah[2]."-".$bl."-".$pisah[0];


$pisah=explode("-",$tgl2);
if($pisah[1]=="01"){$bl="Januari";}
else if($pisah[1]=="02"){$bl="Februari";}
else if($pisah[1]=="03"){$bl="Maret";}
else if($pisah[1]=="04"){$bl="April";}
else if($pisah[1]=="05"){$bl="Mei";}
else if($pisah[1]=="06"){$bl="Juni";}
else if($pisah[1]=="07"){$bl="Juli";}
else if($pisah[1]=="08"){$bl="Agustus";}
else if($pisah[1]=="09"){$bl="September";}
else if($pisah[1]=="10"){$bl="Oktober";}
else if($pisah[1]=="11"){$bl="November";}
else if($pisah[1]=="12"){$bl="Desember";}
$tgl_2=$pisah[2]."-".$bl."-".$pisah[0];

$id=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM ibu,pendaftaran,gol_darah,agama,pendidikan,pekerjaan,kecamatan,kab_kota where ibu.id=pendaftaran.id and ibu.id_goldar=gol_darah.id_goldar and ibu.id_agama=agama.id_agama and ibu.id_pendidikan=pendidikan.id_pendidikan and ibu.id_pekerjaan=pekerjaan.id_pekerjaan and ibu.id_kecamatan=kecamatan.id_kecamatan and ibu.id_kab_kota=kab_kota.id_kab_kota and ibu.id_ibu='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
?>


<center>




<table width="980" border="0">

<tr>
<td>
<table class="table text-center" width="100%" border="1">
<tr>
<td align="left" colspan="2"><img src="../gambar/kopsurat.png" alt="logo"></td>
</tr>
<tr>
<td align="left" width="60%">Id Ibu</td>
<td align="left" width="40%"><?php echo $id; ?></td>
</tr>
<tr>
<td align="left" width="60%">Nama Ibu</td>
<td align="left" width="40%"><?php echo $d['nama_ibu']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Tgl Lahir Ibu</td>
<td align="left" width="40%"><?php echo $d['tgl_lahir_ibu']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Golongan Darah</td>
<td align="left" width="40%"><?php echo $d['nama_goldar']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Agama</td>
<td align="left" width="40%"><?php echo $d['nama_agama']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Pendidikan</td>
<td align="left" width="40%"><?php echo $d['nama_pendidikan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Pekerjaan</td>
<td align="left" width="40%"><?php echo $d['nama_pekerjaan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">No JKN</td>
<td align="left" width="40%"><?php echo $d['no_jkn']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Nama Suami</td>
<td align="left" width="40%"><?php echo $d['nama_suami']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Alamat</td>
<td align="left" width="40%"><?php echo $d['alamat']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kecamatan</td>
<td align="left" width="40%"><?php echo $d['nama_kecamatan']; ?></td>
</tr>
<tr>
<td align="left" width="60%">Kab/Kota</td>
<td align="left" width="40%"><?php echo $d['nama_kab_kota']; ?></td>
</tr>
<tr>
<td align="left" width="60%">No telepon</td>
<td align="left" width="40%"><?php echo $d['no_tlp']; ?></td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<br>
<br>
<br>
<br>


</center>
 </div>
  </div>
<script>
		window.print();
	</script>

<!--
  
-->
  </body>
	</html>