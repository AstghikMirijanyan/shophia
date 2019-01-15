<?php

namespace frontend\models;

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
 *
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
            [['title', 'sku'], 'required'],
            [['price', 'sale_price'], 'number'],
            [['content', 'is_new'], 'string'],
            [['cat_id', 'brand_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
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
            'cat_id' => 'Cat ID',
            'brand_id' => 'Brand ID',
            'is_new' => 'Is New',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }
}
