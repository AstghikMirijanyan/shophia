<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Rules */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rules-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'cat_id')->dropDownList($categories,['prompt' => 'please select category']); ?>
    <?= $form->field($model, 'brand_id')->dropDownList($brands,['prompt' => 'please select brand']); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
