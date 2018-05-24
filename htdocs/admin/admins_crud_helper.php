<?php
require_once "../includes/config.php";
require_once "../includes/server_warnings.php";
require_once "../includes/functions.php";
if (isset($_POST['add_admin'])) {
    $username = secure_input($connection, $_POST['admin_username']);
    $password = secure_input($connection, $_POST['admin_pass']);
    $md5password = md5($password);
    $query = "Select * FROM admins WHERE username='$username'";
    $result=runQuery($connection, $query);
    $row=mysqli_num_rows($result);
    if ($row>0) {
        header("Location:admins_crud.php?userexist=true");
    } else {
        $query = "INSERT INTO admins(username,password) VALUES('$username','$md5password')";
        runQuery($connection, $query);
        header("Location:admins_crud.php");
    }
} elseif (isset($_POST['delete_admin'])) {

    $username = secure_input($connection, $_POST['admin_username']);
    $query = "DELETE FROM admins WHERE username='$username'";
    runQuery($connection, $query);
    if (mysqli_affected_rows($connection) <= 0) {
        header("Location:admins_crud.php?nouser=true");
    }
    header("Location:admins_crud.php");
} elseif (isset($_POST['update_admin'])) {
    $username = secure_input($connection, $_POST['admin_username']);
    $new_username = secure_input($connection, $_POST['admin_new_username']);
    $new_password = secure_input($connection, $_POST['admin_new_pass']);
    $md5password = md5($new_password);
    $query = "UPDATE admins SET username='$new_username',password='$md5password'"
        . " WHERE username='$username'";
    runQuery($connection, $query);
    if (mysqli_affected_rows($connection) <= 0) {
        header("Location:admins_crud.php?nouser=true");
    }
    header("Location:admins_crud.php");
}