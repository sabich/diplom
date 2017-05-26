<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\FileHelper;

/* @var $this yii\web\View */
/* @var $project app\models\Project */

$this->title = 'Проекты|'.$project->type->name.'|'.$project->article;
$this->params['breadcrumbs'] = [
    ['label' => $project->type->name, 'url' => ['catalog/projects', 'typeId'=>$project->type->id]],
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
            <a href="#OrderProjectModal" class="btn-block btn-order text-center" data-toggle="modal">Заказать проект</a>
        </div>
    </div>
    <div class="modal fade" id="OrderProjectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Заказ проекта <?= $project->article ?></h4>
                </div>
                <div class="modal-body">
                    <form id="callbackForm" action="<?= Url::to(['catalog/order-project']) ?>" method="POST" role="form">
                        <input type="hidden" name="_csrf" value="<?= \Yii::$app->request->csrfToken ?>" />
                        <input type="hidden" name="OrderProjectForm[project]" class="form-control" value="<?= $project->article ?>" aria-describedby="OrderProjectFormProject" required>
                        <label for="callbackFormName">Ваше имя</label>
                            <input type="text" name="OrderProjectForm[name]" class="form-control" placeholder="Введите Ваше имя" aria-describedby="OrderProjectFormName" required>
                        <label for="callbackFormPhone">Ваш e-mail</label>
                            <input type="email" name="OrderProjectForm[email]" class="form-control" placeholder="Введите Ваш email" aria-describedby="OrderProjectFormEmail" required>
                        <label for="callbackFormPhone">Ваш телефон</label>
                            <input type="tel" name="OrderProjectForm[phone]" class="form-control" placeholder="+7 (XXX) XXX-XX-XX" aria-describedby="OrderProjectFormPhone" required>
                        <button class="btn-order" type="submit">Заказать</button>
                    </form>
                </div>
            </div>
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