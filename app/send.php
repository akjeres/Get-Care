<?php
header('Access-Control-Allow-Origin: *');
$to = 'akjeres@gmail.com';
$headers = "From: test@test.com\r\n";
$subject = 'Contact Us Hubgeo';
$userData;

if(isset($_POST['first_name'])&&trim($_POST['first_name'])!=""){
    $userData.="First Name: ".$_POST['first_name'] . "\r\n";
}
if(isset($_POST['last_name'])&&trim($_POST['last_name'])!=""){
    $userData.="Last Name: ".$_POST['last_name'] . "\r\n";
}
if(isset($_POST['company_name'])&&trim($_POST['company_name'])!=""){
    $userData.="Company Name: ".$_POST['company_name'] . "\r\n";
}
if(isset($_POST['email'])&&trim($_POST['email'])!=""){
    $userData.="Email: ".$_POST['email'] . "\r\n";
}
if(isset($_POST['phone'])&&trim($_POST['phone'])!=""){
    $userData.="Phone: ".$_POST['phone'] . "\r\n";
}
if(isset($_POST['web-site'])&&trim($_POST['web-site'])!=""){
    $userData.="Website: ".$_POST['web-site'] . "\r\n";
}
if(isset($_POST['license'])&&trim($_POST['license'])!=""){
    $userData.="License Information: ".$_POST['license'] . "\r\n";
}
if(isset($_POST['fein'])&&trim($_POST['fein'])!=""){
    $userData.="FEIN: ".$_POST['fein'] . "\r\n";
}
if(isset($_POST['business_structure'])&&trim($_POST['business_structure'])!=""){
    $userData.="Business Structure: ".$_POST['business_structure'] . "\r\n";
}
if(isset($_POST['month_type'])&&trim($_POST['month_type'])!=""){
    $userData.="How many orders do you ship per month: ".$_POST['month_type'] . "\r\n";
}
if(isset($_POST['shipping_type'])&&trim($_POST['shipping_type'])!=""){
    $userData.="How are you currently shipping orders: ".$_POST['shipping_type'] . "\r\n";
}
if(isset($_POST['SKU_type'])&&trim($_POST['SKU_type'])!=""){
    $userData.="How many different items/SKUs do you have: ".$_POST['SKU_type'] . "\r\n";
}


if($userData!=""&&mail($to, $subject, $userData)){
    exit('0');
} else {
    exit('1');
}
?>