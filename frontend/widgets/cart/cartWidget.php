<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 20.02.2019
 * Time: 15:36
 */

namespace frontend\widgets\cart;
use Yii;
use common\models\Cart;

class CartWidget extends \yii\bootstrap\Widget {

    public function run() {
       $sum = 0;
       $count = 0;
        $cart = Cart::find()->where(['user_id' => Yii::$app->user->id])->asArray()->all();
           foreach ($cart as $item){

               $sum += $item['quantity'];
}

       $count  += $sum;
        return $count;

    }

}