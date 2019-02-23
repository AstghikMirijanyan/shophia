<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 20.02.2019
 * Time: 18:34
 */

namespace frontend\widgets\wishlist;;

use common\models\Wishlist;
use yii\bootstrap\Widget;

class WishlistWidget extends Widget
{
    public function run()
    {
        $id = \Yii::$app->user->id;

        $wishlist = Wishlist::find()->with('product')->where(['user_id'=>$id])->asArray()->all();
        return $this->render('wishlist',[
            'wishlist' => $wishlist
        ]);

    }

}