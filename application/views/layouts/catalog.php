<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<?= $this->render('/../chunks/header.php') ?>

<section class="contaner-fluid">
    <nav id="nav_projects" class="navbar" role="navigation">
        <div class="container">
            <?= Nav::widget([
                'options' => [
                    'class' => 'nav nav-pills nav-justified'
                ],
                'items' => $this->params['main_menu']['Проектирование']
            ]) ?>
<!--            <ul class="nav nav-pills nav-justified">-->
<!--                <li><a href="#">Индивидуальное жилье</a></li>-->
<!--                <li><a href="#">Жилые комплексы</a></li>-->
<!--                <li><a href="#">Промышленные объекты</a></li>-->
<!--                <li><a href="#">Развлекательные комплексы</a></li>-->
<!--            </ul>-->
        </div>
    </nav>
</section>

<div class="container">
    <div class="row">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= $content ?>
    </div>
</div>

<?= $this->render('/../chunks/footer.php') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
