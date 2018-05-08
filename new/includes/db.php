<?php
$connection=mysqli_connect("localhost",
    "root",
    "root",
    "uqtext");
if(!$connection){
    echo "Can't connect to database";
}
?>