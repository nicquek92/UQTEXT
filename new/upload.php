<?php $title="Upload" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navbar.php" ?>
<?php
if(!is_Login()){
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    redirect_to("login.php");
}else{
    echo "you can see this page coz you are log in";
}
?>

<?php include "includes/footer.php"?>
