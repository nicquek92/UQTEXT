<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
include "includes/server_warnings.php";
require_once "includes/config.php";
require_once "includes/header.php";
require_once "includes/nav.php";
require_once "includes/functions.php";


if (isset($_POST['signup'])) {
    $email = secure_input($connection, $_POST['email']);
    $stu_id = secure_input($connection, $_POST['student_id'] . "");
    $password = md5(secure_input($connection, $_POST['password']));
    $firstname = secure_input($connection, $_POST['firstname']);
    $lastname = secure_input($connection, $_POST['lastname']);
    $hash = md5(rand(0, 1000));
    $query = "INSERT INTO customers
(email,student_id,password,fname,lname,hash) VALUES
('$email',
'$stu_id',
'$password',
'$firstname',
'$lastname',
'$hash'
)";
    $result = runQuery($connection, $query);
    if ($result) {
        echo "Sending Email";
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "pouk.kyine.mdk29@gmail.com";
        $mail->Password = "I'mawesome";
        $mail->SetFrom("pouk.kyine.mdk29@gmail.com");
        $mail->Subject = "UQ Text | Email Verification";
        $mail->Body = "Please follow the link to activate UQ Text account: " .
            "<a 
href='https://www.infs3202-d7ba9642.uqcloud.net/helpers/verify_account.php?
vhash=" . $hash . "&vemail=" . $email . "'>
Click this link
            </a>";
        $mail->AddAddress($email);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        redirect_to("helpers/email_sent_message.php");
    }
}
?>

    <div class="container">
        <div id="signupbox"
             class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                     </div>
                <div class="panel-body">
                    <form id="signupform" action="signup.php"
                          method="post"
                          class="form-horizontal"
                          role="form">

                        <div class="form-group">
                            <label for="email"
                                   class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email"
                                       id="signup_email" placeholder="Email Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password"
                                   class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control"
                                       name="password"
                                       placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">First
                                Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="firstname"
                                       placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Last
                                Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="lastname"
                                       placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="student-id" class="col-md-3
                        control-label">Student ID</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="student_id"
                                       placeholder="Student ID">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"
                                   for="terms"></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="terms" id="terms"> I Agree
                                <a href="#">Terms & Conditions </a>

                            </div>
                        </div>

                        <div id="btnbtnbtn" class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" name="signup"
                                        class="btn btn-info">
                                    <i class="icon-hand-right"></i> Sign Up
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                    Already have an account?
                                    <a href="login.php">
                                        Log In Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
   
    </script>
<?php require_once("includes/footer.php"); ?>