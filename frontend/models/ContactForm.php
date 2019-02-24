<?php

namespace frontend\models;

use common\models\Contact;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the models behind the contact form.
 */
class ContactForm extends ActiveRecord
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * {@inheritdoc}

     */


    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this models.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->subject = $this->subject;
        $contact->body =$this->body;
        $contact->save();

        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom(['astghik.mirijanyan@gmail.com' => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();



    }
}
