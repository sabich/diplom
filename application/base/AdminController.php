<?php

namespace app\base;

class AdminController extends \app\base\Controller {
    public $layout = 'admin';

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $this->view->params['main_menu'] = [
                [
                    'label' => 'Проекты',
                    'url' => ['admin-project/index']
                ],
            ];

            return true;
        }

        return false;
    }

}