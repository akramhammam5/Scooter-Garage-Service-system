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
<span class="title-home-link"><a href="admin-dashboard.php">
<svg class="svg" viewBox="0 0 576 512"><path d="M541 229.16l-232.85-190a32.16 32.16 0 0 0-40.38 0L35 229.16a8 8 0 0 0-1.16 11.24l10.1 12.41a8 8 0 0 0 11.2 1.19L96 220.62v243a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-128l64 .3V464a16 16 0 0 0 16 16l128-.33a16 16 0 0 0 16-16V220.62L520.86 254a8 8 0 0 0 11.25-1.16l10.1-12.41a8 8 0 0 0-1.21-11.27zm-93.11 218.59h.1l-96 .3V319.88a16.05 16.05 0 0 0-15.95-16l-96-.27a16 16 0 0 0-16.05 16v128.14H128V194.51L288 63.94l160 130.57z"></path></svg>
</a></span>
<h1 class="title-page-name">Requested Courses</h1>
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
<th>Brand Name</th>
<th>Brand Model</th>
<th>Brand Price</th>
<th>Brand Type</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
    $sql= "SELECT * FROM requestedcourse ";
    $result= $conn->query($sql);
 
  while($row = $result->fetch_assoc()){
    ?>	
	
<tr>
<td><?php echo $row['BrandName'] ?></td>
<td><?php echo $row['BrandModel'] ?></td>
<td><?php echo $row['BrandPrice'] ?></td>
<td><?php echo $row['Type'] ?></td>
<td>
<a href="admin-requested-courses.php" id="Rcourse_approve_action" class="btn-small-01 bg-03 my-1 d-block"  data-id="<?php  echo  $row['BrandID'] ?>" data-name="<?php  echo  $row['BrandName'] ?>" data-type="<?php  echo  $row['BrandModel'] ?>" data-price="<?php  echo  $row['BrandPrice'] ?>" data-image="<?php  echo  $row['BrandType'] ?>">Approve Course</a>
<a href="admin-requested-courses.php" class="btn-small-01 bg-02 my-1 d-block" id="Rcourse_delete_action" data-id="<?php  echo  $row['BrandID'] ?>">Reject Course</a>
</td>
</tr>

<?php
}
$myfile = fopen("errorFile.txt", 'a') or die("Unable to open file!");
$txt ="Error: " . $sql . "<br>" . $conn->error;
fwrite($myfile, $txt);
fclose($myfile);
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
  $(document).on("click", "#Rcourse_approve_action", function () {
  var courseId=$(this).data('id');
  var courseName=$(this).data('name');
  var courseType=$(this).data('type');
  var coursePrice=$(this).data('price');
  var courseType=$(this).data('image');
    $.ajax({
        type: 'post',
        url: 'ajax-request.php',
        data: {'approvecourseDetails':true,'RcourseId':courseId,'RcourseName':courseName,'RcourseType':courseType,'RcoursePrice':coursePrice,'RcourseType':courseType },
        
    });
  });

  $(document).on("click", "#Rcourse_delete_action", function () {
  var courseId=$(this).data('id');
    $.ajax({
        type: 'post',
        url: 'ajax-request.php',
        data: {'deleteRcourseDetails':true,'courseId':courseId},
        
    });
  });

</script>
