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
			<form action="mainpage.html" method="post" style="font-size: 36px;">
				<div class="formslineup" style="text-align: right; margin-right: 15%;">
					<p>Desired Username: <input style="color: black;" type="text" /></p>
					<p>Password: <input style="color: black;" type="password" /></p>
					<p>Email Address: <input style="color: black;" type="text" /></p>
					<p>First Name: <input style="color: black;" type="text" /></p>
					<p>Last Name: <input style="color: black;" type="text"/></p>
					</div>
					<p style="margin-top: 5%;"><input type="submit" value="Submit" class="btn submitbut"/>
					<input type="reset" value="Reset" class="btn resetbut"/></p>
			</form>
			</div>
		</div>
</body>
</html>