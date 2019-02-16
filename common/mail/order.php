<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 16.02.2019
 * Time: 20:08
 */


use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $item):
                $sum += $item['product']['price'];
                ?>


                <tr>
                    <td>
                        <img src="<?= yii\helpers\Url::to('@web/images/uploads/products/' . $item['product']['image']) ?>"
                             style="width: 50px"</td>
                    <td><h3>
                            <a href="<?= Url::to(['/products/product/' . $item['product']['slug']]) ?>"><?= $item['product']['title'] ?></a>
                        </h3></td>
                    <td>
                        <?= $item['quantity'] ?>
                    </td>

                    <td><?= $item['product']['price'] ?></td>
                    <?php $total = $item['product']['price'] * $item['quantity'] ?>
                    <td><?= $total ?></td>
                    <td><span data-id="<?= $item['id'] ?>" class="glyphicon glyphicon-remove text-danger del-item"
                              aria-hidden="true"></td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td colspan="3">Тotal price:</td>
                <td><?= count($cart) + $item['quantity'] - 1 ?></td>
            </tr>
            <tr>
                <td colspan="3">PRICE:</td>
                <td> <?= $sum += $total ?></td>
            </tr>
            </tbody>
        </table>
        <hr class="reg_hr">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>

        <?= Html::submitButton('checkout', ['class' => 'btn btn-success']) ?>

        <?php $form = ActiveForm::end() ?>
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
