<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 24.02.2019
 * Time: 15:12
 */

namespace backend\widgets\user;
use common\models\User;

class userWidget extends \yii\bootstrap\Widget
{
    public function run()
    {
        $users = User::find()->orderBy(['title' => 4]);
    }
}