<?php
require_once("session.php");
if(!isset($_SESSION["uemail"])){ ?>

<!--- Header Start  -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">

    <div class="navbar-brand">
        <a href="index.php" class="nav-link"><i class="fa fa-taxi" aria-hidden="true"></i>
            <h3>iCAB Booking</h3>
        </a>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
    </ul>

</nav>
<!--- Header Close  -->

<?php } 
else 
{?>
<style>
    .dropdown:hover>.dropdown-menu {
        display: block;
    }
    .dropdown-menu a{
        color:white;
    }

    .dropdown>.dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
        pointer-events: none;
    }
</style>
<!--- Header Start  -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">

    <div class="navbar-brand">
        <a href="index.php" class="nav-link"><i class="fa fa-taxi" aria-hidden="true"></i>
            <h3>iCAB Booking</h3>
        </a>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Details
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="userprofile.php">User Profile</a>
                    <a class="dropdown-item" href="userhistory.php">Booking History</a>
                </div>
            </div>
        </li>


        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
    </ul>

</nav>
<!--- Header Close  -->

<?php } ?>