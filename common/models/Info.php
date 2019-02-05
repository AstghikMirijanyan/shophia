<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $info
 * @property string $currencies
 * @property string $title
 * @property string $text_terms
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'info', 'currencies', 'title', 'text_terms'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'info' => Yii::t('app', 'Info'),
            'currencies' => Yii::t('app', 'Currencies'),
            'title' => Yii::t('app', 'Title'),
            'text_terms' => Yii::t('app', 'Text Terms'),
        ];
    }
}
