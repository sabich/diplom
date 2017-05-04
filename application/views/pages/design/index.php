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
                'items' => $this->params['main_menu'][2]['items']
            ]) ?>
        </div>
    </nav>
</section>

<section id="design_cards">
    <div class="container">
        <div class="row">
                <?php foreach ($designProvider->getModels() as $design) { ?>
            <div class="card col-md-6">
                <div class="card-top">
<!--                <a href="#">-->
                        <img class="card-img-top img-responsive" src="/images/designs/cover/<?= $design->cover.'-560' ?>.jpg"
                             alt="<?= $design->article ?>">
                        <div class="card-block">
                            <h4><?= $design->article ?></h4>
                            <p class="card-text"><?= $design->annotation ?></p>
                        </div>
                </div>
<!--                </a>-->
                <div class="row card-bottom">
                    <img src="/images/designs/cover/<?= $design->cover.'-560-2' ?>.jpg" alt="<?= $design->article ?>" class="col-md-6">
                    <img src="/images/designs/cover/<?= $design->cover.'-560-3' ?>.jpg" alt="<?= $design->article ?>" class="col-md-6">
                </div>
            </div>
                <?php } ?>

                <div class="text-center">
                    <?= LinkPager::widget([
                        'pagination' => $designProvider->pagination,
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
    </div>
</section>