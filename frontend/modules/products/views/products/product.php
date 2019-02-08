
    <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/'.$product->image) ?>" alt="">
  <?php foreach ($product->pictures as $picture){

      ?>
      <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/'.$picture->image) ?>" alt="">

      <?php
  }?>

