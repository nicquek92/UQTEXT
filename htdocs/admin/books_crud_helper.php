<?php
if(!isset($_SESSION)){
    session_start();
}
require_once "../includes/server_warnings.php";
require_once "../includes/config.php";
require_once "../includes/functions.php";
/******* Book Create *********/
if (isset($_POST['add_book'])) {
    /** IMAGE UPLOAD TO SERVER **/
    // Check if file was uploaded without errors
    $imgerr = false;
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $maxsize = 5 * 1024 * 1024;
        If ($filesize > $maxsize) {
            $imgerr=true;
        }elseif (in_array($filetype, $allowed)) {
            $hash=md5(rand(0,100));
            $uncompress_img="../imgs/" .$hash. $_FILES["photo"]["name"];
            $compress_img="../imgs_min/" .$hash. $_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"],$uncompress_img);

            $compress_img=compressImage($uncompress_img,$compress_img);
            move_uploaded_file($_FILES["photo"]["tmp_name"],$compress_img);
            $imgerr = false;

        } else {
            $imgerr = true;
        }
    }
    $isbn = secure_input($connection,$_POST['isbn']);
    $title = secure_input($connection, $_POST['title']);

    if ($_POST['image'] == "0") {
        $image = secure_input($connection, $uncompress_img);
        $image_min = secure_input($connection, $compress_img);
    } else {
        $image = secure_input($connection, $_POST['image']);
        $image_min = secure_input($connection, $_POST['image']);
    }
    $author = secure_input($connection, $_POST['author']);
    $original_price = (float)secure_input($connection, $_POST['original_price']);
    $rating = (float)secure_input($connection, $_POST['rating']);
    $price = (float)secure_input($connection, $_POST['price']);
    $quantity = (int)secure_input($connection, $_POST['quantity']);
    $course_tags=secure_input($connection, $_POST['course_tags']);
    $description = secure_input($connection, $_POST['description']);
    $query="SELECT * FROM books WHERE isbn='$isbn'";
    $result=runQuery($connection,$query);
    $row=mysqli_num_rows($result);
    if ($imgerr) {
        header("Location:books_crud.php?imgerr=true");
    } elseif ($row>0){
        header("Location:books_crud.php?failed=true");
     } else {
        $query = "INSERT INTO books(isbn,title,image,image_min,author,original_price,rating,price,
quantity,course_tags,description) VALUES('$isbn','$title','$image','$image_min','$author',
'$original_price','$rating','$price','$quantity','$course_tags','$description')";
        runQuery($connection, $query);
        header("Location:books_crud.php");
    }

}

/********** BOOK UPDATE **********/
if(isset($_POST['update_book'])){
    /** IMAGE UPLOAD TO SERVER **/
    // Check if file was uploaded without errors
    $imgerr = false;
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $maxsize = 5 * 1024 * 1024;
        If ($filesize > $maxsize) {
            $imgerr=true;
        }elseif (in_array($filetype, $allowed)) {
            $hash=md5(rand(0,100));
            $uncompress_img="../imgs/" .$hash. $_FILES["photo"]["name"];
            $compress_img="../imgs_min/" .$hash. $_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"],$uncompress_img);
            echo "Uncompress";
            $compress_img=compressImage($uncompress_img,$compress_img);
            move_uploaded_file($_FILES["photo"]["tmp_name"],$compress_img);
            $imgerr = false;

        } else {
            $imgerr = true;
        }
    }
    $isbn = secure_input($connection,$_POST['isbn']);
    $title = secure_input($connection, $_POST['title']);

    if ($_POST['image'] == "0") {
        $image = secure_input($connection, $uncompress_img);
        $image_min = secure_input($connection, $compress_img);
    } else {
        $image = secure_input($connection, $_POST['image']);
        $image_min = secure_input($connection, $_POST['image']);
    }
    $author = secure_input($connection, $_POST['author']);
    $original_price = (float)secure_input($connection, $_POST['original_price']);
    $rating = (float)secure_input($connection, $_POST['rating']);
    $price = (float)secure_input($connection, $_POST['price']);
    $quantity = (int)secure_input($connection, $_POST['quantity']);
    $course_tags=secure_input($connection, $_POST['course_tags']);
    $description = secure_input($connection, $_POST['description']);
    if ($imgerr) {
header("Location:books_crud.php?imgerr=true");
    } else {
        $query = "UPDATE books 
                    SET title='$title',
                    image='$image',
                    image_min='$image_min',
                    author='$author',
                    original_price='$original_price',
                    rating='$rating',
                    price='$price',
                    quantity='$quantity',
                    course_tags='$course_tags',
                    description='$description' 
                    WHERE isbn='$isbn'";
        runQuery($connection, $query);
        header("Location:books_crud.php");
    }
    if(isset($_SESSION['isbn_exist'])){
        unset($_SESSION['isbn_exist']);
    }
}
/************* DELETE BOOK *************/
if(isset($_POST['delete_book'])){
    $bid = secure_input($connection,$_POST['book_id']);
    $query=" DELETE FROM books WHERE id = '$bid' ";
    runQuery($connection,$query);
    header("Location:books_crud.php");
}
