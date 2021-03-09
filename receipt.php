<?php 
include("dbconnect.php");
$sql="SELECT * FROM confirm_booking ORDER BY id DESC";
$rs = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($rs);
$id = $data["id"];
$name = $data["name"];
$email = $data["email"];
$mobile = $data["mobile"];
$origin = $data["origin"];
$destination = $data["destination"];
$rate = $data["rate"];
$distance = $data["distance"];
$duration = $data["duration"];
$amount = $data["amount"];
$tax = $data["tax"];
$finalAmount = $data["finalAmount"];




                    $to = $email;
                    $subject = 'Successfully Booked iCAB - iCAB Service, Hyderabad';
                    $from = 'syedarsalanarshad808@gmail.com';
 
                    // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
                    // Create email headers
                    $headers .= 'From: '.$from."\r\n".
                        'Reply-To: '.$from."\r\n" .
                        'X-Mailer: PHP/' . phpversion();
 
                    // Compose a simple HTML email message
                    $message = '<html><body>';
                    $message .= '<h4 style="color:blue;">Dear '.$name.'</h4>';
                    $message .= '<p style="color:black;font-size:15px;">Your iCAB is Booked Successfully, Thank You...</p>';
                    $message .= '<p style="color:#080;font-size:15px;">For Enquiries Contact: '.$from.'</p>';
                    $message.= '<table border="1" ><tr><th colspan="2">Your Booking Details</th></tr>';
                    $message.= '<tr><th>Origin</th><td>'.$origin.'</td></tr>';
                    $message.= '<tr><th>Destination</th><td>'.$destination.'</td></tr>';
                    $message.= '<tr><th>Distance</th><td>'.$distance.'</td></tr>';
                    $message.= '<tr><th>Duration</th><td>'.$duration.'</td></tr>';
                    $message.= '<tr><th>Rate</th><td>'.$rate.'</td></tr>';
                    $message.= '<tr><th>Taxable Amount</th><td>'.$amount.'</td></tr>';
                    $message.= '<tr><th>Service Tax(@5%)</th><td>'.$tax.'</td></tr>';
                    $message.= '<tr><th>Total Amount</th><td>'.$finalAmount.'</td></tr>';
                    $message .= '</table></body></html>';
 
                    // Sending email
                    if(mail($to, $subject, $message, $headers)){
                       echo "<script>alert('Confirmation Mail is sent to your Email Id! Thank You')</script>";
                    } 

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>iCAB Service</title>
    <?php include("linkforall.php") ?>
</head>
<body class="bg1">
     <?php include("header.php") ?>
    <div class="container">
        <div class="row text-center mt-5 mb-4">
           <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        
                        <div class="row">
                            <div class="col-lg-11">
                                <h3><i class="fa fa-taxi" aria-hidden="true"></i>iCAB Booking Service</h3>
                        <h4>Hyderabad,Telangana,India</h4>
                        <h5>Booking Receipt</h5>
                            </div>
                            <div class="col-lg-1">
                                <button style="cursor:pointer" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-left">
                       
                       <div class="row">
                           <div class="col-lg-12">
                               <span style="float:left">
                                   <h5><?php echo $name; ?></h5>
                               <p><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $email; ?></p>
                               <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $mobile; ?></p>
                               <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $origin; ?></p>
                               </span>
                               <b style="float:right">Date: <?php echo date("d-m-Y"); ?></b>
                           </div>
                           
                       </div>
                       
                       <div class="row">
                           <div class="col-lg-12">
                              <table cellpadding="5px" cellspacing="0" style="float:right">
                                  <tr><td><b>Taxable Amount: </b></td><td class="text-right"><?php echo $amount." Rs"; ?></td></tr>
                                  <tr><td><b>Service Tax(@5%): </b></td><td class="text-right"><?php echo $tax." Rs"; ?></td></tr>
                                  <tr><td colspan="2" style="padding:0px;text-align:center"><hr style="height:2px;border-width:0;color:gray;background-color:gray;width:80%"></td></tr>
                                  <tr><td><b>Gross Total: </b></td><td class="text-right"><?php echo $finalAmount." Rs"; ?></td></tr>
                              </table>
                           </div>
                       </div>
                        
                    </div>
                    <div class="card-footer">
                        <h6>Thank You For Booking! Hope We Meet Soon</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>
</body>
</html>