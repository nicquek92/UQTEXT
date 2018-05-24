<?php
if(!isset($_SESSION))
{
    session_start();
}
header('Content-type: application/helpers');

    $idToUnset= $_POST['id'];
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        if ($value['id'] === $idToUnset) {
            unset($_SESSION['shopping_cart'][$key]);
        }
}
$_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
echo json_encode($_SESSION['shopping_cart'] );
