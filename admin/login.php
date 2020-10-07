<!DOCTYPE html>
<html lang="en">

<head>
    <title>TRANG QUẢN TRỊ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../public/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../public/login/css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <?php 
        session_start();
        require_once('../system/core.php');
        if (!empty($_SESSION["useradmin"]))
        {
            redirect('index.php'); 
        }
        if(isset($_POST['DANGNHAP']))
        {
           $username = $_POST['username'];
           $data = array();
           $data['status'] = 1;
           if(filter_var($username, FILTER_VALIDATE_EMAIL))
           {
                $data['email'] = $username;
           }
           else{
                $data['username'] = $username;
           }
        
        $password = sha1($_POST['password']);
        require_once('../system/load.php');
        require_once('../Config.php');
        require_once('../system/Database.php');
        $user = loadModel('user');
        $row_username = $user->user_row($data);
        if($row_username != null)
        {
            $data['password'] = $password;
            $row_account = $user->user_row($data);
            if($row_account != null)
            {
                $_SESSION["useradmin"]=$row_account['username'];
                $_SESSION["userid"]=$row_account['id'];
                $_SESSION["fullname"]=$row_account['fullname'];
                $_SESSION["img"]=$row_account['img'];
                redirect("index.php");
            }
            else
            {
                $error = "Mật khẩu không đúng";
            }
        }
        else{
            $error = "Tên tài khoản không hợp lệ";
        }
    }
    ?>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../public/login/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" action="login.php" method="post" name="form1">
                    <span class="login100-form-title p-b-49">
                        LOGIN
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired"
                        style="margin-bottom: 23px;">
                        <span class="label-input100"><strong>Username</strong></span>
                        <input class="input100" type="text" name="username" placeholder="Type your username" required>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100"><strong>Password</strong></span>
                        <input class="input100" type="password" name="password" placeholder="Type your password"
                            required>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <?php if(isset($error)):?>
                    <div>
                        <div class="error-message">
                            <div class="icon-error">
                                <i class="fas fa-exclamation-circle error"></i>
                                <strong><?php echo $error;?></strong>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn" style="margin-top: 27px;">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" name="DANGNHAP" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>


                    <div class="flex-c-m" style="margin-top: 20px;">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>

                    <a href="#" class="txt2">
                        Sign Up
                    </a>
                    <script>
                    function statusChangeCallback(response) { // Called with the results from FB.getLoginStatus().
                        console.log('statusChangeCallback');
                        console.log(response); // The current login status of the person.
                        if (response.status === 'connected') { // Logged into your webpage and Facebook.
                            testAPI();
                        } else { // Not logged into your webpage or we are unable to tell.
                            document.getElementById('status').innerHTML = 'Please log ' +
                                'into this webpage.';
                        }
                    }


                    function checkLoginState() { // Called when a person is finished with the Login Button.
                        FB.getLoginStatus(function(response) { // See the onlogin handler
                            statusChangeCallback(response);
                        });
                    }


                    window.fbAsyncInit = function() {
                        FB.init({
                            appId: '1215529345466255',
                            cookie: true, // Enable cookies to allow the server to access the session.
                            xfbml: true, // Parse social plugins on this webpage.
                            version: '{api-version}' // Use this Graph API version for this call.
                        });


                        FB.getLoginStatus(function(response) { // Called after the JS SDK has been initialized.
                            statusChangeCallback(response); // Returns the login status.
                        });
                    };

                    function testAPI() { // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
                        console.log('Welcome!  Fetching your information.... ');
                        FB.api('/me', function(response) {
                            console.log('Successful login for: ' + response.name);
                            document.getElementById('status').innerHTML =
                                'Thanks for logging in, ' + response.name + '!';
                        });
                    }
                    </script>


                    <!-- The JS SDK Login Button -->

                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                    </fb:login-button>

                    <div id="status">
                    </div>

                    <!-- Load the JS SDK asynchronously -->
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js">
                    </script>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="../public/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../public/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="../public/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../public/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../public/login/js/main.js"></script>

</body>

</html>