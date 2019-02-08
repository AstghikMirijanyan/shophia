<?php

namespace frontend\modules\products\controllers;


use common\models\Categories;
use common\models\Products;
use common\models\Brands;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;


class ProductsController extends Controller
{

    public function actionIndex($slug = "",$brand = "")
    {

        $categories = Categories::find()->asArray()->all();
        $products = Products::find()->orderBy(['title' => 4]);
        $brands = Brands::find()->asArray()->all();

        $brands_items =  Brands::find()->asArray()->all();
        if(!empty($brands_items)){
            $brands_items = Brands::findOne(['slug'=>$slug]);
            if (!empty($brands_items)) {
                $products = $products->where(['brand_id' => $brands_items->id]);
            }
        }


        if (!empty($slug)) {
            $category = Categories::findOne(['slug' => $slug]);

            if (!empty($category)) {
                $brands = Brands::find()->alias('b')
                    ->innerJoin('rules as bc', 'bc.brand_id = b.id')
                    ->where(['bc.cat_id' => $category->id])->asArray()->all();
                $products = $products->where(['cat_id' => $category->id]);
                if(!empty($brand)){
                    $brand_item = Brands::findOne(['slug'=>$brand]);
                    if (!empty($brand_item)) {
                        $products = $products->andWhere(['brand_id' => $brand_item->id]);
                    }
                }
            }
        }

        $pagination = new Pagination(['totalCount' => $products->count(), 'pageSize' => 9]);
        $products = $products->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();

        return $this->render('products', [
            'products' => $products,
            'categories' => $categories,
            'cat_slug' => $slug,
            'brands' => $brands,
            'pagination' => $pagination,
            'brands_items' => $brands_items
        ]);
    }

//    public function actionCategory($slug)
//    {
//        $category = Categories::findOne(['slug' => $slug]);
//        if(!empty($category)){
//
//            $data = Categories::find()->with(['categoryProducts','brands'])->where(['id'=>$category->id])->asArray()->one();
//            return $this->render('category',[
//                'result' => $data
//            ]);
//
//        }else{
//            throw new NotFoundHttpException('Category not found');
//        }
//
//    }

    public function actionProduct($slug)
    {

        $product = Products::findOne(['slug' => $slug]);
        if (!empty($product)) {
            return $this->render('product', ['product' => $product]);
        }

        throw new NotFoundHttpException('');

    }

}