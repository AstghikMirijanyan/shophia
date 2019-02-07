<?php

namespace common\models;

use Yii;

/**
 * This is the models class for table "brands".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property string $slug
 * @property int $cat_id
 *
 * @property Categories $cat
 * @property Products[] $products
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'image', 'slug'], 'required'],
            [['content'], 'string'],
            [['cat_id'], 'integer'],
            [['title', 'image', 'slug'], 'string', 'max' => 120],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cat_id' => 'id']],
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
            'content' => Yii::t('app', 'Content'),
            'image' => Yii::t('app', 'Image'),
            'slug' => Yii::t('app', 'Slug'),
            'cat_id' => Yii::t('app', 'Cat ID'),
        ];
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
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['brand_id' => 'id']);
    }
}
