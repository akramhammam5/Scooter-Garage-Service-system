<?php include("assets/includes/head.php"); ?>

<body>

<!-- Header -->

<?php include("assets/includes/header.php"); ?>

<!-- End Header -->


<!--  Connect to DataBase  -->

<?php
$servername="localhost";
$username="root";
$password="";
$DB="scootergarage";

$conn=mysqli_connect($servername,$username,$password,$DB);


if(!$conn){
  die("connection failed: " . mysqli_connect_error());
  $myfile = fopen("errorFile.txt", 'a') or die("Unable to open file!");
	$txt = "connection failed: " . mysqli_connect_error();
	fwrite($myfile, $txt);
	fclose($myfile);
}
?>


<!-- Content -->

<div class="header-spacer"></div>

<main>
	
<section>
<div class="position-relative">
<div class="page-title-img" style="background-image: url(assets/img/Scooters/slide-scooters.png)"></div>
<div class="mask-02"></div>
<div class="page-title-img-text">
<div class="container">
<h1>Scooters</h1>
</div>
</div>
</div>
</section>


<section class="mt-5 mb-2">
<div class="container">
<div class="row">

	 <?php
    $sql= "SELECT * FROM scooters ";
    $result= $conn->query($sql);
 
  while($row = $result->fetch_assoc()){
    ?>
	
<div class="col-lg-6 mb-4">
<div class="card">
<div class="img-overlay">
 <?php echo "<img src='./ScootersImages/".$row['Image']."' class='img-fluid' alt=''>";?>
<div class="overlay">
<div class="text"></div>
</div>
</div>
<div class="card-body card-body-01 p-4">
<div class="row">
<div class="col-8">
<h5 class="card-title"><?php echo $row['BrandName'] ?></h5>
<div class="card-icons-02">
<p class="fw-bold d-inline-block mb-0 me-2">Model:</p><?php echo $row['BrandModel'] ?>
</div>
</div>
</div>
<p class="fw-bold d-inline-block mb-0 me-2">Price:</p><?php echo $row['BrandPrice'] ?>
<br>
<p class="fw-bold d-inline-block mb-0 me-2">Avalability:</p><?php if ($row['Avalability']==1) {
	echo "Yes";
}
else{
	echo "No";
} ?>
<!-- <a href="signin.php" class="float-end">Enroll</a> -->
</div>
</div>	
</div>
<?php
}
$conn->close();
?>
	
</div>	
</div>
</section>


</main>

<!-- End Content -->



<!-- Footer -->

<?php include("assets/includes/footer.php"); ?>

<!-- End Footer -->



<!-- JS -->

<?php include("assets/includes/scripts.php"); ?>

<!-- End JS -->

</body>
</html>
