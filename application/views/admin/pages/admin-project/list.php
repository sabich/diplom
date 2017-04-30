<?php

use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'] = [
    ['label' => 'Проекты']
]
?>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <h1>Проекты <a href="<?= \yii\helpers\Url::to(['admin-project/create']) ?>" class="btn btn-default">Добавить</a></h1>

        <?= \yii\grid\GridView::widget([
            'filterModel' => $filter,
            'dataProvider' => $provider,
            'columns' => [
                'id',
                [
                    'attribute' => 'coverId',
                    'label' => '',
                    'value' => function($model) {
                        return \yii\bootstrap\Html::img($model->coverUrl);
                    },
                    'format' => 'html'
                ],
                'article',
                'date',
                [
                    'attribute' => 'typeId',
                    'value' => 'type.name'
                ],
                [
                    'class' => \yii\grid\ActionColumn::className(),
                ]
            ]
        ]) ?>
    </div>
</div>


