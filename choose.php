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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
<style>
     .checkbox {
    top: .8rem;
    width: 1.25rem;
    height: 1.25rem;
}
</style>
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
                <a href="index.php" class="simple-text">
                    Sparks Education
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="admin.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="choose.php">
                        <i class="pe-7s-graph"></i>
                        <p>Accepted Students</p>
                    </a>
                </li>
                <li >
                    <a href="idcard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Generate ID Cards</p>
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
                            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a> -->
                        </li>
                    </ul>
                    <a class="navbar-brand" href="#">Dashboard</a>
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
        <div name="list" id="name" class="table table-striped table-bordered table-hover table-responsive-lg overflow-auto">
    
                <table>
                        <thead>
                    <tr>
                            <th scope="col">Remove</th>
                            <th scope="col">SN.</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Fee Status</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Category</th>
                            <th scope="col">Course</th>
                            <th scope="col">Mobile No.</th>
                            <th scope="col">Aadhar Card No.</th>
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
                <form method="POST">
                        <?php
                    
                    if (mysqli_connect_errno()) {
                        die ('Failed to connect to MySQL: ' . mysqli_connect_error());
                    }
                    include_once 'database/dbh.php';

                    $query ="select Course, Name, Father, Mother, gender, dob, martial, category, religion, addr, yearofp, number, qualification, aadhar, signature, image from students where selected = 1";
                    $result = mysqli_query($conec, $query);
                    $i=0;                  

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $i++;
                        $image = $row['image'];
                        $sig = $row['signature'].'.jpg';                  
                    echo "<tr>
                            <td><input type='checkbox' class='checkbox' name='num[]' value='{$row['number']}'/> </td>
                            <th scope='row'> $i </th>
                            <td> <img src=$image alt='student image' style='width:90px;height:90px'></td>
                            <td> {$row['Name']} </td>
                            <td>  </td>
                            <td> {$row['gender']} </td>
                            <td> {$row['category']} </td>
                            <td> {$row['Course']} </td>
                            <td> {$row['number']} </td>
                            <td> {$row['aadhar']} </td>
                            <td> {$row['addr']} </td>
                            <td> {$row['Father']} </td>
                            <td> {$row['Mother']} </td>
                            <td> {$row['dob']} </td>
                            <td> {$row['martial']} </td>
                            <td> {$row['qualification']} </td>
                            <td> {$row['yearofp']} </td>
                            <td> {$row['religion']} </td>
                            <td> <img src=$sig alt='student Signature' style='width:90px;height:90px'></td>
                    </tr>";
                    }
                  echo "<input type='submit' name='submit' value='Remove' class='btn btn-danger'>";                   

                    ?>
</form>
<?php
// error_reporting(0);
if(isset($_POST['submit']))
{
include_once 'database/dbh.php';
    // print_r($_POST);
    foreach($_POST['num'] as $num)
    {
        $query = "UPDATE students
        SET selected = 0
        WHERE number = '$num';";
       $res = mysqli_query($conec, $query);
    }

    echo "<script type='text/javascript'>alert('Successfully Removed Selected Students');</script>";
    echo '<meta http-equiv = "refresh" content = "0; url = choose.php?success_removed" />';
}
mysqli_close($conec);
?>
                </tbody>
                </table>
            </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">

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

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
