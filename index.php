<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Mini Internsala </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name must be filled out.");return false;}var z =document.forms["form"]["age"].value;if (z == null || z == "") {alert("age must be filled out.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<8 || a.length>25){alert("Passwords must be 8 to 25 characters long.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Passwords must match.");return false;}}
</script>
	<script>
function SignupFirst() { alert("Signup first"); }
</script>


</head>

<body>


 <?php
 include_once 'dbConnection.php';
 session_start();
?>


<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Search For Internship</span></div>
<div class="col-md-4 col-md-offset-2">
   <?php if(!(isset($_SESSION['email']))){
   echo '<a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
      &nbsp;<span class="title1"><b>Signin</b></span></a>';
   echo '<a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal2"><span id="signup" class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
      &nbsp;<span class="title1"><b>Signup</b></span></a>';
   }
   else {
	   $name = $_SESSION['name'];
       $email=$_SESSION['email'];
	  echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span>
   <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=index.php" class="log">
   <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
   }
   ?>
   </div>
   
   <!--sign up modal start-->
<div class="modal fade" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">Sign Up</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="sign.php?q=index.php" method="POST">
<fieldset>


<!-- Text input-->



<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Enter your gender" class="form-control input-md" >
   <option value="Male">Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option> </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>
  <div class="col-md-12">
  <input id="college" name="college" placeholder="Enter your college name" class="form-control input-md" type="text">

  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
   <div class="input-group">
<span class="input-group-addon">@</span>
    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
    </div >
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Enter your mobile number" class="form-control input-md" type="number" min="100000000" max="9999999999">

  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">

  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Conform Password" class="form-control input-md" type="password">

  </div>
</div>
<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12">
    <input  type="submit" class="sub" value="sign up" class="btn btn-success"/>
  </div>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign up modal closed-->
   
   
<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">Log In</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- T	ext input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
    
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

</div><!--header row closed-->
</div>

<div class="bg1">
<?php 

$result = mysqli_query($con,"SELECT * FROM internships") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>Title</b></td><td><b>Starting date</b></td><td><b>Apply by</b></td><td><b>Period</b></td><td><b>Stipend</b></td><td></td><td></td><td></td></tr>';
while($row = mysqli_fetch_array($result)) {
	$topic_id=$row['topic_id'];
	$topic = $row['topic'];
	$start = $row['start'];
	$end = $row['end'];
    $stipend = $row['stipend'];
	$period = $row['period'];
	$date = date("Y/m/d");
	$curdate= strtotime($date);
	$enddate= strtotime($end);
	if($enddate>=$curdate){
	echo '<tr><td>'.$topic.'</td><td>'.$start.'</td><td>'.$end.'</td><td>'.$period.'</td><td>'.$stipend.'</td>
	<td><b><a href="details.php?topic_id='.$topic_id.'&step=2" class="pull-right btn sub1" style="margin:0px;background:#99cc32"  target="_blank">
	<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Details</b></span></a></b></td>';
	
	if(!(isset($_SESSION['email']))){
   
	echo '<td><b><a href="#" class="pull-right btn sub1" style="margin:0px;background:#99cc32" onclick="return SignupFirst()">
	<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Apply</b></span><b></td>
	</tr>';
	}
	else {
		$email=$_SESSION['email'];
		$applied_result=mysqli_query($con,"SELECT * FROM user_apply WHERE email='$email' AND applied='$topic_id'");
	if($row1=mysqli_fetch_array($applied_result)){
		echo '<td><b><a href="#" class="pull-right btn sub1" style="margin:0px;background:red">
		<span class="glyphicon glyphicon-new-window" aria-hidden="true" style="margin:0px;background:red"></span>&nbsp;<span class="title1">
		<b>Applied</b></span></a></b></td>
	</tr>';
	}
	    else{
			echo '<td><b><a href="index.php?topic_id='.$topic_id.'&step=3" class="pull-right btn sub1" style="margin:0px;background:#99cc32">
	<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Apply</b></span></a><b></td>
	</tr>';
	}
	}
	}
}


echo '</table></div>';

?>
</div>
<!--container end-->
<?php
if(@$_GET['step']== 3) {
$topic_id=@$_GET['topic_id'];
$email=$_SESSION['email'];
$q=mysqli_query($con,"INSERT INTO `user_apply`(`email`, `applied`) VALUES ('$email','$topic_id')");

}
?>
<!--Footer start-->
<div class="row footer">
<div class="col-md-3 box">
<a href="http://www.internsala.com" target="_blank"><b>About us</b></a>
</div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login"><b>Employer Login</b></a></div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#developers"><b>Developer</b></a>
</div>
<div class="col-md-3 box">
<a href="feedback.php" target="_blank"><b>Feedback</b></a></div></div>
<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developer</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/saumya.jpg" width=150 height=150 alt="Saumya Singh Chauhan" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://www.facebook.com/sasich3" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Saumya Singh Chauhan</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+918423152946</h4>
		<h4 style="font-family:'typo' ">sasich3@gmail.com</h4>
		<h4 style="font-family:'typo' ">Kamla Nehru Institute Of Technology ,Sultanpur</h4></div></div>
		</p>
		 <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/harshika.jpg" width=150 height=150 alt="Saumya Singh Chauhan" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://www.facebook.com/sasich3" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Harshika </a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+918423152946</h4>
		<h4 style="font-family:'typo' ">sasich3@gmail.com</h4>
		<h4 style="font-family:'typo' ">Kamla Nehru Institute Of Technology ,Sultanpur</h4></div></div>
		</p>
		 <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/pragati.jpg" width=150 height=150 alt="Saumya Singh Chauhan" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://www.facebook.com/sasich3" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Pragati</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+918423152946</h4>
		<h4 style="font-family:'typo' ">sasich3@gmail.com</h4>
		<h4 style="font-family:'typo' ">Kamla Nehru Institute Of Technology ,Sultanpur</h4></div></div>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal for admin login-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">LOGIN</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Admin user id" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->


</body>
</html>
