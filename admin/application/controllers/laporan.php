<div class="card mt-5">
                        <div class="card-body">


<?php
$stt=$_GET['stt'];
if($stt=="1"){
?>

                     <div class="panel panel-default">
                        <div class="panel-heading">
<!---
<a href="media.php?module=pembayaran&stt=tambah" class="menu">TAMBAH DATA</a> ||
<a href="media.php?module=pembayaran&stt=cari" class="menu">CARI DATA</a>

-->

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<form name="form1" action="application/controllers/lap_kehamilan.php" method="post" target="_blank">
<table width="100%" border="0">
  
  
  <tr>
    <td>Laporan Data Kehamilan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td></td>
    <td>
<button type="submit" class="btn btn-primary" name="Simpan">Cetak</button>
</td>
  </tr>
</table>
</form>
</div>
                            
                        </div>
                    </div>	

<?php
}
else if($stt=="2"){
?>				
					<!--  
					--------------------------BATAS
					-->
<br><br>					
<div class="panel panel-default">
                        <div class="panel-heading">
<!---
<a href="media.php?module=pembayaran&stt=tambah" class="menu">TAMBAH DATA</a> ||
<a href="media.php?module=pembayaran&stt=cari" class="menu">CARI DATA</a>

-->

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<form name="form1" action="application/controllers/lap_persalinan.php" method="post" target="_blank">
<table width="100%" border="0">
  
  
  <tr>
    <td>Laporan Persalinan</td>
    <td></td>
    <td>Dari : 
	<input class="form-control"  type="date" name="tgl1" required />
    <br>
	Sampai :
	<input class="form-control"  type="date" name="tgl2" required />
    <br>
	<button type="submit" class="btn btn-primary mb-3" name="Simpan">Cetak</button>
    </td>
    <td align="left"></td>
    <td>
       &nbsp;

</td>
  </tr>
</table>
</form>
</div>
                            
                        </div>
                    </div>	
					
					<?php
}else if($stt=="3"){
					?>
<!----->
<br><br>
<div class="panel panel-default">
                        <div class="panel-heading">
<!---
<a href="media.php?module=pembayaran&stt=tambah" class="menu">TAMBAH DATA</a> ||
<a href="media.php?module=pembayaran&stt=cari" class="menu">CARI DATA</a>

-->

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<form name="form1" action="application/controllers/lap_imunisasi.php" method="post" target="_blank">
<table width="100%" border="0">
  
  
  <tr>
    <td>Laporan Imunisasi</td>
    <td></td>
    <td>Dari : 
	<input class="form-control"  type="date" name="tgl1" required />
    <br>
	Sampai :
	<input class="form-control"  type="date" name="tgl2" required />
    <br>
	<button type="submit" class="btn btn-primary mb-3" name="Simpan">Cetak</button>
    </td>
    <td align="left"></td>
    <td>
       &nbsp;

</td>
  </tr>
</table>
</form>
</div>
                            
                        </div>
                    </div>	
<?php
}else if($stt=="4"){
?>
<br><br>
<div class="panel panel-default">
                        <div class="panel-heading">
<!---
<a href="media.php?module=pembayaran&stt=tambah" class="menu">TAMBAH DATA</a> ||
<a href="media.php?module=pembayaran&stt=cari" class="menu">CARI DATA</a>

-->

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<form name="form1" action="application/controllers/lap_pendaftaran.php" method="post" target="_blank">
<table width="100%" border="0">
  
  
  <tr>
    <td>Laporan Data Ibu</td>
    <td></td>
    <td>Dari : 
	<input class="form-control"  type="date" name="tgl1" required />
    <br>
	Sampai :
	<input class="form-control"  type="date" name="tgl2" required />
    <br>
	<button type="submit" class="btn btn-primary mb-3" name="Simpan">Cetak</button>
    </td>
    <td align="left"></td>
    <td>
       &nbsp;

</td>
  </tr>
</table>
</form>
</div>
                            
                        </div>
                    </div>	
<?php
}
?>
<!----->					
       </div>
                    </div>						