<?php
namespace frontend\controllers;


use frontend\models\Categories;
use frontend\models\Products;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;


class ProductsController extends Controller
{

    public function actionIndex(){

        $categories = Categories::find()->asArray()->all();
        $products = Products::find()->orderBy(['title'=>4]);

        if(!empty(\Yii::$app->request->get('slug'))){
            $cat_slug = Yii::$app->request->get('slug');
            $category = Categories::findOne(['slug'=>$cat_slug]);
            if(!empty($category)){

                $products = $products->where(['cat_id' => $category->id]);

            }
        }

        $products = $products->asArray()->all();
        return $this->render('products',[
            'products' => $products,
            'categories' => $categories
        ]);
    }


    public function actionCategory($slug){

        $category = Categories::findOne(['slug' => $slug]);
        if(!empty($category)){

            $data = Categories::find()->with(['categoryProducts','brands'])->where(['id'=>$category->id])->asArray()->one();
            return $this->render('category',[
               'result' => $data
            ]);

        }else{
            throw new NotFoundHttpException('Category not found');
        }

    }

    public function actionProduct($id){

        $product = Products::findOne($id);
        if(!empty($product)){
            return $this->render('product',['product'=>$product]);
        }

        throw new NotFoundHttpException('');

    }

}