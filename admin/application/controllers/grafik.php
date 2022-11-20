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
					 $id_anak=$_GET['id'];
					 
$query = mysqli_query($koneksi, "SELECT * FROM catatan_penimbangan where id_anak='$id_anak' order by id_anak asc") or die (mysqli_error());
while($r = mysqli_fetch_array($query)){
	$id_anak=$r['umur'];
	$bb=$r['bb'];
	?>

  "<?php echo $id_anak ?>",
<?php
}
				?>
				
				
				
				],
				datasets: [{
					label: '',
					data: [
					<?php 
					 $id_anak=$_GET['id'];
					 
					$query = mysqli_query($koneksi, "SELECT * FROM catatan_penimbangan where id_anak='$id_anak' order by id_anak asc") or die (mysqli_error());
while($r = mysqli_fetch_array($query)){
	$akurasi=$r['bb'];
					 
					
  echo $akurasi.",";
}
					
					
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
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