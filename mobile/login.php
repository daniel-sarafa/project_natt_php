<?php
	session_start();
	@$mysqli = new mysqli("localhost", "root", "natt", "usersDB");
	if($mysqli->connect_error){
		die("Can't connect to database.");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Project NATT: Sign Up</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href='static/css/bootstrap.min.css' rel='stylesheet' type='text/css'/>
    <link href='static/css/signupPage.css' rel='stylesheet' type='text/css'/>
    <script>
	function incorrectUserPass(){
		document.getElementById('incorrect').style.visibility = "visible";
		event.preventDefault();
	}	


	</script>
</head>
<body style="background-color: black;">
	<div class="container topbar"></div>
		<img class="image" src="static/images/traffic.png" style="width: 30%; margin-left: 35%; margin-top: 10%;"></img>
		<div class="text-body">
			<h1>Sign up for Project NATT</h1>
			<?php
				$username = "";
				$password = "";
			?>
			<div class="theform" style="margin-top: 15%;">
			<!-- needs to be fixed without thymeleaf -->
			<form method="post" style="font-size: 36px;">
				<div class="formslineup" style="text-align: right; margin-right: 15%; margin-left: 15%;">
					<p>Username: <input style="color: black;" type="text" name="username" required/></p>
					<p>Password: <input style="color: black;" type="password" name="password" required/></p>
					<p id="incorrect" style="visibility: hidden; text-align: center; color: red;">Incorrect username and password combination</p>

					<p style="margin-top: 60%;"></p>
					</div>
					<input type="submit" value="Log In" class="btn submitbut" 
					style= "width: 100%;
					background-color: cornflowerblue;
					padding-bottom: 2%;
					padding-top: 2%;
					font-size: 32px;
					border-radius: 0px;" />
					<input type="reset" value="Reset" class="btn resetbut" style=" 
					background-color: green;
					width: 100%;
					padding-bottom: 2%;
					padding-top: 2%;
					font-size: 32px;
					border-radius: 0px;"/>				
			</form>
			</div>
		</div>
<?php
if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
$username = htmlspecialchars($_REQUEST['username']);
$password = htmlspecialchars($_REQUEST['password']);

$stmtusers = 'SELECT * from users where username ="' . $username . '"';
$result = $mysqli->query($stmtusers);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$foundUName = $row['username'];
		$foundpass = $row['password'];
		$points = $row['points'];
	}
}
if($username == $foundUName && password_verify($password, $foundpass)){

	$_SESSION['username'] = $username;
	$_SESSION['points'] = $points;
	if($_SESSION['points'] == ""){
		$_SESSION['points'] = 100; //
	}
	header("Location: http://ec2-18-221-59-223.us-east-2.compute.amazonaws.com/project_natt_php/mobile/mainpage.php");

} else {
	 print "<script>incorrectUserPass();</script>";
	//let user know that their username/password wasnt found
}
}

?>
</body>
</html>
