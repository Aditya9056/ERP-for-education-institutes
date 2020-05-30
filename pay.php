<?php
require('config.php');
require('razorpay-php/Razorpay.php');
include_once 'database/dbh.php';

session_start();
// print_r($_POST);
print_r($_FILES);

$_SESSION['reg_pr'] = TRUE;

if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// IMPORTANT
$_SESSION['course'] = mysqli_real_escape_string($conec,$_POST['course']);
$_SESSION['branch_code'] = mysqli_real_escape_string($conec, $_POST['branch_code']);
$_SESSION['name'] = mysqli_real_escape_string($conec,$_POST['name']);
$_SESSION['fname'] = mysqli_real_escape_string($conec,$_POST['fathername']);
$_SESSION['mname'] = mysqli_real_escape_string($conec,$_POST['mothername']);

$_SESSION['amount'] = $_POST['amount'];
$_SESSION['gen'] = $_POST['gender'];
$_SESSION['martial'] = $_POST['martial'];
$_SESSION['cat'] = $_POST['category'];
$_SESSION['rel'] = $_POST['religion'];
$_SESSION['dob'] = $_POST['dob'];
$_SESSION['addr'] = mysqli_real_escape_string($conec,$_POST['addr']);
$_SESSION['city'] = mysqli_real_escape_string($conec,$_POST['city']);


$_SESSION['number'] = mysqli_real_escape_string($conec,$_POST['number']);
$_SESSION['qual'] = mysqli_real_escape_string($conec,$_POST['qualification']);
$_SESSION['yop'] = $_POST['yearofp'];
$_SESSION['aadhar'] = mysqli_real_escape_string($conec,$_POST['aadhar']);
$_SESSION['pass'] = mysqli_real_escape_string($conec,$_POST["password"]);

$_SESSION['target_dir'] = "students/".$_SESSION['number']."/";

$_SESSION['target_file'] = $_SESSION['target_dir'] . basename($_FILES["image"]["name"]);
$_FILES["image"]["tmp_name"];

$_SESSION['target_files'] = $_SESSION['target_dir']. basename($_FILES["signature"]["name"]);
$_FILES["signature"]["tmp_name"];

mkdir($_SESSION['target_dir'], 0700);

//image
if (move_uploaded_file($_FILES["image"]["tmp_name"], $_SESSION['target_file'])) {
    echo "The Image file has been uploaded.";
    } else {
    echo "Sorry, there was an error uploading your image file.";
    }

//signature
    if (move_uploaded_file($_FILES["signature"]["tmp_name"],  $_SESSION['target_files'])) {
    echo "The Signature file has been uploaded.";
    } else {
    echo "Sorry, there was an error uploading your signature file.";
    }

// END IMPORTAnT
if(empty($_POST['amount']))
{   
    echo "<script>
    alert('Fill Form Correctly!');
    window.location.href='register.php';
    </script>";
    exit();
}

$name = $_SESSION['name'];
$amount = $_SESSION['amount'];
$num = $_SESSION['number'];
$course_detail = $_SESSION['course'];
$email = "abc@gmail.com";
$merchant_order_id = uniqid();

// Create the Razorpay Order
use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders

$orderData = [
    'receipt'         => 3456,
    'amount'          => $amount * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $name,
    "description"       => $course_detail,
    // "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $name,
    "email"             => $email,
    "contact"           => $num,
    ],
    "notes"             => [
    // "address"           => "Hello World",
    "merchant_order_id" => $razorpayOrderId,
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
require("checkout/{$checkout}.php");

?>

