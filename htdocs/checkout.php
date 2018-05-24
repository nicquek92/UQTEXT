<?php
$title = "Check Out";
include "includes/config.php";
include "includes/functions.php";
include "includes/header.php";
include "includes/nav.php";
?>
    <ul class="breadcrumb">
        <li><a href="/index.php">Home</a></li>
        <li><a href="/checkout.php">Check Out</a></li>
     </ul>
<?php
if (!isset($_SESSION['email'] ) ){
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    redirect_to("login.php");
} else {
    if (!isset($_SESSION['shopping_cart'])) {
        echo "<div class='warning'>There's no books in the cart. Please go back to <a href='index.php'>Home
</a></div>";
    } else {
        ?>
        <div class="container">

            <h1>
                <?php
                if(isset($_SESSION['fname']) && isset($_SESSION['lname'])){
                    echo $_SESSION['fname']." ".$_SESSION['lname'];
                }else{
                    echo "Admin";
                }
                ?>
                's Cart</h1>
            <hr>
            <form action="https://sandbox.paypal.com/cgi-bin/webscr"
                  method="post">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="business"
                       value="pyaephyobusiness@paypal.com">
                <?php $count = 1;
                foreach ($_SESSION['shopping_cart']
                         as $key => $value) {
                    ?>
                    <input type="hidden"
                           name="item_name_<?php echo $count ?>"
                           value="<?php echo $value['title'] ?>">
                    <input type="hidden"
                           name="item_number_<?php echo $count ?>"
                           value="<?php echo $value['id'] ?>">
                    <input type="hidden"
                           name="amount_<?php echo $count ?>"
                           value="<?php echo $value['price'] ?>">
                    <input type="hidden"
                           name="quantity_<?php echo $count ?>"
                           value="<?php echo $value['quantity'] ?>">
                    <input type="hidden"
                           name="currency_code_<?php echo $count ?>"
                           value="AUD">
                    <?php
                    $count++;
                }
                ?>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Book</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['shopping_cart'] as $key => $value) {
                        ?>
                        <?php include "includes/display_cart.php" ?>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tr>
                        <th colspan="4"><span class="pull-right">Total</span></th>
                        <th id="sub_total">$ <?php echo $total; ?></th>
                    </tr>
                    <td><a href="index.php" class="btn btn-primary">Continue Shopping</a></td>

                <td colspan="4">
                    <input class="pull-right" id="buynow" type="image" name="upload"
                           src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                           alt="PayPal - The safer, easier way to pay online">
                </td>
                </tr>
                </tbody>
                </table>
            </form>
        </div>
        <?php
    }

}
 include "includes/footer.php"; ?>