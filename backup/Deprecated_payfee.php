<?php
session_start();

$num = $_SESSION['num'] = $_GET['num'];

if($_SESSION['loggedin'] != TRUE OR !isset($num))
{      
    header("location: login.php");
    exit();
}


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Sparks Education
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href=<?php echo "student.php?num=".$num; ?>>
                        <i class="pe-7s-graph"></i>
                        <p>Student</p>
                    </a>
                </li>
                <li>
                    <a href=<?php echo "studentmarks.php?num=".$num; ?>>
                        <i class="pe-7s-user"></i>
                        <p>Your Marks</p>
                    </a>
                </li>
                <li class="active">
                    <a href=<?php echo "payfee.php?num=".$num; ?>>
                        <i class="pe-7s-user"></i>
                        <p>Pay Fee</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
  

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar">NAme</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Select Your Course and Pay Fee Accordingly</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <i class="fa fa-dashboard"></i> -->
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
     


        <div class="content">
            <div class="container-fluid">
                <div class="row">

<form method="POST" action="pay.php">
    <select id="name" name="course" class="form-control">
        <option name="Dled" value="1">Dled</option>
        <option name="BCA" value="2">BCA</option>
        <option name="BTECG" value="3">BTECh</option>
    </select>

    <div>
        <br>
        <label>Price</label>
            <input type="number" class="form-control" id="Price" name="amount" readonly>
        <label>Course</label>        
            <input class="form-control" id="course" name="course" readonly>
            <input type="hidden" name="st_name" value="Aditya">
        <br>
    </div>
    <button id="singlebutton" type="submit" class="btn btn-primary">Pay Fee</button>
</form>
            </div>
        </div>
    </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://adityaj.ml">Aditya Jain</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"crossorigin="anonymous"></script>

    <script>
        $('#name').change(function () {
            var option_value = $(this).val();
            $('#Price').val(option_value);
        });

    </script>

    <script>
        $('#name').change(function () {
            var option_value = $(this).find('option:selected').attr("name");
            $('#course').val(option_value);
        });
    </script>



</html>
