<?php

/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 11.02.2019
 * Time: 1:15
 */
use yii\helpers\Url;
$this->title = 'search result';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="site-cat">
        <img src="<?= \yii\helpers\Url::to('@web/images/about.jpg') ?>" alt="">
    </div>
<?php
\yii\widgets\Pjax::begin(['enablePushState' => false]);

if (!empty($products)) {
    foreach ($products as $pr) {
        ?>

        <div class="block-product">
            <div class="product-img">
                <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/'.$pr['image']) ?>" alt="">
            </div>
            <a href="<?= \yii\helpers\Url::to(['product/' . $pr['slug']]) ?>"class="block-product-name"> <?= $pr['title'] ?></a>
            <?php

            ?>
            <span class="block-product-price"><?= $pr['price'] ?></span>
            <?php
            if (!empty($pr['sale_price'])) {
                ?>

                <span class="block-product-sale_price"><?= $pr['sale_price'] ?></span>
                <?php
            }
            ?>
        </div>

        <?php
    }
}else{
    ?>
    <h2>NO SUCH THIS PRODUCT</h2>
<?php
}
?>
<div class="clearfix"></div>
<?php
        echo \yii\widgets\LinkPager::widget(
            [
                'pagination' => $pagination,
            ]);

            \yii\widgets\Pjax::end();

    ?>