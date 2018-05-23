<?php
$title = "Shopping Cart";
include "includes/config.php";
include "includes/functions.php";
include "includes/header.php";
include "includes/nav.php";
if (!isset($_SESSION['admin_uqtext'])) {
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    redirect_to("login.php");
} else {
    if (!isset($_SESSION['shopping_cart'])) {
        echo "<div class='warning'>There's no books in the cart. Please go back to <a href='index.php'>Home
</a></div>";
    } else {
        ?>
        <div class="container">
            <h1>Shopping Cart</h1>
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
                    <?php
                    $count++;
                }
                ?>
                <?php include "includes/display_cart.php" ?>
                <td colspan="3">
                    <input id="buynow" type="image" name="upload"
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