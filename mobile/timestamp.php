<!DOCTYPE HTML>
<html>
<head>
        <title>Project NATT</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>


if (screen.width >= 700) {
document.location = "../deviceDetection.php";
}

        </script>


<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
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
<body style="background-color: black; color: white;" onload="startTime();" >
	<div id="txt" style="font-size: 36px; margin-top: 60%; text-align: center;"></div>
	<div id="form">
	<?php $time = ""; ?>
	<form role="form" method="GET" action="mainpage.php">
		<input type="hidden" name="time" value="NOW()">
		<button class="btn btn-danger" style="margin-left: 10%; width: 80%; font-size:36px; text-align: center; color: white;" type="submit">Stop Timer</button>
	</form>

<?php
session_start();
if(isset($_REQUEST['starttime'])){
$_SESSION['starttime'] = htmlspecialchars($_REQUEST['starttime']);

}
/*
@$mysqli = new mysqli("localhost", "root", "natt", "usersDB");

if(isset($_REQUEST['time'])){
	$time = $_REQUEST['time'];
	$stmttime = $mysqli->prepare('update users set logintime=? where username=?');
	$logintime = "NOW()";
	$user = $_SESSION['username'];
	$stmttime ->bind_param('ss', $logintime, $user);
	$status = $stmt->execute();
}
*/
?>
</body>
</html>
