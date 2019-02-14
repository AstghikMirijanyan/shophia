<?php
if (!empty($wishlist)):

    ?>
    <div class="table">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>

                <th>Price</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($wishlist as $id=>$item): ?>
<?= var_dump($item);die();?>
                <tr>
                    <td> <img src="<?= yii\helpers\Url::to('@web/images/uploads/products/'.$item['image'])?>" style="width: 50px" </td>
                    <td><?= $item['title'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>cart empty</h3>
<?php endif; ?>
