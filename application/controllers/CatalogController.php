<?php

namespace app\controllers;

use app\models\Project;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class CatalogController extends \app\base\FrontController {
    public $layout = 'catalog';

    public function actionIndex($typeId) {
        $provider = new ActiveDataProvider([
//            'query' => Project::find()->where(['typeId' => $typeId])->orderBy(['id'=>SORT_DESC]),
            'query' => Project::find()->where(['typeId' => $typeId]),
            'pagination' => [
                'pageSize' => 9
            ]
        ]);

        return $this->render('index', ['projectsProvider' => $provider]);
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