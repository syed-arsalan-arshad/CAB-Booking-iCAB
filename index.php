<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>iCAB Booking Service</title>
    <?php include("linkforall.php") ?>
</head>
<body class="bg1">
    <?php include("header.php") ?>
    
    <div class="container">
        <div class="row text-center mt-5 main" style="height:500px">
            <div class="col-lg-7 ">
                <div class="card card-bg">
                   <div class="card-header">
                       <h3>Choose Your CAB</h3>
                   </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <table align="center" class="table table-stripped">
                                    <tr><td><img src="images/car1.png" width="100px" height="60px" alt=""></td></tr>
                                    <tr><td><b>CAR(Non AC)</b></td></tr>
                                    <tr><td><b>Rate: </b><i>08&#x20B9;/KM</i></td></tr>
                                    <tr><td><button onclick="window.location='bookCab.php'" class="btn btn-primary">Book Now</button></td></tr>
                                </table>
                            </div>
                            <div class="col-lg-3">
                                <table align="center" class="table table-stripped">
                                    <tr><td><img src="images/car2.png" width="100px" height="60px" alt=""></td></tr>
                                    <tr><td><b>CAR(AC)</b></td></tr>
                                    <tr><td><b>Rate: </b><i>10&#x20B9;/KM</i></td></tr>
                                    <tr><td><button onclick="window.location='bookCab.php'" class="btn btn-primary">Book Now</button></td></tr>
                                </table>
                                 
                            </div>
                            <div class="col-lg-3">
                                 <table align="center" class="table table-stripped">
                                    <tr><td><img src="images/xuv1.png" width="100px" height="60px" alt=""></td></tr>
                                    <tr><td><b>SUV(Non AC)</b></td></tr>
                                    <tr><td><b>Rate: </b><i>15&#x20B9;/KM</i></td></tr>
                                    <tr><td><button onclick="window.location='bookCab.php'" class="btn btn-primary">Book Now</button></td></tr>
                                </table>
                            </div>
                            <div class="col-lg-3">
                                 <table align="center" class="table table-stripped">
                                    <tr><td><img src="images/xuv2.png" width="100px" height="60px" alt=""></td></tr>
                                    <tr><td><b>SUV(AC)</b></td></tr>
                                    <tr><td><b>Rate: </b><i>20&#x20B9;/KM</i></td></tr>
                                    <tr><td><button onclick="window.location='bookCab.php'" class="btn btn-primary">Book Now</button></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("footer.php") ?>
</body>
</html>