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
        <img src="<?= \yii\helpers\Url::to('@web/images/contact.jpg' )?>" alt="">
    </div>

    <div class="contact_row">
        <div class="contact_map">
            <div class="distance">
                <?php
                if (isset($_POST['submit'])) {
                    $org = $_POST['org'];
                    $des = $_POST['des'];
                    $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$org."&destinations=".$des."&key=AIzaSyDbtuTAE3HgjrdjWRBHCf8ZJQWY5kY41mw");
                    $data = json_decode($api, true);

                    ?>
                    <div class="res">
                        <label><b>Distance: </b></label> <span><?php echo ((int)$data['rows'][0]['elements'][0]['distance']['value'] / 1000).' Km'; ?></span> <br><br>
                        <label><b>Travel Time: </b></label> <span><?php echo $data['rows'][0]['elements'][0]['duration']['text']; ?></span>
                    </div>
                    <?php

                }

                ?>
                <div class="between">
                    <h2 class="dis">Calculate the distance between two address</h2>
                    <div class="inpDiv">
                        <form action="/contact" id="form" method="post">
                            from<input type="text" name="org" id="org"/>
                            to<input type="text" name="des" id="des"/>
                            <input type="submit" name="submit" id="button" value="calculate">
                        </form>
                    </div>

                </div>

                <div id="map">
                    <iframe
                            width="580"
                            height="450"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/directions
  ?key=AIzaSyDbtuTAE3HgjrdjWRBHCf8ZJQWY5kY41mw
  &origin=<?= $org?>
  &destination=<?=$des?>
  &avoid=tolls|highways">
                    </iframe>
                    </iframe>
<!--                    <iframe width="100%" height="650" frameborder="0" style="border:0"-->
<!--                            src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDbtuTAE3HgjrdjWRBHCf8ZJQWY5kY41mw&origin=--><?//= $org; ?><!--&destination=--><?//= $des; ?><!--"-->
<!--                            allowfullscreen>-->
<!--                    </iframe>-->
                </div>
            </div>
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
