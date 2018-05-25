<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '18befa56cc5ed0ea');
define('DB_NAME', 'db_uq');

/* Attempt to connect to MySQL database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
