<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 16.01.2019
 * Time: 23:20
 */

namespace frontend\widgets\cart;
use yii\bootstrap\Widget;
class Cart extends Widget
{

    public function run(){
        $products = [];
        return $this->render('cart',['products' => $products]);

    }
}