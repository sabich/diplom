<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;

?>

<section id=project_nav>
    <div class="container">
        <h2 class="title_project">Проект <?= $project->article ?></h2>
        <h2>Проект <?= $project->type->name ?></h2>
        <hr>
    </div>
</section>
<section id="project_content" class="container">
    <div class="row">
        <div id="gallery" class="col-md-9">
            <ul id="imageGallery">
                <li data-thumb="/images/gallery/thumbs/pij123-1-thumb.png" data-src="/images/gallery/pij123-1.png">
                    <img src="/images/gallery/slider/pij123-1.png" />
                </li>
                <li data-thumb="/images/gallery/thumbs/pij123-2-thumb.png" data-src="/images/gallery/pij123-2.png">
                    <img src="/images/gallery/slider/pij123-2.png" />
                </li>
                <li data-thumb="/images/gallery/thumbs/pij123-3-thumb.png" data-src="/images/gallery/pij123-3.png">
                    <img src="/images/gallery/slider/pij123-3.png" />
                </li>
                <li data-thumb="/images/gallery/thumbs/pij123-4-thumb.png" data-src="/images/gallery/pij123-4.png">
                    <img src="/images/gallery/slider/pij123-4.png" />
                </li>
            </ul>
        </div>
        <div class="col-md-3 tep">
            <table class="table">
                <thead>
                <tr>
                    <th>Проект <?= $project->article ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Общая площадь</td>
                    <td>236.07</td>
                </tr>
                <tr>
                    <td>Площадь застройки</td>
                    <td>194.13</td>
                </tr>
                <tr>
                    <td>Жилая площадь</td>
                    <td>124.59</td>
                </tr>
                <tr>
                    <td>Количество спален</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Количество этажей</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Мансарда</td>
                    <td>нет</td>
                </tr>
                <tr>
                    <td>Подвал</td>
                    <td>нет</td>
                </tr>
                <tr>
                    <td>Тип</td>
                    <td>Жилой дом</td>
                </tr>
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
            <img src="/images/gallery/pij123-5.png" width="217" height="270" class="img-responsive">
        </div>
    </div>
</section>
<!--<section id="similar" class="container">-->
<!--    <div id="project_cards">-->
<!--        <div class="row">-->
<!--            --><?php //foreach ($projectsProvider->getModels() as $project) { ?>
<!--                <div class="col-md-3">-->
<!--                    <div class="card">-->
<!--                        <div class="card-title">-->
<!--                            <img class="card-img-top" src="/images/projects/small/pr1.png" alt="Card image cap">-->
<!--                            <h4>--><?//= $project->article ?><!--</h4>-->
<!--                        </div>-->
<!--                        <div class="card-block">-->
<!--                            <p class="card-text">--><?//= $project->annotation ?><!--</p>-->
<!--                            <a href="--><?//= Url::to(['catalog/project', 'id' => $project->id]) ?><!--" class="btn-order">Подробнее</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //} ?>
<!--        </div>-->
<!--    </div>-->
<!--</section>-->