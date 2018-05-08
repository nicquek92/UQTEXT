<?php $title="Home" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navbar.php" ?>

<div class="container">
    <div class="row">
        <?php
        session_start();
        $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
        $result=runQuery("Select * from books");
        showAllBooks($result);
        ?>
    </div>
</div>
<?php include "includes/footer.php" ?>
