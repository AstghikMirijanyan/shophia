<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 08.02.2019
 * Time: 23:34
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="products-form">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


    <?= $form->field($upload, 'image[]')->fileInput(['multiple' => true]) ?>
    <?= $form->field($upload, 'product_id')->dropDownList($products,['prompt' => 'please select product']); ?>

    <div class="form-group">
        <?= Html::submitButton('Upload', ['class' => $model->isNewRecord ? 'btn bn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
