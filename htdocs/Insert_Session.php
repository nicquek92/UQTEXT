<?php
    session_start();
header('Content-type: application/helpers');
if (isset($_POST['id'])) {
    $tmpArr = array(
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'price' => $_POST['price'],
        'quantity'=>$_POST['quantity'],
        'desc'=>$_POST['desc'],
'image'=>$_POST['image']
    );
    $_SESSION['shopping_cart'][] = $tmpArr;

    echo json_encode($_SESSION['shopping_cart']);
}


