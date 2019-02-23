<?php

/* @var $this yii\web\View */

$this->title = 'OUR FEATURED PRODUCTS';
?>
<div class="site-index">

    <div class="jumbotron">
        <?php foreach ($featured as $feat) {
            ?>
            <div class="backend_images">

                    <img src="<?= \yii\helpers\Url::to('@home/images/uploads/products/' . $feat['image']) ?>" alt="">

            </div>

            <?php
        } ?>
    </div>
</div>
