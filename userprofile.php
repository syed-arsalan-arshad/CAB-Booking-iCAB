<?php 
require_once("session.php");
if(!isset($_SESSION["uemail"]))
    header("location:login.php");

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
                        <p style="text-align: center;color: coral;font-family: monospace;font-size: 16px;padding: 0px"><b>User Profile</b></p>
                        <div class="row">
                            <div class="col-lg-4 pl-3" style="padding: 0px">
                                <hr>
                            </div>
                            <div class="col-lg-4 text-center mt-1" style="font-size: 15px;vertical-align: middle;padding: 0px;font-family: fantasy;color: burlywood"><img src="images/profile.png" class="img-fluid" alt=""></div>
                            <div class="col-lg-4 pr-3" style="padding: 0px">
                                <hr>
                            </div>
                        </div>
                        <div style="height: 20px"></div>
                        <div class="row">
                            <div class="col-3 text-info"><b>Name: </b></div>
                            <div class="col-9 text-info"><b><?php echo $_SESSION["uname"]; ?></b></div>
                        </div>
                           <div class="row">
                            <div class="col-3 text-info"><b>Email: </b></div>
                            <div class="col-9 text-info"><b><?php echo $_SESSION["uemail"]; ?></b></div>
                        </div>
                           <div class="row">
                               <div class="col-12 text-center">
                                   <p class="text-danger  mt-3">Greetings From! iCAB Service, Hyderabad.. Thank You</p>
                               </div>
                           </div>
                            

        


                       

                    </div>
                </div>
            </div>
        </div>
    </div>
      <div style="position:absolute;bottom:0px;width:100%"><?php include('footer.php'); ?></div>
</body>

</html>