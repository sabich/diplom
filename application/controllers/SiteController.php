<?php

namespace app\controllers;

use app\models\forms\CallbackForm;
use app\models\forms\OrderForm;

class SiteController extends \app\base\FrontController
{
    public function actionIndex()
    {
        return $this->render('/index');
    }

    public function actionService()
    {
        return $this->render('/service');
    }

    public function actionCallback() {
        if (\Yii::$app->request->isPost) {
            $form = new CallbackForm();
            $form->load(\Yii::$app->request->post());

            if ($form->run()) {
                \Yii::$app->session->setFlash('callbackSuccess', true);
            } else {
                \Yii::$app->session->setFlash('callbackErrors', $form->errors);
            }
        }

        return $this->goBack();
    }

    public function actionOrder() {
        if (\Yii::$app->request->isPost) {
            $form = new OrderForm();
            $form->load(\Yii::$app->request->post());

            if ($form->run()) {
                \Yii::$app->session->setFlash('orderSuccess', true);
            } else {
                \Yii::$app->session->setFlash('orderErrors', $form->errors);
            }
        }

        return $this->goBack();
    }
}
