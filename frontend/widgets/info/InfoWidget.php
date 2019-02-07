<?php

namespace frontend\widgets\info;

use frontend\models\Info;

class InfoWidget extends \yii\bootstrap\Widget
{
    public $action;

    public function run(){

        if(!empty($this->action)){
            if($this->action == 'email'){
                $info = Info::find()->where(['type'=>'email'])->asArray()->one();
            }elseif($this->action == 'info'){
                $info = Info::find()->where(['type'=>'info'])->asArray()->one();
            }elseif($this->action == 'phone'){
                $info = Info::find()->where(['type'=>'phone'])->asArray()->one();
            }elseif($this->action == 'currency'){
                $currency = Info::find()->where(['type'=>'currency'])->asArray()->one();
                if(!empty($currency)){
                    $currency_info = "";
                    $currency_list = explode(',',$currency['content']);
                    $currency_info .= '<select class="" name="time">';

                    foreach ($currency_list as $cur){
                        $currency_info .= "<option>$cur</option>";
                    }
                    $currency_info .= "</select>";
                    return $currency_info;
                }
            }

            return $info['content'];

        }


    }

}