<?php
require_once "../includes/server_warnings.php";
require_once "../includes/config.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";
require_once "../includes/nav.php";
if(isset($_GET['nocus']) && $_GET['nocus']==true){
    echo "<script>alert('Cannot delete customer. Customer do not Exist')</script>";
    echo "<script>window.history.replaceState({}, document.title, \"/\" + \"admin/customer_crud.php\");</script>";
}

?>
<div class="container">
    <div class="row">
        <h3>CUSTOMER UPDATE AND DELETE</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Student ID</th>
                <th>Status</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM customers ORDER BY id DESC";
            $result = runQuery($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['password'] . '</td>';
                echo '<td>' . $row['fname'] . '</td>';
                echo '<td>' . $row['lname'] . '</td>';
                echo '<td>' . $row['student_id'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '</tr>';
             }
            ?>
            </tbody>
        </table>
        <form action="customer_crud_helper.php" method="post" id="cus_book_form">
            <div class="form-group col-md-6 pull-left">
                <div class="col-md-3">
                    <input type="text" name="cus_id" placeholder="Enter Customer id
                        to Delete" />

                </div>

                <div class="col-md-3">
                    <input class="btn btn-danger form-control" id="delete_cus"
                           type="submit"
                           name="delete_cus" value="Delete"/>
                </div>

            </div>
        </form>

    </div>
</div> <!-- /container -->
<hr/>
<hr/>
<div class="container">
    <div
        class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">CUSTOMER UPDATE AND DELETE</div>
            </div>
            <div class="panel-body">

                <form action="customer_crud_helper.php"
                      id=""
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
                        <label for="status" class="col-md-3
                        control-label">Status</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="status"
                                   placeholder="Status">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" name="update_cus"
                                    class="btn btn-success">
                                <i class="icon-hand-right"></i> Update
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once "../includes/footer.php";
?>


