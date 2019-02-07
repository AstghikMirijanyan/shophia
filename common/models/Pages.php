<?php

namespace common\models;

use Yii;

/**
 * This is the models class for table "pages".
 *
 * @property int $id
 * @property string $slug
 * @property string $description
 * @property string $larg_image
 * @property string $small_image
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug'], 'required'],
            [['description'], 'string'],
            [['slug', 'larg_image', 'small_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'Slug'),
            'description' => Yii::t('app', 'Description'),
            'larg_image' => Yii::t('app', 'Larg Image'),
            'small_image' => Yii::t('app', 'Small Image'),
        ];
    }
}
