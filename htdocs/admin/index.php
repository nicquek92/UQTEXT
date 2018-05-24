<?php
require_once "../includes/server_warnings.php";
require_once "../includes/config.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";
require_once "../includes/nav.php";
if (!isset($_SESSION['admin_uqtext'] ) ){
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    redirect_to("../login.php");
}
?>

<div class="col-md-12">
    <p class="text-center"><a type="button" class="btn btn-primary"
                              href="admins_crud.php">ADMIN CRUD</a></p>
    <p class="text-center"><a type="button" class="btn btn-primary"
                              href="books_crud.php">BOOK CRUD</a></p>
    <p class="text-center"><a type="button" class="btn btn-primary"
                              href="customer_crud.php">Customer CRUD</a></p>

</div>

<?php
require_once "../includes/footer.php";
?>
