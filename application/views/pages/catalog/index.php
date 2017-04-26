<?php

use yii\bootstrap\Nav;
use yii\widgets\LinkPager;
use yii\helpers\Url;

?>

<section class="contaner-fluid">
    <nav id="nav_projects" class="navbar" role="navigation">
        <div class="container">
            <?= Nav::widget([
                'options' => [
                    'class' => 'nav nav-pills nav-justified'
                ],
                'items' => $this->params['main_menu'][0]['items']
            ]) ?>
        </div>
    </nav>
</section>

<section>
    <div class="container">
        <div class="row">
            <div id="project_cards" class="col-md-9">
                <div class="row">
                    <?php foreach ($projectsProvider->getModels() as $project) { ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-title">
                                    <img class="card-img-top img-responsive" src="/images/projects/cover/<?= $project->cover.'-266' ?>.jpg" alt="<?= $project->article ?>">
                                    <h4><?= $project->article ?></h4>
                                </div>
                                <div class="card-block">
                                    <p class="card-text"><?= $project->annotation ?></p>
                                    <a href="<?= Url::to(['catalog/project', 'id' => $project->id]) ?>" class="btn-order">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="text-center">
                    <?= LinkPager::widget([
                        'pagination' => $projectsProvider->pagination,
                        'prevPageLabel' => false,
                        'nextPageLabel' => false,
                        'firstPageLabel' => '&laquo;',
                        'lastPageLabel' => '&raquo;',
                        'disabledPageCssClass' => '',
                        'disabledListItemSubTagOptions' => [
                            'tag' => 'a'
                        ]
                    ]) ?>
                </div>
            </div>

            <?php if($project->typeId==1) { ?><div class="col-md-3"><?= $this->render('chunks/filter') ?></div><?php } ?>
        </div>
    </div>
</section>