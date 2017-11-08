<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$mysqli = new mysqli("localhost", "root", "natt", "usersDB");
if($mysqli->connect_error){
	die("Connection failed.");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Project NATT: Sign Up</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href='static/css/bootstrap.min.css' rel='stylesheet' type='text/css'/>
    <link href='static/css/signupPage.css' rel='stylesheet' type='text/css'/>
    
</head>
<body style="background-color: black;">
	<div class="container topbar"></div>
		<img class="image" src="static/images/traffic.png" style="width: 30%; margin-left: 35%; margin-top: 10%;"></img>
		<div class="text-body">
			<h1>Sign up for Project NATT</h1>
			<div class="theform" style="margin-top: 15%;">
			<!-- needs to be fixed without thymeleaf -->
			<?php
		
			$username = "";
			$password = "";
			$email = "";
			$firstname = "";
			$lastname = "";
			?>
			<form method="post" style="font-size: 36px;" role="form">
				<div class="formslineup" style="text-align: right; margin-right: 15%;">
					<p>Desired Username: <input style="color: black;" name="username" type="text" required/></p>
					<p>Password: <input style="color: black;" type="password" name="password" required/></p>
					<p>Email Address: <input style="color: black;" type="text" name="email" required/></p>
					<p>First Name: <input style="color: black;" type="text" name="firstname" required/></p>
					<p>Last Name: <input style="color: black;" type="text" name="lastname" required/></p>
					</div>
					<p style="margin-top: 5%;"><a href="mainpage.php"><input type="submit" value="Submit" class="btn submitbut"/></a>
					<input type="reset" value="Reset" class="btn resetbut"/></p>
			</form>
			</div>
		</div>
<?php

if(isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['email']) && isset($_REQUEST['firstname']) &&
	isset($_REQUEST['lastname'])){

	$username = htmlspecialchars($_REQUEST['username']);
	$password = htmlspecialchars($_REQUEST['password']);
	$hashed_pass = password_hash($password, PASSWORD_DEFAULT);
	$email = htmlspecialchars($_REQUEST['email']);
	$firstname = htmlspecialchars($_REQUEST['firstname']);
	$lastname = htmlspecialchars($_REQUEST['lastname']);
	
	$stmtUnique = 'SELECT * from users where username = "' . $username . '"';
	$result = $mysqli->query($stmtUnique);
	if($result->num_rows > 0){
		//use print to call preventDefault in javascript function (let user know that username is taken)
	} else {
		$stmtinsert = $mysqli->prepare("INSERT INTO users (username, password, firstname, lastname, email) VALUES(?, ?, ?, ?, ?)");
		$stmtinsert->bind_param("sssss", $username, $hashed_pass, $firstname, $lastname, $email);
		$stmtinsert->execute(); 
		$stmtinsert->close();
	}
	$mysqli->close();

}



?>
</body>
</html>
