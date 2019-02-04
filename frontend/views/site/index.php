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
            <button class="text-btn">SHOP NOW</button>
        </div>
        <div class="text-block">
            <div class="text">
                <div class="middle-text">
                    <div class="name-text">MID-SEASON</div>
                    <div class="sale">NEW</div>
                    <div class="up"><span>UP TO</span></div>
                    <div class="pr">COLLECTION</div>
                </div>
            </div>
            <button class="text-btn">SHOP NOW</button>
        </div>
        <div class="text-block">
            <div class="text">
                <div class="middle-text">
                    <div class="name-text">MID-SEASON</div>
                    <div class="sale">BEST</div>
                    <div class="up"><span>UP TO</span></div>
                    <div class="pr">COLLECTION</div>
                </div>
            </div>
            <button class="text-btn">SHOP NOW</button>
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
            <div class="title_handPicked"><h2>FOR STYLISH</h2></div>
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

                        <img src="<?= \yii\helpers\Url::to('@web/images/uploads/categories/'.$category['image']) ?>" alt="">


                    </div>
                    <div class="hide_coll">

                       <a href="" class="plus_btn">
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
            <div class="title_handPicked"><h2>Featured Products</h2></div>
            <div class="rumba">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
        </div>
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
    </div>
    <!--SUMMER COLLECTION-->
    <div class="summer_collection">
        <?php
        foreach ($feature as $feat){
            ?>
            <div class="middle_summer_collection">
            <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/'.$feat['image']) ?>" alt="">
            <div class="add_brand">
                <div class="br_a"><a href="<?php echo \yii\helpers\Url::to(['/product/' . $feat['id']]) ?>"> $<?= $feat['price']?> <br>+ADD TO CART</a></div>
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
            <div class="title_handPicked"><h2>Our Brand</h2></div>
            <div class="rumba">
                <img src="<?= \yii\helpers\Url::to('@web/images/rectangle.png') ?>" alt="">
            </div>
        </div>
        <div class="middle_handPicked line_handPicked">
            <hr class="reg_hr">
        </div>
    </div>
    <!--BRANDS-->
    <div class="brand">
        <div class="middle_brand">
            <?php

            foreach ($brands as $brand) {
                ?>
                <a href="<?= \yii\helpers\Url::to(['/products/' . $brand['slug']]) ?>"><img
                            src="<?= \yii\helpers\Url::to('@web/images/brands1.png') ?>" alt=""></a>

                <?php
            }
            ?>
        </div>
        <div class="middle_brand">
            <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/brands2.png') ?>" alt=""></a>
        </div>
        <div class="middle_brand">
            <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/brands3.png') ?>" alt=""></a>
        </div>
        <div class="middle_brand">
            <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/brands4.png') ?>" alt=""></a>
        </div>
        <div class="middle_brand">
            <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/brands5.png') ?>" alt=""></a>
        </div>
        <div class="middle_brand">
            <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/brands6.png') ?>" alt=""></a>
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
            <div class="title_handPicked"><h2>Blog</h2></div>
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