<?php

use yii\helpers\Url;

$this->title = 'Shop';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-product">
    <div class="site-cat">
        <img src="<?= \yii\helpers\Url::to('@web/images/u.jpg') ?>" alt="">
    </div>
    <div class="products">
        <div class="filter">
            <div class="all-categories animated">
                <h2 class="animated bounceInLeft">Categories</h2>
                <ul class="middle_cat">
                    <li><a href="<?= \yii\helpers\Url::to(['/products/']) ?>">All</a></li>
                    <?php


                    if (!empty($categories)) {
                        foreach ($categories as $cat) {
                            ?>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['/products/' . $cat['slug']]) ?>"><?= $cat['title'] ?></a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="midlle-filter">

                <h2 class="animated bounceInRight">Filters</h2>
                <hr class="reg_hr">

                <h3 class="fil_pr">Price</h3>
                <div class="clearfix"></div>
                <fieldset class="filter-price">
                    <form method="get" action="<?= \yii\helpers\Url::to(['/products'])?>">
                    <div class="price-field">
                        <input type="range" name="min" min="10" max="500" value="10" id="lower">
                        <input type="range" name="max" min="100" max="500" value="500" id="upper">
                    </div>
                    <div class="price-wrap">
                        <input type="submit" class="price-title" value="FILTER" style="width: 100px">

                        <div class="price-container">
                            <div class="price-wrap-1">

                                <label for="one">$</label>
                                <input id="one" name="one">
                            </div>
                            <div class="price-wrap_line">-</div>
                            <div class="price-wrap-2">
                                <label for="two" >$</label>
                                <input id="two" name="two">

                            </div>
                        </div>
                    </div>
                    </form>
                </fieldset>
                <hr class="reg_hr">
            </div>
            <div class="midlle-filter"></div>
            <div class="midlle-filter"></div>
        </div>
        <div class="middle-products">
            <div class="brands_prod">
                <?php if (!empty($brands)) {
                    foreach ($brands as $brand) {
                        ?>
                        <ul class="brands_ul">
                            <li>
                                <?php if (!empty($cat_slug)) {
                                    ?>

                                    <a href="<?= \yii\helpers\Url::to(['/products/' . $cat_slug . '/' . $brand['slug']]) ?>">
                                        <img src="<?= \yii\helpers\Url::to('@web/images/uploads/brands/' . $brand['image']) ?>"
                                             alt=""></a>

                                    <?php

                                } else {
                                    ?>
                                    <a href="<?= \yii\helpers\Url::to(['/products/' . $brand['slug']]) ?>"> <img
                                                src="<?= \yii\helpers\Url::to('@web/images/uploads/brands/' . $brand['image']) ?>"
                                                alt=""></a>
                                    <?php
                                }
                                $cat_slug = '';
                                ?>
                            </li>
                        </ul>
                        <?php
                    }
                } ?>
            </div>
            <?php
            if (!empty($search)) {
                $search = $products;
                ?>
                <?php
            }
            \yii\widgets\Pjax::begin(['enablePushState' => false]);

            if (!empty($products)) {
                foreach ($products as $pr) {
                    ?>

                    <div class="block-product">
                        <div class="ader_product">

                            <a class="love add-to-wishlist" href="<?= \yii\helpers\Url::to(['wishlist/wishlist/add']) ?>" data-id=<?= $pr['id'] ?>>
                                <?php  if (!empty($wishlist)){
                                    foreach ($wishlist as $value){
                                        if ($value['product_id'] === $pr['id']){
                                            ?>
                                            <img src="<?= \yii\helpers\Url::to('@web/images/like.png') ?>" alt="">


                                            <?php
                                        }

                                    }
                                    ?>
                                    <img src="<?= \yii\helpers\Url::to('@web/images/heart.png') ?>" alt="">
                                <?php
                                }
                                ?>

                            </a>
                            <a href="" class="love_b"></a>
                            <a href="" class="heart"></a>
                            <a class="add_cart pr_add animated bounceIn" data-wow-duration="3s"
                               href="<?= \yii\helpers\Url::to(['carts/cart/add']) ?>"
                               data-id=<?= $pr['id'] ?> ><br>+ADD TO CART</a>

                        </div>
                        <div class=" product-img">

                            <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/' . $pr['image']) ?>"
                                 alt="">
                        </div>
                        <a data-pjax="0" href="<?= \yii\helpers\Url::to(['product/' . $pr['slug']]) ?>"
                           class="block-product-name"><h3><?= $pr['title'] ?></h3></a>
                        <?php

                        ?>
                        <?php
                        if (!empty($pr['sale_price'])) {

                            ?>
                            <div class="d30"></div>
                            <span class="block-product-price">Price:<del>  $<?= $pr['price'] ?></del></span>
                            <span class="block-product-sale_price">$<?= $pr['sale_price'] ?></span>
                            <?php
                        } else {
                            ?>
                            <span class="block-product-price">Price: $<?= $pr['price'] ?></span>
                            <?php
                        }
                        ?>
                    </div>

                    <?php
                }
            } else {
                ?>
                <div class="site-result">
                    <h2>NO SUCH PRODUCTS</h2>
                </div>

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

        </div>


    </div>


</div>

