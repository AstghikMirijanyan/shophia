<div class="site-cat check">
    <img src="<?= \yii\helpers\Url::to('@web/images/photo-1493219686142-5a8641badc78.jpg') ?>" alt="">
</div>
<div class="blog">
    <?php
    if(!empty($articles)){
    foreach ($articles as $article){
    ?>
    <div class="middle-blog">
        <div class="blog_image animated bounceInDown">
            <a href="<?= '/article/'.$article['slug'];?>"><img src="<?= \yii\helpers\Url::to('@web/images/uploads/blog/' . $article['image']) ?>" style="width: 100%; height: 320px" alt=""></a>
        </div>
        <div class="blog_title">
            <h2><a style="color: black; text-decoration: none" href="<?= '/article/'.$article['slug'];?>"><?= $article['title'];?></a></h2>
        </div>
        <div class="comment_blog">
            <p><?= substr($article['content'],0,155).'...';?><a href="<?= '/article/'.$article['slug'];?>"><img src="<?= \yii\helpers\Url::to('@web/images/regkn.png') ?>" alt=""></a></p>
        </div>
        <div class="date_blog">
            <p>
                <a href="<?= '/article/'.$article['slug'];?>#comments" class="comments"><img style="width: 20px" src="<?= \yii\helpers\Url::to('@web/images/comment.png') ?>" alt=""><i style="color:#000; font-size: 15px"><?= count($article['comments']);?></i> </a>
                <span class="date"><?= date('F j, Y',strtotime($article['created_at']))?></span></p></div>
    </div>

        <?php
    }
}
?>
</div>