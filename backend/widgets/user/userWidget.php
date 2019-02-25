<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 24.02.2019
 * Time: 15:12
 */

namespace backend\widgets\user;
use common\models\Orders;
use common\models\User;
use common\models\Wishlist;

class userWidget extends \yii\bootstrap\Widget
{
    public $info;




    public function run()
    {
      if ($this->info == 'user_count'){
          $users = User::find()->asArray()->all();
          $user_count = count($users);
          return $user_count;
      }
      if ($this->info == 'order_count'){
          $orders = Orders::find()->asArray()->all();
          $order_count = count($orders);
          return $order_count;
      }
      if ($this->info == 'wishlist_count'){
          $wishlist = Wishlist::find()->asArray()->all();
          $wishlist_count = count($wishlist);
          return $wishlist_count;
      }


    }
}


//
//public $action;
//
//public function run(){
//
//    if(!empty($this->action)){
//        if($this->action == 'email'){
//            $info = Info::find()->where(['type'=>'email'])->asArray()->one();
//        }elseif($this->action == 'info'){
//            $info = Info::find()->where(['type'=>'info'])->asArray()->one();
//        }elseif($this->action == 'phone'){
//            $info = Info::find()->where(['type'=>'phone'])->asArray()->one();