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
                    'items' => [
                        [
                            'label' => 'Индивидуальное жилье',
                            'url' => ['design/index', 'typeId'=>'1'],
                        ],
                        [
                            'label' => 'Жилые комплексы',
                            'url' => ['design/index', 'typeId'=>'2'],
                        ],
                        [
                            'label' => 'Промышленные объекты',
                            'url' => ['design/index', 'typeId'=>'3'],
                        ],
                        [
                            'label' => 'Развлекательные комплексы',
                            'url' => ['design/index', 'typeId'=>'4'],
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