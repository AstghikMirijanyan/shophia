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
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
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
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['en', 'ru','am'],
            'enableDefaultLanguageUrlCode' => true,
            'rules' => [

                'brand/<slug:\w+>' => 'products/brand',
                'product/<slug>' => 'products/products/product',
                'products/product/<slug>' => 'products/products/product',
                '' => 'site/index',
                'blog' => 'blog/blog/index',
                'article/<slug>' => 'blog/blog/article',

                'wishlist' => 'wishlist/wishlist/index',
                'carts' => 'carts/cart',
                'checkout'=>'carts/cart/checkout',
                'search'=>'products/products',
                'products/product/carts/cart/<action:\w+>' => 'carts/cart/<action>',
                '<language:(ru|en|am)/<language:(ru|en|am)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                'products' => '/products/products',
                'products/<slug>' => 'products/products',
                'products/<slug>/<brand>' => 'products/products',
                '<action>' => 'site/<action>',
            ],
        ],

    ],
    'params' => $params,
];
