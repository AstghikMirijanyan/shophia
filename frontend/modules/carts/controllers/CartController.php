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
        $qty = (int)\Yii::$app->request->get('qty');
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

        $cart_id = \Yii::$app->request->get('id');
        if (!empty($cart_id)) {
            $cart = Cart::findOne($cart_id);
            if (!empty($cart)) {
                $cart->delete();
            }
        }

        if (\Yii::$app->request->get('user_id')) {
            $user_id = \Yii::$app->request->get('user_id');
            if (!empty($user_id)) {
                Cart::deleteAll(['user_id' => $user_id]);
            }

        }


        $cart = Cart::find()->with('product')->where(['user_id' => $id])->asArray()->all();
        $order = new Orders();
        if ($order->load(\Yii::$app->request->post())) {
            $order->qty = count($cart);
            $order->user_id = $id;
            if ($order->save(false)) {
                $this->saveOrederItems($cart, $order->id);
                \Yii::$app->mailer->compose('order', ['cart' => $cart])
                    ->setFrom(['astghik.mirijanyan@gmail.com' => 'Shophia.com'])
                    ->setTo($order->email)
                    ->setSubject('Shop')
                    ->send();
                foreach ($cart as $item) {
                    $user_id = $item['user_id'];
                    Cart::deleteAll(['user_id' => $user_id]);
                    return $this->refresh();
                }

            } else {
                \Yii::$app->session->setFlash('ERROR', 'YOUR ERROR');
            }
        }
        return $this->render('checkout', [
            'cart' => $cart,
            'order' => $order
        ]);

    }

    protected function saveOrederItems($items, $order_id)
    {
        foreach ($items as $id => $item) {
            $order_items = new OrderItems();
            $order_items->orders_id = $order_id;
            $order_items->product_id = $item['product_id'];
            $order_items->title = $item['product']['title'];
            $order_items->price = $item['product']['price'];
            $order_items->qty_item = $item['quantity'];
            $order_items->sum_item = $item['product']['price'] * $item['quantity'];
            $order_items->save(false);
        }
    }


}
