<?php
session_start();

$num = $_SESSION['number'] = $_GET['num'];

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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
        td,tr{
            width: 50px;
            height: 50px;
            font-size: 15px;
        }
        </style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
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
                <li  class="active">
                    <a href="<?php echo "studentmarks.php?num=".$num; ?>" >
                        <i class="pe-7s-user"></i>
                        <p>Your Marks</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo "reg_form.php";?>" >
                        <i class="pe-7s-user"></i>
                        <p>Your Registration Form</p>
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
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                <a type="submit" class="btn btn-secondary" href="logout.php?logout_successful">Logout</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                        <p class="navbar-brand" >Your Details</p>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                    </ul>
                </div>
            </div>
        </nav>
     


    <div class="content">
    <div class="container-fluid">

        <div name="list" id="name" >
        <table class="table table-striped table-bordered table-hover table-responsive-lg overflow-auto table-bordered">
                <thead>
                    <tr>
                          <?php 
                          error_reporting(0);
                         include_once 'database/dbh.php';
                         $num = $_GET['num'];
                        
                         $query = "select * from marks where number ='$num'";
                         echo"<td scope='col' class='text-secondary mark text-center'>THEORY</td>";
                         echo"<td scope='col' class='text-secondary mark text-center'>PRACTICAL</td>";
                         echo"<td scope='col' class='text-secondary mark text-center'>VIVA</td>";


                         if($result = mysqli_query($conec, $query))
                            {
                                $sub = "subject";
                                $row =mysqli_fetch_assoc($result);
                
                                $i=0;
                                echo "<tr>";
                                while($i < mysqli_num_fields($result) -1 )
                                {
                                  echo "
                                            <td scope='col' class='text-info text-center'>{$row['marks'.$i]}</td>
                                        ";
                                    $i++;
                                }
                                echo "</tr>";

                            }

                           ?>
                    </tr>
                </thead>

            <tbody>
    </div>
</div>
          </div>
     </div>
</div>



</body>



    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

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

</html>
