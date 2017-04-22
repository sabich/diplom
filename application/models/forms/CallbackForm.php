<?php

namespace app\models\forms;

class CallbackForm extends \yii\base\Model {
    public $name;
    public $phone;
    public $hour;
    public $minute;

    public function rules() {
        return [
            [['name', 'phone'], 'required'],
            [['name'], 'string', 'min' => 2, 'max' => 20],
            [['phone'], 'match', 'pattern' => '/^\+?[\d() -]{5,25}$/'],
            [['hour'], 'integer', 'min' => 9, 'max' => 18],
            [['minute'], 'integer', 'min' => 0, 'max' => 59]
        ];
    }

    public function run() {
        if ($this->validate()) {
            if (
                \Yii::$app->mailer->compose('callback', [
                    'name' => $this->name,
                    'phone' => $this->phone,
                    'time' => $this->time
                ])
                ->setFrom(\Yii::$app->params['systemEmail'])
                ->setTo(\Yii::$app->params['adminEmail'])
                ->setSubject('Запрос обратного звонка')
                ->send()
            ) {
                return true;
            }
        }

        return false;
    }

    public function getTime() {
        if ($this->hour) {
            return $this->minute ? $this->hour . ':' . $this->minute : $this->hour . ':00';
        }

        return date('H:i');
    }
}
