<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
//delete feedback
if(isset($_SESSION['email'])){
if(@$_GET['fdid'] ) {
$id=@$_GET['fdid'];
$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error');
header("location:dash.php?q=3");
}
}

//delete user
if(isset($_SESSION['email'])){
if(@$_GET['demail'])  {
$demail=@$_GET['demail'];
$r1= mysqli_query($con,"SELECT * FROM feedback WHERE email='$demail' ") or die('Error');
while($row = mysqli_fetch_array($r1)) {
	mysqli_query($con,"DELETE FROM feedback WHERE email='$demail' ") or die('Error');
}
$r2= mysqli_query($con,"SELECT * FROM user_apply WHERE email='$demail' ") or die('Error');
while($row = mysqli_fetch_array($r2)) {
	mysqli_query($con,"DELETE FROM user_apply WHERE email='$demail' ") or die('Error');
}
$result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
header("location:dash.php?q=1");
}
}
//remove internship
if(isset($_SESSION['email'])){
$topic_id=@$_GET['topic_id'];
if(@$_GET['q']== 'rm_intern') {
$r1 = mysqli_query($con,"DELETE FROM internships WHERE topic_id='$topic_id'") or die('Error');
header("location:dash.php?q=5");
}
}

//add internship
if(isset($_SESSION['email'])){
if(@$_GET['q']== 'addintern' ) {
$name = $_POST['name'];
$topic= $_POST['topic'];
$start = $_POST['start'];
$end = $_POST['end'];
$stipend = $_POST['stipend'];
$period = $_POST['period'];
$details = $_POST['details'];
$topic_id=uniqid();
mysqli_query($con,"INSERT INTO internships VALUES  ('$topic_id','$topic','$start','$end','$period','$stipend','$details')") or die('Error61');

header("location:dash.php");
}
}




?>



