<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MINI INTERNSALA || DASHBOARD </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
 <script src="js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Search For Internship</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"
></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="index.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=index.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">User</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Internships<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Internship</a></li>
            <li><a href="dash.php?q=5">Remove Internship</a></li>
          </ul>
        </li>
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) { $result = mysqli_query($con,"SELECT * FROM internships") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>Title</b></td><td><b>Starting date</b></td><td><b>Apply by</b></td><td><b>Period</b></td><td><b>Stipend</b></td><td></td></tr>';
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
	<td><b><a href="index.php?topic_id='.$topic_id.'&step=2" class="pull-right btn sub1" style="margin:0px;background:#99cc32">
	<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Details</b></span></a></b></td>';
	
	if(!(isset($_SESSION['email']))){
   
	echo '<td><b><a href="index.php?q=apply&topic_id='.$topic_id.'&step=3" class="pull-right btn sub1" style="margin:0px;background:#99cc32">
	<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Apply</b></span></a><b></td>
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
			echo '<td><b><a href="index.php?q=apply&topic_id='.$topic_id.'&step=3" class="pull-right btn sub1" style="margin:0px;background:#99cc32">
	<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Apply</b></span></a><b></td>
	</tr>';
	}
	}
	}
}

echo '</table></div>';

}


?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	$college = $row['college'];

	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add internship start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Internships Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addqintern"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="topic" name="topic" placeholder="Enter Topic" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="start">Enter starting date</label>  
  <div class="col-md-12">
  <input id="start" name="start" placeholder="Enter starting date" class="form-control input-md" type="date">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="end">Enter expiry date for application</label>  
  <div class="col-md-12">
  <input id="end" name="end" placeholder="Enter expiry date" class="form-control input-md" min="0" type="date">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="period"></label>  
  <div class="col-md-12">
  <input id="period" name="period" placeholder="Enter Period of internship" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="stipend"></label>  
  <div class="col-md-12">
  <input id="stipend" name="stipend" placeholder="Enter stipend" class="form-control input-md" type="number">
    
  </div>
</div>

<div class="form-group">
  <label for="editor">write DETAILS :</label>
  <textarea class="form-control ckeditor" id="editor" name="details"></textarea>
  <script type="text/javascript">
       
	   CKEDITOR.replace( "editor",
    {
	    removeButtons: "Source,About",
       
	   });
 </script> 
  </div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add internship end-->

<!--remove internship-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM internships") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S NO.</b></td><td><b>Title</b></td><td><b>Starting date</b></td><td><b>Apply by</b></td><td><b>period</b></td><td><b>stipend</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$topic_id=$row['topic_id'];
	$topic = $row['topic'];
	$start = $row['start'];
	$period = $row['period'];
	$end = $row['end'];
    $stipend = $row['stipend'];
	echo '<tr><td>'.$c++.'</td><td>'.$topic.'</td><td>'.$start.'</td><td>'.$end.'</td><td>'.$period.'</td><td>'.$stipend.'&nbsp;min</td>
	<td><b><a href="update.php?q=rm_intern&topic_id='.$topic_id.'" class="pull-right btn sub1" style="margin:0px;background:red">
	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';

}
$c=0;
echo '</table></div>';

}
?>


</div><!--container closed-->
</div></div>
</body>
</html>
