<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="site-cat check">
    <img src="<?= \yii\helpers\Url::to('@web/images/cart_shop.jpg') ?>" alt="">
</div>
<?php
\yii\widgets\Pjax::begin();
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
                <th>Total</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $item):
                $sum += $item['price'];
                $sum += $item['quantity'];

                ?>


                <tr>
                    <td>
                        <img src="<?= yii\helpers\Url::to('@web/images/uploads/products/' . $item['product']['image']) ?>"
                             style="width: 50px"</td>
                    <td><h3><a href="<?= Url::to(['/products/product/'.$item['product']['slug']])?>"><?= $item['product']['title'] ?></a></h3></td>
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
                    <?php  $total =  $item['product']['price'] * $item['quantity']?>

                    <td><?= $total ?></td>
                    <?php $allPrice += $total;?>
                    <td><a href="/carts/cart/checkout?id=<?= $item['id'] ; ?>"><span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td colspan="4">Тotal price:</td>
                <td><?= $sum ?></td>
            </tr>
            <tr>
                <td colspan="4">PRICE:</td>
                <td> <?= $allPrice?></td>
            </tr>
            </tbody>
        </table>
        <hr class="reg_hr">
        <?php $name = \Yii::$app->user->identity->username; $name = strtoupper($name);
        $email = \Yii::$app->user->identity->email;?>
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($order,  'name')->textInput(['readonly' => true, 'value' => $name])?>
        <?= $form->field($order, 'email')->textInput(['readonly' => true, 'value' => $email])?>
        <?= $form->field($order, 'phone')?>
        <?= $form->field($order, 'address')?>
        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10 continue">
        <?= Html::submitButton('checkout', ['class' => 'flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4']) ?>
        </div>

        <?php $form = ActiveForm::end() ?>
        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
            <a href="<?= \yii\helpers\Url::to(['/products']) ?> "
               class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 cont">
                Continue shop
            </a>
        </div>
        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
            <a href="carts/cart/delete?id=<?= $item['id'] ; ?>?> "
               class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                Delete all
            </a>
        </div>
    </div>
<?php else: ?>
    <div class="cart-result">
        <h2>Cart empty</h2>
    </div>
<?php endif;
\yii\widgets\Pjax::end();
?>
