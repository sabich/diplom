<?php

namespace app\models\forms;

use app\models\Project;
use app\models\ProjectAttribute;

class ProjectsFilter extends \yii\base\Model {
    public $typeId;

    public function rules() {
        return [
            [['typeId'], 'required']
        ];
    }

    public function getProjectAttributes() {
        return ProjectAttribute::find()
            ->leftJoin('project_type_attribute')
            ->where(['project_type_attribute.typeId' => $this->typeId])
            ->all();
    }

    public function getCriteria() {
        return [
            Project::TYPE_INDIVIDUAL => [
                'Этажность' => [
                    'Одноэтажные' => ['attributeId' => 4, 'value' => 1],
                    'Дуплекс' => ['attributeId' => 4, 'value' => 2],
                    'Три и более' => [
                        'and',
                        ['attributeId' => 4],
                        ['>=', 'value', 3]
                    ],
                    'Мансандра' => ['attributeId' => 6, 'value' => 1],
                    'Подвал' => ['attributeId' => 7, 'value' => 1]
                ],
                'Количество спален' => [
                    'Две' => ['attributeId' => 5, 'value' => 2],
                    'От трех до пяти' => [
                        'and',
                        ['attributeId' => 5],
                        ['between', 'value', 3, 5]
                    ],
                    'Свыше пяти' => [
                        'and',
                        ['attributeId' => 5],
                        ['>', 'value', 5]
                    ]
                ],
                'Тип' => [
                    'Жилой дом' => ['attributeId' => 8, 'value' => 'Жилой дом'],
                    'Беседка' => ['attributeId' => 8, 'value' => 'Беседка'],
                    'Гараж' => ['attributeId' => 8, 'value' => 'Гараж'],
                    'Баня' => ['attributeId' => 8, 'value' => 'Баня'],
                ]
            ],
            Project::TYPE_RESIDENTIAL => [],
            Project::TYPE_INDUSTRIAL => [],
            Project::TYPE_ENTERTAINMENT => []
        ];
    }
}