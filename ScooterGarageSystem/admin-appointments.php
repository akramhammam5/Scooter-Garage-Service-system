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
  die("connection failed: " . mysqli_connect_error());
  // $myfile = fopen("errorFile.txt", 'a') or die("Unable to open file!");
  // $txt ="connection failed: " . mysqli_connect_error();
  // fwrite($myfile, $txt);
  // fclose($myfile);
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
<h1 class="title-page-name">All Appointments</h1>
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
<!-- 7agh ready made  -->
<table id="table-learners" class="table table-striped table-bordered table-100 small">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Scooter Type</th>
<th>Scooter Number</th>
<th>Date</th>
<th>Notes</th>
<!-- <th>Action</th> -->
</tr>
</thead>
<tbody>

<?php
    $sql= "SELECT * FROM appointment ";
    $result= $conn->query($sql);
    $getdata = array();
    $counter = 0;
 
  	while($row = $result->fetch_assoc()){
      $myfile = fopen("errorFile.txt", 'a') or die("Unable to open file!");
      $txt = "Error: " . $sql . "<br>" . $conn->error;
      fwrite($myfile, $txt);
      fclose($myfile);
      
    ?>	
	

<tr>
<td><?php echo $row['Name'] ?></td>
<td><?php echo $row['email'] ?></td>
<td><?php echo $row['Phone'] ?></td>
<td><?php echo $row['scootertype'] ?></td>
<td><?php echo $row['scooternumber'] ?></td>
<td><?php echo $row['date'] ?></td>
<td><?php echo $row['notes'] ?></td>
<!-- <?php
// $getdata[$counter]= $row['Username'];
// $counter = $counter + 1;
?> -->
<!-- <td><a href="javascript:void(0)" onclick="SendData(<?php //$counter ?>)" class="btn-small-01 bg-01 my-1 d-block" data-bs-toggle="modal" data-bs-target="#ViewDetails">View Details</a></td> -->

</tr>

<?php
}
// $conn->close();
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
	
<!-- <?php
// function SendData($counter) {
//     $UsernameData = $getdata[$counter];
?> -->



<!-- Modal View Details -->
<!-- <div class="modal fade model-frameless" id="ViewDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="modal-body">
<div class="card">
<div class="card-header bg-01">
<h6 class="text-white">View Details</h6>
</div>
<div class="card-body">
<table class="table table-striped mb-0 small">
<tbody>
<?php
// if(!$conn){
//     die("coonection failed: " . mysqli_connect_error());
// }
    
	
//   	$sql= "SELECT * FROM learnersignup WHERE Username = $UsernameData";
//     $row= $conn->query($sql);

?>
  		
<tr>
<th scope="row">First Name</th>
<td><?php //echo $row['FirstName'] ?></td>
</tr>
<tr>
<th scope="row">Last Name</th>
<td><?php //echo $row['LastName'] ?></td>
</tr>
<tr>
<th scope="row">Email Address</th>
<td><?php // echo $row['Email'] ?></td>
</tr>
<tr>
<th scope="row">Phone</th>
<td><?php //echo $row['MobileNumber'] ?></td>
</tr>
<tr>
<th scope="row">National ID</th>
<td><?php //echo $row['NationalID'] ?></td>
</tr>
<tr>
<th scope="row">User Name</th>
<td><?php //echo $row['Username'] ?></td>
</tr>
<tr>
<th scope="row">Personal Photo</th>
<td><?php //echo "<img src='./uploads/".$row['PersonalPhoto']."' class='personal-photo' alt=''>";?></td>
</tr>
<?php

//$conn->close();
?>	
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
 End Modal View Details --> 

<?php
//};

?> 

<!-- JS -->

<?php include("assets-admin/includes/scripts.php");?>
<script>
$(document).ready(function(){
$('#table-learners').DataTable({
"columnDefs": [{
"targets": [2,3],
"orderable": false
}]
});	
});
</script>

<!-- End JS -->

</body>
</html>
