<?php
header('Access-Control-Allow-Origin: *');
$to = 'akjeres@gmail.com';
$headers = "From: Get Care\r\n";
$subject = 'Get Care Request';
$userData;

if(isset($_POST['name'])&&trim($_POST['name'])!=""){
    $userData.="Full Name: ".$_POST['name'] . "\r\n";
}
if(isset($_POST['phone'])&&trim($_POST['phone'])!=""){
    $userData.="Phone: ".$_POST['phone'] . "\r\n";
}
if(isset($_POST['subject'])&&trim($_POST['subject'])!=""){
    $userData.="Subject: ".$_POST['subject'];
    $subject = $subject . ' ' . $_POST['subject'];
}


if($userData!=""&&mail($to, $subject, $userData)){
    exit('0');
} else {
    exit('1');
}
?>