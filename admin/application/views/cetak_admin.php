
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
$tgl1=$_GET['T1'];
$tgl2=$_GET['T2'];
  
$pisah=explode("-",$tgl1);
$A=$pisah[2]."-".$pisah[1]."-".$pisah[0];
   
$pisah=explode("-",$tgl2);
$B=$pisah[2]."-".$pisah[1]."-".$pisah[0];
   
   

?>	
<table width="980" class="table1" border="1" align="center">
  <tr>
    <td>
	<center>

	
 <table width="100%" class="table1" border="1">
  <tr>
    <td align="right">
	<center>
	
	
	
	<b>LAPORAN HASIL DIAGNOSA DARI TGL <?php echo"$A SAMPAI TGL  $B"; ?></b>
	</center>
	</td>
    
  </tr>
</table>
<br>

</center>


		
					
									

<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
						  <th>Id Diagnosa</th>
                          <th>Nama Pengguna</th>
						  <th>Tanggal</th>
						  <th>Hasil Diagnosa Penyakit</th>
						  <th style="text-align: center;">Akurasi</th>
                        </tr>
                      </thead>


                      <tbody>
<?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpenyakit,tbpengguna where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_pengguna=tbpengguna.id_pengguna  and tbdiagnosa.tanggal BETWEEN '$tgl1' and '$tgl2' order by tbdiagnosa.id_diagnosa asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='6' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['id_diagnosa'] ?></td>  
  <td><?php echo $r['nama'] ?></td>  
   <td align="center"><?php 
  $tanggal=$r['tanggal'];
  
   $pisah=explode("-",$tanggal);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  
  echo $tgl1 ; ?></td>  
  <td align="center"><?php echo $r['nama_penyakit'] ?></td>  
  <td align="center">
  <?php
     $hasil_diagnosa=$r['hasil_diagnosa'];
   $hasil_diagnosa=$hasil_diagnosa*100;
  echo $hasil_diagnosa." %";
  ?>
  
  </td> 
   
 </tr>
<?php
 $no++;
  endwhile;
  }
 ?>

		
                        
                       
                      </tbody>
                    </table>
                                        
	



    </td>
  </tr>
</table>
<script>
		window.print();
	</script>
