<?php

namespace app\models\forms;

use yii\base\Model;

class OrderForm extends Model {
    public $name;
    public $phone;
    public $city;
    public $project;

    public function rules()
    {
        return [
            [['name','phone','city', 'project'], 'required' ],
            [['name','city','project'],'string', 'min'=>2,'max'=>50],
            [['phone'], 'match', 'pattern' => '/^\+?[\d() -]{5,25}$/']
        ];
    }

    public function run() {
        if ($this->validate()) {
            if (
            \Yii::$app->mailer->compose('order', [
                'name' => $this->name,
                'phone' => $this->phone,
                'city' => $this->city,
                'project' => $this->project,
            ])
                ->setFrom(\Yii::$app->params['systemEmail'])
                ->setTo(\Yii::$app->params['adminEmail'])
                ->setSubject('Заказ проекта')
                ->send()
            ) {
                return true;
            }
        }

        return false;
    }
}