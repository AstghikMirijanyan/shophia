<?php
if(!empty($articles)){
    foreach ($articles as $article){
        ?>
        <div id="post-7131" class="post post-excerpt post-7131 type-post status-publish format-standard has-post-thumbnail hentry category-personal-finance">
            <div class="excerpt-thumb">
                <a href="/"><img width="150" height="150" src="https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="how to save a mortgage deposit" srcset="https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-150x150.jpg 150w, https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-300x300.jpg 300w, https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-550x550.jpg 550w, https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-130x130.jpg 130w, https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-199x199.jpg 199w, https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-515x515.jpg 515w, https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-100x100.jpg 100w, https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit-81x81.jpg 81w, https://www.miss-thrifty.co.uk/wp-content/uploads/2017/02/mortgage-deposit.jpg 600w" sizes="(max-width: 150px) 100vw, 150px"></a>
            </div>
            <div class="excerpt-info">
                <div class="post-head-title">
                    <h2><a href="<?= '/article/'.$article['slug'];?>"><?= $article['title'];?></a></h2>
                </div>
                <div class="entry">
                    <p><?= substr($article['content'],0,255);?></p>
                    <div class="post-head">
                        <p><a href="<?= '/article/'.$article['slug'];?>#comments" class="comments"><?= count($article['comments']);?> </a>
                            <span class="date"><?= date('F j, Y',strtotime($article['created_at']))?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
//?>
<div class="blog">
    <div class="middle-blog">
        <div class="blog_image">
            <img src="" alt="">
        </div>
        <div class="blog_title"></div>
        <div class="comment_blog"></div>
        <div class="date_blog">
            <p>
                <a href="<?= '/article/'.$article['slug'];?>#comments" class="comments"><?= count($article['comments']);?> </a>
                <span class="date"><?= date('F j, Y',strtotime($article['created_at']))?></span></p></div>
    </div>
    <div class="middle-blog"></div>
    <div class="middle-blog"></div>
    <div class="middle-blog"></div>

</div>