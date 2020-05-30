<?php
error_reporting(0);
session_start();
		
		if($_SESSION['loggedin']===TRUE && $_SESSION['id'] != '9701123421')
		{
			$num = $_SESSION['name'];
			header("location: student.php?num=$num");
		}
		else if($_SESSION['loggedin']===TRUE && $_SESSION['id'] == '9701123421')
		{
			header("location: admin.php");
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sparks Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />    	

<!--===============================================================================================-->
</head>


<body>

<div class="navbar navbar-inverse navbar-fixed-top" id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img class="logo-custom" src="assets/img/logo180-50.png" alt=""  /></a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="index.php">HOME</a></li>
                     <li><a href="register.php">Student Register</a></li>
                    <li><a href="login.php">Login</a></li>
                     <li><a href="index.php">Courses</a></li>
                     <li><a href="index.php">CONTACT</a></li>
                </ul>
            </div>
           
        </div>
    </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="session.php">
					<span class="login100-form-title p-b-32">
Verify Your Status Here
					</span>

					<span class="txt1 p-b-11">
						Number
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Mobile Number is required">
						<input class="input100" type="text" name="number" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
	
<!--===============================================================================================-->
    <script src="assets/js/scrollReveal.js"></script>
	<script src="js/main.js"></script>
	<div id="footer">
            <a href="https://portala.info" id="footer" style="color: #fff;" target="_blank">Website By Portala Inc. COPYRIGHT © PORTALA INC. | World Fastest Online IDE</a>
    </div>
</body>
</html>