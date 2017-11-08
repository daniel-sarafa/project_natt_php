<?php
/*
$requestMethod = $_SERVER['REQUEST_METHOD'];
echo "<p>" . $requestMethod . "</p>";

	$startime = $_SESSION['starttime'];

	$stmttime = 'Update users set logintime=NOW() where username="' . $_SESSION['username'] . '"';
	$stmttime->execute();                
	$stmttime->close();
/*
        $divisor = 30; //point every 3 seconds right now i think
        $newpoints = $timeDiff / $divisor;
        $_SESSION['points'] - $_SESSION['points'] + $newpoints;
        $insertpts = $_SESSION['points'];
        $stmtupdate = 'Update users set points=' .$insertpts . 'where username="' . $_SESSION['username'] . '"';
	
        $stmtupdate->execute();
        $stmtupdate->close();
        header("Location: http://ec2-18-221-59-223.us-east-2.compute.amazonaws.com/project_natt_php/mobile/mainpage.php");
} else {
        print "<p>This isnt working</p>"; */

?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Project NATT</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	<form role="form" action="mainpage.php" method="GET">
		<button class="btn btn-danger" style="margin-left: 10%; width: 80%; font-size:36px; text-align: center;" type="submit">Stop Timer</button>
	</form>
</body>
</html>
