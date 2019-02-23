<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'css/slick.css',
        'css/animate.css',
        'css/xzoom.css'


    ];
    public $js = [
        'js/wow.min.js',
        'js/slick.js',
        'js/xzoom.js',
        'js/script.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
