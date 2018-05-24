<?php
if(isset($_SESSION)){
    session_start();
}
require_once "../includes/server_warnings.php";
require_once "../includes/config.php";
require_once "../includes/functions.php";
if(isset($_GET['imgerr']) &&  $_GET['imgerr']=="true") {
    echo "<script>alert('Please use valid image.')</script>";
    echo "<script>window.history.replaceState({}, document.title, \"/\" + \"admin/books_crud.php\");</script>";
}

if(isset($_GET['failed']) && $_GET['failed']=="true"){
    echo "<script>alert('Add book failed. The book exist in the database. Please use update funciton.')</script>";
    echo "<script>window.history.replaceState({}, document.title, \"/\" + \"admin/books_crud.php\");</script>";
}
require_once "../includes/header.php";
require_once "../includes/nav.php";
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

                }
                ?>
                </tbody>
            </table>
            <form action="books_crud_helper.php" method="post" id="delete_book_form">
                <div class="form-group col-md-6 pull-left">
                    <div class="col-md-3">
                        <input type="text" name="book_id" placeholder="Enter book id
                        to Delete" />

                    </div>

                     <div class="col-md-3">
                        <input class="btn btn-danger form-control" id="delete_book"
                               type="submit"
                               name="delete_book" value="Delete"/>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- /container -->
    <hr/>
      <hr/>

    <div class="container">


        <form enctype="multipart/form-data" action="books_crud_helper.php" method="post" id="bookform"
              class="form-horizontal">
            <fieldset>
                <!-- Form Name -->
                <legend class="update-change text-center">
                    Search Book Title FROM GOOGLE
                </legend>
                <!-- Text input-->
                <div id="searchforbookdetail" class="update-hide form-group">
                    <label class="col-md-4 control-label" for="searchBook">Search
                        For
                        Book Detail</label>
                    <div class="col-md-4">
                        <input class="form-control" id="searchBook" type="search">
                        <button class="btn btn-sm"
                                type="button"
                                id="fillBookData">Search <span class=" glyphicon
                                                   glyphicon-search"></span></button>

                    </div>
                </div>

                <div class="update-hide form-group">
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
                        <input required="required" type="text" name="image" id="image_src"/>
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

            </fieldset>
        </form>
    </div>
<?php require_once "../includes/footer.php" ?>