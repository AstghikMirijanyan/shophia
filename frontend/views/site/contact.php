<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">

    <div class="site-cat">
        <img src="<?= \yii\helpers\Url::to('@web/images/C_3_M01_16_imgMedia_it.jpg' )?>" alt="">
    </div>

    <div class="contact_row">
        <div class="contact_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3020.441147079428!2d43.845026214818446!3d40.79629874039209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4041fbebe00c88a5%3A0x5a8ea8dc70b0bdfc!2zNSBQcm9zaHlhbiBTdHJlZXQsIEd5dW1yaSwg0JDRgNC80LXQvdC40Y8!5e0!3m2!1sru!2s!4v1551000583033" width="660" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-contact">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'contact_submit', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
