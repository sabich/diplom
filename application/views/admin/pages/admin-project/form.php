<?php

use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'] = [
    ['label' => 'Проекты', 'url' => ['admin-project/index']]
]
?>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <?php if ($model->scenario == 'add') { ?>
            <h1>Новый проект</h1>
        <?php } else { ?>
            <h1>Редактирование проекта</h1>
        <?php } ?>

        <?php if (Yii::$app->session->hasFlash('submit-error')) { ?>
            <p class="alert alert-danger">Ошибка: <?= Yii::$app->session->getFlash('submit-error') ?></p>
        <?php } ?>

        <?php $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]) ?>

            <?= $form->field($model, 'typeId')->dropDownList(
                $model->typeIdOptions,
                ['prompt' => 'Выберите тип проекта...']
            ) ?>

            <?= $form->field($model, 'date') ?>

            <?= $form->field($model, 'article') ?>

            <?= $form->field($model, 'cover')->widget(\kartik\file\FileInput::className(), [
                'options' => [
                    'accept' => 'image/jpg, image/jpeg, image/png'
                ]
            ]) ?>

            <?php if (isset($model->project->coverId)) { ?>
                <div class="form-group">
                    <img src="<?= $model->project->coverUrl ?>" />
                </div>
            <?php } ?>

            <?= $form->field($model, 'images[]')->widget(\kartik\file\FileInput::className(), [
                'options' => [
                    'multiple' => true,
                    'accept' => 'image/jpg, image/jpeg, image/png'
                ]
            ]) ?>

            <?= $form->field($model, 'annotation')->textarea() ?>

            <?= $form->field($model, 'description')->textarea() ?>

            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">Сохранить</button>
            </div>

        <?php $form->end(); ?>
    </div>
</div>


