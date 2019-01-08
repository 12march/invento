<?php
ob_start();
include 'controller/loginController.php';

    if (isset($_POST['login']))
    {
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);
        
        $obj = new loginController();
        echo $obj->login($username, $password);
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>Login</title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--custom scrollbar-->
    <link href="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.html" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="assets/vendor/jquery-dropdown-master/jquery.dropdown.html" rel="stylesheet">

    <!--jquery ui-->
    <link href="assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!--iCheck-->
    <link href="assets/vendor/icheck/skins/all.css" rel="stylesheet">

    <!--custom styles-->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="signin-up-bg">

    <div class="leftHalf" style="background-image: url('assets/img/login-bg.jpg')">
        <div class="login-promo-txt">
            <h2>Let’s Start The Journey</h2>
            <p>Enter the most beautiful admin ever</p>
        </div>
    </div>

    <div class="rightHalf">
        <div class="position-relative">
            <!--login form-->
            <div class="login-form">
                <h2 class="text-center mb-4">
                    <img src="assets/img/logo.png" srcset="assets/img/logo@2x.jpg 2x" alt="CodeLab">
                </h2>
                <h4 class="text-uppercase- text-purple text-center mb-5">Login to Admin</h4>
                    
                    <!-- Login_alert -->
                    <?php echo Message(); 
                        echo SuccessMessage();
                    ?>
                   
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Enter email" required>
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group clearfix">
                        <button type="submit" name="login" class="btn btn-purple btn-pill float-right">LOGIN</button>
                    </div>

                </form>
                
                
            </div>
            <!--/login form-->
        </div>
    </div>

    <!--basic scripts-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-dropdown-master/jquery.dropdown-2.html"></script>
    <script src="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.html"></script>
    <script src="assets/vendor/icheck/skins/icheck.min.js"></script>

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <!--<script src="assets/js/scripts.js"></script>-->
</body>

</html>

