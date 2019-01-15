<?php
$this->title = 'SHOP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-product">
    <div class="site-cat">
        <img src="images/u.jpg" alt="">
    </div>
    <div class="products">
        <div class="filter">
            <div class="all-categories">
                <h2>Categories</h2>
                <ul class="middle_cat">
                    <?php
                    if (!empty($categories)) {
                        foreach ($categories as $cat) {
                            ?>
                            <li>
                                <a href=""><?= $cat['title'] ?></a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="midlle-filter"></div>
            <div class="midlle-filter"></div>
            <div class="midlle-filter"></div>
        </div>
        <div class="middle-products">
            <?php
            if (!empty($products)) {
                foreach ($products as $pr) {
                    ?>

                    <div class="block-product">
                        <div class="product-img"></div>
                        <a href="<?php echo \yii\helpers\Url::to(['/product/' . $pr['id']]) ?>"
                           class="block-product-name"> <?= $pr['title']; ?></a>
                        <?php
                        if (!empty($pr['sale_price'])) {
                            ?>
                            <span class="block-product-price"><?= $pr['price'] ?></span>
                            <span class="block-product-sale_price"><?= $pr['sale_price'] ?></span>
                            <?php
                        }
                        ?>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
    </div>


</div>