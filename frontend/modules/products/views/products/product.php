



<div class="site-cat">
    <img src="<?= \yii\helpers\Url::to('@web/images/contact.jpg' )?>" alt="">
</div>

<div class="one_product">
    <div class="one_product_image">
        <div class="small_images">
            <?php foreach ($product -> pictures as $picture){

                ?>
                <div class="midlle_small_images">
                    <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/'.$picture->image )?>" alt="">
                </div>
                <?php
            }?>
        </div>
        <div class="larg_image">
            <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/'.$product->image) ?>"" alt="">
        </div>
    </div>
    <div class="one_product_image">
        <div class="product_title">
            <h3><?= $product->title?></h3>
            <p><?=  $product->content ?></p>
        </div>
        <div class="product_size">

            <select class="" name="size" tabindex="-1" aria-hidden="true">
                <option>Choose an option</option>
                <option>Size S</option>
                <option>Size M</option>
                <option>Size L</option>
                <option>Size XL</option>
            </select>
            <select class="" name="color" tabindex="-1" aria-hidden="true">
                <option>Choose an option</option>
                <option>RED</option>
                <option>green</option>
                <option>blue</option>
                <option>white</option>
            </select>
            <div class="flex-r-m flex-w p-t-10">
                <div class="">
                    <div class="">
                        <button class="">
                            <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                        </button>

                        <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

                        <button class="">
                            <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div class="">

                        <button class="flex-c-m">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product_sku"></div>
    </div>
</div>


