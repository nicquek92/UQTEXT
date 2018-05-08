<?php include "includes/header.php" ?>
<?php include "includes/navbar.php" ?>
<div class="container">
    <h1 class="text-center text-muted">UQ Text Books Catalog</h1>
    <div class="row flow-offset-1">
        <?php
        include "includes/db.php";
        if (isset($_GET['search_btn'])) {
            $searchkey = $_GET['search'];
            $query = "SELECT * FROM books WHERE isbn='$searchkey' 
                      OR title LIKE '%$searchkey%' 
                      OR course_tags LIKE '%$searchkey%'";
            $result = runQuery($query);
            showAllBooks($result);
        }
        ?>
    </div>
</div>
<?php include "includes/footer.php" ?>

