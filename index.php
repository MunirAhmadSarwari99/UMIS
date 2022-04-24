<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hewad University</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="public/images/logo.jpg"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="public/css/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('public/images/bgImg.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="controller/loginController.php">
                <span class="login100-form-title p-b-34 p-t-27">Hewad University</span>
                <?php
                if (isset($_GET['Login'])) {
                    echo "
                            <span class=\"login100-form-title alert alert-warning\" style=\"color: #0a0c0e; font-size: 15px; text-transform: capitalize;\">
                                Authentication Failed Enter Email and Password First
                            </span>  
                        ";
                }
                if (isset($_GET["EmailOrPasswordFailed:Deactivate"])) {
                    echo "
                            <span class=\"login100-form-title alert alert-danger\" style=\"color: #0a0c0e; font-size: 15px; text-transform: capitalize;\">
                                Wrong Email or Password. Try again / Or Account is Deactivate
                            </span>  
                        ";
                }
                ?>
                <div class="wrap-input100 validate-input" data-validate="Enter Email">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-90">
                    <a class="txt1" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="public/css/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="public/css/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="public/css/login/vendor/bootstrap/js/popper.js"></script>
<script src="public/css/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="public/css/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="public/css/login/vendor/daterangepicker/moment.min.js"></script>
<script src="public/css/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="public/css/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="public/css/login/js/main.js"></script>

</body>
</html>