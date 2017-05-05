<?php

namespace app\models\forms\admin;

use app\models\Project;
use app\models\ProjectType;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

class ProjectForm extends \yii\base\Model {
    public $id;
    public $typeId;
    public $date;
    public $article;
    public $annotation;
    public $description;

    public $cover;
    public $images;

    private $_project;

    public function setProject($project) {
        if ($project) {
            $this->id = $project->id;
            $this->typeId = $project->typeId;
            $this->date = $project->date;
            $this->article = $project->article;
            $this->annotation = $project->annotation;
            $this->description = $project->description;
            $this->_project = $project;
        }
    }

    public function getProject() {
        return $this->_project;
    }

    public function rules() {
        return [
            [['typeId', 'date', 'article', 'annotation', 'description'], 'required', 'on' => ['add', 'edit']],
            [['typeId'], 'integer', 'on' => ['add', 'edit']],
            [['typeId'], 'exist', 'targetClass' => ProjectType::className(), 'targetAttribute' => 'id', 'on' => ['add', 'edit']],
            [['date'], 'date', 'format' => 'php:Y-m-d', 'on' => ['add', 'edit']],
            [['article'], 'string', 'max' => 25, 'on' => ['add', 'edit']],
            [['annotation'], 'string', 'max' => 150, 'on' => ['add', 'edit']],
            [['description'], 'string', 'max' => 2048, 'on' => ['add', 'edit']],

            [['article'], 'unique', 'targetClass' => Project::className(), 'on' => ['add']],

            [['id'], 'required', 'on' => ['edit']],
            [['article'], 'unique', 'targetClass' => Project::className(), 'filter' => ['!=', 'id', $this->id], 'on' => ['edit']],

            [['cover'], 'image', 'on' => ['add', 'edit']],
            [['images'], 'image', 'maxFiles' => 0, 'on' => ['add', 'edit']],
        ];
    }

    public function run() {
        if ($this->validate()) {
            switch ($this->scenario) {
                case 'add' :
                    $project = new Project([
                        'typeId' => $this->typeId,
                        'date' => $this->date,
                        'article' => $this->article,
                        'annotation' => $this->annotation,
                        'description' => $this->description,
                    ]);

                    if (!$project->save()) {
                        throw new Exception('Can not save project');
                    }

                    if ($this->cover) {
                        $project->addUploadedImage($this->cover, true);
                    }

                    if ($this->images) {
                        foreach ($this->images as $image) {
                            $project->addUploadedImage($image);
                        }
                    }

                    return true;
                    break;
                case 'edit' :
                    $this->_project->typeId = $this->typeId;
                    $this->_project->date = $this->date;
                    $this->_project->article = $this->article;
                    $this->_project->annotation = $this->annotation;
                    $this->_project->description = $this->description;

                    if (!$this->_project->save()) {
                        throw new Exception('Can not save project');
                    }

                    if ($this->cover) {
                        $this->_project->addUploadedImage($this->cover, true);
                    }

                    if ($this->images) {
                        foreach ($this->images as $image) {
                            $this->_project->addUploadedImage($image);
                        }
                    }

                    break;
            }
        }

        return false;
    }

    public function getTypeIdOptions() {
        return ArrayHelper::map(
            ProjectType::find()
                ->orderBy(['name' => SORT_ASC])
                ->asArray()->all(),
            'id',
            'name'
        );
    }
}