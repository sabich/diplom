<?php

namespace app\controllers;

use app\base\FrontController;
use app\models\Project;
use app\models\ProjectType;
use app\models\Design;
use app\models\DesignType;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\NotFoundHttpException;

/**
 * Class CatalogController
 * @package app\controllers
 */
class CatalogController extends FrontController {
    /**
     * @var string
     */
    public $layout = 'catalog';

    /**
     * @param null $typeId
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionProjects($typeId = null) {
        if ($typeId) {
            if ($type = ProjectType::findOne($typeId)) {
                $provider = new ActiveDataProvider([
                    'query' => Project::find()
                        ->where(['typeId' => $typeId])
                        ->orderBy(['id'=>SORT_DESC]),
                    'pagination' => [
                        'pageSize' => 9
                    ]
                ]);

                return $this->render('projects', [
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

        return $this->render('projects', [
            'projectsProvider' => $provider,
            'projectType' => null
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     *
     * @var \app\models\Project $typeId
     */
    public function actionProject($id) {
        $project = Project::findOne($id);

        if (!$project) throw new NotFoundHttpException('Проект не найден');

        return $this->render('project', [
            'project' => $project,
            'similarProjects' => Project::find()
                ->where(['typeId' => $project->typeId])
                ->andWhere(['!=', 'id', $id])
                ->orderBy(new Expression('RAND()'))
                ->limit(3)
                ->all()
        ]);
    }

    /**
     * @param null $typeId
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDesigns($typeId = null) {
        if ($typeId) {
            if ($type = DesignType::findOne($typeId)) {
                $provider = new ActiveDataProvider([
                    'query' => Design::find()
                        ->where(['typeId' => $typeId])
                        ->orderBy(['id'=>SORT_DESC]),
                    'pagination' => [
                        'pageSize' => 6
                    ]
                ]);

                return $this->render('designs', [
                    'designProvider' => $provider,
                    'designType' => $type,
                ]);
            }

            throw new NotFoundHttpException();
        }

        $provider = new ActiveDataProvider([
            'query' => Design::find(),
            'pagination' => [
                'pageSize' => 6
            ]
        ]);

        return $this->render('designs', [
            'designProvider' => $provider,
            'designType' => null
        ]);
    }
}