<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'price',
            'sale_price',
            'content:ntext',
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
            'slug',
            'is_feature',
            'available_stock',
            'quantity',
            'for_stylish',
        ],
    ]) ?>

</div>
