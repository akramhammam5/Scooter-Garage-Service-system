<?php
function countUsers(){
    $servername="localhost";
    $username="root";
    $password="";
    $DB="scootergarage";

    $conn=mysqli_connect($servername,$username,$password,$DB);
	$countLearners = 0;
    $sql= "SELECT * FROM learnersignup ";
    $result= $conn->query($sql);
    while($row = $result->fetch_assoc()){
    	$countLearners = $countLearners + 1;
    }
    return $countLearners;
}
function countScooters(){
    $servername="localhost";
    $username="root";
    $password="";
    $DB="scootergarage";

    $conn=mysqli_connect($servername,$username,$password,$DB);
    $countCourses = 0;
    $sql2= "SELECT * FROM scooters ";
    $result2= $conn->query($sql2);
    while($row2 = $result2->fetch_assoc()){
        $countCourses = $countCourses + 1;
    }
    return $countCourses;
}
function countEmployees(){
    $servername="localhost";
    $username="root";
    $password="";
    $DB="scootergarage";

    $conn=mysqli_connect($servername,$username,$password,$DB);
    $countAdmins = 0;
    $sql3= "SELECT * FROM tutorregistration ";
    $result3= $conn->query($sql3);
    while($row3 = $result3->fetch_assoc()){
        $countAdmins = $countAdmins + 1;
    }
    return $countAdmins;
}

function countProducts(){
    $servername="localhost";
    $username="root";
    $password="";
    $DB="scootergarage";

    $conn=mysqli_connect($servername,$username,$password,$DB);
    $countAdmins = 0;
    $sql3= "SELECT * FROM products ";
    $result3= $conn->query($sql3);
    while($row3 = $result3->fetch_assoc()){
        $countAdmins = $countAdmins + 1;
    }
    return $countAdmins;
}

function countCart(){
    $servername="localhost";
    $username="root";
    $password="";
    $DB="scootergarage";

    $conn=mysqli_connect($servername,$username,$password,$DB);
    $countCart = 0;
    $sql2= "SELECT * FROM mycart WHERE LearnerID ='".$_SESSION["LearnerID"]."'";
    $result2= $conn->query($sql2);
    while($row = $result2->fetch_assoc()){
    	$countCart = $countCart + 1;
    }
    return $countCart;
}

function countMyCourses(){
    $servername="localhost";
    $username="root";
    $password="";
    $DB="scootergarage";

    $conn=mysqli_connect($servername,$username,$password,$DB);
    $countMyCourses = 0;
    $sql3= "SELECT * FROM mycourse WHERE LearnerID ='".$_SESSION["LearnerID"]."'";
    $result3= $conn->query($sql3);
    while($row = $result3->fetch_assoc()){
    	$countMyCourses = $countMyCourses + 1;
    }
    return $countMyCourses;
}


?>