<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'updated_at')->input('datetime-local') ?>

    <?= $form->field($model, 'qty')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'total')->textInput(['readonly'=> true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ '0' => 'Actively', '1'=>'Completed order', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'readonly' => true]) ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
