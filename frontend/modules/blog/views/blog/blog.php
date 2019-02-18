<?php
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->registerJs(
    '$("document").ready(function(){ 
        $("#new_comment").on("pjax:end", function() {
            $.pjax.reload({container:"#comments"});  //Reload GridView
            $("#comments-comment").val("");
        });
    });'
);
?>
<div class="site-cat">
    <img src="<?= \yii\helpers\Url::to('@web/images/rawpixel-769354-unsplash.jpg') ?>" alt="">
</div>
<p><?= $article['content']?></p>
<?php
?>
<?php Pjax::begin(['id' => 'comments']) ?>
<div style="margin: 20px 0;border: 1px solid;padding: 10px;overflow-y: scroll;height: 300px">
    <ul>
    <?php
    if(!empty($article['comments'])){
        foreach ($article['comments'] as $comm){
            ?>
            <li style="border-bottom: 1px solid darkslateblue;padding: 5px 0">
                <div><p><strong><?= $comm['user']['username'];?></strong></p></div>
                <div><p><?= $comm['comment'];?></p></div>
                <div><time><?= date('H:i  - F j, Y',strtotime($comm['created_at'])); ?></time></div>
            </li>
            <?php
        }
    }
    ?>
    </ul>
</div>
<?php Pjax::end() ?>
<?php
if(!Yii::$app->user->isGuest){
    Pjax::begin(['id' => 'new_comment']);
    $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]);

       echo  $form->field($comment,'comment')->textarea();
//      echo  $form->field($comment,'blog_id')->hiddenInput(['value' => $article['id']])->label(false);
      echo '<div class="form-group">';
      echo  Html::submitButton('Send',['class'=>'btn btn-success']);
        echo '</div>';

    ActiveForm::end();
    Pjax::end();
}

?>
