<?php
include("dbconnect.php");
$name = $_POST["uname"];
$email = $_POST["uemail"];
$mob = $_POST["umob"];
$or = $_POST["uor"];
$ds = $_POST["uds"];
$dis = $_POST["udis"];
$dur = $_POST["udur"];
$rate = $_POST["urate"];
$amt = $_POST["uamt"];
$tax = $_POST["utax"];
$famt = $_POST["ufamt"];

$sql = "INSERT INTO pre_booking(name,email,mobile,origin,destination,rate,distance,duration,amount,tax,finalAmount)VALUES('".$name."','".$email."','".$mob."','".$or."','".$ds."','".$rate."','".$dis."','".$dur."','".$amt."','".$tax."','".$famt."')";
$row = mysqli_query($con,$sql);
if($row != 0)
    echo 1;
else
    echo 0;

?>