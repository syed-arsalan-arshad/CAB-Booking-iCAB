<?php
include("dbconnect.php");
$code = $_POST["code"];
$desc = $_POST["desc"];
$source = $_POST["source"];
$step = $_POST["step"];
$reason = $_POST["reason"];
$metadata = $_POST["metadata"];
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


$sql = "INSERT INTO failed_booking(name,email,mobile,origin,destination,distance,duration,rate,amount,tax,finalAmount,failedCode,failedDescription,failedSource,failedStep,failedReason,failedMetaData)VALUES('".$name."','".$email."','".$mobile."','".$origin."','".$destination."','".$distance."','".$duration."','".$rate."','".$amount."','".$tax."','".$finalAmount."','".$code."','".$desc."','".$source."','".$step."','".$reason."','".$metadata."')";
$row = mysqli_query($con,$sql);
if($row > 0)
    echo 1;
else
    echo 0;

?>

