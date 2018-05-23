<?php
include "includes/server_warnings.php";
require_once "includes/config.php";
require_once "includes/header.php";
require_once "includes/nav.php";
require_once "includes/functions.php";
?>

<div class="container">
    <div id="mySidenav" class="sidenav">
<ol>
    <li>
        <img id="peek_thumbnail" width="30px" src="imgs/book.png"/>
        Item 1 - $10 - 3<span class="glyphicon glyphicon-trash text-danger"></span></li>

</ol>
    </div>
<script>

</script>
        <?php
        $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

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
        } else {
            $result = runQuery($connection, "SELECT * FROM books");
            while ($row = mysqli_fetch_assoc($result)) {
                include "includes/book_thumbnail.php";
            }
        }
        ?>


</div>






<?php
require_once "includes/footer.php";
?>
