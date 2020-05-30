<html>

<head>
<div id="head">
  <title> Registration Form </title>
  <h2 class="text-center"> <a href="index.php">Sparks Education Point</a></h2>
  <a href="index.php"><img src="logo.png" id="logo"width="140"></a>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <hr>
</div>
</head>
<body>
    <!-- PHP -->
    <?php
         include_once 'database/dbh.php';
         session_start();
          // print_r($_SESSION['number']);
          // print_r($_POST['number']);

         if(!isset($_SESSION['number']) AND !isset($_POST['number']))
         {
            header("location: rgform.php");
         }

         if(isset($_POST['number']))
         {
          $num = $_POST['number'];
         }
         else if(isset($_SESSION['number'])){
          $num = $_SESSION['number'];          
        }

        $query="select * from students where number = '$num'";
        
        if($result = mysqli_query($conec, $query))
        {
            $row = mysqli_fetch_assoc($result);
            
            if(mysqli_num_rows($result) < 1){
                header("location: rgform.php?Wrong_Registration_number");
            }
          
            $image = $row['image'];
            $sig = $row['signature'];                  
            
            if($row['feestat'] == 1)
            {
                $feestat = "PAID & <br/> VERIFIED";
            }
            else{
                $feestat = "UNPAID";
            }
        }
    ?>  
    <!-- /PHP -->
  <table>
    <thead>
      <tr>
        <td colspan="10">Registration Form </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1. Photo & Signature</td>
      <td><img src=<?php echo $image;?> alt='student signature' style='width:190px;height:190px'></td>
      <td colspan="5"><img src=<?php echo $sig;?> alt='student signature' style='width:190px;height:100px'></td>
      </tr>
      <tr>
        <td colspan="2">2. Applicant's full name / आवेदक का पूरा नाम</td>
        <td id="center" colspan="5"><?php echo "{$row['Name']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">3. Father's Name / पिता का नाम</td>
        <td id="center" colspan="5"><?php echo "{$row['Father']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">4. Mother's Name / माता का नाम</td>
        <td id="center" colspan="5"><?php echo "{$row['Mother']}"; ?></td>
      </tr>

      <tr>
        <td colspan="2">5. Branch Code / शाखा क्र्मांक</td>
        <td id="center" colspan="5"><?php echo "{$row['branch_code']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">6. Gender / लिंग</td>
        <td id="center" colspan="5"><?php echo "{$row['gender']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">7. Date of Birth / जन्म दिनांक </td>
        <td id="center" colspan="5"><?php echo "{$row['dob']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">8. Marital Status / वैवाहिक स्थिति </td>
        <td id="center" colspan="5"><?php echo "{$row['martial']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">9. Category / वर्ग </td>
        <td id="center" colspan="5"><?php echo "{$row['category']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">10. Religion / धर्म </td>
        <td id="center" colspan="5"><?php echo "{$row['religion']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">11. City Name / शहर का नाम </td>
        <td id="center" colspan="5"><?php echo "{$row['city']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">12. Mobile Number / मोबाइल नंबर </td>
        <td id="center" colspan="5"><?php echo "{$row['number']}"; ?></td>
      </tr>
      <tr>
        <td colspan="1">13. Address Line/ पता पंक्ति </td>
        <td id="center" colspan="5"><?php echo "{$row['addr']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">14. Highest Educational Qualification / उच्चतम शैक्षिक योग्यता</td>
        <td id="center" colspan="5"><?php echo "{$row['qualification']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">15. Year of Passing / उत्तीर्ण वर्ष </td>
        <td id="center" colspan="5"><?php echo "{$row['yearofp']}"; ?></td>
      </tr>
      <tr>
        <td colspan="2">16. Aadhar Card Number / आधार कार्ड संख्या</td>
        <td id="center" colspan="5"><?php echo "{$row['aadhar']}"; ?></td>
      </tr>
    </tbody>
    <tfoot>
      <!-- <tr>
        <td colspan="4" class="footer">Total</td>
        <td> 15.0 </td>
        <td colspan="2">55.95 </td>
      </tr>
      <tr>
        <td colspan="4" class="footer">GPA</td>
        <td colspan="3">3.73 / 4.0 </td>
      </tr> -->
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
  font-family: 'Open Sans', sans-serif;

}

table {
  border-collapse: collapse;
  margin-bottom: 50px;
  width: 100%;
}

#center {
  text-align: center;  
}
a{
  text-decoration: none;
  color: #1C2B4B;
}

h2{
    margin-left: 600px;
    font-family: 'Open Sans', sans-serif;
    color: #1C2B4B;
}
#logo{
    position: absolute;
    margin-top: -65px;
}
.footer {
  text-align:right;
  font-weight:bold;
}

tbody >tr:nth-child(odd) {
  background: #ADD8E6;
}
tbody >tr:nth-child(even) {
  background: white;
}

</style>
