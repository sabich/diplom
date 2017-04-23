<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;

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
                <?php for ($i=1; $i<=7; $i++) { ?>
                    <li data-thumb="/images/gallery/thrumbs/<?= $project->cover.'-'.$i.'s' ?>.jpg"
                        data-src="/images/gallery/slider/<?= $project->cover.'-'.$i ?>.jpg">
                        <img src="/images/gallery/slider/<?= $project->cover.'-'.$i ?>.jpg" />
                    </li>
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
        <div class="col-md-3">
            <h3>Смотреть планировки</h3>
            <img src="/images/gallery/thrumbs/123-6s.jpg" width="217" height="270" class="img-responsive">
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
                            <img class="card-img-top" src="/images/projects/small/pr1.png" alt="Card image cap">
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