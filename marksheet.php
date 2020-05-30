<html>

<head>
  <title> Student Result </title>
  <h2> Student Result </h2>
</head>
<body>
    <!-- PHP -->
<?php
         include_once 'database/dbh.php';
          // print_r($_SESSION['number']);
          // print_r($_POST['number']);


         if(isset($_POST['number']))
         {
          $num = $_POST['number'];
         }
         else{
              header("location: rgform.php");
         }

        $query="select * from students where number = '$num'";
        $query2="select * from marks where number = '$num'";

        
        if($result = mysqli_query($conec, $query))
        {
            $row = mysqli_fetch_assoc($result);
            
            if(mysqli_num_rows($result) < 1){
                header("location: result_view.php?Wrong_Registration_number");
            }              
        }
              
        if($result2 = mysqli_query($conec, $query2))
        {
          $row2 = mysqli_fetch_assoc($result2);
        }

        $total = $row2['marks0']+$row2['marks1']+$row2['marks2'];

        $val = $total/300 * 100;
        if( $val >= 60 && $val >= 59  )
        {
          $grade = 'A';
        }
        else if($val < 60 && $val > 50 )
        {
          $grade =  'B';
        }
        else if($val <= 49 && $val >= 40)
        {
          $grade = 'C';
        }
        else if($val < 40 )
        {
          $grade = 'F';
        }
        
?>
    <!-- /PHP -->

  <table>
    <thead>
      <tr>
        <td colspan="8">Details </td>
      </tr>

    </thead>
    <tbody>
      <tr>
        <td>Name </td>
        <td colspan="4"><?php echo "{$row['Name']}"; ?> </td>
      </tr>
      <tr>
        <td>Course </td>
        <td colspan="4"><?php echo "{$row['Course']}"; ?> </td>
      </tr>
      <tr>
        <td>Father Name </td>
        <td colspan="4"><?php echo "{$row['Father']}"; ?></td>
      </tr>
      <tr>
        <td>Mother Name </td>
        <td colspan="4"><?php echo "{$row['Mother']}"; ?></td>
      </tr>
      <tr>
        <td>Number </td>
        <td colspan="4"><?php echo "{$row['number']}"; ?> </td>
      </tr>
      <tr>
        
        <td colspan="2">Theory </td>
        <td colspan="2">Practical</td>
        <td colspan="2">Viva</td>


      </tr>
    </tbody>
    <tfoot>
      <tr>

      <td colspan="2"><?php echo "{$row2['marks0']}"; ?></td>
      <td colspan="2"><?php echo "{$row2['marks1']}"; ?></td>
      <td colspan="2"><?php echo "{$row2['marks2']}"; ?></td>

      </tr>
      <tr>
      <td colspan="1"></td>
        <td colspan="2" class="footer">Total</td>
        <td colspan="5" class="footer"> Grade </td>
      </tr>
      <tr>
      <td colspan="1"></td>
        <td colspan="2" class="footer"><?php echo $total; ?></td>
        <td colspan="5" class="footer"><?php echo $grade; ?></td>
      </tr>
  </table>
</body>

</html>


<style>
html {
  font-family:arial;
  font-size: 18px;
}

td {
  border: 1px solid #726E6D;
  padding: 15px;
}

thead{
  font-weight:bold;
  text-align:center;
  background: #1C2B4B;
  color:white;
}

table {
  border-collapse: collapse;
}

.footer {
  text-align:right;
  font-weight:bold;
}

tbody >tr:nth-child(odd) {
  background: #ADD8E6;
}

</style>
