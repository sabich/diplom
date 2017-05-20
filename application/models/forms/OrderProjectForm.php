<?php

namespace app\models\forms;


use yii\base\Model;

class OrderProjectForm extends Model
{
    public $project;
    public $name;
    public $email;
    public $phone;

    public function rules()
    {
        return [
            [['project','name','phone'], 'required' ],
            [['project','name','phone'],'string', 'min'=>2,'max'=>50],
            [['email'], 'email'],
            [['phone'], 'match', 'pattern' => '/^\+?[\d() -]{5,25}$/']
        ];
    }

    public function run() {
        if ($this->validate()) {
            if (
            \Yii::$app->mailer->compose('orderProject', [
                'project' => $this->project,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ])
                ->setFrom(\Yii::$app->params['systemEmail'])
                ->setTo(\Yii::$app->params['adminEmail'])
                ->setSubject('Заказ проекта '.$this->project)
                ->send()
            ) {
                return true;
            }
        }

        return false;
    }
}