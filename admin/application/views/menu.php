<?php
$level=$_SESSION['level_masuk'];
if($level=="Admin"){
?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
				
                <ul class="nav side-menu">
				 <li><a href="dashboard.php?module=home"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a><i class="fa fa-laptop"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					
					                <li><a href="dashboard.php?module=user">User</a></li>
									<li><a href="dashboard.php?module=penyakit">Disease</a></li>
									<li><a href="dashboard.php?module=gejala">Symptom</a></li>
									<li><a href="dashboard.php?module=pengetahuan">Knowledge</a></li>
									<li><a href="dashboard.php?module=solusi">Solution</a></li> 
									<li><a href="dashboard.php?module=pengguna">Patient</a></li> 

                    </ul>
                  </li>
				  <li><a href="dashboard.php?module=hasil_admin"><i class="fa fa-edit"></i> Diagnosis </a></li>
				  <li><a href="dashboard.php?module=laporan"><i class="fa fa-clone"></i> Report </a></li>
				  
                  
                 
              </div>
              

            </div>
<?php
}
else if($level=="Pengguna"){
?>			

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
				
                <ul class="nav side-menu">
				 <li><a href="dashboard.php?module=home"><i class="fa fa-home"></i> Dashboard </a></li>
				 <!--
				 <li><a href="dashboard.php?module=penyakit_pengguna"><i class="fa fa-laptop"></i> Jenis Penyakit </a></li>
				 -->
				 <li><a href="dashboard.php?module=diagnosa_pengguna"><i class="fa fa-edit"></i> Diagnosis </a></li>
				 <li><a href="dashboard.php?module=hasil_pengguna"><i class="fa fa-clone"></i> Diagnostic Results </a></li>
				 
				 </ul>
                  
              </div>
              

            </div>


<?php
}
?>