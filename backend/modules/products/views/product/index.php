<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\products\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            'price',
            'sale_price',
//            'content:ntext',

            [
                'attribute' => 'image',
                'format' => 'raw',
                'filter'=> '',
                'value' => function($model){
                    return Html::img(\yii\helpers\Url::to('@home/images/uploads/products/'.$model->image),['width' => '100px','class'=>'img']);
                }
            ] ,
            'sku',
            'cat_id',
            'brand_id',
            'is_new',
            //'slug',
            //'is_feature',
            //'available_stock',
            //'quantity',
            //'for_stylish',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>


