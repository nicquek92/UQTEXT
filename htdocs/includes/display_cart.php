<tr>
    <td >
        <div class="col-md-12">
            <div class="col-md-4">
                <img  src="<?php echo $value['image'] ?>" width="100px"
                      height="120px"/>
            </div>
            <div class="col-md-8">
                    <span><?php echo $value['title'] ?>
                        <br/>
                        <?php echo $value['author'] ?> </span>
            </div>
        </div>


    </td>
    <td ><?php echo $value['desc'] ?></td>
    <td ><?php echo $value['quantity'] ?></td>
    <td >$ <?php echo $value['price'];
        $total += $value['price']*$value['quantity']; ?></td>
    <td>$ <?php echo $value['price'] * $value['quantity']; ?></td>

</tr>