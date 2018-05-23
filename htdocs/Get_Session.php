<?php
if(!isset($_SESSION))
{
    session_start();
}
header('Content-type: application/helpers') ;
echo json_encode($_SESSION['shopping_cart']);
