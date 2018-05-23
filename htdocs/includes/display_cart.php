<table class="table table-striped table-hover table-bordered">
    <tbody>
    <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
    <?php

    $total = 0;
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        ?>
        <tr>
            <td class="col-md-7">
                <div class="col-md-3">
                    <img src="<?php echo $value['image'] ?>" width="100px"
                         height="120px"/>
                </div>
                <div>
                    <span><?php echo $value['title'] ?>
                        <br/>
                        <?php echo $value['author'] ?> </span>
                </div>

            </td>
            <td><?php echo $value['quantity'] ?></td>
            <td><?php echo $value['desc'] ?></td>
            <td>$ <?php echo $value['price'];
                $total += $value['price']; ?></td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <th colspan="3"><span class="pull-right">Total</span></th>
        <th id="sub_total">$ <?php echo $total; ?></th>
    </tr>

        <td><a href="index.php" class="btn btn-primary">Continue Shopping</a></td>