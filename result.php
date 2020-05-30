<?php

session_start();
include_once 'database/dbh.php';
if($_SESSION['loggedin'] != TRUE)
{
	header("location: admin.php");
}

?>

<html>
    <head>
        <title>Sparks id</title>
        <script language="javascript">
        function printpage()
            {
                window.print();
            }
        </script>
    </head>
   <style>
   #card{
	   float:left;
	   width:360px;
	   height:230px;
	   margin:5px;
	   border:1px solid black;
	   background-image: url("assets/img/id.jpg");
	   background-repeat: no-repeat;
	   background-size: 360px 230px;
	   -webkit-print-color-adjust: exact;
   }
   #c_left{
	   margin-top:65px;
	   margin-left:10px;
	   float:left;
	   width:80px;
	   height:120px;

	   
   }
   #c_box{
	  width:80px; 
	  height:20px;
	  padding:5px;

   }
  #c_right{
	   
	   margin-left:120px;
	   width:220px;
	   height:200px;

   }
   td{
	   font-size:12px;
   }

   </style>
   <?php

	   $i=0;
	   
		$get_costumers="select * from students where feestat = 1;";
		
		$run_costumers=mysqli_query($conec, $get_costumers);
		
		while ($row_costumers=mysqli_fetch_array($run_costumers)){
			
			$img = $row_costumers['image'];
			$st_name = $row_costumers['Name'];
			$f_name = $row_costumers['Father'];
			$m_name = $row_costumers['Mother'];
			$mob = $row_costumers['number'];
			$dob = $row_costumers['dob'];
			$class = $row_costumers['Course'];
			$st_id = uniqid();
			$i++;
		?>
   
   
   
     <body>
	 <div id="card">
	  <div id="c_left">
	  <img src="<?php echo $img; ?>"width="80px"height="100px"style="border:1px solid black;"><br>
	  <div id="c_box" style="font-size: 10px;">
	  Course : <?php echo $class; ?>
	  </div>
	  </div>
	  <div id="c_right">
	  <div style="margin-top:2px;margin-left:117px;color:#fff;font-size:10px;">Contact No. 9458677329 <br></div>
	   <div style="margin-left:168px;color:#fff;font-size:10px;"> 9627398625 <br></div>
	  <table style="margin-top:23px;">
	  <tr><br>
	  <td><b>Name</b></td><td><b>: <?php echo $st_name; ?></b></td>
	  </tr>
	  <tr>
	  <td><b>Father's Name</b></td><td>: <?php echo $f_name; ?></td>
	  </tr>
	  <tr>
	  <td><b>Mother's Name</b></td><td>: <?php echo $m_name; ?></td>
	  </tr>
	  <tr>
	  <td><b>Date Of Birth</b></td><td>: <?php echo $dob; ?></td>
	  </tr>
	  <tr>
	  <td><b>Contact No.</b></td><td>: <?php echo $mob; ?></td>
	  </tr>
	  <tr>
	  <td><b>Validity</b></td><td>: <script>
				var today = new Date();
				var dd = String(today.getDate()).padStart(2, '0');
				var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
				var yyyy = today.getFullYear();

				today = mm + '/' + dd + '/' + yyyy;
				document.write(today + " - Till Date ");
				</script>
</td>
	  </tr>
	  <tr>
	  <!-- <td><i>Pirnciple</i></td><td><img src=""width="100px"height="30px"></td> -->
	  </tr>
	  </table>
	  
	  </div>
	   <div style="margin-top:10px;margin-left:5px;color:#fff;font-size:12px;"> Munsif Road Durga Colony, Gali No. 3. Kasganj, Kanshiram Nagar.</div>
	 </div>
	 <?php } ?>
	 	
	 </body>
   </head>
</html>

