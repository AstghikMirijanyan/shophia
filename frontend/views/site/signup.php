<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="content">
    <div class="site-cat">
        <img src="<?= \yii\helpers\Url::to('@web/images/about.jpg') ?>" alt="">
    </div>


        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                    <?= Html::submitButton('Signup', ['class' => 'flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>

</div>
