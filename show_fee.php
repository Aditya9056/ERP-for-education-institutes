<?php

include_once 'database/dbh.php';
$cou = $_POST['course'];
$query = "select fee from branch_course where course = '$cou' ";

$result = mysqli_query($conec, $query);

if($result)
{
  $row = mysqli_fetch_assoc($result);
  echo $row['fee'];
}

?>