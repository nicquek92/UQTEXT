<?php
require_once "../includes/server_warnings.php";
require_once "../includes/config.php";
require_once "../includes/functions.php";

if(isset($_GET['userexist']) && $_GET['userexist']==true){
    echo "<script>alert('Cannot add admin. Username Already Exist')</script>";
    echo "<script>window.history.replaceState({}, document.title, \"/\" + \"admin/admins_crud.php\");</script>";
}
if(isset($_GET['nouser']) && $_GET['nouser']==true){
    echo "<script>alert('Cannot delete admin. Username do not Exist')</script>";
    echo "<script>window.history.replaceState({}, document.title, \"/\" + \"admin/admins_crud.php\");</script>";
}
require_once "../includes/header.php";
require_once "../includes/nav.php";
?>
<div class="container">
    <div class="row">
        <h3>Admin CRUD</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Admin id</th>
                <th>Username</th>
                <th>Password</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM admins ORDER BY id DESC";
            $result = runQuery($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['password'] . '</td>';
                echo '</tr>';

            }

            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
<hr/>
<div width="100%" class="text-center">
    <button id="add_admin" class="btn btn-default">Add</button>
    <button id="update_admin" class="btn btn-default">Update</button>
    <button id="delete_admin" class="btn btn-default">Delete</button>
</div>
<hr/>
<div class="container">
    <div
            class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Admin Table CRUD</div>
            </div>
            <div class="panel-body">

                <form action="admins_crud_helper.php"
                      id="admin_crud_form"
                      method="post"
                      class="form-horizontal"
                      role="form">

                    <div class="form-group">
                        <label id="admin_username" for="admin_username"
                               class="col-md-3 control-label">Username</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="admin_username"
                                   placeholder="Admin Username">
                        </div>
                    </div>
                    <div class="form-group admin_password">
                        <label for="admin_pass"
                               class="col-md-3 control-label ">Password</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="admin_pass"
                                   placeholder="Admin Password">
                        </div>
                    </div>

                    <div hidden="hidden" class="form-group admin_new">
                        <label id="admin_new_username" for="admin_new_username"
                               class="col-md-3 control-label">New Username</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                   name="admin_new_username"
                                   placeholder="Admin New Username">
                        </div>
                    </div>
                    <div hidden="hidden" class="form-group admin_new">
                        <label id="admin_new_password" for="admin_new_pass"
                               class="col-md-3 control-label">New Password</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="admin_new_pass"
                                   placeholder="Admin New Password">
                        </div>
                    </div>

                    <div id="add_btn" class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" name="add_admin"
                                    class="btn btn-info">
                                <i class="icon-hand-right"></i> Add
                            </button>
                        </div>
                    </div>
                    <div hidden="hidden" id="update_btn" class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" name="update_admin"
                                    class="btn btn-success">
                                <i class="icon-hand-right"></i> Update
                            </button>
                        </div>
                    </div>
                    <div hidden="hidden" id="delete_btn" class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" name="delete_admin"
                                    class="btn btn-danger">
                                <i class="icon-hand-right"></i> Delete
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


