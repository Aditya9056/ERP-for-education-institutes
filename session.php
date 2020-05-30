<?php
session_start();
include_once 'database/dbh.php';

if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['number'], $_POST['pass']) ) {
    echo "<script>
				alert('Fill Both Number and Password!');
				window.location.href='login_page.php';
			</script>";
}



if ($stmt = $conec->prepare('SELECT number,password,name FROM students WHERE number = ?')) {
	$stmt->bind_param('s', $_POST['number']);
	$stmt->execute();
	$stmt->store_result();
}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($number, $password, $name);
    $stmt->fetch();

	if ($_POST['pass'] === $password && !strcmp($number, $_POST['number']) ) {

        
        $_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['number'];
		$_SESSION['username'] = $name;
		echo $_SESSION['name'];
		
		if($_SESSION['name'] === '9701123421')
        {
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['id'] = 9701123421;
            header("location: admin.php");
        }
        else
        {
	    	header("location: student.php?num=$number");
		}
	} else {
		echo "<script>
				alert('Wrong Username Or Password!');
				 window.location.href='login.php';
			</script>";
	}
}
 else {
	echo "<script>
	alert('Wrong Username Or Password!');
	 window.location.href='login.php';
	</script>";
}
$stmt->close();
?>