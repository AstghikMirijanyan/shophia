<?php

use yii\helpers\Url;

/* @var $this yii\web\View */


$this->title = 'Shophia';
?>


<div class="content">
    <div class="fromSlider">
        <div class="text-block">
            <div class="text">
                <div class="middle-text">
                    <div class="name-text">MID-SEASON</div>
                    <div class="sale">SALE</div>
                    <div class="up"><span>UP TO</span></div>
                    <div class="pr">50% OFF</div>
                </div>

            </div>
            <button class="text-btn"><a href="/products" style="color: white">SHOP NOW</a></button>
        </div>

    </div>
    <!--SLIDER-->
    <div class="slickslider">

        <div><img src="<?= \yii\helpers\Url::to('@web/images/sliderImages/slidone.png') ?>" alt="slider"></div>
        <div><img src="<?= \yii\helpers\Url::to('@web/images/sliderImages/slide02.jpg') ?>" alt="slider"></div>
        <div>
            <img src="<?= \yii\helpers\Url::to('@web/images/sliderImages//49263811_681024278965824_3871820800101187584_n.jpg') ?>"
                 alt="slider"></div>
    </div>
    <!--END SLIDER-->
    <div class="support">
        <div class="middle_support">
            <div class="left">
                <div class="triangle_img"><img src="<?= \yii\helpers\Url::to('@web/images/pilote.png') ?>" alt=""></div>
                <div class="terms">
                    <div class="title-terms">FREE SHIPPING</div>
                    <div class="text-terms">In Order Min $200</div>
                </div>
            </div>
        </div>
        <div class="middle_support">
            <div class="center">
                <div class="triangle"><img src="<?= \yii\helpers\Url::to('@web/images/clack.png') ?>" alt=""></div>
                <div class="terms center_terms">
                    <div class="title-terms">30-DAYS RETURNS</div>
                    <div class="text-terms">Money Back Guarantee</div>
                </div>
            </div>
        </div>
        <div class="middle_support">
            <div class="right">
                <div class="triangle triangle_right"><img src="<?= \yii\helpers\Url::to('@web/images/ball.png') ?>"
                                                          alt=""></div>
                <div class="terms center_terms">
                    <div class="title-terms">24/7 SUPPORT</div>
                    <div class="text-terms terms_right">Lifestyme Support</div>
                </div>
            </div>
        </div>
    </div>
    <div class="handPicked">
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
        <div class="middle_handPicked">
            <div class="rumba rumba_left">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
            <div class="title_handPicked"><h2 class="animated bounceInLeft"
                                              data-wow-duration="3s"><?= Yii::t('app', 'CATEGORIES'); ?></h2></div>
            <div class="rumba">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
        </div>
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
    </div>
    <!--COLLECTION-->
    <div class="collection">
        <?php if (!empty($categories)) {
            foreach ($categories as $category) {

                ?>
                <div class="middle_collection">
                    <div class="small_collection">

                        <img src="<?= \yii\helpers\Url::to('@web/images/uploads/categories/' . $category['image']) ?>"
                             alt="">


                    </div>
                    <div class="hide_coll">

                        <a data-pjax="0" href="<?= \yii\helpers\Url::to(['/products/' . $category['slug']]) ?>"
                           class="plus_btn animated bounceInUp">
                            <?php
                            echo $category['title'];
                            ?>
                        </a>

                    </div>
                </div>
                <?php

            }
        } ?>

    </div>
    <div class="handPicked">
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
        <div class="middle_handPicked">
            <div class="rumba rumba_left">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
            <div class="title_handPicked"><h2><?= Yii::t('app', 'Featured Products'); ?></h2>
            </div>
            <div class="rumba">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
        </div>
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
    </div>
    <div class="summer_collection">
        <?php
        foreach ($feature as $feat) {
            ?>
            <div class="middle_summer_collection">


                <?php if (!empty($wishlist)) {
                    foreach ($wishlist as $wish) {
                        if ($wish['product_id'] === $feat['id']){
                            ?>
                            <div class="index_heart">
                                <form action="<?= \yii\helpers\Url::to(['/wishlist/wishlist/add']) ?>" method="get">

                                    <input checked id="product_<?= $feat['id'] ?>" type="checkbox"
                                           class="input_class_checkbox"
                                           name="wishlist" data-id="<?= $feat['id'] ?>" value="<?= $feat['id'] ?>">

                                    <label for="product_<?= $feat['id'] ?>" class="class_checkbox"></label>

                                </form>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="index_heart">
                                <form action="<?= \yii\helpers\Url::to(['/wishlist/wishlist/add']) ?>" method="get">

                                    <input  id="product_<?= $feat['id'] ?>" type="checkbox"
                                           class="input_class_checkbox"
                                           name="wishlist" data-id="<?= $feat['id'] ?>" value="<?= $feat['id'] ?>">

                                    <label for="product_<?= $feat['id'] ?>" class="class_checkbox"></label>

                                </form>
                            </div>
                            <?php
                        }
                    }


                }else{
                    ?>
                    <div class="index_heart">
                        <form action="<?= \yii\helpers\Url::to(['/wishlist/wishlist/add']) ?>" method="get">

                            <input  id="product_<?= $feat['id'] ?>" type="checkbox"
                                    class="input_class_checkbox"
                                    name="wishlist" data-id="<?= $feat['id'] ?>" value="<?= $feat['id'] ?>">

                            <label for="product_<?= $feat['id'] ?>" class="class_checkbox"></label>

                        </form>
                    </div>
                    <?php

                } ?>


                <a style="cursor: pointer" href="<?= \yii\helpers\Url::to(['/product/' . $feat['slug']]) ?>">
                    <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/' . $feat['image']) ?>" alt="">
                </a>
                <div class="add_brand">
                    <div class="br_a">
                        <span data-id=<?= $feat['id'] ?> class="add_cart" > $<?= $feat['price'] ?>
                        <br><?= Yii::t('app', '+ADD TO CART'); ?></span></div>

                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="handPicked">
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
        <div class="middle_handPicked">

            <div class="rumba rumba_left">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
            <div class="title_handPicked"><h2 class=""
                                              data-wow-duration="3s"><?= Yii::t('app', 'OUR BRANDS'); ?></h2>
            </div>
            <div class="rumba">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
        </div>
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
    </div>
    <!--BRANDS-->

    <div class="brand brand_carousel">
        <?php foreach ($brands as $brand) {
            ?>
            <div class="middle_brand">

                <a href="<?php echo \yii\helpers\Url::to(['/products/' . $brand['slug']]) ?>">
                    <img src="<?= \yii\helpers\Url::to('@web/images/uploads/brands/' . $brand['image']) ?>" alt="">
                </a>
            </div>
            <?php
        } ?>

    </div>
    <div class="handPicked">
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
        <div class="middle_handPicked">
            <div class="rumba rumba_left">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
            <div class="title_handPicked">
                <h2><?= Yii::t('app', 'BLOG'); ?></h2></div>
            <div class="rumba">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
        </div>
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
    </div>
    <!--CUSTOMERS-->
    <div class="customers">
        <div class="middle_customers">
            <div class="small_customers">
                <img src="<?= \yii\helpers\Url::to('@web/images/sandra.png') ?>" alt="stylish">
            </div>
            <div class="small_customers">
                <div class="txt_cust"></div>
                <div class="text_cust">
                    <div class="sandra_text">
                        Sed ut perspiciatis <br> unde omnis iste natus error sit voluptatet accusantium doloremque
                    </div>
                    <div class="name_stylish">Sandra Dewi</div>
                    <div class="profession">FASHION STYLISH</div>
                </div>
            </div>
        </div>
        <div class="cust">
            <div class="arrow-up"></div>
        </div>
        <div class="middle_customers">
            <div class="small_customers">
                <div class="txt_cust">

                </div>
                <div class="text_cust shaheer_txt">
                    <div class="sandra_text shaheer_txt">

                        Sed ut perspiciatis <br> unde omnis iste natus error sit voluptatet accusantium doloremque
                    </div>
                    <div class="name_stylish">Shaheer Sheikh</div>
                    <div class="profession">DESIGNER</div>
                </div>
            </div>
            <img src="<?= \yii\helpers\Url::to('@web/images/shaheer.png') ?>" alt="stylish">
        </div>
    </div>

</div>
<!--END CONTENT-->