<?php include("assets-admin/includes/head.php");?>
	
<!-- End Head -->

<body>

<!-- Header -->

<?php include("assets-admin/includes/header-admin.php");?>
	
<!-- End Header -->

	
<!-- Header -->

<?php include("assets-admin/includes/side-menu-admin.php");?>
	
<!-- End Header -->
	
<!--  Connect to DataBase  -->

<?php
$servername="localhost";
$username="root";
$password="";
$DB="scootergarage";

$conn=mysqli_connect($servername,$username,$password,$DB);


if(!$conn)
{
  die("coonection failed: " . mysqli_connect_error());
}
?>

<?php
if(isset($_POST['submit'])){ 
 //  $target_dir="./ScootersImages/";
 //  $target_file=$target_dir.basename($_FILES["formcoursephoto"]["name"]);
 //  $target_file2=basename($_FILES["formcoursephoto"]["name"]);
 //  $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 //  if(file_exists($target_file))
	// {
	// 	echo "file already exists";
	// }
 //  move_uploaded_file($_FILES["formcoursephoto"]["tmp_name"], $target_file);


  $sql="insert into scooters (BrandName , BrandModel , BrandPrice ,Avalability, Image) values('".$_POST['formcoursename']."','".$_POST["formcoursetype"]."','".$_POST["formcourseprice"]."','".$_POST["formcourseavailable"]."','3.png')";
        
	$conn->query($sql);

    // $myfile = fopen("errorFile.txt", 'a') or die("Unable to open file!");
    // $txt = "Error: " . $sql . "<br>" . $conn->error;
    // fwrite($myfile, $txt);
    // fclose($myfile);
    
}
?>

<?php
$conn2=mysqli_connect($servername,$username,$password,$DB);

if(isset($_POST['SubmitEdit'])){ 

	$sql2="UPDATE scooters SET BrandName= '".$_POST['formcoursenamee']."',BrandModel= '".$_POST["formcoursetypee"]."',BrandPrice= '".$_POST["formcoursepricee"]."',Avalability= '".$_POST["formcourseavailablee"]."' WHERE BrandID='".$_POST['formcourseIdd']."'";
	$conn2->query($sql2);
  $conn2->close();
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
<span class="title-home-link"><a href="admin-dashboard.php">
<svg class="svg" viewBox="0 0 576 512"><path d="M541 229.16l-232.85-190a32.16 32.16 0 0 0-40.38 0L35 229.16a8 8 0 0 0-1.16 11.24l10.1 12.41a8 8 0 0 0 11.2 1.19L96 220.62v243a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-128l64 .3V464a16 16 0 0 0 16 16l128-.33a16 16 0 0 0 16-16V220.62L520.86 254a8 8 0 0 0 11.25-1.16l10.1-12.41a8 8 0 0 0-1.21-11.27zm-93.11 218.59h.1l-96 .3V319.88a16.05 16.05 0 0 0-15.95-16l-96-.27a16 16 0 0 0-16.05 16v128.14H128V194.51L288 63.94l160 130.57z"></path></svg>
</a></span>
<h1 class="title-page-name">All Courses</h1>
</div>
</div>
</div>
</div>
</section>
	
<section class="mb-4">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card card-cus-01">
<div class="card-header">
<h6>Add New Course</h6>
</div>
<div class="card-body bg-white">
<div class="row">
<div class="col-lg-12">
<form id="formcourse" name="formcourse" action="" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcoursename" name="formcoursename"/>
<label class="form-label" for="formcoursename">Course Name</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcoursetype" name="formcoursetype"/>
<label class="form-label" for="formcoursetype">Course Type</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcourseprice" name="formcourseprice"/>
<label class="form-label" for="formcourseprice">Course Price</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcourseavailable" name="formcourseavailable"/>
<label class="form-label" for="formcourseavailable">Avalability</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="file" class="form-control" id="formcoursephoto" name="formcoursephoto"/>
<label class="form-label active" for="formcoursephoto" style="position:relative;margin-right:20px;top:-40px;float:right;">Photo</label>
</div>
</div>
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="d-grid">
<button type="submit" class="btn-lg-01 bg-01" name="submit">Add Course</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
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

<div class="cus-datatable table-cus">
<table id="table-courses" class="table table-striped table-bordered table-100 small">
<thead>
<tr>
<th>Course Name</th>
<th>Type</th>
<th>Price</th>
<th>Action</th>
</tr>
</thead>
<tbody>

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
	
<tr>
<td><?php echo $row['BrandName'] ?></td>
<td><?php echo $row['BrandModel'] ?></td>
<td><?php echo $row['BrandPrice'] ?></td>
<td>
<a  id="course_details_action" href="javascript:void(0)" class="btn-small-01 bg-01 my-1 d-block" data-bs-toggle="modal" data-bs-target="#CourseDetails" data-id="<?php  echo  $row['BrandID'] ?>">View Course Details</a>
<a id="course_edit_action" href="javascript:void(0)" class="btn-small-01 bg-03 my-1 d-block" data-bs-toggle="modal" data-bs-target="#CourseEdit" data-id="<?php  echo  $row['BrandID'] ?>">Edit Course</a>
<a id="course_delete_action" href="" class="btn-small-01 bg-02 my-1 d-block" data-id="<?php  echo  $row['BrandID'] ?>">Delete Course</a>
</td>
</tr>
	
<?php
}
$conn->close();
?>

