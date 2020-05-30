<?php
session_start();
$_SESSION['loggedin'] = FALSE; 
session_destroy();
exit(header("location: index.php?logout_successful"));

?>