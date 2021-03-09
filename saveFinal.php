<?php
include("dbconnect.php");
$pid = $_POST["payid"];
$oid = $_POST["ordid"];
$sign = $_POST["signD"];
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$rate = $_POST["rate"];
$distance = $_POST["distance"];
$duration = $_POST["duration"];
$destination = $_POST["destination"];
$origin = $_POST["origin"];
$amount = $_POST["amount"];
$tax = $_POST["tax"];
$finalAmount = $_POST["finalAmount"];

$sql = "INSERT INTO confirm_booking(name,email,mobile,origin,destination,distance,duration,rate,amount,tax,finalAmount,payment_id,order_id,signature_hash)VALUES('".$name."','".$email."','".$mobile."','".$origin."','".$destination."','".$distance."','".$duration."','".$rate."','".$amount."','".$tax."','".$finalAmount."','".$pid."','".$oid."','".$sign."')";
$row = mysqli_query($con,$sql);
if($row > 0)
    echo 1;
else
    echo 0;

?>

