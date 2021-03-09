<?php
include('dbconnect.php');
    $error = '';
    if(isset($_POST["register"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
        
        if(strlen($pass) < 8 || strlen($pass) > 16)
            $error = "Password must be in between 8 to 16 Character";
        elseif($cpass != $pass)
            $error = "Password and Confirm Password should be same";
        else{
            
            $otp = mt_rand(100000, 999999);
            
            $sql = "SELECT * FROM user WHERE email = '".$email."'";
            $rs = mysqli_query($con,$sql);
            $data = mysqli_fetch_assoc($rs);
           
            if(empty($data["name"]))
            {
                $sql1 = "INSERT INTO user(name,email,password,vkey,status) VALUES('".$name."','".$email."','".$pass."','".$otp."',0)";
                $query = mysqli_query($con,$sql1);
                if($query != 0)
                {
                    $to = $email;
                    $subject = 'Verify Your Email - iCAB Service, Hyderabad';
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
                    $message .= '<p style="color:black;font-size:15px;">Please use the following OTP <b>'.$otp.'</b> to complete your registration at iCAB Service, Hyderabad</p>';
                    $message .= '<p style="color:#080;font-size:15px;">For Enquiries Contact: '.$from.'</p>';
                    $message .= '</body></html>';
 
                    // Sending email
                    if(mail($to, $subject, $message, $headers)){
                        session_start();
                            $_SESSION["reg"] = $email;
                        header("location:verifyOtp.php");
                    } else{
                        $error = 'Unable to Register Please Use Correct Email.';
                    }
                }
                else
                    $error = "Unable To Register Plz Try Again";
                
            }
            else
            {
                
                if($data["status"] == 1)
                    $error = "This Email Id is Already Registered <a href='login.php'>Click To Login</a>";
                else if($data["status"] == 0){
                 
                    $q1 = "UPDATE user SET vkey = '".$otp."' WHERE email = '".$email."'";
                    $row = mysqli_query($con,$q1);
                    if($row != 0){
                    $to = $email;
                    $subject = 'Re: Verify Your Email - iCAB Service, Hyderabad';
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
                    $message .= '<h1 style="color:blue;">Dear '.$name.'</h1>';
                    $message .= '<p style="color:black;font-size:15px;">Please use the following OTP <b>'.$otp.'</b> to complete your registration at iCAB Service, Hyderabad</p>';
                    $message .= '<p style="color:#080;font-size:15px;">For Enquiries Contact '.$from.'</p>';
                    $message .= '</body></html>';
 
                    // Sending email
                    if(mail($to, $subject, $message, $headers)){
                        
                            session_start();
                            $_SESSION["reg"] = $email;
                            header("location:verifyOtp.php");
                
                    } else{
                        $error = 'Unable to Send Verification Email Try Again.';
                    }
                    }
                    else
                    {
                        $error = 'Unable to Send Verification Email Try Again.';
                    }
                    
                    
                }
                    
            }
            
        }
    }

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
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-5">
                <div class="card mt-4 ml-4">
                    <div class="card-body">
                        <p style="text-align: center;color: coral;font-family: monospace;font-size: 16px;padding: 0px">iCAB Service, Hyderabad</p>
                        <div class="row">
                            <div class="col-lg-4 pl-3" style="padding: 0px">
                                <hr>
                            </div>
                            <div class="col-lg-4 text-center mt-1" style="font-size: 15px;vertical-align: middle;padding: 0px;font-family: fantasy;color: burlywood">Register From Here</div>
                            <div class="col-lg-4 pr-3" style="padding: 0px">
                                <hr>
                            </div>
                        </div>
                        <div style="height: 20px"></div>
                        <form action="<?php $_PHP_SELF ?>" method="post">
                            <p class="text-danger"><?php echo $error; ?></p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" name="name" required placeholder="Name">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" required placeholder="Email">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control" name="pass" required placeholder="Password">

                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control" name="cpass" required placeholder="Confirm Password">
                            </div>
                            <button class="btn btn-danger btn-block" name="register"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>