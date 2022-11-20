<?php
date_default_timezone_set('Asia/Jakarta');
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "20_dbjantung_moch";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{
	echo '';
}
?>



<?php
function hitungHari($awal,$akhir){
$tglAwal = strtotime($awal);
$tglAkhir = strtotime($akhir);
$jeda = abs($tglAkhir - $tglAwal);
return floor($jeda/(60*60*24));
}
?>

<?php
$tbpenyakit="tbpenyakit";
$id_penyakit="id_penyakit";

function PEN($tbpenyakit,$id_penyakit){
global $koneksi;
$query7 = mysqli_query($koneksi, "select * from $tbpenyakit where id_penyakit='$id_penyakit'") or die (mysqli_error());
 $r7 = mysqli_fetch_array($query7);
$nama_penyakit=$r7["nama_penyakit"];
return $nama_penyakit;
  
	}
?>

<?php
$tbgejala="tbgejala";
$id_gejala="id_gejala";

function GEJ($tbgejala,$id_gejala){
global $koneksi;
$query7 = mysqli_query($koneksi, "select * from $tbgejala where id_gejala='$id_gejala'") or die (mysqli_error());
 $r7 = mysqli_fetch_array($query7);
$nama_gejala=$r7["nama_gejala"];
return $nama_gejala;
  
	}
?>




