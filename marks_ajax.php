<?php

session_start();
include_once 'database/dbh.php';
print_r($_POST);

$num= $_SESSION['name'];
$i = 0;

foreach ($_POST['name2'] as $marks)
{
    $mark =  "marks".$i;
    $i++;
    $query = "UPDATE marks SET $mark= '$marks' WHERE number = $num"; 
    echo $query;
    mysqli_query($conec, $query);
}
echo "Sucess";


?>