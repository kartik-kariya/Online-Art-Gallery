<?php
session_start();
ob_start();
$email = "vision6570@gmail.com";
$pass = "7874485660";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body id="login">
        <div class="container">

            <form class="form-signin" method="post" action="#">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="text" name="txtAdminEmail" class="input-block-level" placeholder="Email address" required>
                <input type="password" name="txtPassword" class="input-block-level" placeholder="Password" required>
               
                <input class="btn btn-large btn-primary" type="submit" name="btnSignIn"value="Sign in">
                <?php
                if (isset($_POST['btnSignIn'])) {
                    $e = $_POST['txtAdminEmail'];
                    $p = $_POST['txtPassword'];
                    if ($e == $email && $p == $pass) {
                        header("location:dashoboard.php");
                        $_SESSION['username']=$e;
                        $_SESSION['password']=$p;
                    } else {
                        echo '<script type="text/javascript">

          window.onload= function () { alert("Invalid Email Id Or Password..!!"); }

</script>';
                    }
                }
                ?>
            </form>

        </div> <!-- /container -->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
ob_end_flush();
?>