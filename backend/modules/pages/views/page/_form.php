<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?php
    if(!empty($model->larg_image)){
        echo Html::img(\yii\helpers\Url::to('@home/images/uploads/pages/'.$model->larg_image),['width' => '100px','class'=>'img']);

    }
    ?>
    <?php
    if(!empty($model->small_image)){
        echo Html::img(\yii\helpers\Url::to('@home/images/uploads/pages/'.$model->small_image),['width' => '100px','class'=>'img']);

    }
    ?>


    <?= $form->field($model, 'larg_image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'small_image')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
