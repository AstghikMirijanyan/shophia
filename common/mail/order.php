<?php

use yii\helpers\Html;

?>


    <h1 style="text-align: center">Thanks for shopping</h1>
    <br>
    <table style="width:100%; border: 3px solid #ddd; border-collapse: collapse">
<?php
if (!empty($cart)) {
    $total = 0;
    ?>
    <thead>
    <tr>
        <th style="padding: 8px; border: 2px solid #ddd">Product name</th>
        <th style="padding: 8px; border: 2px solid #ddd">Quantity</th>
        <th style="padding: 8px; border: 2px solid #ddd">Price</th>
        <th style="padding: 8px; border: 2px solid #ddd">Total</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cart as $item):
        if (!empty($item['product']['sale_price'])) {
            $total = ($item['product']['sale_price'] + $total) * $item['quantity'];
        } else {
            $total = ($item['product']['price'] + $total) * $item['quantity'];
        }
        ?>
        <tr>
            <td style="padding: 8px; border: 2px solid #ddd"><?= $item['product']['title'] ?></td>
            <td style="padding: 8px; border: 2px solid #ddd"><?= $item['quantity'] ?></td>
            <td style="padding: 8px; border: 2px solid #ddd" >
                <?php
                if (!empty($item['product']['sale_price'])) {
                    ?>
                    <span><?= $item['product']['sale_price'] ?></span>
                    <?php
                } else {
                    ?>
                    <span><?= $item['product']['price'] ?></span>
                    <?php
                }
                ?>
            </td>
            <td>

                <?php
                if (!empty($item['product']['sale_price'])) {
                    ?>
                    <span><?= $item['product']['sale_price'] * $item['quantity'] ?></span>
                    <?php
                } else {
                    ?>
                    <span><?= $item['product']['price'] * $item['quantity'] ?></span>
                    <?php
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td style="padding: 8px; border: 2px solid #ddd" colspan="3">Total price:</td>
        <td style="padding: 8px; border: 2px solid #ddd"><?= $total ?></td>
    </tr>
    </tbody>
    </table>
    <?php
}