<?php
session_start();

 if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
include_once 'database/dbh.php';

$_SESSION['course'] = mysqli_real_escape_string($conec,$_POST['course']);
$_SESSION['branch_code'] = mysqli_real_escape_string($conec, $_POST['branch_code']);
$_SESSION['name'] = mysqli_real_escape_string($conec,$_POST['name']);
$_SESSION['fname'] = mysqli_real_escape_string($conec,$_POST['fathername']);
$_SESSION['mname'] = mysqli_real_escape_string($conec,$_POST['mothername']);

$_SESSION['gen'] = $_POST['gender'];
$_SESSION['martial'] = $_POST['martial'];
$_SESSION['cat'] = $_POST['category'];
$_SESSION['rel'] = $_POST['religion'];
$_SESSION['dob'] = $_POST['dob'];
$_SESSION['addr'] = mysqli_real_escape_string($conec,$_POST['addr']);
$_SESSION['number'] = mysqli_real_escape_string($conec,$_POST['number']);
$_SESSION['qual'] = mysqli_real_escape_string($conec,$_POST['qualification']);
$_SESSION['yop'] = $_POST['yearofp'];
$_SESSION['aadhar'] = mysqli_real_escape_string($conec,$_POST['aadhar']);
$_SESSION['pass'] = mysqli_real_escape_string($conec,$_POST["password"]);
$_SESSION['target_dir'] = "students/".$_SESSION['number']."/";

if($_SESSION['paid'] === 0)
{
	header("Location: pay.php");
}

// IMPORTANT
mkdir($_SESSION['target_dir'], 0700);

$_SESSION['target_file'] = $_SESSION['target_dir'] . basename($_FILES["image"]["name"]);
$_SESSION['image'] = $_SESSION['target_file'];

$_SESSION['target_files'] = $_SESSION['target_dir']. basename($_FILES["signature"]["name"]);
$_SESSION['sig'] =  $_SESSION['target_files'];


		//image
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $_SESSION['target_file'])) {
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		  } else {
			echo "Sorry, there was an error uploading your image file.";
		  }
		  

	//signature
		  if (move_uploaded_file($_FILES["signature"]["tmp_name"], $_SESSION['target_files'])) {
			echo "The file ". basename( $_FILES["signature"]["name"]). " has been uploaded.";
			} else {
			echo "Sorry, there was an error uploading your signature file.";
			}

			$query = "INSERT INTO students(Course,branch_code, Name, Father, Mother, gender, dob, martial, category, religion, addr, number, qualification, yearofp, aadhar, signature, password, image) VALUES('$_SESSION[course]','$_SESSION[branch_code]', '$_SESSION[name]', '$_SESSION[fname]', '$_SESSION[mname]','$_SESSION[gen]','$_SESSION[dob]','$_SESSION[martial]','$_SESSION[cat]','$_SESSION[rel]','$_SESSION[addr]','$_SESSION[number]','$_SESSION[qual]','$_SESSION[yop]','$_SESSION[aadhar]','$_SESSION[sig]','$_SESSION[pass]','$_SESSION[image]')";


		$query2 = "INSERT INTO marks(number) VALUES	('$_SESSION[number]')"; 
		
		$result = mysqli_query($conec, $query);
		$result2 = mysqli_query($conec, $query2);

		
	// 	if($result && $result2 && $paid){
	// 		echo"<script>alert('Registered successfully')</script>";
	// 	}
	// 	else{
	// 		echo"<script>alert('Duplicate Entry !')</script>";
	// 	}
	// }
?>