<?php

include_once 'database/dbh.php';
session_start();

if($_SESSION['id'] != 9701123421 OR $_SESSION['loggedin'] != TRUE)
{
    header("location: login.php");
    exit();
}

if(!isset($_POST['course_fee']) AND !isset($_POST['course_name']) AND !isset($_POST['branch_name'] ))
{
   header("location: course_details.php?fill_proper_details");
}
else if(isset($_POST['course_fee']) AND isset($_POST['course_name'])){

    $course_name = $_POST['course_name'];
    $course_fee = $_POST['course_fee'];
      
        $query = "INSERT INTO branch_course(course, fee) VALUES('$course_name', '$course_fee')"; 
        $result = mysqli_query($conec, $query);
    
       if($result)
       {
        echo "Sucessully Created Course";
       }
       else{
           echo"ERROR COURSE";
       }
}
else if( isset($_POST['branch_name']) )
{
    $branch = $_POST['branch_name'];
      
        $query = "INSERT INTO branch_course(branch) VALUES('$branch')"; 
        $result = mysqli_query($conec, $query);
    
       if($result)
       {
        echo "Sucessully Created Branch";
       }
       else{
           echo"ERROR BRANCH";
       }
}








?>