<?php

namespace app\controllers;

use app\models\Project;
use app\models\ProjectType;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class CatalogController extends \app\base\FrontController {
    public $layout = 'catalog';

    public function actionIndex($typeId = null) {
        if ($typeId) {
            if ($type = ProjectType::findOne($typeId)) {
                $provider = new ActiveDataProvider([
                    'query' => Project::find()->where(['typeId' => $typeId]),
                    'pagination' => [
                        'pageSize' => 9
                    ]
                ]);

                return $this->render('index', [
                    'projectsProvider' => $provider,
                    'projectType' => $type
                ]);
            }

            throw new NotFoundHttpException();
        }

        $provider = new ActiveDataProvider([
            'query' => Project::find(),
            'pagination' => [
                'pageSize' => 9
            ]
        ]);

        return $this->render('index', [
            'projectsProvider' => $provider,
            'projectType' => null
        ]);
    }

    public function actionProject($id) {
        $project = Project::findOne($id);

        if (!$project) throw new NotFoundHttpException('Проект не найден');

        return $this->render('project', [
            'project' => $project,
            'similarProjects' => Project::find()
                ->where(['typeId' => $project->typeId])
                ->andWhere(['!=', 'id', $id])
                ->orderBy(new \yii\db\Expression('RAND()'))
                ->limit(3)
                ->all()
        ]);
    }
}