<?php

require('config.php');
require('razorpay-php/Razorpay.php');

include_once 'database/dbh.php';

session_start();

$num = $_SESSION['name'];

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful. Note Down Payment ID, this page will reload in 10 seconds.</p>
            <br/> <p>आपका भुगतान सफल रहा। नोट डाउन पेमेंट आईडी, यह पेज 10 सेकंड में पुनः लोड होगा।</p>
            <br/> <p>Note! Payment ID: {$_POST['razorpay_payment_id']}</p>";

   
    $id = $_POST['razorpay_payment_id'];
    $query1 = "UPDATE students
    SET feestat = 1
    WHERE number = '$num'";

   $res = mysqli_query($conec, $query1);
   $_SESSION['paid'] = 1;

//    INSERT DATA
$query = "INSERT INTO students(Course, branch_code, Name, Father, Mother, gender, dob, martial, category, religion, addr, city, number, qualification, yearofp, aadhar, signature, password, image) VALUES('$_SESSION[course]','$_SESSION[branch_code]', '$_SESSION[name]', '$_SESSION[fname]', '$_SESSION[mname]','$_SESSION[gen]','$_SESSION[dob]','$_SESSION[martial]','$_SESSION[cat]','$_SESSION[rel]','$_SESSION[addr]','$_SESSION[city]','$_SESSION[number]','$_SESSION[qual]','$_SESSION[yop]','$_SESSION[aadhar]','$_SESSION[target_files]','$_SESSION[pass]','$_SESSION[target_file]')";


$query2 = "INSERT INTO marks(number) VALUES	('$_SESSION[number]')"; 
		
$result = mysqli_query($conec, $query);
$result2 = mysqli_query($conec, $query2);
		
if($result && $result2 && $paid){
    echo"<script>alert('Registered successfully')</script>";
}
else{
    echo"<script>alert('Duplicate Entry !')</script>";
}
}
// 

   header( "Refresh:10; url = reg_form.php");
}
else
{
    $html = "<p>Your payment failed</p>
            <br/><p>आपका भुगतान सफल नहीं हुआ।</p>
            <br/>
             <p>{$error}</p>";
             rmdir($_SESSION['target_dir']);
}

echo $html;
