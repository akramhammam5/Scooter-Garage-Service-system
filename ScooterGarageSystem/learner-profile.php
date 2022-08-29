

<?php include("assets-admin/includes/head.php");?>
	
<!-- End Head -->

<body>

<!-- Header -->

<?php include("assets-admin/includes/header-learner.php");?>
	
<!-- End Header -->

	
<!-- Header -->

<?php include("assets-admin/includes/side-menu-learner.php");?>
	
<!-- End Header -->

<!-- Connect dataBase -->



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);

$emailError="";

if(isset($_POST['submit'])){ 
	
    $target_dir="./uploads/";
		$target_file=$target_dir.basename($_FILES["formsignupimg"]["name"]);
		$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if(file_exists($target_file))
	{
		echo "file already exists";
	}
	if($_FILES["formsignupimg"]["size"]>500000)
	{
		echo "file is too large";
	}
	if(move_uploaded_file($_FILES["formsignupimg"]["tmp_name"], $target_file))
	{

		$sql="UPDATE learnersignup SET FirstName= '".$_POST['formsignupfirstname']."',LastName= '".$_POST["formsignuplastname"]."',DateOfBirth= '".$_POST["formsignupbirth"]."' ,MobileNumber= '".$_POST["formsignupphone"]."',Password= '".$_POST["formsignuppassword"]."',Email= '".$_POST["formsignupemail"]."',PersonalPhoto= '".$target_file."',NationalID= '".$_POST["formsignupid"]."' WHERE LearnerID='".$_SESSION['LearnerID']."'";
        
	if ($conn->query($sql) === TRUE) 
    {
    	$_SESSION["FirstName"]=$_POST["formsignupfirstname"];
		$_SESSION["LastName"]=$_POST["formsignuplastname"];
		$_SESSION["DateOfBirth"]=$_POST["formsignupbirth"];
		$_SESSION["MobileNumber"]=$_POST["formsignupphone"];
		$_SESSION["Password"]=$_POST["formsignuppassword"];
		$_SESSION["Email"]=$_POST["formsignupemail"];
		$_SESSION["NationalID"]=$_POST["formsignupid"];
		$_SESSION["PersonalPhoto"]=$target_file;
		//header("Location:learner-dashboard.php");
	} 
    
	else 
	{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	}
}
$conn->close();

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
<h1 class="title-page-name">Profile</h1>
</div>
</div>
</div>
</div>
</section>
	
<section class="mb-4">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
	
<div class="card">
<div class="card-body">

<form id="formsignup" name="formsignup" action="" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-6">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<?php echo "<input type='text' class='form-control' id='formsignupfirstname' name='formsignupfirstname' value='". $_SESSION["FirstName"]."'/>"; ?>
<label class="form-label active" for="formsignupfirstname">First Name</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<?php echo "<input type='text' class='form-control' id='formsignuplastname' name='formsignuplastname' value='". $_SESSION["LastName"]."'/>"; ?>
<label class="form-label active" for="formsignuplastname">Last Name</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<?php echo "<input type='text' class='form-control' id='formsignupemail' name='formsignupemail' value='". $_SESSION["Email"]."'/>"; ?>
<label class="form-label active" for="formsignupemail">Email Address</label>
</div>
</div>	
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<?php echo "<input type='text' class='form-control' id='formsignupphone' name='formsignupphone' value='". $_SESSION["MobileNumber"]."'/>"; ?>
<label class="form-label active" for="formsignupphone">Phone</label>
</div>
</div>
<div class="col-lg-12 col-md-6">
<div class="form-outline mb-4">
<?php echo "<input type='text' class='form-control' id='formsignupid' name='formsignupid' value='". $_SESSION["NationalID"]."'/>"; ?>
<label class="form-label active" for="formsignupid">National ID</label>
</div>
</div>
<div class="col-lg-12 col-md-6">
<div class="form-outline mb-4">
<?php echo "<input type='text' class='form-control datetimepicker' id='formsignupbirth' name='formsignupbirth' value='". $_SESSION["DateOfBirth"]."'/>"; ?>
<label class="form-label active" for="formsignupbirth">Date Of Birth</label>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="row">
<div class="col-lg-12 col-md-6">
<div class="form-outline mb-4">
<?php echo "<input type='text' class='form-control' id='formsignupusername' name='formsignupusername' value='". $_SESSION["Username"]."' disabled />"; ?>
<label class="form-label active" for="formsignupusername">User Name</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<span toggle="#formsignuppassword" class="toggle-password svg eye"></span>
<?php echo "<input type='text' class='form-control' id='formsignuppassword' name='formsignuppassword' value='". $_SESSION["Password"]."'/>"; ?>
<label class="form-label active" for="formsignuppassword">Password</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<span toggle="#formsignuprepassword" class="toggle-password svg eye"></span>
<?php echo "<input type='text' class='form-control' id='formsignuprepassword' name='formsignuprepassword' value='". $_SESSION["Password"]."'/>"; ?>
<label class="form-label active" for="formsignuprepassword">Confirm Password</label>
</div>
</div>
<div class="col-lg-12 col-md-6">
<div class="form-outline mb-4">
<input type='file' class='form-control' id='formsignupimg' name='formsignupimg'/>
<label class="form-label active" for="formsignupimg" style="position:relative;margin-right:20px;top:-40px;float:right;">Personal Photo</label>
</div>
</div>
<div class="col-lg-12">
<div class="d-grid">
<button href="learner-profile.php" name="submit" type="submit" class="btn-lg-01 bg-01">Edit &amp; Save</button>
</div>
</div>
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
<script src="assets-admin/js/learner-profile.js"></script>

<!-- End JS -->

</body>
</html>
