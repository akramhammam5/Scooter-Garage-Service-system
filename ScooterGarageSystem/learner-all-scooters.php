
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
<h1 class="title-page-name">Scooters</h1>
</div>
</div>
</div>
</div>
</section>
	
<section class="mb-4">
<div class="container-fluid">
<div class="row">

<?php
    $sql= "SELECT * FROM scooters ";
    $result= $conn->query($sql);

      try{
        if(!$result )
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
 
  while($row = $result->fetch_assoc()){
    ?>	
	
<div class="col-lg-4 mb-4">
<div class="card">
<?php echo "<img src='./ScootersImages/".$row['Image']."' class='img-fluid' alt=''>";?>
<div class="card-body card-body-01 p-4">
<div class="row">
<div class="col-6">
<h5 class="card-title"><?php echo $row['BrandName'] ?></h5>
</div>
<div class="col-6">
<a id="get_rating_values" class="fw-bold me-2" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#CourseRate" data-id="<?php  echo  $row['BrandID'] ?>">

<?php
    // $countaverage = 5;
    // $conn3=mysqli_connect($servername,$username,$password,$DB);
    // $sql3 = "SELECT ChosenRate FROM rating WHERE CourseID='".$row["CourseID"]."'";
    // $averagerate = $conn3->query($sql3);
    // while($row2 = $averagerate->fetch_assoc()){
    //   $countaverage = ($countaverage + $row2['ChosenRate'])/2;
    // }
    // echo "<input class='rating' value='$countaverage' disabled>";
  ?>

</a>
</div>
<div class="col-6">
<p><span class="fw-bold me-2">Type:</span> <?php echo $row['BrandModel'] ?></p> 
</div>
<div class="col-6">
<span class="fw-bold me-2">Price:</span><?php echo $row['BrandPrice'] ?></p>
</div>
<div class="col-12">

<?php

// $Tutorname ='';
// $conn4=mysqli_connect($servername,$username,$password,$DB);
// $sql4 = "SELECT Name FROM tutorregistration WHERE CourseID='".$row["CourseID"]."'";
// $averagerate = $conn4->query($sql4);
// while($row2 = $averagerate->fetch_assoc()){
//   $Tutorname = $row2['Name'];
// }

// echo "<span class='fw-bold me-2'>Tutor:</span>".$Tutorname." </p>";


?>
</div>
</div>
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

<?php include("assets-admin/includes/footer.php");?>
	
<!-- End Footer -->


<!-- Modal Course Rate -->
<div class="modal fade model-frameless" id="CourseRate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="modal-body">
<div class="card">
<div class="card-header bg-01">
<h6 class="text-white">This Course</h6>
</div>
<div class="card-body">	
<p class="text-center"><input class="rating" value="5" disabled><h6 class="text-center"><div id="formcourseIdd"></div></h6></p>
<p class="text-center"><input class="rating" value="4" disabled><h6 class="text-center"><div id="formcourseIdd"></div></h6></p>
<p class="text-center"><input class="rating" value="3" disabled><h6 class="text-center"><div id="formcourseIdd"></div></h6></p>
<p class="text-center"><input class="rating" value="2" disabled><h6 class="text-center"><div id="formcourseIdd"></div></h6></p>
<p class="text-center"><input class="rating" value="1" disabled><h6 class="text-center"><div id="formcourseIdd"></div></h6></p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- End Modal Course Rate -->
	


<!-- JS -->

<?php include("assets-admin/includes/scripts.php");?>

<!-- End JS -->

</body>
</html>

<script>
  $(document).on("click", "#add_course_tocart", function () {
  var courseId=$(this).data('id');
  var courseName=$(this).data('name');
  var courseType=$(this).data('type');
  var coursePrice=$(this).data('price');
  var courseImage=$(this).data('image');
    $.ajax({
        type: 'post',
        url: 'ajax-request.php',
        data: {'addtocart':true,'courseId':courseId,'courseName':courseName,'courseType':courseType,'coursePrice':coursePrice,'courseImage':courseImage},
        
    });
  });

  $(document).on("click", "#get_rating_values", function () {

  var courseId=$(this).data('id');
  $(".modal-body #formcourseIdd").val(courseId);

});
  
  </script>
