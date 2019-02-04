<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property double $price
 * @property double $sale_price
 * @property string $content
 * @property string $image
 * @property string $sku
 * @property int $cat_id
 * @property int $brand_id
 * @property string $is_new
 * @property string $slug
 * @property string $is_feature
 * @property int $available_stock
 * @property int $quantity
 * @property string $for_stylish
 *
 * @property Cart[] $carts
 * @property Categories $cat
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'sku', 'slug', 'available_stock', 'quantity'], 'required'],
            [['price', 'sale_price'], 'number'],
            [['content', 'is_new', 'is_feature', 'for_stylish'], 'string'],
            [['cat_id', 'brand_id', 'available_stock', 'quantity'], 'integer'],
            [['title', 'image', 'slug'], 'string', 'max' => 255],
            [['sku'], 'string', 'max' => 120],
            [['sku'], 'unique'],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'sale_price' => 'Sale Price',
            'content' => 'Content',
            'image' => 'Image',
            'sku' => 'Sku',
            'cat_id' => 'Category',
            'brand_id' => 'Brand',
            'is_new' => 'Is New',
            'slug' => 'Slug',
            'is_feature' => 'Is Feature',
            'available_stock' => 'Available Stock',
            'quantity' => 'Quantity',
            'for_stylish' => 'For Stylish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }
}
