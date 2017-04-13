<?php

namespace app\base;

class Controller extends \yii\web\Controller {
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $this->view->params['main_menu'] = [
                [
                    'label' => 'Проектирование',
                    'items' => [
                        [
                            'label' => 'Индивидуальное жилье',
                            'url' => ''
                        ],
                        [
                            'label' => 'Жилые комплексы',
                            'url' => ''
                        ],
                        [
                            'label' => 'Промышленные объекты',
                            'url' => ''
                        ],
                        [
                            'label' => 'Развлекательные комплексы',
                            'url' => ''
                        ]
                    ]
                ],
                [
                    'label' => 'Строительство',
                    'items' => []
                ],
                [
                    'label' => 'Дизайн',
                    'items' => []
                ],
                [
                    'label' => 'Услуги',
                    'items' => []
                ],
            ];

            return true;
        }

        return false;
    }
}