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
                            'url' => ['catalog/index', 'typeId'=>'1'],
                        ],
                        [
                            'label' => 'Жилые комплексы',
                            'url' => ['catalog/index', 'typeId'=>'2'],
                        ],
                        [
                            'label' => 'Промышленные объекты',
                            'url' => ['catalog/index', 'typeId'=>'3'],
                        ],
                        [
                            'label' => 'Развлекательные комплексы',
                            'url' => ['catalog/index', 'typeId'=>'4'],
                        ]
                    ]
                ],
                [
                    'label' => 'Строительство',
                ],
                [
                    'label' => 'Дизайн',
                ],
                [
                    'label' => 'Услуги',
                    'url' => ['site/service'],
                ],
            ];

            return true;
        }

        return false;
    }
}