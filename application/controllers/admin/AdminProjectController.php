<?php

namespace app\controllers\admin;

use app\models\forms\admin\ProjectFilter;
use app\models\forms\admin\ProjectForm;
use yii\base\Exception;
use yii\web\UploadedFile;

class AdminProjectController extends \app\base\AdminController {
    public function actionIndex() {
        $filter = new ProjectFilter();
        $filter->load(\Yii::$app->request->get());

        return $this->render('list', [
            'filter' => $filter,
            'provider' => $filter->provider
        ]);
    }

    public function actionCreate() {
        $form = new ProjectForm([
            'scenario' => 'add'
        ]);

        if (\Yii::$app->request->isPost) {
            $form->load(\Yii::$app->request->post());
            $form->cover = UploadedFile::getInstance($form, 'cover');

            try {
                if ($form->run()) {
                    return $this->redirect(['admin-project/index']);
                }
            } catch (Exception $e) {
                \Yii::$app->session->setFlash('submit-error', $e->getMessage());
            }
        }

        return $this->render('form', [
            'model' => $form
        ]);
    }

    public function actionUpdate($id) {
        $form = new ProjectForm([
            'scenario' => 'edit',
            'id' => $id
        ]);
    }

    public function actionDelete() {

    }

    public function addImage() {

    }
}