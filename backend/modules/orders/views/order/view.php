<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

    <h2>View order N<?= $model->id ?></h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
//            'total',
//            'status',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">Actively</span>
' : '<span class="text-success">Completed order</span> ',
                'format' => 'raw'
            ],
            'name',
            'email:email',
            'phone',
            'address',
//            'user_id',
        ],
    ]) ?>
    <?php $items = $model->orderItems; ?>
    <div class="table">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item):
                $sum += $item['price'];
                ?>


                <tr>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['/products/product/view', 'id' => $item['product_id']]) ?>"><?= $item['title'] ?></a>
                    </td>

                    <td><?= $item['qty_item'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <?php $sum = $item['qty_item'] * $item['price'] ?>
                    <td><?= $sum ?></td>
                </tr>
                <?php $total += $sum ?>

            <?php endforeach; ?>
            <tr>
                <td>TOTAL:</td>

                <td></td>
                <td></td>

                <td><?= $total ?> </td>
            </tr>
            </tbody>
        </table>
    </div>
