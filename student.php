<?php
// session_start();

// $num = $_SESSION['number'] = $_GET['num'];

// if($_SESSION['loggedin'] != TRUE OR !isset($num))
// {
      
//     header("location: login.php");
//     exit();
// }
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
                <li class="active">
                    <a href=<?php echo "student.php?num=".$num; ?>>
                        <i class="pe-7s-graph"></i>
                        <p>Student</p>
                    </a>
                </li>
                <li>
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
                    <tr>
                            <th scope="col">Photo</th>
                    </tr>
                            <th scope="col">Name</th>
                            <th scope="col">Fee Status</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Category</th>
                            <th scope="col">Course</th>
                            <th scope="col">Mobile No.</th>
                            <!-- <th scope="col">Aadhar Card No.</th> -->
                            <th scope="col">Address</th>
                            <th scope="col">Father's Name</th>
                            <th scope="col">Mother's Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Martial Status</th>
                            <th scope="col">Qualification</th>
                            <th scope="col">Year Of Passing</th>
                            <th scope="col">Religion</th>
                            <th scope="col">Signature</th>   
                    </tr>
                </thead>

                <tbody>

    <?php
         include_once 'database/dbh.php';
                
           $num = $_GET['num'];
           $query="select * from students where number = '$num'";
        
        if($result = mysqli_query($conec, $query))
        {
            $row =mysqli_fetch_assoc($result);
            $image = $row['image'];
            $sig = $row['signature'];                  
            
            if($row['feestat'] == 1)
            {
                $feestat = "PAID & <br/> VERIFIED";
            }
            else{
                $feestat = "UNPAID";
            }

            echo "<tr>
            <tr> <img src=$image alt='student image' class='rounded' style='width:190px;height:190px'></tr>
            <td> {$row['Name']} </td>
            <td class='btn btn-primary'>{$feestat}</td>
            <td> {$row['gender']} </td>
            <td> {$row['category']} </td>
            <td> {$row['Course']} </td>
            <td> {$row['number']} </td>
            <td> {$row['addr']} </td>
            <td> {$row['Father']} </td>
            <td> {$row['Mother']} </td>
            <td> {$row['dob']} </td>
            <td> {$row['martial']} </td>
            <td> {$row['qualification']} </td>
            <td> {$row['yearofp']} </td>
            <td> {$row['religion']} </td>
            <td><img src=$sig alt='student Signature' style='width:190px;height:190px'></td>
            </tr>";
          }
    ?>
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