<button class="wishlist_btn">

        <img src="<?= \yii\helpers\Url::to('@web/images/like (1).png') ?>" alt="wishlist"></button>
<button class="cart_btn">




    <!-- Header cart noti -->
    <div class="header-cart header-dropdown ">

        <ul class="header-cart-wrapitem">
            <?php  foreach ($wishlist as $wish){

                ?>

                 <li>

                <div class="header-cart-item-img">
                    <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/' . $wish['product']['image']) ?>" alt="IMG">
                </div>

                <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                        <?= $wish['product']['title']?>
                    </a>

                    <span class="header-cart-item-info">$<?= $wish['product']['price']?></span>
                </div>
                     <span> <div class="carzina cart_add" data-id=<?= $wish['product']['id'] ?>><img src="<?= \yii\helpers\Url::to('@web/images/icon-header-02.png') ?>" alt=""></div></span>
                     <a href=""><span class="glyphicon glyphicon-remove text-danger del-item wish_del" aria-hidden="true"></span></a>

                </li>

            <?php

            }?>
            <hr class="reg_hr">
        </ul>




    </div>
