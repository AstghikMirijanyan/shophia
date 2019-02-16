<?php

use yii\bootstrap\Html;

?>
<div class="site-cat check">
    <img src="<?= \yii\helpers\Url::to('@web/images/cart_shop.jpg') ?>" alt="">
</div>
<?php
if (!empty($cart)):
    $sum = 0;
    ?>
    <div class="table">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $item):
                $sum = $item['product']['price'] + $sum;

                ?>


                <tr>
                    <td>
                        <img src="<?= yii\helpers\Url::to('@web/images/uploads/products/' . $item['product']['image']) ?>"
                             style="width: 50px"</td>
                    <td><?= $item['product']['title'] ?></td>
                    <td>
                        <form method="post" action="">
                            <div class="quantity buttons_added check_quantity">
                                <input type="button" value="-" class="minus">
                                <input type="number" step="1" min="1" max="" name="quantity"
                                       value="<?= $item['quantity'] ?>" id="qty" title="Qty"
                                       class="input-text qty text" size="4"
                                       pattern="" inputmode="">
                                <input type="button" value="+" class="plus">
                                <div class="size9 trans-0-4 m-t-10 m-b-10">
                                </div>
                            </div>

                        </form>
                    </td>

                    <td><?= $item['product']['price'] ?></td>
                    <td><span data-id="<?= $item['id'] ?>" class="glyphicon glyphicon-remove text-danger del-item"
                              aria-hidden="true"></td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td colspan="4">TOTAL:</td>
                <td><?= count($cart) ?></td>
            </tr>
            <tr>
                <td colspan="4">PRICE:</td>
                <td> <?= $sum ?></td>

            </tr>
            </tbody>
        </table>

        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10 continue">
            <a href="<?= \yii\helpers\Url::to(['/products']) ?> "
               class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                Continue shop
            </a>
        </div>
    </div>
<?php else: ?>
    <h3>cart empty</h3>
<?php endif; ?>
