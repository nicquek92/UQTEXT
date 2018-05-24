<?php
include "includes/server_warnings.php";
require_once "includes/config.php";
require_once "includes/functions.php";
require_once "includes/header.php";
require_once "includes/nav.php";
?>
<ul class="breadcrumb">
    <li><a href="/index.php">Home</a></li>
</ul>
        <?php
        $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//SEARCH
        if (isset($_GET['searchq'])) {
            $searchkey = secure_input($connection, $_GET['searchq']);
            $result = runQuery($connection, "SELECT * FROM books 
                      WHERE isbn='$searchkey'
                      OR title LIKE '%$searchkey%'
                      OR course_tags LIKE '%$searchkey%'
                      ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($result)) {
                include "includes/book_thumbnail.php";
            }
        }
        //NORMAL LOAD
        else {
            $result = runQuery($connection, "SELECT * FROM books ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($result)) {
                include "includes/book_thumbnail.php";
            }
        }
        ?>


</div>






<?php
require_once "includes/footer.php";
?>
