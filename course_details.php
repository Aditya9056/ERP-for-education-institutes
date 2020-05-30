<?php
session_start();

if($_SESSION['id'] != 9701123421 OR $_SESSION['loggedin'] != TRUE)
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

	<title>Enter Course Details</title>

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
                <li >
                    <a href="choose.php">
                        <i class="pe-7s-graph"></i>
                        <p>Accepted Students</p>
                    </a>
                </li>
                <li >
                    <a href="idcard.php"  class="active">
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
                    <a class="navbar-brand" href="admin.php">Enter COurse and Branch Details</a>
                </div>
                <a type="submit" class="btn btn-secondary" href="logout.php?logout_successful">Logout</a>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a> -->
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
        <div name="list" id="name" class="table table-striped table-bordered table-hover table-responsive-lg overflow-auto">

                </tbody>
                </table>
            </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="form-group">  
                     <form name="add_name" id="add_name">  
                          <div class="table-responsive">  
                          <h2 class="heading text-info"> </h2> <br/> 

                               <table class="table table-bordered" id="dynamic_field">                                 
                                    <tr>  
                                         <td><h2 class="heading text-center text-primary mark">Course Name</h2></td>  
                                    </tr>  
                                    <tr>
                                        <td><input type="text" name="course_name" placeholder="Enter Course Name" class="form-control name_list" requiered ></td>  
                                    </tr>
                                    
                                    <tr>  
                                         <td><h2 class="heading text-center text-primary mark">Course Fee</h2></td>  
                                    </tr>  
                                    <tr>
                                        <td><input type="text" name="course_fee" placeholder="Enter Course Fee" class="form-control name_list" /></td>  
                                    </tr>
                               </table>
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                          </form>

                          <form name="add_branch" id="add_branch">
                          <div class="table-responsive">  
                          <h2 class="heading text-info"> </h2> <br/> 

                               <table class="table table-bordered" id="dynamic_field">                                 
                                    <tr>  
                                         <td><h2 class="heading text-center text-primary mark">Branch Name</h2></td>  
                                    </tr>  
                                    <tr>
                                        <td><input type="text" name="branch_name" placeholder="Enter Branch Name" class="form-control name_list" requiered ></td>  
                                    </tr>
                                    
                               </table>
                               <input type="button" name="submit2" id="submit2" class="btn btn-info" value="Submit Now" />  
                          </div>
                     </form>  
                </div> 
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
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>  

 $(document).ready(function(){  
      var i=1;  
      $('#submit').click(function(){            
           $.ajax({  
                url:"fill_course.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });
 </script>

<script>

$(document).ready(function(){  
      var i=1;  
      $('#submit2').click(function(){            
           $.ajax({  
                url:"fill_course.php",  
                method:"POST",  
                data:$('#add_branch').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_branch')[0].reset();  
                }  
           });  
      });  
 });
</script>
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
