
<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"../config/koneksi.php";
$module="module";
?>
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
<?php
$id_diagnosa=$_GET['id'];
  $query1 = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpengguna where tbdiagnosa.id_pengguna=tbpengguna.id_pengguna and tbdiagnosa.id_diagnosa='$id_diagnosa'") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $nama=$r1['nama'];
   $email=$r1['email'];
   $tinggi_badan=$r1['tinggi_badan'];
   
   $tanggal=$r1['tanggal'];
  
   $pisah=explode("-",$tanggal);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
   $berat_badan=$r1['berat_badan'];
   $jenis_kelamin=$r1['jenis_kelamin'];
   $telepon=$r1['telepon'];   
   
   }

?>	
<table width="780" class="table1" border="1" align="center">
  <tr>
    <td>
	<center>

	
 <table width="100%" class="table1" border="1">
  <tr>
    <td align="right">
	<center>
	
	
	
	LAPORAN HASIL DIAGNOSA <?php $tgl=date('d-m-Y'); echo"TANGGAL $tgl"; ?>
	</center>
	</td>
    
  </tr>
</table>
<br>

</center>


		
<table width="100%" class="table1" border="0">
  <tr>
    <td width="25%" valign="top">Nama Pengguna</td>
    <td width="5" valign="top">:</td>
    <td width="466" valign="top"><?php echo $nama;?></td>
  </tr>
  
   <tr>
    <td valign="top">Email</td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $email;?></td>
  </tr>
 
</table>						
									

<br>
                    <h6>Rincian Gejala :</h6>
                        
                           <table width="50%" class="table1" border="0" style="font-size:14px;">
                                            <thead>
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Gejala yang dialami</th>
													
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $id_diagnosa=$_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_diagnosa,tbgejala where tbdetail_diagnosa.id_gejala=tbgejala.id_gejala and tbdetail_diagnosa.id_diagnosa='$id_diagnosa' order by tbdetail_diagnosa.id_detail asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='2'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{

		
		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['nama_gejala']?></td>
  
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>			
											
								</table>
                                        
								
                        
 <h6>Hasil Diagnosa :</h6>
 <?php
 $id_diagnosa=$_GET['id'];
  $query1 = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpenyakit where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_diagnosa='$id_diagnosa'") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $nama_penyakit=$r1['nama_penyakit'];
   $id_penyakit=$r1['id_penyakit'];
   $hasil_diagnosa=$r1['hasil_diagnosa'];
  $hasil_diagnosa=$hasil_diagnosa*100;

   }
 ?>
 Anda dinyatakan Terindikasi penyakit <?php echo $nama_penyakit; ?> <br>
 Tingkat Akurasi : <?php echo $hasil_diagnosa; ?> %.
 
 
                  
<hr>
 <?php
  $query1 = mysqli_query($koneksi, "SELECT * FROM tbsolusi where id_penyakit='$id_penyakit'") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $nama_solusi=$r1['nama_solusi'];
echo"Solusi: $nama_solusi";
   }
 ?>



    </td>
  </tr>
</table>
<script>
		window.print();
	</script>
