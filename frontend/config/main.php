<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'products' => [
            'class' => 'frontend\modules\products\Module',
        ],
        'blog' => [
            'class' => 'frontend\modules\blog\Module',
        ],
        'carts' => [
            'class' => 'frontend\modules\carts\Module',
        ],

        'wishlist' => [
            'class' => 'frontend\modules\wishlist\Module',
        ],
    ],

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => ''

        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [

            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'category' => 'products/products/category',
                'brand/<slug:\w+>' => 'products/brand',
                'product/<slug>' => 'products/products/product',
                'products/product/<slug>' => 'products/products/product',

                '' => 'site/index',
                'blog' => 'blog/blog/index',
                'wishlist' => 'wishlist/wishlist/index',
                'carts' => 'carts/cart',
                'checkout'=>'carts/cart/checkout',
                'article/<slug>' => 'blog/blog/article',
                'search'=>'products/products/search',
                'products/product/carts/cart/<action:\w+>' => 'carts/cart/<action>',
                'products' => '/products/products',
                'products/<slug>' => 'products/products',
                'products/<slug>/<brand>' => 'products/products',
                '<action>' => 'site/<action>',
//                'show' => '/carts/cart/show',
                'category/<slug>' => 'products/products/category'
            ],
        ],

    ],
    'params' => $params,
];
