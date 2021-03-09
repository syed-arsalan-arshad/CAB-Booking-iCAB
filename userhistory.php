<?php 
require_once("session.php");
if(!isset($_SESSION["uemail"]))
    header("location:login.php");

include('dbconnect.php');
$em = $_SESSION['uemail'];
$sql = "SELECT * FROM confirm_booking WHERE email = '".$em."' ORDER BY id DESC";
$rs = mysqli_query($con,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" class="css">
</head>
<body style="background-color: cadetblue">
   
     <?php include('header.php'); ?>
     
     
     <div class="container mt-5 mb-5">
         <div class="row">
             <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Booking Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-stripped table-hover table-responsive">
                        
                        <tr><th>S.No</th><th>Name</th><th>Email Id</th><th>Mobile</th><th>Origin</th><th>Destination</th><th>Taxable Amount</th><th>Tax</th><th>Total Amount</th><th>Booked Date</th></tr>
                        <?php 
                        $i = 1;
                        while($d = mysqli_fetch_assoc($rs)){ ?>
                        
                        <tr><td><?php echo $i; ?></td><td><?php echo $d['name']; ?></td><td><?php echo $d['email']; ?></td><td><?php echo $d['mobile']; ?></td><td><?php echo $d['origin']; ?></td><td><?php echo $d['destination']; ?></td><td><?php echo $d['amount']; ?></td><td><?php echo $d['tax']; ?></td><td><?php echo $d['finalAmount']; ?></td><td><?php echo $d['finalBookAt']; ?></td></tr>
                        
                        
                        <?php $i++; } ?>
                        
                        
                    </table>
                </div>
            </div>
        </div>
         </div>
     </div>
     
     
     <div style="position:absolute;bottom:0px;width:100%"><?php include('footer.php'); ?></div>
    
</body>
</html>