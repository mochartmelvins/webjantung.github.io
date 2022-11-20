<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbdetail_diagnosa where id_diagnosa='$id'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){

   }
   else{
	   
	   while($r = mysqli_fetch_array($query)){
		    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbdetail_diagnosa WHERE `id_diagnosa` ='$id'");
		   
	   }
   }
  
  $query = mysqli_query($koneksi, "SELECT * FROM tbhasil_diagnosa where id_diagnosa='$id'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){

   }
   else{
	   
	   while($r = mysqli_fetch_array($query)){
		    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbhasil_diagnosa WHERE `id_diagnosa` ='$id'");
		   
	   }
   }
  
  $query = mysqli_query($koneksi, "SELECT * FROM tbhasil where id_diagnosa='$id'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){

   }
   else{
	   
	   while($r = mysqli_fetch_array($query)){
		    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbhasil WHERE `id_diagnosa` ='$id'");
		   
	   }
   }
?>