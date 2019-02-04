<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\behaviors;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;


class CustomBlameableBehavior extends AttributeBehavior
{
    /**
     * @var string the attribute that will receive current user ID value
     * Set this property to false if you do not want to record the creator ID.
     */
    public $createdByAttribute = 'created_by';
    /**
     * @var string the attribute that will receive current user ID value
     * Set this property to false if you do not want to record the updater ID.
     */
    public $updatedByAttribute = 'updated_by';
    /**
     * {@inheritdoc}
     *
     * In case, when the property is `null`, the value of `Yii::$app->user->id` will be used as the value.
     */
    public $value;
    /**
     * @var mixed Default value for cases when the user is guest
     * @since 2.0.14
     */
    public $defaultValue;


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_VALIDATE => [$this->createdByAttribute, $this->updatedByAttribute],
                BaseActiveRecord::EVENT_BEFORE_VALIDATE => $this->updatedByAttribute,
            ];
        }
    }

    /**
     * {@inheritdoc}
     *
     * In case, when the [[value]] property is `null`, the value of [[defaultValue]] will be used as the value.
     */
    protected function getValue($event)
    {
        if ($this->value === null && Yii::$app->has('user')) {
            $userId = Yii::$app->get('user')->id;
            if ($userId === null) {
                return $this->getDefaultValue($event);
            }

            return $userId;
        }

        return parent::getValue($event);
    }

    /**
     * Get default value
     * @param \yii\base\Event $event
     * @return array|mixed
     * @since 2.0.14
     */
    protected function getDefaultValue($event)
    {
        if ($this->defaultValue instanceof \Closure || (is_array($this->defaultValue) && is_callable($this->defaultValue))) {
            return call_user_func($this->defaultValue, $event);
        }

        return $this->defaultValue;
    }
}
