<?php include("assets-admin/includes/head.php");?>
    
<!-- End Head -->

<body>

<!-- Header -->

<?php include("assets-admin/includes/header-tutor.php");?>
    
<!-- End Header -->

    
<!-- Header -->

<?php include("assets-admin/includes/side-menu-tutor.php");?>
    
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
  //   $target_dir="./ScootersImages/";
  // $target_file=$target_dir.basename($_FILES["formcoursephoto"]["name"]);
  // $target_file2=basename($_FILES["formcoursephoto"]["name"]);
  // $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // if(file_exists($target_file))
  //   {
  //       echo "file already exists";
  //   }
  // move_uploaded_file($_FILES["formcoursephoto"]["tmp_name"], $target_file);

    $sql="insert into products (BrandName , BrandModel , BrandPrice , Avalability , Image,Type) values('".$_POST['formname']."','".$_POST["formbrandmodel"]."','".$_POST["formbrandprice"]."','".$_POST["formavalability"]."','5.jfif','".$_POST["formtype"]."')";
        
    $conn->query($sql); 

    // $myfile = fopen("errorFile.txt", 'a') or die("Unable to open file!");
    // $txt = "Error: " . $sql . "<br>" . $conn->error;
    // fwrite($myfile, $txt);
    // fclose($myfile);
    
}

?>

<?php

if(isset($_POST['submitEdit'])){ 
    $conn2=mysqli_connect($servername,$username,$password,$DB);
    $sql2="UPDATE products SET BrandName= '".$_POST['formusereditname']."',BrandModel= '".$_POST["formeditname"]."',BrandPrice= '".$_POST["formeditprice"]."',Avalability= '".$_POST["formavalability"]."',Type= '".$_POST["formtype"]."' WHERE BrandID='".$_POST['formusereditid']."'";
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
<h1 class="title-page-name">Scooters</h1>
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
<table id="table-users" class="table table-striped table-bordered table-100 small"> 
<thead>
<tr>
<th>Brand Name</th>
<th>Brand Model</th>
<th>Brand Price</th>
<th>Avalability</th>
<th>Type</th>
</tr>
</thead>
<tbody>

<?php
    $sql= "SELECT * FROM products ";
    $result= $conn->query($sql);
 
    while($row = $result->fetch_assoc()){
    ?>
    
<tr>
<td><?php echo $row['BrandName'] ?></td>
<td><?php echo $row['BrandModel'] ?></td>
<td><?php echo $row['BrandPrice'] ?></td>
<td><?php echo $row['Avalability'] ?></td>
<td><?php echo $row['Type'] ?></td>
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
    
    
<!-- Modal Edit Course -->
<div class="modal fade model-frameless" id="UserEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="modal-body">
<div class="card">
<div class="card-header bg-01">
<h6 class="text-white">Edit User</h6>
</div>
<div class="card-body">
<form id="formuseredit" name="formuseredit" action="" method="POST">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-4 col-md-4">
<div class="form-outline mb-4">
<input type="hidden" id="formusereditid" name="formusereditid" value=""/>
<input type="text" class="form-control" id="formusereditname" name="formusereditname" value="Course One" />
<label class="form-label active" for="formusereditname">Brand Name</label>
</div>
</div>

<div class="col-lg-4 col-md-4">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formeditname" name="formeditname" value="Course One" />
<label class="form-label active" for="formeditname">Brand Model</label>
</div>
</div>

<div class="col-lg-4 col-md-4">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formeditprice" name="formeditprice" value="Course One" />
<label class="form-label active" for="formeditprice">Brand Price</label>
</div>
</div>

<div class="col-lg-4 col-md-4">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formavalability" name="formavalability" value="Course One" />
<label class="form-label active" for="formavalability">Avalability</label>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="form-outline mb-4">
<input type="text" class="form-control" id="formtype" name="formtype" value="Course One" />
<label class="form-label active" for="formtype">Type</label>
</div>
</div>
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="d-grid">
<button type="submit" class="btn-lg-01 bg-01" name="submitEdit">Edit User &amp; Save</button>
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
$('#table-users').DataTable({
"columnDefs": [{
"targets": [1],
"orderable": false
}]
}); 
});
</script>

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

<script>

// function delete(Id)
//   {
//     $.ajax({
//         type: 'post',
//         url: 'ajax-request.php',
//         data: {'deleteUserDetails':true,'Id':Id},
        
//     });
//   };
  $(document).on("click", "#user_delete_action", function () {
    var Idd=$(this).data('id');
    $.ajax({
        type: 'post',
        url: 'ajax-request.php',
        data: {'deleteProductDetails':true,'Id':Idd},
        
    });
  });


$(document).on("click", "#user_edit_action", function () {

var Id=$(this).data('id');

   $.ajax({
      type: 'post',
      url: 'ajax-request.php',
      data: {'getProductDetails':true,'Id':Id},
      success: function (data) {
        
        console.log(data);

        const obj = JSON.parse(data);
        console.log(obj[0])
        $(".modal-body #formusereditid").val(Id);
        $(".modal-body #formusereditname").val( obj[0].BrandName);
        $(".modal-body #formeditname").val( obj[0].BrandModel);
        $(".modal-body #formeditprice").val( obj[0].BrandPrice);
        $(".modal-body #formavalability").val( obj[0].Avalability);
        $(".modal-body #formtype").val( obj[0].Type);
        

        //$(".modal-body #coursePhoto").attr("src","CoursesImages/"+obj[0].Image);

       

      }
  });

});


</script>