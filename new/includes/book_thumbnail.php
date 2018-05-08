<div class="col-md-8">
    <div class="panel panel-default  panel--styled">
        <div class="panel-body">
            <div class="col-md-12 panelTop">
                <div class="col-md-4">
                    <img class="img-responsive" src="<?php echo $row['image'] ?>" alt=""/>
                </div>
                <div class="col-md-8">

                   <a href="#" title="click for book detail"> <h2> <?php echo $row['title']; ?></h2></a>

                    <p>
                        <span>Textbook for :
                            <?php echo $row['course_tags'] ?>
                        </span>
                        <br/>
                        <span>New book price :
                            <?php echo $row['original_price'] ?>
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
                <div class="col-md-4 text-center">
                    <button class="btn btn-lg btn-add-to-cart"><span class="glyphicon glyphicon-shopping-cart"></span>
                        Add to Cart
                    </button>
                </div>
                <div class="col-md-4 text-left">
                    <h5>*Price <span class="itemPrice">$  <?php echo $row['price'] ?> </span></h5>
                </div>
                <div class="col-md-4">
                    <div>Uploaded by - <a href="#">Some user</a></div>
                    <div class="stars" title="rating of uploader">
                        <?php
                        for($i=0;$i<5;$i++){
                            if($i<$row['rating']){
                                echo "<div class='glyphicon glyphicon-star fa-2x'></div>";
                            }else{
                                echo "<div class='glyphicon glyphicon-star-empty fa-2x'></div>";
                            }
                        }

                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
