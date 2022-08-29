
<?php include("assets-admin/includes/head.php");?>
	
<!-- End Head -->

<body>

<!-- Header -->

<?php include("assets-admin/includes/header-learner.php");?>
	
<!-- End Header -->

	
<!-- Header -->

<?php include("assets-admin/includes/side-menu-learner.php");?>
	
<!-- End Header -->
	
<!--  Connect to DataBase  -->

<?php
$servername="localhost";
$username="root";
$password="";
$DB="scootergarage";

$conn=mysqli_connect($servername,$username,$password,$DB);


if(!$conn){
    die("coonection failed: " . mysqli_connect_error());
}
?>
<?php

if(isset($_POST['submit'])){ 
    $sql="insert into appointment (Name , email , Phone,scootertype,scooternumber,date,notes) values('".$_POST['formcontactsfirstname']."','".$_POST["formcontactsemail"]."','".$_POST["formcontactsphone"]."','".$_POST["fformcontactscountry"]."','".$_POST["fformcontactscountryNo"]."','".$_POST["fformcontactsdate"]."','".$_POST["formcontactsmassage"]."')";
        
	$conn->query($sql); 
    
}


?>



	
<!-- Content -->
	
<div class="header-spacer"></div>

<main>
	
<section>
<div class="container-fluid">
<div class="row">



<div class="col-lg-12">
<div class="page-title">
<span class="title-home-link"><a href="learner-dashboard.php">
<svg class="svg" viewBox="0 0 576 512"><path d="M541 229.16l-232.85-190a32.16 32.16 0 0 0-40.38 0L35 229.16a8 8 0 0 0-1.16 11.24l10.1 12.41a8 8 0 0 0 11.2 1.19L96 220.62v243a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-128l64 .3V464a16 16 0 0 0 16 16l128-.33a16 16 0 0 0 16-16V220.62L520.86 254a8 8 0 0 0 11.25-1.16l10.1-12.41a8 8 0 0 0-1.21-11.27zm-93.11 218.59h.1l-96 .3V319.88a16.05 16.05 0 0 0-15.95-16l-96-.27a16 16 0 0 0-16.05 16v128.14H128V194.51L288 63.94l160 130.57z"></path></svg>
</a></span>
<h1 class="title-page-name">Book an appointment</h1>
</div>
</div>
</div>
</div>
</section>
	
<section class="mb-4">
<div class="container">
<div class="row">
<div class="col-lg-4">
<div class="tex-vir-cen">
<div class="mb-lg-0">
<form id="formcontacts" name="formcontacts" action="" method="POST">
<div class="row ps-lg-5 ps-0">
<div class="col-lg-12 mt-4 mt-lg-0">
<h4 class="mb-4">Book your appointment</h4>
</div>
<div class="col-lg-8 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcontactsfirstname" name="formcontactsfirstname"/>
<label class="form-label" for="formcontactsfirstname">Name</label>
</div>
</div>
<div class="col-lg-8 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcontactsemail" name="formcontactsemail"/>
<label class="form-label" for="formcontactsemail">Email Address</label>
</div>
</div>  
<div class="col-lg-8 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcontactsphone" name="formcontactsphone"/>
<label class="form-label" for="formcontactsphone">Phone</label>
</div>
</div>
<div class="col-lg-8 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="fformcontactscountry" name="fformcontactscountry"/>
<label class="form-label" for="fformcontactscountry">Scooter Model</label>
</div>
</div>
<div class="col-lg-8 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="fformcontactscountryNo" name="fformcontactscountryNo"/>
<label class="form-label" for="fformcontactscountryNo">Scooter Number</label>
</div>
</div>
<div class="col-lg-8 col-md-6">
<div class="form-outline mb-4">
<input type="Date" class="form-control" id="fformcontactsdate" name="fformcontactsdate"/>
<label class="form-label" for="fformcontactsdate"></label>
</div>
</div>
<div class="col-lg-8 col-md-12">
<div class="form-outline mb-4">
<textarea class="form-control" rows="4" id="formcontactsmassage" name="formcontactsmassage"></textarea>
<label class="form-label" for="formcontactsmassage">Notes</label>
</div>
</div>
<div class="col-lg-8">
<div class="d-grid">
<button type="submit" class="cus-btn" name="submit">Book your appointment</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>

</main>
	
<!-- End Content -->


	
<!-- Footer -->

<?php include("assets-admin/includes/footer.php");?>
	
<!-- End Footer -->



	


<!-- JS -->

<?php include("assets-admin/includes/scripts.php");?>

<!-- End JS -->

</body>
</html>

