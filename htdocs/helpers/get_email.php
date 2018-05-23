<?php
include "../includes/config.php";
header('Content-type: application/helpers');
$query="Select * from customers";
$result=mysqli_query($connection,$query);
//the array that will hold the user_id and email
$users = array();
while($row=mysqli_fetch_array($result))
{
    $email=$row['email'];
    $user_id=$row['id'];
//each item from the rows go in their respective vars and into the posts array
    $users[] = array('customer'=> $email,'id'=> $user_id);
}
//the posts array goes into the response
//creates the file
echo json_encode($users);