<?php
require_once "../includes/server_warnings.php";
require_once "../includes/config.php";
require_once "../includes/functions.php";
if (isset($_POST['update_cus'])) {
    $email = secure_input($connection, $_POST['email']);
    $stu_id = secure_input($connection, $_POST['student_id']);
    $password = md5(secure_input($connection, $_POST['password']));
    $firstname = secure_input($connection, $_POST['firstname']);
    $lastname = secure_input($connection, $_POST['lastname']);
    $status = secure_input($connection, $_POST['status']);

    $query = "UPDATE customers SET 
              student_id='$stu_id',
                password='$password',
                fname='$firstname',
                lname='$lastname',
                status='$status' 
                WHERE email='$email' ";
    runQuery($connection,$query);
    if(mysqli_affected_rows($connection)>0){
        header("Location:customer_crud.php");
    }else{
        header("Location:customer_crud.php?nocus=true");
    }

}
if(isset($_POST['delete_cus'])){
    $cus_id=$_POST['cus_id'];
    $query="DELETE FROM customers WHERE id=$cus_id";
    runQuery($connection,$query);
    if(mysqli_affected_rows($connection)>0){
        header("Location:customer_crud.php");
    }else{
        header("Location:customer_crud.php?nocus=true");
    }
}