<?php
require_once "../includes/server_warnings.php";
require_once "../includes/config.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";
require_once "../includes/nav.php";

if (isset($_POST['add_book'])) {
    /** IMAGE UPLOAD TO SERVER **/
    // Check if file was uploaded without errors
    $imgerr = true;

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
            echo "compress";
            echo "uploaded";
        } else {
            echo "damn";
            $imgerr = true;
        }
    }

    $isbn = $_POST['isbn'];
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
        echo "<script>alert('Please use valid image.')</script>";
    } elseif (isset($_SESSION['isbn_exist']) && in_array($isbn,
            $_SESSION['isbn_exist'])) {
        echo "<script>alert('Plaese use Update function for existing book.')</script>";
    } else {
        $query = "INSERT INTO books(isbn,title,image,image_min,author,original_price,rating,price,
quantity,course_tags,description) VALUES('$isbn','$title','$image','$image_min','$author',
'$original_price','$rating','$price','$quantity','$course_tags','$description')";
        runQuery($connection, $query);
    }
    unset($_SESSION['isbn_exist']);
}
?>
    <div class="container">
        <div class="row">
            <h3>BOOK CRUD</h3>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>image</th>
                    <th>title</th>
                    <th>isbn</th>
                    <th>author</th>
                    <th>original_price</th>
                    <th>rating</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>course_tags</th>
                    <th>description</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM books ORDER BY id DESC";
                $result = runQuery($connection, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td><img class="img-responsive img-thumbnail" width="100px"
                         src="' . $row['image_min'] . '"/></td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['isbn'] . '</td>';
                    echo '<td>' . $row['author'] . '</td>';
                    echo '<td>' . $row['original_price'] . '</td>';
                    echo '<td>' . $row['rating'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['course_tags'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '</tr>';
                    $_SESSION['isbn_exist'][] = $row['isbn'];
                }
                ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    <hr/>
    <div class="text-center" width="100%">
        <button id="add_btn_book" class="btn btn-default">Add</button>
        <button id="update_btn_book" class="btn btn-default">Update</button>
        <button id="delete_btn_book" class="btn btn-default">Delete</button>
    </div>
    <hr/>
    <div class="container">

        <form enctype="multipart/form-data" action="" method="post" id="bookform"
              class="form-horizontal">
            <fieldset>
                <!-- Form Name -->
                <legend class="text-center">
                    Search Book Title You want to upload
                </legend>
                <!-- Text input-->
                <div id="searchforbookdetail" class="form-group">
                    <label class="col-md-4 control-label" for="searchBook">Search For
                        Book Detail</label>
                    <div class="col-md-4">
                        <input class="form-control" id="searchBook" type="search">
                        <button class="btn btn-sm"
                                type="button"
                                id="fillBookData">Search <span class=" glyphicon
                                                   glyphicon-search"></span></button>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="selectBook">Select Your
                        Book
                    </label>
                    <div class="col-md-4">
                        <select class="form-control" id="selectBook" name="selectedBook">
                        </select>

                    </div>
                </div>
                <hr/>
                <legend class="text-center">Your Book Detail</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="isbn">ISBN</label>
                    <div class="col-md-4">
                        <input class="form-control" id="isbn" type="text" name="isbn"/>

                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="title">Title</label>
                    <div class="col-md-4">
                        <input class="form-control" id="title" type="text" name="title"/>

                    </div>
                </div>
                <!-- Image -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="image">Cover</label>
                    <div class="col-md-4">
                        <!-- Google API image link -->
                        <input hidden="hidden" type="text" name="image" id="image_src"/>
                        <br/>
                        <img id="image" class="img-thumbnail" width="200px"
                             height="300px"
                             src="/imgs/placeholder.png"/>
                    </div>
                    <!-- User upload image link -->
                    <label for="fileSelect">Want to choose your own cover?</label>
                    <input type="file" name="photo" id="fileSelect"/>
                    <p><strong>Note:</strong>
                        Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5
                        MB.</p>
                    <!-- how do i do that? -->
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="author">Authors</label>
                    <div class="col-md-4">
                        <input class="form-control" id="author" type="text"
                               name="author"/>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rating">Rating</label>
                    <div class="col-md-4">
                        <input class="form-control" id="rating"
                               value="0"
                               type="text"
                               name="rating"/>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="original_price">Google Book
                        Store
                        Price</label>
                    <div class="col-md-4">
                        <input class="form-control"
                               id="original_price"
                               value="0"
                               type="text"
                               name="original_price"/>
                    </div>
                </div>
                <hr/>

                <!-- Form Name -->
                <legend class="text-center">Your Sale Info</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="price">Your Price</label>
                    <div class="col-md-4">
                        <input class="form-control" id="price" type="text" name="price"/>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="quantity">Quantity</label>
                    <div class="col-md-4">
                        <input class="form-control" id="quantity" type="text"
                               name="quantity"/>

                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="course_tags">Course
                        Tags</label>
                    <div class="col-md-4">
                        <input class="form-control" id="course_tags" type="text"
                               name="course_tags"/>

                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="description">Description</label>
                    <div class="col-md-4">
                        <input class="form-control" id="description" type="text"
                               name="description"/>

                    </div>
                </div>
                <hr/>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <input class="btn btn-info form-control" id="add_book"
                               type="submit"
                               name="add_book" value="Add"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <input class="btn btn-success form-control" id="update_book"
                               type="submit"
                               name="update_book" value="Update"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <input class="btn btn-danger form-control" id="delete_book"
                               type="submit"
                               name="delete_book" value="Delete"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
<?php require_once "../includes/footer.php" ?>