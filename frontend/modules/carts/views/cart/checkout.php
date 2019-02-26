<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="site-cat check">
    <img src="<?= \yii\helpers\Url::to('@web/images/chechkout.jpg') ?>" alt="">
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
                    <td><h3 class="check_h"><a class="check_h" data-pjax="0" style="color:#000; text-decoration: none; font-size: 18px" href="<?= Url::to(['/products/product/'.$item['product']['slug']])?>"><?= $item['product']['title'] ?></a></h3></td>

                    <td><?= $item['quantity']?></td>

                    <td><?= $item['product']['price'] ?></td>
                    <?php  $total =  $item['product']['price'] * $item['quantity']?>

                    <td><?= $total ?></td>
                    <?php $allPrice += $total;?>
                    <td><a href="/carts/cart/checkout?id=<?= $item['id'] ; ?>"><span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td colspan="4">Тotal:</td>
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

        <form id="paypal_checkout" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input name="cmd" value="_cart" type="hidden">
            <input name="upload" value="1" type="hidden">
            <input name="no_note" value="tyty" type="hidden">
            <input name="bn" value="PP-BuyNowBF" type="hidden">
            <input name="tax" value="0" type="hidden">
            <input name="rm" value="2" type="hidden">

            <input name="business" value="jeremy@jdmweb.com" type="hidden">
            <input name="handling_cart" value="1" type="hidden">
            <input name="currency_code" value="USD" type="hidden">
            <input name="lc" value="GB" type="hidden">
            <input name="return" value="<?= \yii\helpers\Url::to(['/']) . '/carts/cart' ?>" type="hidden">
            <input name="cbt" value="<?= \yii\helpers\Url::to(['/']) . '/site/' ?>" type="hidden">
            <input name="cancel_return" value="<?= \yii\helpers\Url::to(['/']) . '/carts/cart' ?>" type="hidden">
            <input name="custom" value="" type="hidden">


            <?php  foreach ($cart as $value){
                ?>
                <div id="item_1" class="itemwrap">
                    <input name="item_name_1" value="<?php $value['product']['title']?>" type="hidden">
                    <input name="quantity_1" value="<?php $value['quantity']?>" type="hidden">
                    <input name="amount_1" value="<?php $value['price']?>" type="hidden">
                    <input name="shipping_1" value="0" type="hidden">
                </div>
                <?php
            }?>

            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">

            <input id="ppcheckoutbtn" value="Paypal" class="button flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">

            </div>
        </form>
        <form action="" method="get">
            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                <a href="/carts/cart/checkout?user_id=<?= $item['user_id'] ?> "
                   class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Delete all
                </a>
            </div>
        </form>

        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
            <a href="<?= \yii\helpers\Url::to(['/products']) ?> "
               class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 cont">
                Continue shop
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
