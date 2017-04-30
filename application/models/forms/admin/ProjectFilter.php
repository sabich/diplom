<?php

namespace app\models\forms\admin;

use app\models\Project;
use app\models\ProjectType;
use yii\data\ActiveDataProvider;


class ProjectFilter extends \yii\base\Model {
    public $typeId;
    public $article;

    public function rules() {
        return [
            [['typeId'], 'integer'],
            [['typeId'], 'exist', 'targetClass' => ProjectType::className(), 'targetAttribute' => 'id'],
            [['article'], 'string', 'max' => 25]
        ];
    }

    public function getProvider() {
        $this->validate();

        $query = Project::find()->orderBy(['date' => SORT_DESC]);

        if ($this->typeId && !$this->hasErrors('typeId')) {
            $query->andWhere(['typeId' => $this->typeId]);
        }

        if ($this->article && !$this->hasErrors('article')) {
            $query->andWhere(['like', 'article', $this->article]);
        }

        return new ActiveDataProvider([
            'query' => $query
        ]);
    }
}