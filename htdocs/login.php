<?php
include "includes/server_warnings.php";
require_once "includes/config.php";
require_once "includes/header.php";
require_once "includes/nav.php";
require_once "includes/functions.php";

if (isset($_SESSION['email']) && isset($_SESSION['cus_id'])) {
    redirect_to("index.php");
}

$username_textbox = "";
$password_textbox = "";
$warning_text = "";

if (isset($_COOKIE['remember-username'])) {
    $username_textbox = $_COOKIE['remember-username'];
    $password_textbox = $_COOKIE['remember-password'];
}
if (isset($_POST['login'])) {
    $username = secure_input($connection, $_POST['username']);
    $password = secure_input($connection, $_POST['password']);
    $md5password = md5(secure_input($connection, $_POST['password']));

    //THIS IS FOR ADMINS
    $query = "SELECT * 
              FROM admins 
              WHERE username='$username' 
              AND password='$md5password'";
    $result = runQuery($connection, $query);
    $rows = mysqli_num_rows($result);
    if($rows==1){
    $_SESSION['admin_uqtext']= $username;
    }else{
        //THIS IS FOR CUSTOMERS
        $query = "SELECT * FROM customers 
              WHERE email='$username'
              AND password='$md5password'
              AND status=1";
        $result = runQuery($connection, $query);

        $rows = mysqli_num_rows($result);
    }
        if ($rows == 1) {

            $_SESSION['email'] = $username;
            if (isset($_POST['remember'])) {
                setcookie("remember-username", $username,
                    time() + (3600 * 24 * 30));
                setcookie("remember-password", $password,
                    time() + (3600 * 24 * 30));
            }
            if (empty($_SESSION['current_page'])) {
                redirect_to("/index.php");
            } else {
                redirect_to($_SESSION['current_page']);
            }
        } else {
            $warning_text = "Incorrect Username or Password";
        }
}
?>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;"
             class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

            <div class="text-danger"><?php echo $warning_text ?></div>


            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Log In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px">
                        <a href="#">Forgot password?</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body">


                    <form id="loginform" action="" method="post" class="form-horizontal"
                          role="form">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i
                                        class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text"
                                   value="<?php echo $username_textbox ?>"
                                   class="form-control" name="username"
                                   placeholder="username or email">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i
                                        class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password"
                                   value="<?php echo $password_textbox ?>" type="password"
                                   class="form-control" name="password"
                                   placeholder="password">
                        </div>

                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox"
                                        <?php
                                        if (isset($_COOKIE['remember-username'])) {
                                            ?>
                                            checked
                                            <?php
                                        }
                                        ?>
                                           name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" name="login" class="btn
                        btn-success">
                                    Login
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                    Don't have an account!
                                    <a href="signup.php">
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>