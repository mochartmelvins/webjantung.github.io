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
    <title>Stok Barang - Dashboard</title>
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

<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">

<?php
$id_pengeluaran=$_GET['idp'];
  $query1 = mysqli_query($koneksi, "SELECT * FROM tbpengeluaran,tbpengeluaran_detail,tbcustomer,tbbarang,tbuser where
tbpengeluaran.id_pengeluaran=tbpengeluaran_detail.id_pengeluaran and tbpengeluaran.id_customer=tbcustomer.id_customer and tbpengeluaran_detail.id_barang=tbbarang.id_barang and tbpengeluaran.id_user=tbuser.id_user and tbpengeluaran.id_pengeluaran='$id_pengeluaran'
  order by tbpengeluaran_detail.id_pengeluaran_detail desc") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $id_pengeluaran=$r1['id_pengeluaran'];
   $nama_user=$r1['nama_user'];
   $bagian_pengeluaran=$r1['bagian_pengeluaran'];
   
   $tgl_pengeluaran=$r1['tgl_pengeluaran'];
  
   $pisah=explode("-",$tgl_pengeluaran);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
   $nama_customer=$r1['nama_customer'];
   $alamat=$r1['alamat'];
   $telepon=$r1['telepon'];   
   
   }

?>

<center><h4>Invoice</h4></center>
<hr>			
<table class="table table-striped table-bordered table-hover" id="dataTables-example" border="0">
  <tr>
    <td width="5" valign="top">Id Pengeluaran</td>
    <td width="5" valign="top">:</td>
    <td width="466" valign="top"><?php echo $id_pengeluaran;?></td>
  </tr>
  <tr>
    <td valign="top">Tanggal</td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $tgl1;?></td>
  </tr>
   <tr>
    <td valign="top">Nama Customer</td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $nama_customer;?></td>
  </tr>
  <tr>
    <td valign="top">Alamat</td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $alamat;?></td>
  </tr>
  <tr>
    <td valign="top">Telepon</td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $telepon;?></td>
  </tr>
</table>							
							
							
							
							
							
                            <form action="" method="POST">
								<table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr>
                                                    <th scope="col">No</th>
													<th scope="col">Id Barang</th>
                                                    <th scope="col">Nama Barang</th>
													<th scope="col">Satuan</th>
													<th scope="col">Jumlah</th>
													
                                                </tr>
                                            </thead>
								<tbody>
									
                                       
                                       <?php
									   $id_pengeluaran=$_GET['idp']; 
  $query = mysqli_query($koneksi, "SELECT * FROM tbpengeluaran,tbpengeluaran_detail,tbbarang where
tbpengeluaran.id_pengeluaran=tbpengeluaran_detail.id_pengeluaran and tbpengeluaran_detail.id_barang=tbbarang.id_barang and tbpengeluaran.id_pengeluaran='$id_pengeluaran'
  order by tbpengeluaran_detail.id_pengeluaran_detail desc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='5'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{
$no=1;		

		
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['id_barang'] ?></td>
  <td align="center"><?php echo $r['nama_barang'] ?></td>
  <td align="center"><?php echo $r['satuan'] ?></td>
  
  
   <td align="center"><?php 
  $jumlah_keluar=$r['jumlah_keluar'];
  echo $jumlah_keluar;
   $total_sub+=$jumlah_keluar;
   ?></td>
 
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
 <tr class="odd gradeX">
 <td colspan='4' align="left">Total</td>

 <td><?php echo $total_sub; ?></td>

  </tr>
                                     
                                    </tbody>
                                </table>
                                </form>
                                
<br>




                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

 </div>
  </div>
  <script>
		window.print();
	</script>
	</body>
	</html>