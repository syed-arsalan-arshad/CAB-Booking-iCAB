<?php
require_once("session.php");
if(!isset($_SESSION["uemail"]))
    header("location:login.php");
?>


<?php
include("dbconnect.php");
$sql = "SELECT * FROM pre_booking ORDER BY id DESC";
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
$org_amount = $finalAmount * 100;

require_once("razorpayFile/Razorpay.php");

use Razorpay\Api\Api;

$keyid = "rzp_test_NxoSrjmYavjhww";
$secretKey = "3jBUxd7BtmLKKOszQ2T1zC3w";

$api = new Api($keyid, $secretKey);


$order  = $api->order->create([
  'receipt'         => rand(1000,9999).'ORD',
  'amount'          => $org_amount, // amount in the smallest currency unit
  'currency'        => 'INR',// <a href="/docs/payment-gateway/payments/international-payments/#supported-currencies" target="_blank">See the list of supported currencies</a>.)
]);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Confirm Booking</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("linkforall.php") ?>
</head>

<body class="bg1">
    <?php include("header.php") ?>
    <div class="container">
        <div class="row text-center mt-5 mb-4">
            <div class="col-lg-7">
                <div class="card card-bg">
                    <div class="card-header">
                        <h3>Confirm Your Booking</h3>
                    </div>
                    <div class="card-body text-left">
                        <table cellpadding="15px" cellspacing="0">
                            <tr>
                                <th>Name: </th>
                                <td><?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <th>Mobile No: </th>
                                <td><?php echo $mobile; ?></td>
                            </tr>
                            <tr>
                                <th>Origin: </th>
                                <td><?php echo $origin; ?></td>
                            </tr>
                            <tr>
                                <th>Destination: </th>
                                <td><?php echo $destination; ?></td>
                            </tr>
                            <tr>
                                <th>Distance: </th>
                                <td><?php echo $distance." KM"; ?></td>
                            </tr>
                            <tr>
                                <th>Duration: </th>
                                <td><?php echo $duration." HR"; ?></td>
                            </tr>
                            <tr>
                                <th>Rate: </th>
                                <td><?php echo $rate."/KM"; ?></td>
                            </tr>
                            <tr>
                                <th>Amount: </th>
                                <td><?php echo $amount." Rs"; ?></td>
                            </tr>
                            <tr>
                                <th>Service Tax(@5%): </th>
                                <td><?php echo $tax." Rs"; ?></td>
                            </tr>
                            <tr>
                                <th>Gross Total: </th>
                                <td><?php echo $finalAmount." Rs"; ?></td>
                            </tr>
                            <tr>
                                <td><input type="button" class="btn btn-danger btn-block" value="Cancel"></td>
                                <td>


                                    <button class="form-control btn btn-success" id="rzp-button1">Pay Now</button>
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                    <script>
                                        

                                        var options = {
                                            "key": "<?php echo $keyid; ?>", // Enter the Key ID generated from the Dashboard
                                            "amount": "<?php echo $order->amount; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                            "currency": "INR",
                                            "name": "iCAB Service",
                                            "description": "Thanks For Booking",
                                            "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png",
                                            "order_id": "<?php echo $order->id; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                            "handler": function(response) {
                                                var pid = response.razorpay_payment_id;
                                                var oid = response.razorpay_order_id;
                                                var sign = response.razorpay_signature;
                                                var uname = '<?php echo $name; ?>';
                                                var uemail = '<?php echo $email; ?>';
                                                var umobile = '<?php echo $mobile; ?>';
                                                var uorigin = '<?php echo $origin; ?>';
                                                var udestination = '<?php echo $destination; ?>';
                                                var urate = '<?php echo $rate; ?>';
                                                var utax = '<?php echo $tax; ?>';
                                                var udistance = '<?php echo $distance; ?>';
                                                var uduration = '<?php echo $duration; ?>';
                                                var uamount = '<?php echo $amount; ?>';
                                                var ufinalAmount = '<?php echo $finalAmount; ?>';

                                                $.ajax({
                                                    type: "post",
                                                    data: {
                                                        payid: pid,
                                                        ordid: oid,
                                                        signD: sign,
                                                        name: uname,
                                                        email: uemail,
                                                        mobile: umobile,
                                                        rate: urate,
                                                        distance: udistance,
                                                        duration: uduration,
                                                        destination: udestination,
                                                        origin: uorigin,
                                                        amount: uamount,
                                                        tax: utax,
                                                        finalAmount: ufinalAmount
                                                    },
                                                    url: "saveFinal.php",
                                                    success: function(data) {
                                                        if (data == 1)
                                                            window.location = "receipt.php";
                                                        else if (data == 0)
                                                            alert("Sorry For Inconvinience Try Again");
                                                    }
                                                });
                                            },
                                            "prefill": {
                                                "name": "<?php echo $name; ?>",
                                                "email": "<?php echo $email; ?>",
                                                "contact": "<?php echo $mobile; ?>"
                                            },
                                            "notes": {
                                                "address": "<?php echo $origin; ?>"
                                            },
                                            "theme": {
                                                "color": "#F37254"
                                            }
                                        };
                                        var rzp1 = new Razorpay(options);
                                        rzp1.on('payment.failed', function(response) {
                                            var code1 = response.error.code;
                                            var desc1 = response.error.description;
                                            var source1 = response.error.source;
                                            var step1 = response.error.step;
                                            var reason1 = response.error.reason;
                                            var metadata1 = response.error.metadata;

                                            var uname = '<?php echo $name; ?>';
                                            var uemail = '<?php echo $email; ?>';
                                            var umobile = '<?php echo $mobile; ?>';
                                            var uorigin = '<?php echo $origin; ?>';
                                            var udestination = '<?php echo $destination; ?>';
                                            var urate = '<?php echo $rate; ?>';
                                            var utax = '<?php echo $tax; ?>';
                                            var udistance = '<?php echo $distance; ?>';
                                            var uduration = '<?php echo $duration; ?>';
                                            var uamount = '<?php echo $amount; ?>';
                                            var ufinalAmount = '<?php echo $finalAmount; ?>';
                                            $.ajax({
                                                type: "post",
                                                data: {
                                                    code: code1,
                                                    desc: desc1,
                                                    source: source1,
                                                    step: step1,
                                                    reason: reason1,
                                                    metadata: metadata1,
                                                    name: uname,
                                                    email: uemail,
                                                    mobile: umobile,
                                                    rate: urate,
                                                    distance: udistance,
                                                    duration: uduration,
                                                    destination: udestination,
                                                    origin: uorigin,
                                                    amount: uamount,
                                                    tax: utax,
                                                    finalAmount: ufinalAmount
                                                },
                                                url: "saveFailed.php",
                                                success: function(data) {
                                                    alert("Your Booking Is Failed Plz Try Again");
                                                }
                                            });


                                        });
                                        document.getElementById('rzp-button1').onclick = function(e) {
                                            rzp1.open();
                                            e.preventDefault();
                                        }
                                    </script>



                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>