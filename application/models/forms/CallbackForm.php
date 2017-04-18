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
            [['phone'], 'match', 'pattern' => '/^\+?[\d() -]{5,25}$/']
        ];
    }

    public function run() {
        if ($this->validate()) {
            return true;
        }

        return false;
    }
}
