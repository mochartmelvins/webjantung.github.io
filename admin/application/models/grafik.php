<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	
	table{
		margin: 0px auto;
	}
	</style>
 
 
	<?php 
	#include 'koneksi.php';
	?>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 
	
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
				<?php
				$jumlah=$_GET['jml'];
					 
$query = mysqli_query($koneksi, "SELECT * FROM tbiterasi where nilai_k='$jumlah' order by iterasi_ke asc") or die (mysqli_error());
while($r = mysqli_fetch_array($query)){
	$iterasi_ke=$r['iterasi_ke'];
	?>

  "Iterasi ke <?php echo $iterasi_ke ?>",
<?php
}
				?>
				
				
				
				],
				datasets: [{
					label: '',
					data: [
					<?php 
					 $jumlah=$_GET['jml'];
					 
					$query = mysqli_query($koneksi, "SELECT * FROM tbiterasi where nilai_k='$jumlah' order by iterasi_ke asc") or die (mysqli_error());
while($r = mysqli_fetch_array($query)){
	$akurasi=$r['akurasi'];
					 
					
  echo $akurasi.",";
}
					
					
					?>
					],
					backgroundColor: [
					
					],
					borderColor: [
					
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>