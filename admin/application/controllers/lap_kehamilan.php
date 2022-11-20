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
    <title>Laporan Data Kehamilan - Dashboard</title>
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
$tanggal_awal=$_POST["tanggal_awal"];
if(($tanggal_awal=="1")||($tanggal_awal=="01")){$tanggal_awal="01";}
else if(($tanggal_awal=="2")||($tanggal_awal=="02")){$tanggal_awal="02";}
else if(($tanggal_awal=="3")||($tanggal_awal=="03")){$tanggal_awal="03";}
else if(($tanggal_awal=="4")||($tanggal_awal=="04")){$tanggal_awal="04";}
else if(($tanggal_awal=="5")||($tanggal_awal=="05")){$tanggal_awal="05";}
else if(($tanggal_awal=="6")||($tanggal_awal=="06")){$tanggal_awal="06";}
else if(($tanggal_awal=="7")||($tanggal_awal=="07")){$tanggal_awal="07";}
else if(($tanggal_awal=="8")||($tanggal_awal=="08")){$tanggal_awal="08";}
else if(($tanggal_awal=="9")||($tanggal_awal=="09")){$tanggal_awal="09";}
else { $tanggal_awal=$tanggal_awal;}



$bulan_awal=$_POST["bulan_awal"];
$tahun_awal=$_POST["tahun_awal"];
$tanggal_akhir=$_POST["tanggal_akhir"];
if(($tanggal_akhir=="1")||($tanggal_akhir=="01")){$tanggal_akhir="01";}
else if(($tanggal_akhir=="2")||($tanggal_akhir=="02")){$tanggal_akhir="02";}
else if(($tanggal_akhir=="3")||($tanggal_akhir=="03")){$tanggal_akhir="03";}
else if(($tanggal_akhir=="4")||($tanggal_akhir=="04")){$tanggal_akhir="04";}
else if(($tanggal_akhir=="5")||($tanggal_akhir=="05")){$tanggal_akhir="05";}
else if(($tanggal_akhir=="6")||($tanggal_akhir=="06")){$tanggal_akhir="06";}
else if(($tanggal_akhir=="7")||($tanggal_akhir=="07")){$tanggal_akhir="07";}
else if(($tanggal_akhir=="8")||($tanggal_akhir=="08")){$tanggal_akhir="08";}
else if(($tanggal_akhir=="9")||($tanggal_akhir=="09")){$tanggal_akhir="09";}
else { $tanggal_akhir=$tanggal_akhir;}

$bulan_akhir=$_POST["bulan_akhir"];
$tahun_akhir=$_POST["tahun_akhir"];

#$awal=$tanggal_awal."/".$bulan_awal."/".$tahun_awal;
#$akhir=$tanggal_akhir."/".$bulan_akhir."/".$tahun_akhir;

$awal=$tahun_awal."-".$bulan_awal."-".$tanggal_awal;
$akhir=$tahun_akhir."-".$bulan_akhir."-".$tanggal_akhir;


$awal=$_POST["tgl1"];
$akhir=$_POST["tgl2"];



?>


<center>
Laporan Data Kehamilan Tanggal <?php $tgl=date('d-m-Y'); echo "$tgl";?>
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
                                                    <th scope="col">HPHT</th>
													<th scope="col">HTP</th>
													<th scope="col">Lingkar Lengan Atas</th>
													<th scope="col">Riwayat Penyakit</th>
													<th scope="col">Riwayat Alergi</th>
													<th scope="col">Hamil Ke</th>
													
                                                </tr>
                                            </thead>
								<tbody>
 
  <?php
 $query = mysqli_query($koneksi, "SELECT * FROM catatan_kehamilan,ibu,pendaftaran,gol_darah,agama,pendidikan,pekerjaan,kecamatan,kab_kota where catatan_kehamilan.id=pendaftaran.id and ibu.id=pendaftaran.id and ibu.id_goldar=gol_darah.id_goldar and ibu.id_agama=agama.id_agama and ibu.id_pendidikan=pendidikan.id_pendidikan and ibu.id_pekerjaan=pekerjaan.id_pekerjaan and ibu.id_kecamatan=kecamatan.id_kecamatan and ibu.id_kab_kota=kab_kota.id_kab_kota order by ibu.id_ibu asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='8'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
		

$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr style="text-align:center">
  <td><?php echo $no."." ?></td>
  <td align="center"> <?php echo $r['nama_ibu'] ?>
  <a href="<?php echo "$_SERVER[PHP_SELF]?module=ctt_hamil&stt=detail&id=".$r['id'] ?>" title="Detail">
 
  </a>
  </td>
   <td align="center"><?php 
  $tgl_lahir_ibu=$r['hpht'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  
   <td align="center"><?php 
  $tgl_lahir_ibu=$r['htp'];
  $pisah=explode("-",$tgl_lahir_ibu);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  echo $tgl1; ?></td>
  
  <td align="center"><?php echo $r['lingkar_lengan_atas'] ?></td>
  <td align="center"><?php echo $r['riwayat_penyakit'] ?></td>
  <td align="center"><?php echo $r['riwayat_alergi'] ?></td>
  <td align="center"><?php echo $r['hamil_ke'] ?></td>
 
 
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
<!--

-->
  <script>
		window.print();
	</script>

  </body>
	</html>