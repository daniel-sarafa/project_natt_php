<?php
session_start();
date_default_timzezone_set("UTC");
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
    <script>
	function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s + "<br><p style='text-align: center; color: red; font-size: 24px;'>Please click stop timer to ensure you receive your points.</p>";
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function calculatePoints(i, j){
	
}
</script>
</head>
<body onload="startTime()" style="background-color: black;">
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
		<button style="border-radius: 0; position: absolute; width: 100%; height:20em; padding:0; 
		font-size: 36px; color: white; 
		background-image: url('static/images/dumbell.png'); background-repeat: no-repeat;" 
		type="button" class="btn btn-lg fitness" data-toggle="modal" data-target="#timerModal">Fitness Mode</button>
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
		<button data-toggle="modal" data-target="#timerModal" 
		style="border-radius: 0; width: 100%; height: 20em; padding: 0;
		font-size: 36px; color: white; background-image: url('static/images/study.jpg');
		background-repeat: no-repeat;" type="button" class="btn btn-lg enter">Study Mode</button>
		</div>
		
		<div class="modal fade" id="timerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h4 class="modal-title" id="myModalLabel" style="text-align: center; font-size: 36px;">Points Timer</h4>
		
                </div>
                <div class="modal-body" id="txt" style="text-align: center;"></div>
                <div class="modal-footer">
		<form method="POST" id="timeform" role="form">
			<?php $time = date("h:i:sa"); ?>
                    	<input type="hidden" value="<?php echo $time; ?>" >
			<button type="submit" class="btn btn-danger" style="width: 100%; font-size: 36px; text-align: center;" 
					data-dismiss="modal">Stop Timer</button>
		</form?
<?php




?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
