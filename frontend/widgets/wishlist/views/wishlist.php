<?php if (!empty($wishlist)){
?>
<button class="wishlist_btn">
    <img src="<?= \yii\helpers\Url::to('@web/images/wish_list_124620.png') ?>" alt="wishlist"></button>
<button class="cart_btn">
    <?php
    }else{
    ?>
    <button class="wishlist_btn">
        <img src="<?= \yii\helpers\Url::to('@web/images/like (1).png') ?>" alt="wishlist"></button>
    <button class="cart_btn">
        <?php
        } ?>


        <div class="header-cart header-dropdown ">
            <?php if (!empty($wishlist)){
            ?>
            <ul class="header-cart-wrapitem">
                <?php

                foreach ($wishlist as $wish) {

                    ?>

                    <li>

                        <div class="header-cart-item-img">
                            <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/' . $wish['product']['image']) ?>"
                                 alt="IMG">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name">
                                <?= $wish['product']['title'] ?>
                            </a>

                            <span class="header-cart-item-info">$<?= $wish['product']['price'] ?></span>
                        </div>
                        <span> <div class="carzina add_cart" data-id=<?= $wish['product']['id'] ?>><img
                                        src="<?= \yii\helpers\Url::to('@web/images/icon-header-02.png') ?>"
                                        alt=""></div></span>


                        <div style="margin-top: 26px"></div>
                        <span id=<?= $wish['id'] ?> class="glyphicon glyphicon-remove text-danger del_wish"></span>


                    </li>

                    <?php

                }
                } else {
                    ?>
                    <p><h3>Wishlist empty</h3></p>
                    <?php
                }
                ?>
                <hr class="reg_hr">
            </ul>


        </div>
