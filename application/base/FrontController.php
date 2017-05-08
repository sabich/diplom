<?php

namespace app\base;

class FrontController extends \app\base\Controller {
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $this->view->params['main_menu'] = [
                [
                    'label' => 'Проектирование',
                    'items' => [
                        [
                            'label' => 'Индивидуальное жилье',
                            'url' => ['catalog/projects', 'typeId'=>'1'],
                        ],
                        [
                            'label' => 'Жилые комплексы',
                            'url' => ['catalog/projects', 'typeId'=>'2'],
                        ],
                        [
                            'label' => 'Промышленные объекты',
                            'url' => ['catalog/projects', 'typeId'=>'3'],
                        ],
                        [
                            'label' => 'Развлекательные комплексы',
                            'url' => ['catalog/projects', 'typeId'=>'4'],
                        ]
                    ]
                ],
                [
                    'label' => 'Строительство',
                ],
                [
                    'label' => 'Дизайн',
                    'items' => [
                        [
                            'label' => 'Индивидуальное жилье',
                            'url' => ['catalog/designs', 'typeId'=>'1'],
                        ],
                        [
                            'label' => 'Жилые комплексы',
                            'url' => ['catalog/designs', 'typeId'=>'2'],
                        ],
                        [
                            'label' => 'Промышленные объекты',
                            'url' => ['catalog/designs', 'typeId'=>'3'],
                        ],
                        [
                            'label' => 'Развлекательные комплексы',
                            'url' => ['catalog/designs', 'typeId'=>'4'],
                        ]
                    ]
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