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
 * @property Brands $brand
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
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'price' => Yii::t('app', 'Price'),
            'sale_price' => Yii::t('app', 'Sale Price'),
            'content' => Yii::t('app', 'Content'),
            'image' => Yii::t('app', 'Image'),
            'sku' => Yii::t('app', 'Sku'),
            'cat_id' => Yii::t('app', 'Cat ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'is_new' => Yii::t('app', 'Is New'),
            'slug' => Yii::t('app', 'Slug'),
            'is_feature' => Yii::t('app', 'Is Feature'),
            'available_stock' => Yii::t('app', 'Available Stock'),
            'quantity' => Yii::t('app', 'Quantity'),
            'for_stylish' => Yii::t('app', 'For Stylish'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }
    public function getPictures(){
        return $this->hasMany(Pictures::className(),['product_id'=> 'id']);
    }
}
