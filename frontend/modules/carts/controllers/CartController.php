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
        if(\Yii::$app->user->isGuest){
            return $this->redirect('/login');
        }
        return parent::beforeAction($action);
    }


    public function actionAddCart(){

        $id = \Yii::$app->request->get('id');
        $qty = \Yii::$app->request->get('qty');

        if(\Yii::$app->user->isGuest){
            return json_encode(['error' => 'Please Login to your account to be able to add products!']);
        }else{
            if(!empty($id) && !empty($qty)){
                $user = \Yii::$app->user->id;
                $product = Products::findOne($id);
                if(!empty($product)){
                    $errors = [];
                    $cart = Cart::findOne(['product_id'=>$product->id,'user_id'=>$user]);
                    if(!empty($cart)){
                        $cart ->quantity += $qty;
                        $cart->save(false);
                    }else{
                        $new_cart = new Cart();
                        $new_cart->product_id = $product->id;
                        $new_cart->quantity = $qty;
                        $new_cart->user_id = $user;
                        if(!$new_cart->save()){
                            $errors[] = $new_cart->errors;
                        }
                    }

                    return json_encode(['success' => true,'errors' => $errors]);

                }
            }
        }
    }

//    public function actionIndex()
//    {
//        return $this->render('index');
//    }
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
