<?php

namespace frontend\modules\carts\controllers;

use common\models\Products;
use common\models\Cart;
use common\models\Orders;
use common\models\OrderItems;


class CartController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        }
        return parent::beforeAction($action);
    }


    public function actionAdd()
    {

        $id = \Yii::$app->request->get('id');
        $qty = \Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        if (\Yii::$app->user->isGuest) {
            return \Yii::$app->session->setFlash('ERROR', 'Please Login');
        } else {
            if (!empty($id) && !empty($qty)) {
                $user = \Yii::$app->user->id;
                $product = Products::findOne($id);
                if (!empty($product)) {
                    $errors = [];
                    $cart = Cart::findOne(['product_id' => $product->id, 'user_id' => $user]);
                    if (!empty($cart)) {
                        $cart->quantity += $qty;
                        $cart->save(false);
                    } else {
                        $new_cart = new Cart();
                        $new_cart->product_id = $product->id;
                        $new_cart->quantity = $qty;
                        $new_cart->user_id = $user;
                        if (!$new_cart->save()) {
                            $errors[] = $new_cart->errors;
                        }
                    }
                    $this->layout = false;
//                    $cart_data = Cart::findAll( ['user_id' => $user])->all();

                    return $this->render('/cart/index', [
                        'cart' => $cart
                    ]);

                }
            }
        }
    }

    public function actionCheckout()
    {
        $id = \Yii::$app->user->id;

        $cart = Cart::find()->with('product')->where(['user_id'=>$id])->asArray()->all();
        return $this->render('checkout',[
            'cart' => $cart
        ]);

    }
//
//
//    public function actionAdd()
//    {
//
//        $id = \Yii::$app->request->get('id');
//        $qty = (int)\Yii::$app->request->get('qty');
//        $qty = !$qty ? 1 : $qty;
//        $product = Products::findOne($id);
//        if (!empty($product)) {
//            $session = \Yii::$app->session;
//            $session->open();
//            $cart = new Cart();
//            $cart->addToCart($product, $qty);
//            $this->layout = false;
//            return $this->render('/cart/index', compact('session'));
//
//        }
//    }
//    public function actionClear(){
//        $session = \Yii::$app->session;
//        $session->open();
//        $session->remove('cart');
//        $session->remove('cart.qty');
//        $session->remove('cart.sum');
//        $this->layout = false;
//        return $this->render('/cart/index', compact('session'));
//    }
//
//    public function actionDelete(){
//        $id = \Yii::$app->request->get('id');
//        $session = \Yii::$app->session;
//        $session->open();
//        $cart = new Cart();
//        $cart->recalc($id);
//        $this->layout = false;
//        return $this->render('/cart/index', compact('session'));
//    }
//    public function actionShow(){
//        $session = \Yii::$app->session;
//        $session->open();
//        $this->layout = false;
//        return $this->render('/cart/index', compact('session'));
//    }
//
//    public function actionCheckout(){
//        $session = \Yii::$app->session;
//        $session->open();
//        $order = new Orders();
//        return  $this->render('/cart/checkout',[
//            'session' => $session,
//                'order' =>$order
//        ]
//      );
//
//    }

}
