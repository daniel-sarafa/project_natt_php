<?php
session_start();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
date_default_timezone_set("UTC");
@$mysqli = new mysqli("localhost", "root", "natt", "usersDB");
if($mysqli->connect_error){
	die("Connection error");
}
$username = $_SESSION['username'];
$points = $_SESSION['points'];
?>
<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Project NATT: Log in</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='static/css/mainPage.css' rel='stylesheet' type='text/css'/>

</head>
<body style="background-color: black;">
<div class="row">
	<nav class="navbar topbar" style="padding-top: 2em;
	padding-bottom: 2em; border-radius: 0; width: 100%;">
		<div class="container-fluid">
		<div class="navbar-header">
		<?php
		print '<p class="hello" style="width: 300px; text-align: center; margin-bottom: 1px;">Hello, ' .$username . '!</p>';
		?>
		
		</div>
		<div class="navbar-right" style="padding-left: 0; width: 300px; text-align: right;">
		<?php 
			print '<p class="points" style="text-align: center;">Points: ' . $points . '</p>';
		?>
		</div>
	</div>
	</nav>
	</div>
	<div class="row" style="font-size: 36px; height: 20em;">
	<div class="col-sm-6">
		<form action="timestamp.php" method="POST" role="form">
		<button style="border-radius: 0; position: absolute; width: 100%; height:20em; padding:0; 
		font-size: 36px; color: white; 
		background-image: url('static/images/dumbell.png'); background-repeat: no-repeat;" 
		type="submit" class="btn btn-lg fitness">Fitness Mode</button></form>
		</div>
		<div class="col-sm-6" style="padding-right: 0;">
		<button style="border-radius: 0; background-image: url('static/images/movie.jpg'); width: 100%; height:20em; padding:0;
		font-size: 36px; color: white; background-repeat: no-repeat;" type="button" 
		class="btn btn-lg enter" data-toggle="modal" data-target="#timerModal">Entertainment Mode</button>
		</div>
		</div>
		<div class="row" style="height: 7em;">
		<div class="col-sm-12" style="padding-right: 0;">
			<button type="button" class="btn btn-lg drive" data-toggle="modal" data-target="#timerModal"
			style="width: 100%; background-image: url('static/images/drive.jpg'); 
			background-repeat: no-repeat; height: 7em; font-size: 36px; border-radius: 0; color: white;">
			Drive Mode</button>
		</div>
		</div>
		<div class="row" style="font-size: 36px; height: 20em;">
		<div class="col-sm-6">
		<button data-toggle="modal" data-target="#timerModal" style="border-radius: 0; position: absolute; 
		width: 100%; height:20em; padding: 0;
		font-size: 36px; color: white; background-image: url('static/images/gametime.jpg'); background-repeat: no-repeat;" type="button" class="btn btn-lg enter">Family Mode</button>
		</div>
		<div class="col-sm-6" style="padding-right: 0;">
		
		<?php $starttime = date("h:i:sa"); ?>
		<button data-toggle="modal" data-target="#timerModal" 
		style="border-radius: 0; width: 100%; height: 20em; padding: 0;
		font-size: 36px; color: white; background-image: url('static/images/study.jpg');
		background-repeat: no-repeat;" type="submit" class="btn btn-lg enter">Study Mode</button>
		</div>
		
    </div>
</div>



<?php
$_SESSION['starttime'] = $starttime;
/*
if(isset($_REQUEST['starttime']) && isset($_REQUEST['endtime'])){
        $endtime = htmlspecialchars($_REQUEST['endtime']);
        $starttime = htmlspecialchars($_REQUEST['starttime']);
        $timeDiff = $endtime - $starttime;
        $divisor = 30; //point every 3 seconds right now i think
        $newpoints = $timeDiff / $divisor;
        $_SESSION['points'] - $_SESSION['points'] + $newpoints;
        $insertpts = $_SESSION['points'];
        $stmtupdate = 'Update users set points=' .$insertpts . 'where username="' . $_SESSION['username'] . '"';
        $stmtupdate->execute();
        $stmtupdate->close();
        header("Location: http://ec2-18-221-59-223.us-east-2.compute.amazonaws.com/project_natt_php/mobile/mainpage.php");
} else {
        print "<p>This isnt working</p>";
}


*/
?>
</body>
</html>
