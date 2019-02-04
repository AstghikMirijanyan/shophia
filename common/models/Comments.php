<?php

namespace common\models;

use frontend\behaviors\CustomBlameableBehavior;
use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $comment
 * @property int $blog_id
 * @property int $user_id
 * @property string $created_at
 *
 * @property User $user
 * @property Blog $blog
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    //totdo add blamable behavior for user_id

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment', 'blog_id', 'user_id'], 'required'],
            [['blog_id', 'user_id'], 'integer'],
            [['comment'], 'string', 'max' => 500],
            [['created_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['blog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::className(), 'targetAttribute' => ['blog_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => CustomBlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'comment' => Yii::t('app', 'Comment'),
            'blog_id' => Yii::t('app', 'Blog ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }
}
