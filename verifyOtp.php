<?php 
require_once("session.php");
$error = "";

if(isset($_POST["btnOTP"])){
    
    
    $otp = $_POST["otp"];
    include("connect.php");
    $sql = "SELECT * FROM user WHERE email = '".$_SESSION["reg"]."'";
    $rs = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($rs);
    if($otp == $data["vkey"])
    {
        $sql = "UPDATE user SET status = 1 WHERE email = '".$_SESSION["reg"]."'";
        $rs = mysqli_query($con,$sql);
        $error = "OTP Verified Successfully <a href='login.php'>Click Here To Login</a>";
        
    }
    else
    {
        $error = "OTP Not Matched Try Again";
    }
    
    
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" class="css">
</head>

<body style="background-color: cadetblue">
    <?php include('header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-5">
                <div class="card mt-4 ml-4">
                    <div class="card-body">
                        <p style="text-align: left;color: coral;font-family: monospace;font-size: 16px;padding: 0px">OTP Sent to: <?php echo $_SESSION["reg"]; ?></p>
                        <div class="row">
                            <div class="col-lg-4 pl-3" style="padding: 0px">
                                <hr>
                            </div>
                            <div class="col-lg-4 text-center mt-1" style="font-size: 15px;vertical-align: middle;padding: 0px;font-family: fantasy;color: burlywood">Enter OTP To Verify</div>
                            <div class="col-lg-4 pr-3" style="padding: 0px">
                                <hr>
                            </div>
                        </div>
                        <div style="height: 20px"></div>

                        <form action="<?php $_PHP_SELF; ?>" method="post">
                           <p class="text-danger"><?php echo $error; ?></p>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                            <input type="password" required name="otp" class="form-control" placeholder="Your OTP">

                        </div>
                        <input type="submit" name="btnOTP" value="Verify OTP" class="btn btn-danger btn-block">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php




?>


