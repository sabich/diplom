<?php
use yii\helpers\Url;
?>
<form id="projectsFilter" class="form-horizontal" action="<?=Url::to(['site/project-filter']) ?>" method="POST" role="form">
    <input type="hidden" name="_csrf" value="<?= \Yii::$app->request->csrfToken ?>" />
    <div class="list-group panel">
        <a href="#flouts" class="btn btn-block" data-toggle="collapse"> Этажность <span
                class="caret"></span></a>
        <div class="collapse list-group-submenu" id="flouts">
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span>
                Одноэтажные </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Дуплекс
            </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Три и
                более </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Мансандра
            </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Подвал
            </label>
        </div>
    </div>
    <div class="list-group panel">
        <a href="#bedrooms" class="btn btn-block" data-toggle="collapse">Количество спален <span
                class="caret"></span></a>
        <div class="collapse list-group-submenu" id="bedrooms">
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Две
            </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> От 3 до 5
            </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Свыше
                пяти </label>
        </div>
    </div>
    <div class="list-group panel">
        <a href="#type" class="btn btn-block" data-toggle="collapse"> Тип <span
                class="caret"></span></a>
        <div class="collapse list-group-submenu" id="type">
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Жилой дом
            </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Беседка
            </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Гараж
            </label>
            <label class="list-group-item"> <input type="checkbox"><span class="chBox"></span> Баня
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="reset" class="btn btn-block">Сброс</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-block">Показать</button>
        </div>
    </div>
</form>
