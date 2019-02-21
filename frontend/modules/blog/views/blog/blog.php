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
<div class="site-cat blog_img"  style="margin-bottom: 30px">
    <img src="<?= \yii\helpers\Url::to('@web/images/uploads/blog/' . $article['image']) ?>" alt="">
    <div style="position: absolute;
     margin-top: -250px; z-index: 20; margin-left: 100px; "><h2 style="font-size: 35px; color: white"><?= $article['title']?></h2></div>
</div>

<p class="cont_bl"><?= $article['content']?></p>
<?php
?>
<?php Pjax::begin(['id' => 'comments']) ?>
<div style="margin: 0 auto; width: 90%;border: 1px solid;padding: 10px;overflow-y: scroll;height: 300px">
    <ul>
    <?php
    if(!empty($article['comments'])){
        foreach ($article['comments'] as $comm){
            ?>
            <li style="border-bottom: 1px solid darkslateblue;padding: 5px 0">
                <div><p><strong style="color: black"><?= $comm['user']['username'];?></strong></p></div>
                <div><p style="color: #9e9e9e"><?= $comm['comment'];?></p></div>
                <div><time style="color: #7f7e7e"><?= date('H:i  - F j, Y',strtotime($comm['created_at'])); ?></time></div>
            </li>
            <?php
        }
    }
    ?>
    </ul>
</div>
<?php Pjax::end() ?>
<div style="width: 90%; margin: 0 auto">
<?php

if(!Yii::$app->user->isGuest){
    Pjax::begin(['id' => 'new_comment']);
    $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]);

       echo  $form->field($comment,'comment')->textarea();
//      echo  $form->field($comment,'blog_id')->hiddenInput(['value' => $article['id']])->label(false);
      echo '<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">';
      echo  Html::submitButton('Send',['class' => 'flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4']);
        echo '</div>';

    ActiveForm::end();
    Pjax::end();
}

?>
</div>