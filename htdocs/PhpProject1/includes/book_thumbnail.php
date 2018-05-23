<div class="col-md-8">
    <div class="panel panel-default  panel--styled">
        <div class="panel-body">
            <div class="col-md-12 panelTop">

                <div class="col-md-4 col-sm-2">
                    <img class="img-responsive img-thumbnail" width="100%"
                         src="<?php echo $row['image'] ?>"
                         alt="<?php echo $row['title']; ?>"
                         />
                </div>

                <div class="col-md-8">

                    <h2> <?php echo $row['title']; ?></h2>

                    <p>
                        <span>Authors :
                            <?php echo $row['author'] ?>
                        </span>
                        <br/>
                        <span>Textbook for :
                            <?php echo $row['course_tags'] ?>
                        </span>
                        <br/>
                        <span>Google book price :
                            <?php
                            if ($row['original_price'] == 0.00) {
                                echo "#Not Available";
                            } else {
                                echo "$" . $row['original_price'];
                            }
                            ?>
                        </span>
                        <br/>
                        <span>Details :
                            <?php echo $row['description'] ?>
                        </span>
                        <br/>
                    </p>
                </div>
            </div>

            <div class="col-md-12 panelBottom">

                <div class="col-md-4 text-left">
                    <h5>*Price
                        <span class="itemPrice">
                            $ <?php echo $row['price'] ?>
                        </span>
                    </h5>
                </div>

                <div class="col-md-2">
                    <div class="stars" title="<?php echo $row['rating'] ?>">
                        <?php
                        echo "<p>Rating: " . $row['rating'] . "</p>"
                        ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stars" title="<?php echo $row['quantity'] ?>">
                        <?php echo "<p>In Stock: " . $row['quantity'] . "</p>"; ?>
                    </div>
                </div>

                <div  class="col-md-4 text-center">
                    <ul style="list-style:none">
                        <li>
                            <label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>

                        </li>
                        <li>
                            <button id="<?php echo $row['id'] ?>"
                                    class="btn btn-primary btn-lg btn-add-to-cart">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                Add to Cart
                            </button>
                        </li>
                    </ul>

                </div>
                <!-- hidden button for remove -->
                <div id="remove" hidden="hidden" class="col-md-4 text-center">
                    <button  id="remove<?php echo $row['id'] ?>"
                             name="<?php echo $row['id'] ?>"
                             class="btn btn-lg btn-danger btn-remove-from-cart">
                        <span  class="glyphicon glyphicon-trash"></span>
                        Remove from cart
                    </button>
                </div>
                <!-- Hidden Data to use in ajax call -->
                <input type="text" hidden="hidden"
                       id="book_image<?php echo $row['id'] ?>"
                       value="<?php echo $row['image'] ?>"/>
                <input type="text" hidden="hidden"
                       id="book_title<?php echo $row['id'] ?>"
                       value="<?php echo $row['title'] ?>"/>
                <input type="text" hidden="hidden"
                       id="book_author<?php echo $row['id'] ?>"
                       value="<?php echo $row['author'] ?>"/>
                <input type="text" hidden="hidden"
                       id="book_price<?php echo $row['id'] ?>"
                       value="<?php echo $row['price'] ?>"/>
                <input type="text" hidden="hidden"
                       id="book_desc<?php echo $row['id'] ?>"
                       value="<?php echo $row['description'] ?>"/>
            </div>
        </div>
    </div>
</div>