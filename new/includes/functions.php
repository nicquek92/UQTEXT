<?php
include "db.php";
function runQuery($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        return $result;
    }
}

function showAllBooks($result)
{
    while ($row = mysqli_fetch_assoc($result)) {
        include "book_thumbnail.php";
    }
}

function showSearchBooks($result){
    $count=mysqli_num_rows($result);
    if($count==0){
        echo "<h2>There's no book for this keyword</h2>";
    }else{
        while ($row = mysqli_fetch_assoc($result)) {
              include "book_thumbnail.php";
        }
    }
}

function is_Login(){
    session_start();
    if (isset($_SESSION['email'])) {
        return true;
    } else {
        return false;
    }
}

function get_emails(){
    $query="Select * from users";
    $result=runQuery($query);
    //store the entire response
    $response = array();
    //the array that will hold the email
    $users = array();
    while($row=mysqli_fetch_array($result))
    {
        $email=$row['email'];
//each item from the rows go in their respective vars and into the posts array
        $users[] = array('user'=> $email);
    }
//the posts array goes into the response

//creates the file
    $fp = fopen('results.json', 'w');
    fwrite($fp, json_encode($users));
    fclose($fp);
}



function redirect_to ($url) {
    header("Location: {$url}");
}

