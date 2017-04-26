<?php

namespace app\models\forms\admin;

use app\models\Project;
use app\models\ProjectType;

class ProjectForm extends \yii\base\Model {
    public $id;
    public $typeId;
    public $date;
    public $article;
    public $annotation;
    public $description;

    public $cover;

    public function rules() {
        return [
            [['typeId', 'date', 'article', 'annotation', 'description'], 'require', 'on' => ['add', 'edit']],
            [['typeId'], 'integer', 'on' => ['add', 'edit']],
            [['typeId'], 'exist', 'targetClass' => ProjectType::className(), 'targetAttribute' => 'id', 'on' => ['add', 'edit']],
            [['date'], 'date', 'format' => 'php:Y-m-d', 'on' => ['add', 'edit']],
            [['article'], 'string', 'max' => 25, 'on' => ['add', 'edit']],
            [['annotation'], 'string', 'max' => 150, 'on' => ['add', 'edit']],
            [['description'], 'string', 'max' => 2048, 'on' => ['add', 'edit']],

            [['article'], 'unique', 'targetClass' => Project::className(), 'on' => ['add']],

            [['id'], 'required', 'on' => ['edit']],
            [['article'], 'unique', 'targetClass' => Project::className(), 'filter' => ['!=', 'id', $this->id], 'on' => ['edit']]
        ];
    }

    public function run() {
        if ($this->validate()) {
            return true;
        }

        return false;
    }
}