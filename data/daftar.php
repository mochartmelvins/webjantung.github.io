<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbpengguna order by `id_pengguna` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="P".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_pengguna="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_pengguna=$d["id_pengguna"];
            if(substr($id_pengguna,3,2)==$bl){
                $urut=substr($id_pengguna,5,4)+1;
                    if($urut<10){$id_pengguna="$kd"."00".$urut;}
                    else if($urut<100){$id_pengguna="$kd"."0".$urut;}
                    else{$id_pengguna="$kd".$urut;}
                }
            else{$id_pengguna="$kd"."001";}
			}
?>
<div id="contact-content" class="content">
				<div class="templatemo_contactmap">
					<h3 class="subtitle">How to Diagnose Heart Disease</h3>
					<ul class="checkmark pad-left">
						<li>Create an account to diagnose Heart Disease.</li>
						<li>Login to the system.</li>
						<li>Select the symptoms you are experiencing.</li>
                        <li>View diagnostic results.</li>
					</ul>
                    
				</div>
				
				<form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
					<div class="templatemo_form">
						<input name="nama" type="text" class="form-control p-4" id="fullname" required placeholder="Full Name" maxlength="40">
					</div>
					<br>
					<div class="templatemo_form">
						<input name="email" type="email" class="form-control p-4" id="email" required placeholder="Email" maxlength="40">
					</div>
					<br>
					<div class="templatemo_form">
						<input name="password" type="password" class="form-control p-4" id="fullname" required placeholder="Password" maxlength="40">
					</div>
					<br>
					<div class="templatemo_form">
					<button type="submit" name="Simpan" class="btn btn-primary">Send</button>
					<button type="reset" class="btn btn-primary">Reset</button>
					 <input type="hidden" name="id_pengguna" value="<?php echo"$id_pengguna";?>">
					</div>
				</form>
			</div>


<br>
<br><br><br>




<?php 
if(isset($_POST['Simpan'])){
  $id_pengguna=$_POST['id_pengguna'];
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $password=$_POST['password'];
 
 
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbpengguna VALUES('', '$nama', '$email', '$password')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Akun anda berhasil dibuat.');location.href='$_SERVER[PHP_SELF]?module=login';</script>";
   
   
   } else{
   echo"<script>alert('Akun gagal dibuat');location.href='$_SERVER[PHP_SELF]?module=diagnosa';</script>";
   }
  } 

 ?>

