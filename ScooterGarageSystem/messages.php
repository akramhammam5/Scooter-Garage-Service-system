<?php include("assets-admin/includes/head.php");?>


<body>


<?php include("assets-admin/includes/header-learner.php");?>

<?php include("assets-admin/includes/side-menu-learner.php");?>
	



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);

//include "menu.php";
 
?>
<div class="header-spacer"></div>

<main>
	
<section>
<form class="form-inline" method = "POST" action = "">
	<input type="text" name = "name" placeholder="Search" class="form-control">
	<input type="submit" value='Search' name='search' class="btn btn-default">
</form>
<?php
if(isset($_POST['search'])) {
	$search=$_POST['name'];
	$searchUser = "SELECT * FROM adminregistration WHERE Username = '$search'";
	$searchUserResult = mysqli_query($conn,$searchUser);

	while($searchUserRow = mysqli_fetch_array($searchUserResult)){	?>
		<div>
		   <!-- <img src = "images/<?=$searchUserRow['image']?>" class="img-circle" width = "40"/>  -->
		<?=$searchUserRow['Username']?>
		<a href="./message.php?receiver=<?=$searchUserRow['ID']?>">Send message</a>
		</div>
<?php }
}
?>
<div>
<?php
$lastMessage = "SELECT DISTINCT SenderID FROM messages WHERE ReceiverID = ".$_SESSION['LearnerID'];
$lastMessageResult = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($lastMessageResult) > 0) {
	while($lastMessageRow = mysqli_fetch_array($lastMessageResult)) {
		$sent_by = $lastMessageRow['SenderID'];
		$getSender = "SELECT * FROM learnersignup WHERE LearnerID = '$sent_by'";
		$getSenderResult = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
		$getSenderRow = mysqli_fetch_array($getSenderResult);
		?>
		<div>

		 </div><br>
<?php 
}
$conn->close();}

else {
	echo "No conversations yet!";
}
?>
</div>
</section>
</main>

</body>

