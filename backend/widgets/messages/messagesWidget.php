<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 24.02.2019
 * Time: 15:54
 */
namespace backend\widgets\messages;

use common\models\Contact;

class messagesWidget extends  \yii\bootstrap\Widget
{

    public $count;

 public function run()
 {

     if($this->count == 'count'){
         $count = Contact::find()->all();
         return count($count);
     }

     $messages = Contact::find()->asArray()->all();
     return $this->render('messages',[
       'messages' => $messages,
     ]);

 }
}