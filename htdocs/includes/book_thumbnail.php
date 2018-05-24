<div class="col-md-6">
    <div class="panel panel-default  panel--styled">
        <div class="panel-body">
            <div class="col-md-12 panelTop">

                <div class="col-md-4 col-sm-2">
                    <img class="img-responsive img-thumbnail" width="100%"
                         src="<?php echo $row['image'] ?>"
                         alt="<?php echo $row['title']; ?>"
                    />
                </div>

                <div class="col-md-7">

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
                    <p>
                    <p id="itemPrice">Price: $ <?php echo $row['price'] ?></p>
                    </p>
                </div>
            </div>

            <div class="col-md-12 panelBottom">
                <div class="col-md-2">

                    <p>Rating: <?php echo $row['rating'] ?></p>

                </div>
                <div class="col-md-2">

                    <input id="instock<?php echo $row['id'] ?>" hidden="hidden"
                           type="text"
                           value="<?php echo $row['quantity'] ?>"/>
                                  </div>
                <div class="col-md-4 text-center">
                    <button id="<?php echo $row['id'] ?>"
                            class="btn btn-lg btn-success btn-add-to-cart">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        Add to Cart
                    </button>
                </div>
                <div class="col-md-4">

                    <div id="qty">
                        <button type="button" id="sub" class="sub">-</button>
                        <input id="book_quantity<?php echo $row['id']?>" class="qty_box"
                        type="number" value="1"
                               min="1"
                               max="<?php echo $row['quantity']?>" />
                        <button type="button" about="<?php echo $row['id']?>"
                                class="add">+</button>
                    </div>
                    <p style="margin-left: 10px" >In Stock: <?php echo $row['quantity']
                        ?></p>

                </div>
                <!-- hidden button for remove -->
                <div id="remove" hidden="hidden" class="col-md-4 text-center">
                    <button id="remove<?php echo $row['id'] ?>"
                            name="<?php echo $row['id'] ?>"
                            class="btn btn-lg btn-danger btn-remove-from-cart">
                        <span class="glyphicon glyphicon-trash"></span>
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
