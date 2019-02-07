<?php

namespace frontend\models;

use Yii;

/**
 * This is the models class for table "info".
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $info
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
            [['email', 'phone', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'info' => 'Info',
        ];
    }
}
