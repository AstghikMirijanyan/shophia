<div class="site-cat">
    <img src="<?= \yii\helpers\Url::to('@web/images/contact.jpg') ?>" alt="">
</div>

<div class="one_product">
    <div class="one_product_image">
        <div class="small_images">
            <?php foreach ($product->pictures as $picture) {

                ?>
                <div class="midlle_small_images">
                    <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/' . $picture->image) ?>" alt="">
                </div>
                <?php
            } ?>
        </div>
        <div class="larg_image">
            <img src="<?= \yii\helpers\Url::to('@web/images/uploads/products/' . $product->image) ?>"" alt="">
        </div>
    </div>

    <div class="one_product_image">

        <h4 class="product-detail-name m-text16 p-b-13">
           <?= $product->title?>
        </h4>

        <span class="m-text17">$
					<?= $product->price?>
				</span>

        <p class="s-text8 p-t-10">
           <?= $product['content']?>
        </p>
<!---->
<!--                <div class="container">-->
<!--                    <span class="choose">Choose Size</span>-->
<!---->
<!--                    <div class="dropdown">-->
<!--                        <div class="select">-->
<!--                            <span>Select Size</span>-->
<!--                            <i class="fa fa-chevron-left"></i>-->
<!--                        </div>-->
<!--                        <input type="hidden" name="gender">-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li id="Size_S">Size S</li>-->
<!--                            <li id="Size_M">Size M</li>-->
<!--                            <li id="Size_L">Size L</li>-->
<!--                            <li id="Size_XL">Size XL</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!---->
<!--                    <span class="msg"></span>-->
<!--                </div>-->


            <div class="flex-r-m flex-w p-t-10">
                <div class="w-size16 flex-m flex-w">
                    <!--                            <form action="--><?//= \yii\helpers\Url::to(['@web/']) . 'cart/add' ?><!--" method="get">-->
                    <!--                                <div class="input-group mb-4">-->
                    <!--                                    <button type="button" class="quantity-left-minus btn" data-type="minus"-->
                    <!--                                            data-field=""><i-->
                    <!--                                                class="icon-minus2"></i></button>-->
                    <!--                                    <input type="text" id="quantity" name="quantity" class="form-control input-number"-->
                    <!--                                           value="1"-->
                    <!--                                           max="--><?//= $product['quantity'] ?><!--">-->
                    <!--                                    <span class="input-group-btn ml-1">-->
                    <!--                            <input type="hidden" name="id" value="--><?//= $product['id'] ?><!--">-->
                    <!--                     	</span>-->
                    <!--                                    <button type="button" class="quantity-right-plus btn" data-type="plus"-->
                    <!--                                            data-field="">-->
                    <!--                                        <i class="icon-plus2"></i>-->
                    <!--                                    </button>-->
                    <!--                                </div>-->
                    <!---->
                    <!--                                <div class="row">-->
                    <!--                                    <div class="col-sm-12 text-center">-->
                    <!--                                        <button id="btn" type="submit" class="btn-primary btn-addtocart"><i-->
                    <!--                                                    class="icon-shopping-cart"></i>Add to Cart-->
                    <!--                                        </button>-->
                    <!---->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </form>-->

                    <form method="post" action="">
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="1" max="" name="quantity" value="1" id="qty" title="Qty"
                                   class="input-text qty text" size="4"
                                   pattern="" inputmode="">
                            <input type="button" value="+" class="plus">
                            <div class="size9 trans-0-4 m-t-10 m-b-10">
                                <!-- Button -->
                                <a href="<?= \yii\helpers\Url::to(['/carts/cart/add'])?>" data-id =<?= $product['id']?> class="add_cart  flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Add to Cart
                                </a>
                            </div>
                        </div>

                    </form>


                </div>
            </div>


        <div class="p-b-45">
            <span class="s-text8 m-r-35">SKU: <?= $product->sku?></span>
            <span class="s-text8">Categories: Mug, Design</span>
        </div>


    </div>
</div>


