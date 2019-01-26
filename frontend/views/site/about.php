<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

    <div class="site-cat">
        <img src="<?= \yii\helpers\Url::to('@web/images/about.jpg') ?>" alt="">
    </div>
    <div class="about_store">
        <div class="postare_store">
            <img src="<?= \yii\helpers\Url::to('@web/images/about_pos.jpg') ?>" alt="">
        </div>
        <div class="history_store">
            <h2>Our story</h2>
            <p>Phasellus egestas nisi nisi, lobortis ultricies risus semper nec. Vestibulum pharetra ac ante ut
                pellentesque. Curabitur fringilla dolor quis lorem accumsan, vitae molestie urna dapibus. Pellentesque
                porta est ac neque bibendum viverra. Vivamus lobortis magna ut interdum laoreet. Donec gravida lorem
                elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales.
                Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat.
                Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum
                rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo
                efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula. Vivamus tristique vulputate
                ultricies. Sed vitae ultrices orci.</p>
        </div>
    </div>

</div>
