<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\products\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'sale_price') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($models, 'image') ?>

    <?php // echo $form->field($models, 'sku') ?>

    <?php // echo $form->field($models, 'cat_id') ?>

    <?php // echo $form->field($models, 'brand_id') ?>

    <?php // echo $form->field($models, 'is_new') ?>

    <?php // echo $form->field($models, 'slug') ?>

    <?php // echo $form->field($models, 'is_feature') ?>

    <?php // echo $form->field($models, 'available_stock') ?>

    <?php // echo $form->field($models, 'quantity') ?>

    <?php // echo $form->field($models, 'for_stylish') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
