<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\FileHelper;


$this->params['breadcrumbs'] = [
    ['label' => $project->type->name, 'url' => ['catalog/index', 'typeId'=>$project->type->id]],
    ['label' => 'Проект '. $project->article ],
]
?>

<section id=project_nav>
    <div class="container">
        <h2 class="title_project">Проект <?= $project->article ?></h2>
        <hr>
    </div>
</section>
<section id="project_content" class="container">
    <div class="row">
        <div id="gallery" class="col-md-9">
            <ul id="imageGallery">
                <?php if ($project->cover) { ?>
                    <li data-thumb="<?= $project->coverUrl ?>"
                        data-src="<?= $project->getCoverUrl(\app\models\Project::IMAGE_SIZE_ORIGIN) ?>">
                        <img src="<?= $project->getCoverUrl(\app\models\Project::IMAGE_SLIDER_SIZE) ?>" class="img-responsive"/>
                    </li>
                <?php } ?>

                <?php if ($project->images) { ?>
                    <?php foreach ($project->images as $image) { ?>
                        <li data-thumb="<?= $project->getImageUrl($image) ?>"
                            data-src="<?= $project->getImageUrl($image, \app\models\Project::IMAGE_SIZE_ORIGIN) ?>">
                            <img src="<?= $project->getImageUrl($image, \app\models\Project::IMAGE_SLIDER_SIZE) ?>" class="img-responsive"/>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
        <div class="col-md-3 tep">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">Проект <?= $project->article ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($project->attributeValues as $attributeValue) { ?>
                        <tr>
                            <td><?= $attributeValue->name ?></td>
                            <td><?= $attributeValue->value ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section id="project_desc" class="container">
    <div class="row">
        <div class="col-md-9">
            <h3>Информация об объекте</h3>
            <p class="text-justify">
                <?= $project->description ?>
            </p>
        </div>
    </div>
</section>

<section id="similar" class="container">
    <div id="project_cards">
        <div class="row">
            <?php foreach ($similarProjects as $similar) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-title">
                            <img class="card-img-top img-responsive" src="<?= $similar->getCoverUrl(\app\models\Project::IMAGE_COVER_SIZE) ?>" alt="<?=$similar->article?>">
                            <h4><?= $similar->article ?></h4>
                        </div>
                        <div class="card-block">
                            <p class="card-text"><?= $similar->annotation ?></p>
                            <a href="<?= Url::to(['catalog/project', 'id' => $similar->id]) ?>" class="btn-order">Подробнее</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>