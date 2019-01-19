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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<main>
    <!--BEGIN HEADER-->
    <header>
        <div class="top_bar">
            <div class="bar_call">
                <img src="<?= \yii\helpers\Url::to('@web/images/phone.png') ?>" alt="phone">
                <a href="tel:+001555801" class="header-phone_link">Call
                    <?php
                    echo \frontend\widgets\info\InfoWidget::widget(['action' => 'phone']);
                    ?></a>
            </div>
            <div class="middle"></div>

            <div class="bar_mySelf">
                <!--TOP MENU-->

                <?php
                $menuItems = [
                    ['label' => 'Customer Service', 'url' => ['customer']],
                    ['label' => 'About', 'url' => ['about']],
                    ['label' => 'Contact', 'url' => ['contact']],
                ];
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Signup', 'url' => ['signup']];
                    $menuItems[] = ['label' => 'Login', 'url' => ['login']];
                } else {
                    $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
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
                    ['label' => 'Home', 'url' => ['index']],
                    ['label' => 'Shop', 'url' => ['products']],
                    ['label' => 'Categories', 'url' => ['categories']],
                    ['label' => 'Pages', 'url' => ['pages']],
                ];
                echo Nav::widget([
                    'options' => ['class' => 'menu_shop'],
                    'items' => $menuItems,
                ]);
                ?>
            </nav>

            <div class="title_shop">
                <a href="<?= \yii\helpers\Url::to('@web/site/index') ?>"><img
                            src="<?= \yii\helpers\Url::to('@web/images/Shophia.png') ?>" alt="logo"></a>
            </div>
            <div class="shop_tr">
                <div class="arrow"></div>
            </div>

            <div class="action_shop">
                <?= \frontend\widgets\cart\Cart::widget(); ?>
                <div class="shopping_lang">
                    <select name="currency" class="currency_select">
                        <option value="" class="currency_item">EN</option>
                        <option value="" class="currency_item">RU</option>
                        <option value="" class="currency_item">AM</option>
                    </select>
                </div>
                <!--<div class="shopping_search">-->
                <!--<form action="" method="post">-->
                <!--&lt;!&ndash;<input type="search">&ndash;&gt;-->
                <!--<button class="search_btn"><img src="images/magnifying-glass.png" name="submit" alt="search">-->
                <!--</button>-->
                <!--</form>-->
                <!--</div>-->

            </div>
        </div>
        <!--END HEADER-->
    </header>
    <!--    --><? //= Breadcrumbs::widget([
    //        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    //    ]) ?>
    <!--    --><? //= Alert::widget() ?>
    <?= $content ?>
    <!--FOOTER-->
    <footer>
        <div class="middle_footer">
            <div class="info_footer">
                <div class="shop">
                    <div class="footer-title">SHOPS</div>
                    <ul class="block">
                        <li><a href="#">New In</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Bags &amp; Accessories</a></li>
                        <li><a href="#">TopBrands</a></li>
                        <li><a href="#">Sale &amp; Special Offers</a></li>
                        <li><a href="#">Lookbook</a></li>
                    </ul>
                </div>
                <div class="shop">
                    <div class="footer-title">INFORMATION</div>
                    <ul class="block">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#">New Collection</a></li>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">Manufacturers</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Terms & condition</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="shop">
                    <div class="footer-title">CUSTOMER SERVICE</div>
                    <ul class="block">
                        <li><a href="#">Search Terms</a></li>
                        <li><a href="#">Advanced Search</a></li>
                        <li><a href="#">Orders and Returns</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">RSS</a></li>
                        <li><a href="#">Help &amp; FAQs</a></li>
                        <li><a href="#">Consultant</a></li>
                        <li><a href="#">Store Locations</a></li>
                    </ul>
                </div>
            </div>
            <div class="info_footer">
                <div class="soc_footer">
                    <div class="footer-title">STAY CONNECTED</div>
                    <div class="social_contact">
                        <div class="soc-img"><a href=""><img src="<?= \yii\helpers\Url::to('@web/images/socialimages/facebook.png') ?>" alt=""></a></div>
                        <div class="soc-img"><a href=""><img src="<?= \yii\helpers\Url::to('@web/images/socialimages/instagram.png') ?>" alt=""></a></div>
                        <div class="soc-img"><a href=""><img src="<?= \yii\helpers\Url::to('@web/images/socialimages/twitter.png') ?>" alt=""></a></div>
                        <div class="soc-img"><a href=""><img src="<?= \yii\helpers\Url::to('@web/images/socialimages/linkedin.png') ?>" alt=""></a></div>

                    </div>
                    <div class="subscribe">
                        <div class="footer-title">SUBSCRIBE&nbsp;&nbsp;<i>in</i>&nbsp;&nbsp;OUR&nbsp;&nbsp;NEWS&nbsp;&nbsp;LETTER
                        </div>
                        <form action="" class="sub_form" method="post">
                            <div>
                                <input name="email" type="text" placeholder="Enter Your Email Address">
                                <input name="submit" type="submit" value="SUBSCRIBE">
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
                <a><?php
                    echo \frontend\widgets\info\InfoWidget::widget(['action' => 'email']);
                    ?></a>
            </div>
            <div class="footer-bot__cards">
                <nav>
                    <a href=""><img src="<?= \yii\helpers\Url::to('@web/images/visa.png') ?>" alt=""></a>
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
</main>


<?php $this->endBody() ?>

<?php $this->endPage() ?>
