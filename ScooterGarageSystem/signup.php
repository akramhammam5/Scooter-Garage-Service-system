<?php include("assets/includes/head.php"); ?>

<body>

<!-- Header -->

<?php include("assets/includes/header.php"); ?>

<!-- End Header -->

<!-- Connect Database -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scootergarage";

$conn = new mysqli($servername, $username, $password, $dbname);

$emailError="";

if(isset($_POST['submit'])){ 

	$FirstName=filter_var($_POST['formsignupfirstname'],FILTER_SANITIZE_STRING);
	$LastName=filter_var($_POST['formsignuplastname'],FILTER_SANITIZE_STRING);
	$Email=filter_var($_POST['formsignupemail'],FILTER_SANITIZE_STRING);
	$Username=filter_var($_POST['formsignupusername'],FILTER_SANITIZE_STRING);
	$Password=filter_var($_POST['formsignuppassword'],FILTER_SANITIZE_STRING);
    
	if(empty($_POST['formsignupemail']))
	{
		$emailError="Email is required";
	}
	else
	{
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

	 $sql="insert into learnersignup values('".$_POST['formsignupfirstname']."','".$_POST["formsignuplastname"]."','".$_POST["formsignupid"]."','".$_POST["formsignupbirth"]."','".$_POST['formsignupphone']."','".$_POST['formsignupemail']."','".$_POST['formsignupusername']."','".$_POST['formsignuppassword']."','".$target_file."','".$_POST["count"]."')";
        
	 try{
		if($conn->query($sql) === FALSE )
		throw new Exception("Error: " . $sql . "<br>" . $conn->error);
	}
	catch(Exception $e)
	{
		echo "Message :",$e->getMessage();
		$myfile = fopen("errorFile.txt", 'a') or die("Unable to open file!");
		$txt = "Error: " . $sql . "<br>" . $conn->error;
		fwrite($myfile, $txt);
		fclose($myfile);
	}
	echo "done";
	header("Location:index.php");
	}
	}
}
$conn->close();

?>

<!-- Content -->

<div class="header-spacer"></div>

<main>
	
<section>
<div class="position-relative">
<div class="page-title-img" style="background-image: url(assets/img/pages/slide-booking.jpg)"></div>
<div class="mask-02"></div>
<div class="page-title-img-text">
<div class="container">
<h1>Sign Up</h1>
</div>
</div>
</div>
</section>
	

<section class="py-5">
<div class="container">
<div class="artc-03">
<div class="row">
<div class="col-lg-12 text-center">
<h3>Please fill the below</h3>
</div>
</div>
</div>
</div>
</section>


<section class="pb-5">
<div class="container">
<div class="row">
<div class="col-lg-12">
<form id="formsignup" name="formsignup" action="" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-6">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formsignupfirstname" name="formsignupfirstname"/>
<label class="form-label" for="formsignupfirstname">First Name</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formsignuplastname" name="formsignuplastname"/>
<label class="form-label" for="formsignuplastname">Last Name</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formsignupemail" name="formsignupemail"/>
<label class="form-label" for="formsignupemail">Email Address</label>
</div>
</div>	
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formsignupphone" name="formsignupphone"/>
<label class="form-label" for="formsignupphone">Phone</label>
</div>
</div>
<div class="col-lg-12 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formsignupid" name="formsignupid"/>
<label class="form-label" for="formsignupid">National ID</label>
</div>
</div>
<div class="col-lg-12 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control datetimepicker" id="formsignupbirth" name="formsignupbirth"/>
<label class="form-label active" for="formsignupbirth">Date Of Birth</label>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="row">
<div class="col-lg-12 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formsignupusername" name="formsignupusername"/>
<label class="form-label" for="formsignupusername">User Name</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<span toggle="#formsignuppassword" class="toggle-password svg eye"></span>
<input type="password" class="form-control" id="formsignuppassword" name="formsignuppassword"/>
<label class="form-label" for="formsignuppassword">Password</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<span toggle="#formsignuprepassword" class="toggle-password svg eye"></span>
<input type="password" class="form-control" id="formsignuprepassword" name="formsignuprepassword"/>
<label class="form-label" for="formsignuprepassword">Confirm Password</label>
</div>
</div>
<div class="col-lg-12 col-md-6">
<div class="form-outline mb-4">
<input type="file" class="form-control" id="formsignupimg" name="formsignupimg"/>
<label class="form-label active" for="formsignupimg" style="float:right;position:relative;top:-40px;margin-right:20px;">Personal Photo</label>
</div>
</div>	
<div class="col-lg-12">
<div class="d-grid">
<button type="submit" class="cus-btn" name="submit">Sign Up</button>
</div>
</div>
</div>
</div>
</div>
</form>
</div>

</div>
</div>
</section>

</main>

<!-- End Content -->



<!-- Footer -->

<?php include("assets/includes/footer.php"); ?>

<!-- End Footer -->
	
	
	
<!-- Modal Photo Individual -->
<div class="modal model-frameless" id="uploadimageindModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="modal-body">
<div class="row">
<div class="col-md-12 text-center">
<div id="image_modal_ind"></div>
</div>
</div>
</div>
<div class="modal-footer">
<div class="d-grid artc-01">
<button href="javascript:void(0)" class="br-fa-white text-white btn crop_image_ind">Add Photo</button>
</div>
</div>
</div>
</div>
</div>
<!-- End Modal Photo Individual -->



<!-- JS -->

<?php include("assets/includes/scripts.php"); ?>
<script src="assets/js/validate-signup.js"></script>

<!-- End JS -->
<script type="text/javascript">
        var count = 0;
        var btn = document.getElementById("btn");
        // var disp = document.getElementById("display");
  
        btn.onclick = function () 
		{
            count++;
        }

</script>

</body>
</html>
