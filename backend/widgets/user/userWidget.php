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
      if($this->info == 'all_count'){
          $users = User::find()->asArray()->all();
          $user_count = count($users);
          $orders = Orders::find()->asArray()->all();
          $order_count = count($orders);
          $wishlist = Wishlist::find()->asArray()->all();
          $wishlist_count = count($wishlist);
          $all_count= $user_count + $order_count +$wishlist_count;
          return $all_count;
      }


    }
}

