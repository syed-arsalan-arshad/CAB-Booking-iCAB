<?php
require_once("session.php");
if(!isset($_SESSION["uemail"]))
    header("location:login.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>iCAB Booking Service</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("linkforall.php") ?>
    <!-- Google Maps JavaScript library -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDGiF8KBLo2rSbKuGNlA8IlBuOtke6g_JA"></script>


</head>

<body class="bg1">
    <?php include("header.php") ?>

    <div class="container">
        <div class="row text-center mt-5 mb-3">
            <div class="col-lg-7">
                <div class="card card-bg">
                    <div class="card-header">
                        <h3>Book Your CAB</h3>
                    </div>
                    <div class="card-body p-4">
                        <form name="frm" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                </div>
                                <input id="name" type="text" name="username" required class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input id="email" type="email" name="useremail" value="<?php echo $_SESSION["uemail"] ?>" readonly required class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                </div>
                                <input id="mobile" type="text" name="usermobile" required class="form-control" placeholder="Mobile No" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                </div>
                                <input id="origin" type="text" name="origin" required class="form-control" placeholder="Origin" aria-label="Username" aria-describedby="basic-addon1">

                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                </div>
                                <input id="destination" type="text" name="destination" required class="form-control" placeholder="Destination" aria-label="Username" aria-describedby="basic-addon1">

                            </div>
                            <h5 class="text-left">Choose CAB</h5>
                            <div class="form-check text-left">
                                <label class="form-check-label">
                                    <input type="radio" required class="form-check-input" name="optradio" value="8">CAR Non AC - 08 &#x20B9; / KM
                                </label>
                            </div>
                            <div class="form-check text-left">
                                <label class="form-check-label">
                                    <input type="radio" required class="form-check-input" name="optradio" value="10">CAR AC - 10 &#x20B9; / KM
                                </label>
                            </div>
                            <div class="form-check text-left">
                                <label class="form-check-label">
                                    <input type="radio" required class="form-check-input" name="optradio" value="15">SUV Non AC - 15 &#x20B9; / KM
                                </label>
                            </div>
                            <div class="form-check text-left">
                                <label class="form-check-label">
                                    <input type="radio" required class="form-check-input" name="optradio" value="20">SUV AC - 20 &#x20B9; / KM
                                </label>
                            </div>
                            <input type="hidden" name="dur" id="dur">
                            <input type="hidden" name="dis" id="dis">
                            <input type="button" value="Book Now" class="mt-2 btn btn-success form-control" id="btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php") ?>

    <script>
        var origin = 'origin';
        var destination = 'destination';
        var or;
        var ds;
        var durF;
        var dis;
        var rate;
        var amount;
        var tax;
        var finalAmount;
        var name;
        var email;
        var mobile;
        $(document).ready(function() {
            var autocomplete1;
            var autocomplete2;
            var to_place;
            var from_place;

            autocomplete1 = new google.maps.places.Autocomplete((document.getElementById(origin)), {
                types: ['geocode'],
                /*componentRestrictions: {
                 country: "USA"
                }*/
            });
            autocomplete2 = new google.maps.places.Autocomplete((document.getElementById(destination)), {
                types: ['geocode'],
                /*componentRestrictions: {
                 country: "USA"
                }*/
            });

            google.maps.event.addListener(autocomplete1, 'place_changed', function() {
                to_place = autocomplete1.getPlace();
                or = to_place.formatted_address;

            });
            google.maps.event.addListener(autocomplete2, 'place_changed', function() {
                from_place = autocomplete2.getPlace();
                ds = from_place.formatted_address;
            });

            $("#btn").click(function() {
                calDist();
                
            });

        });

        function calDist() {
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [or],
                destinations: [ds],
                travelMode: google.maps.TravelMode.DRIVING,
                //unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                avoidHighways: false,
                avoidTolls: false
            }, callback);
        }

        function callback(response, status) {
            if (status !== 'OK') {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between " + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    //console.log(response.rows[0].elements[0].distance);
                    //var distance_in_kilo = distance.value / 1000; 
                    //var distance_in_mile = distance.value / 1609.34; 
                    var dur = duration.value / 60;
                    durF = dur / 60;
                    durF = durF.toFixed(2);
                    dis = distance.value / 1000;
                    dis = dis.toFixed(2);
                    //var duration_value = duration.value;
                    //$('#in_mile').text(distance_in_mile.toFixed(2));
                    //$('#in_kilo').text(distance_in_kilo.toFixed(2));
                    //$('#duration_text').text(duration_text);
                    //$('#duration_value').text(duration_value);
                    //$('#from').text(origin);
                    //$('#to').text(destination);

                    var rad = document.getElementsByName("optradio");
                    for (i = 0; i < rad.length; i++) {
                        if (rad[i].checked) {
                            rate = rad[i].value;
                            break;
                        }
                    }
                    amount = rate * dis;
                    tax = amount * 0.05;
                    finalAmount = amount + tax;
                    amount = amount.toFixed(2);
                    tax = tax.toFixed(2);
                    finalAmount = finalAmount.toFixed(2);
                    //$("#dis").html(dis.toFixed(2));
                    //$("#dur").html(durF.toFixed(2));
                    name = $("#name").val();
                    email = $("#email").val();
                    mobile = $("#mobile").val();
                    
                    $.ajax({
                    type: "post",
                    data: {
                        uname: name,
                        uemail: email,
                        umob: mobile,
                        uor: or,
                        uds: ds,
                        udur: durF,
                        udis: dis,
                        urate: rate,
                        uamt: amount,
                        utax: tax,
                        ufamt: finalAmount
                    },
                    url: "save.php",
                    success: function(data) {
                        if (data == 1)
                            window.location = "confirmBooking.php";
                        else if (data == 0)
                            alert("Server Failed Try Again!");
                    }
                });


                }
            }
        }
    </script>
</body>

</html>