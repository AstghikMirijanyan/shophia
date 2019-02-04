<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $image
 * @property string $url
 * @property string $text
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['url', 'text'], 'string'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'url' => Yii::t('app', 'Url'),
            'text' => Yii::t('app', 'Text'),
        ];
    }
}
