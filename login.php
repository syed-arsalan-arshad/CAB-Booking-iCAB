<?php 


require_once("session.php");
$error = "";
if(isset($_POST["btnLogin"]))
{
    include("dbconnect.php");
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $sql = "SELECT * FROM user WHERE email = '".$email."'";
    $rs = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($rs);
    if(empty($data["name"]))
    {
        $error = "You are not registered <a href='register.php'>Click Here To Register</a>";
        
    }
    else{
        if($data["password"] == $pass){
            if($data["status"] == 1)
            {
                $_SESSION["uemail"] = $email;
            $_SESSION["uname"] = $data["name"];
            header("location:index.php");
            }
            else{
                $error = "Your Email Id is not verified Go and Verify Your Email Id <a href='register.php'>Click Here To Go Register Page And Verify Email Id</a>";
            }
        }
        else if($data["password"] != $pass){
            $error = "<b>Email or Password Not Matched</b>";
        }
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
                        <p style="text-align: center;color: coral;font-family: monospace;font-size: 16px;padding: 0px">iCAB Service, Hyderabad</p>
                        <div class="row">
                            <div class="col-lg-4 pl-3" style="padding: 0px">
                                <hr>
                            </div>
                            <div class="col-lg-4 text-center mt-1" style="font-size: 15px;vertical-align: middle;padding: 0px;font-family: fantasy;color: burlywood">Login From Here</div>
                            <div class="col-lg-4 pr-3" style="padding: 0px">
                                <hr>
                            </div>
                        </div>
                        <div style="height: 20px"></div>

                        <form action="<?php $_PHP_SELF; ?>" method="post">
                            <p class="text-danger"><?php echo $error; ?></p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input required type="text" name="email" class="form-control" placeholder="Your Email">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" required name="pass" class="form-control" placeholder="Your Password">

                            </div>
                            <input name="btnLogin" type="submit" value="Login" class="btn btn-danger btn-block">


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>