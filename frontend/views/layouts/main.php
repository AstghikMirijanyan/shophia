<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
        lang = "<?= Yii::$app->language;?>";
    </script>
</head>

<body>
<?php $this->beginBody() ?>
<main>
    <!--BEGIN HEADER-->
    <header>
        <div class="top_bar">
            <div class="bar_call">
                <img src="<?= \yii\helpers\Url::to('@web/images/phone.png') ?>" alt="phone">
                <a href="tel:+37493747123" class="header-phone_link">Call
                    <?php
                    echo \frontend\widgets\info\InfoWidget::widget(['action' => 'phone']);
                    ?></a>
            </div>
            <div class="middle"></div>


            <div class="bar_mySelf">

                <div class="languages">
                </div>
                <div class="choose_languages">
                    <div class="lang_div">
                        <a href="/am">AM</a>

                        <a href="/en">EN</a>

                        <a href="/ru">RU</a>
                    </div>


                </div>
                <!--TOP MENU-->
                <?php
                $menuItems = [

                    ['label' => Yii::t('app', 'About'), 'url' => ['/about']],
                    ['label' => Yii::t('app', 'Contact'), 'url' => ['/contact']],

                ];
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/signup']];
                    $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['login']];
                } else {
                    $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout'],
                            ['linkOptions' => ['class' => 'myCssClass']]
                        )
                        . Html::endForm()
                        . '</li>';
                }
                echo Nav::widget([
                    'options' => ['class' => 'bar_mySelf_ul'],

                    'items' => $menuItems,
                ]);

                ?>
            </div>
        </div>

        <div class="menu">

            <nav>
                <?php

                $menuItems = [
                    ['label' => Yii::t('app', 'Home'), 'url' => ['/']],
                    ['label' => Yii::t('app', 'Shop'), 'url' => ['/products']],
                    ['label' => Yii::t('app', 'Blog'), 'url' => ['/blog']],

                ];
                echo Nav::widget([
                    'options' => ['class' => 'menu_shop'],
                    'items' => $menuItems,

                ]);
                ?>
            </nav>

            <div class="title_shop">
                <a class="" href="<?= \yii\helpers\Url::to('/index') ?>"><img
                            src="<?= \yii\helpers\Url::to('@web/images/Shophia.png') ?>" alt="logo"></a>
            </div>
            <div class="shop_tr">
                <div class="arrow "></div>
            </div>

            <div class="action_shop" id="search_note">
                <div class="shopping_search">

                    <form action="<?= \yii\helpers\Url::to(['/search']) ?>" class="search_form" method="get">
                        <div>
                            <input name="search" type="search" placeholder="  search..." class="search_input">
                            <div class="btn_search">
                                <img src="<?= \yii\helpers\Url::to('@web/images/s.png') ?>" alt="">
                            </div>
                        </div>
                    </form>
                </div>
                <?= \frontend\widgets\wishlist\WishlistWidget::widget(); ?>

                <a href="/checkout"><img src="<?= \yii\helpers\Url::to('@web/images/icon-header-02.png') ?>" alt="cart"></a>


                <span class="header-icons-noti"><?= \frontend\widgets\cart\CartWidget::widget(); ?></span>


            </div>
        </div>
        <!--END HEADER-->
    </header>


    <!--    --><?php //= Breadcrumbs::widget([
    //        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    //    ]) ?>
    <?= Alert::widget() ?>


    <?= $content ?>
    <!--FOOTER-->
    <footer>
        <div class="middle_footer">
            <div class="info_footer">
                <div class="shop">
                    <div class="footer-title">SHOPS</div>
                    <ul class="block">
                        <li><a href="/products/">New In</a></li>
                        <li><a href="/products/women">Women</a></li>
                        <li><a href="/products/men">Men</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="/accessories">Bags &amp; Accessories</a></li>
                        <li><a href="#">TopBrands</a></li>
                        <li><a href="#">Sale &amp; Special Offers</a></li>
                    </ul>
                </div>
                <div class="shop">
                    <div class="footer-title">INFORMATION</div>
                    <ul class="block">
                        <li><a href="/about">About us</a></li>
                        <li><a href="#">New Collection</a></li>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="/blog">Blog</a></li>
                    </ul>
                </div>

            </div>
            <div class="info_footer">
                <div class="soc_footer">
                    <div class="footer-title">STAY CONNECTED</div>
                    <div class="social_contact">
                        <div class="soc-img"><a href=""><img
                                        src="<?= \yii\helpers\Url::to('@web/images/socialimages/facebook.png') ?>"
                                        alt=""></a></div>
                        <div class="soc-img"><a href=""><img
                                        src="<?= \yii\helpers\Url::to('@web/images/socialimages/instagram.png') ?>"
                                        alt=""></a></div>
                        <div class="soc-img"><a href=""><img
                                        src="<?= \yii\helpers\Url::to('@web/images/socialimages/twitter.png') ?>"
                                        alt=""></a></div>
                        <div class="soc-img"><a href=""><img
                                        src="<?= \yii\helpers\Url::to('@web/images/socialimages/linkedin.png') ?>"
                                        alt=""></a></div>

                    </div>
                    <div class="subscribe">
                        <div class="footer-title">SUBSCRIBE&nbsp;&nbsp;<i>in</i>&nbsp;&nbsp;OUR&nbsp;&nbsp;NEWS&nbsp;&nbsp;LETTER
                        </div>
                        <form action="" class="sub_form" method="post">
                            <div>
                                <input name="email" class="inp" type="text" placeholder="Enter Your Email Address">
                                <input name="submit" class="sub" type="submit" value="SUBSCRIBE">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="small_footer">
            <div class="hr_footer">
                <div class="sm_tr"></div>
            </div>
            <div class="copy">
                © 2017 Shopia Fashion Store Shopify.
                <br> All Rights Reserved. Ecommerce Software by Shopify.
                <br> Designed by MoccaLabs.com
                <br>
                <a style="color: #d9bf8f; text-decoration: none"><?php
                    echo \frontend\widgets\info\InfoWidget::widget(['action' => 'email']);
                    ?></a>
            </div>
            <div class="footer-bot__cards">
                <nav>
                    <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/visa (1).png') ?>" alt=""></a>
                    <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/mastercard.png') ?>" alt=""></a>
                    <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/american-express-logo.png') ?>"
                                    alt=""></a>
                    <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/discover-paying-card.png') ?>"
                                    alt=""></a>
                </nav>
            </div>
        </div>
        <!--END FOOTER-->

    </footer>

    <?php
    \yii\bootstrap\Modal::begin([
        'header' => '<h2>Product successfully added to your cart</h2>',
        'id' => 'cart',
        'size' => 'modal-lg',
        'footer' => ' <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10"  data-dismiss="modal">
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Continue shop
                                </button>
                            </div>
                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10"  >
                                <a href=" ' . \yii\helpers\Url::to(['/checkout']) . ' "  class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    View cart
                                </a>
                            </div>'
    ]);
    \yii\bootstrap\Modal::end();
    ?>


</main>


<?php $this->endBody() ?>


<?php $this->endPage() ?>
