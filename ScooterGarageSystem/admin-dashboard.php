<?php include("assets-admin/includes/head.php");?>
	
<!-- End Head -->

<body>

<!-- Header -->

<?php include("assets-admin/includes/header-admin.php");?>
	
<!-- End Header -->

	
<!-- Header -->

<?php include("assets-admin/includes/side-menu-admin.php");?>
	
<!-- End Header -->
	

<!-- Connect DataBase -->

<?php
$servername="localhost";
$username="root";
$password="";
$DB="scootergarage";

$conn=mysqli_connect($servername,$username,$password,$DB);


if(!$conn){
    die("coonection failed: " . mysqli_connect_error());
    $myfile = fopen("errorFile.txt", 'a') or die("Unable to open file!");
$txt ="Error: " . $sql . "<br>" . $conn->error;
fwrite($myfile, $txt);
fclose($myfile);
}

include "phpFunctions.php";
?>



	
<!-- Content -->
	
<div class="header-spacer"></div>

<main>
	
<section>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="page-title">
<span class="title-home-link"><a href="admin-dashboard.php">
<svg class="svg" viewBox="0 0 576 512"><path d="M541 229.16l-232.85-190a32.16 32.16 0 0 0-40.38 0L35 229.16a8 8 0 0 0-1.16 11.24l10.1 12.41a8 8 0 0 0 11.2 1.19L96 220.62v243a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-128l64 .3V464a16 16 0 0 0 16 16l128-.33a16 16 0 0 0 16-16V220.62L520.86 254a8 8 0 0 0 11.25-1.16l10.1-12.41a8 8 0 0 0-1.21-11.27zm-93.11 218.59h.1l-96 .3V319.88a16.05 16.05 0 0 0-15.95-16l-96-.27a16 16 0 0 0-16.05 16v128.14H128V194.51L288 63.94l160 130.57z"></path></svg>
</a></span>
<h1 class="title-page-name">Dashboard</h1>
</div>
</div>
</div>
</div>
</section>
	
<section class="mb-4">
<div class="container-fluid">
<div class="row justify-content-center">
	
<div class="col-md-3 mb-4">
<div class="card px-3 py-4 text-center">
<?php  echo "<h2 class='text-danger mb-3'>".countUsers()."</h2>"; ?>
<h4 class="text-danger">All Users</h4>
</div>		
</div>
	
<div class="col-md-3 mb-4">
<div class="card px-3 py-4 text-center">
<?php  echo "<h2 class='text-success mb-3'>".countScooters()."</h2>"; ?>
<h4 class="text-success">All Scooters</h4>
</div>	
</div>

<div class="col-md-3 mb-4">
<div class="card px-3 py-4 text-center">
<?php  echo "<h2 class='text-warning mb-3'>".countEmployees()."</h2>"; ?>
<h4 class="text-warning">All Employees</h4>
</div>	
</div>
	
<div class="col-md-3 mb-4">
<div class="card px-3 py-4 text-center">
<?php  echo "<h2 class='text-success mb-3'>".countProducts()."</h2>"; ?>
<h4 class="text-success">All Products</h4>
</div>	
</div>
	
</div>
</div>
</section>

</main>
	
<!-- End Content -->

<?php 
$conn->close();
?>
	
<!-- Footer -->

<?php include("assets-admin/includes/footer.php");?>
	
<!-- End Footer -->
	


<!-- JS -->

<?php include("assets-admin/includes/scripts.php");?>

<!-- End JS -->

</body>
</html>
