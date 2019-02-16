<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="site-cat">
        <img src="<?= \yii\helpers\Url::to('@web/images/about_pos.jpg' )?>" alt="">
    </div>

        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                    <?= Html::submitButton('Login', ['class' => 'flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>

</div>
