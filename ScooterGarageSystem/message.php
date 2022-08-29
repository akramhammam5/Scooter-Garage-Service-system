<?php include("assets-admin/includes/head.php");?>


<body>


<?php include("assets-admin/includes/header-learner.php");?>

<?php include("assets-admin/includes/side-menu-learner.php");?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php

// session start
session_start();

// include DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$receiver = $_GET['receiver'];
//include "menu.php";

$getReceiver = "SELECT * FROM adminregistration WHERE ID = '$receiver'";
$getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
$getReceiverRow = mysqli_fetch_array($getReceiverResult);
?>

<div class="header-spacer"></div>

<main>
	
<section>
<!-- <img src="./images/<?=$getReceiverRow['image']?>" class="img-circle" width = "40"/> -->
<strong><?=$getReceiverRow['Username']?></strong>
<table class="table table-striped">
<?php
$getMessage = "SELECT  messages.* ,adminregistration.Username FROM messages INNER JOIN adminregistration on SenderID=adminregistration.ID  WHERE SenderID = '$receiver' AND ReceiverID = ".$_SESSION['LearnerID']." OR SenderID = ".$_SESSION['LearnerID']." AND ReceiverID = '$receiver' ORDER BY createdAt asc";
$getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($getMessageResult) > 0) {
	while($getMessageRow = mysqli_fetch_array($getMessageResult)) {	?>
	<tr><div style = "margin: 10;">
	<td>	<h4 style = "color: #007bff;display:inline"><?=$getMessageRow['Username']?></h4></td>
	<td>	<p class="text-center" style = "display:inline"><?=$getMessageRow['Bodymessage']?></p></td>
		</div>
		</tr>
<?php } 
} 
else { 
	echo "<tr><td><p>No messages yet! Say 'Hi'</p></td></tr>";
}
?>
</table>
<form class="form-inline" action="" method = "POST">
	<input type="hidden" name = "SenderID" value = "<?=$_SESSION['LearnerID']?>"/>
	<input type="hidden" name = "ReceiverID" value = "<?=$receiver?>"/>
	<input type="text" name = "Bodymessage" class="form-control" placeholder = "Type your message here" required/>
	<input type = "submit" value='send' name='submit' class="btn btn-default">
</form>
<?php
if(isset($_POST['submit'])) {
	$createdAt = date("Y-m-d h:i:sa");
	$SenderID = $_POST['SenderID'];
	$ReceiverID = $_POST['ReceiverID'];
	$Bodymessage = $_POST['Bodymessage'];
	$sendMessage = "INSERT INTO messages(Bodymessage,SenderID,ReceiverID,createdAt) VALUES('$Bodymessage','$SenderID','$ReceiverID','$createdAt')";
	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
}
?>
</section>
</main>

</body>