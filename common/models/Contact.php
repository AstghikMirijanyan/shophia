<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $subject
 * @property string $body
 * @property string $created_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'subject', 'body'], 'required'],
            [['subject', 'body'], 'string'],
            [['created_at'], 'safe'],
            [['email', 'name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'subject' => 'Subject',
            'body' => 'Body',
            'created_at' => 'Created At',
        ];
    }
}
