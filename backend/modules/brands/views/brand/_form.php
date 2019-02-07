<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Brands */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brands-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?php
    if(!empty($model->image)){
        echo Html::img(['@home/images/uploads/brands/'.$model->image],['width' => '100px']);
    }
    ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_id')->dropDownList($categories,['prompt' => 'please select category']); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
