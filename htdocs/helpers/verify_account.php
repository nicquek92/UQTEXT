

<?php
include "../includes/server_warnings.php";
require_once "../includes/config.php";
require_once "../includes/functions.php";

//get GET['vhash']
//use update query to update status if hash match

$vhash=secure_input($connection, $_GET['vhash']);
$vemail=secure_input($connection, $_GET['vemail']);
$query="UPDATE customers
SET status = 1
WHERE hash='$vhash'
AND email='$vemail'";

$result=runQuery($connection,$query);
$row=mysqli_affected_rows ($connection);
if($row==1){
    redirect_to("../index.php");
}else{
    redirect_to("account_verification_failed.php");
}
