<?php

namespace frontend\modules\wishlist\controllers;

use common\models\Products;
use common\models\User;
use common\models\Wishlist;
use common\widgets\Alert;


class WishlistController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest){

            return $this->redirect('/login');
        }
        return parent::beforeAction($action);
    }

    public function actionAdd()
    {
        $state = \Yii::$app->request->get('state');
        if ($id = \Yii::$app->request->get('id')) {
            $wishlist = Wishlist::findOne(['product_id' => $id]);

            if (!empty($wishlist)) {
                $wishlist->delete();
            }
        }

        if(\Yii::$app->user->isGuest){
       }else{
            if(!empty($id)){
                $user = \Yii::$app->user->id;
                $product = Products::findOne($id);
                if(!empty($product)){
                    $errors = [];
                    $wish = Wishlist::findOne(['product_id'=>$product->id,'user_id'=>$user]);
                    if(!empty($wish)){
                        $wish->save(false);
                    }else{
                        $new_wish = new Wishlist();
                        $new_wish->product_id = $product->id;

                        $new_wish->user_id = $user;
                        if(!$new_wish->save()){
                            $errors[] = $new_wish->errors;
                        }
                    }


                }
            }
        }


    }
//    public function actionRemove(){
//        $wislist_id = \Yii::$app->request->get('id');
//        if (!empty($wislist_id)) {
//            $wishlist = Wishlist::findOne($wislist_id);
//            if (!empty($wishlist)) {
//                $wishlist->delete();
//            }
//            return true;
//        }
//    }

    public function actionIndex(){
        $id = \Yii::$app->user->id;

        $wishlist = Wishlist::find()->with('product')->where(['user_id'=>$id])->asArray()->all();
        return $this->render('index',[
            'wishlist' => $wishlist
        ]);
    }
}
