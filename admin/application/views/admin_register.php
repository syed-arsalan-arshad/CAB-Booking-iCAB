<style>
    @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(<?php echo base_url('images/bg.jpg') ?>) no-repeat;
        background-size: cover;
    }

    .login-box {
        width: 280px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .login-box h1 {
        color: red;
        float: left;
        font-size: 40px;
        border-bottom: 6px solid #4caf50;
        margin-bottom: 50px;
        padding: 13px 0;
    }

    .textbox {
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0;
        margin: 8px 0;
        border-bottom: 1px solid #4caf50;
    }

    .textbox i {
        width: 26px;
        float: left;
        text-align: center;
    }

    .textbox input {
        border: none;
        outline: none;
        background: none;
        color: white;
        font-size: 18px;
        width: 80%;
        float: left;
        margin: 0 10px;
    }

    .btn {
        width: 100%;
        background: none;
        border: 2px solid #4caf50;
        color: white;
        padding: 5px;
        font-size: 18px;
        cursor: pointer;
        margin: 12px 0;
    }
</style>

<div class="login-box">
    <h1>Register Here</h1>
    <form action="#" method="post">
        <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" name="name" placeholder="Enter Name">
    </div>
    <div class="textbox">
        <i class="fa fa-envelope" aria-hidden="true"></i>

        <input type="text" name="email" placeholder="Enter Email">
    </div>
    <div class="textbox">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <input type="text" name="mobile" placeholder="Enter Mobile No">
    </div>
    <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" name="pass" placeholder="Enter Password">
    </div>
    <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" name="cpass" placeholder="Enter Confirm Password">
    </div>

    <input type="submit" name="submit" class="btn" value="Sign Up">
    <a href="<?php echo base_url('index.php/admin/login') ?>" class="text-light">Click Here To Sign In</a>
    </form>
</div>