</tbody>	
</table>
</div>
	
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

<!-- Modal View Course Details -->
<div class="modal fade model-frameless" id="CourseDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="modal-body">
<div class="card">
<div class="card-header bg-01">
<h6 class="text-white">View Course Details</h6>
</div>

<div class="card-body">
<table class="table table-striped mb-0 small">
<tbody>
<tr>
<th scope="row">Name</th>
<td><div id="courseName"></div></td>
</tr>
<tr>
<th scope="row">Type</th>
<td><div id="courseType"></div></td>
</tr>
<tr>
<th scope="row">Price</th>
<td><div id="coursePrice"></div></td>
</tr>
<tr>
  <th scope="row">Avalability</th>
<td><div id="courseAvalabile"></div></td>
</tr>
<tr>
<th scope="row">Photo</th>
<td><img src="assets-admin/img-Extra/man-profile-01.jpg" class="personal-photo" alt="" id="coursePhoto"/></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- End Modal View Details -->
	
	
<!-- Modal Edit Course -->
<div class="modal fade model-frameless" id="CourseEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="modal-body">
<div class="card">
<div class="card-header bg-03">
<h6 class="text-white">Edit Course</h6>
</div>
<div class="card-body">
<form id="formcourseedit" name="formcourseedit" action="" method="post">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcoursenamee" name="formcoursenamee" value="Course One" />
<label class="form-label active" for="formcoursenamee">Brand Name</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="hidden" id="formcourseIdd" name="formcourseIdd" value=""/>
<input type="text" class="form-control" id="formcoursetypee" name="formcoursetypee" value="A12" />
<label class="form-label active" for="formcoursetypee">Brand Model</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcoursepricee" name="formcoursepricee" value="120" />
<label class="form-label active" for="formcoursepricee">Brand Price</label>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formcourseavailablee" name="formcourseavailablee" value="120 $" />
<label class="form-label active" for="formcourseavailablee">Avalability</label>
</div>
</div>
<!-- <div class="col-lg-6 col-md-6">
<div class="form-outline mb-4">
<input type="file" class="form-control" id="formcoursephoto" name="formcoursephoto"/>
<label class="form-label active" for="formcoursephoto" style="position:relative;margin-right:20px;top:-40px;float:right;">Photo</label>
</div>
</div> -->
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="d-grid">
<!-- <button type="button" class="btn-lg-01 bg-03" onClick="submitEditCourse()">Edit Course &amp; Save</button> -->
<button type="submit" class="btn-lg-01 bg-03" name="SubmitEdit">Edit Course &amp; Save</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- End Modal Edit Course -->
	


<!-- JS -->

<?php include("assets-admin/includes/scripts.php");?>
<script>
$(document).ready(function(){
$('#table-courses').DataTable({
"columnDefs": [{
"targets": [3],
"orderable": false
}]
});	
});
</script>

<!-- End JS -->

</body>
</html>


	
<script>
$(document).on("click", "#course_details_action", function () {

  var courseId=$(this).data('id');

     $.ajax({
        type: 'post',
        url: 'ajax-request.php',
        data: {'getCourseDetails':true,'courseId':courseId},
        success: function (data) {
          
          console.log(data);

          const obj = JSON.parse(data);
          console.log(obj[0])
          $(".modal-body #courseName").text( obj[0].BrandName);
          $(".modal-body #courseType").text( obj[0].BrandModel);
          $(".modal-body #coursePrice").text( obj[0].BrandPrice);
          $(".modal-body #courseAvalabile").text( obj[0].Avalability);

          $(".modal-body #coursePhoto").attr("src","ScootersImages/"+obj[0].Image);

         

        }
    });
  
});


$(document).on("click", "#course_edit_action", function () {

var courseId=$(this).data('id');

   $.ajax({
      type: 'post',
      url: 'ajax-request.php',
      data: {'getCourseDetails':true,'courseId':courseId},
      success: function (data) {
        
        console.log(data);

        const obj = JSON.parse(data);
        console.log(obj[0])
        $(".modal-body #formcourseIdd").val(BrandId);
        $(".modal-body #formcoursenamee").val( obj[0].BrandName);
        $(".modal-body #formcoursetypee").val( obj[0].BrandModel);
        $(".modal-body #formcoursepricee").val( obj[0].BrandPrice);
        $(".modal-body #formcourseavailablee").val( obj[0].Avalability);

        //$(".modal-body #coursePhoto").attr("src","CoursesImages/"+obj[0].Image);

       

      }
  });

});

$(document).on("click", "#course_delete_action", function () {
  var courseId=$(this).data('id');
    $.ajax({
        type: 'post',
        url: 'ajax-request.php',
        data: {'deletecourseDetails':true,'courseId':courseId},
        
    });
  });


</script>
