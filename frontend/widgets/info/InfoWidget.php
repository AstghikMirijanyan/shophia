<?php

namespace frontend\widgets\info;

use frontend\models\Info;

class InfoWidget extends \yii\bootstrap\Widget
{
    public $action;

    public function run(){

        if(!empty($this->action)){
            if($this->action == 'email'){
                $info = Info::find()->select('email')->asArray()->one();
                return $info['email'];
            }elseif($this->action == 'info'){
                $info = Info::find()->select('info')->asArray()->one();
                return $info['info'];
            }elseif($this->action == 'phone'){
                $info = Info::find()->select('phone')->asArray()->one();
                return $info['phone'];
            }elseif($this->action == 'languages'){
                $languages = Info::find()->select('languages')->asArray()->one();
                if(!empty($languages)){
                    $languages_info = "";
                    $languages_list = explode(',',$languages['languages']);
                    $languages_info .= '<select class="selection-1" name="time">';

                    foreach ($languages_list as $cur){
                            $languages_info .= "<option>$cur</option>";
                    }
                    $languages_info .= "</select>";
                    return $languages_info;
                }


            }
        }


    }

}