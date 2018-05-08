<?php include "includes/header.php" ?>
<?php include "includes/navbar.php" ?>
<?php
get_emails();
?>

<?php
if(isset($_POST['signup'])){
    echo "ok";
    $email=$_POST['email'];
    $stu_id=$_POST['student_id'];
    $password=$_POST['password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];

    $query="INSERT INTO users
(email,student_id,password,first_name,last_name,address,phone ) VALUES
('$email',
'$stu_id',
'$password',
'$firstname',
'$lastname',
'$address',
'$phone')";
    $result=runQuery($query);
}
?>


    <div class="container">
        <div id="signupbox"
             class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div id="loginlink"><a href="login.php">Log In</a></div>
                </div>
                <div class="panel-body">
                    <form id="signupform" action="signup.php"
                          method="post"
                          class="form-horizontal"
                    role="form">

                        <div id="signupalert" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>


                        <div class="form-group">
                            <label for="email"
                                   class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email"
                                    id="signup_email"   placeholder="Email Address">
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
                            <label for="address" class="col-md-3
                        control-label">Full Address</label>
                            <div class="col-md-9">
                                <input id="address" type="text" class="form-control"
                                       name="address"
                                       placeholder="Address">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="phone"
                                   class="col-md-3 control-label">Phone</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone"
                                       placeholder="Phone Number">
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
                                <span style="margin-left:8px;">or</span>
                            </div>
                        </div>

                        <div style="border-top: 1px solid #999; padding-top:20px"
                             class="form-group">

                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-fbsignup" type="button"
                                        class="btn btn-primary"><i
                                            class="icon-facebook"></i>   Sign Up with
                                    Facebook
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>