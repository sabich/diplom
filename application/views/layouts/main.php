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

        <div class="container-fluid">
            <div class="row">

                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <?= $content ?>
            </div>
        </div>

    <?= $this->render('/../chunks/last-work.php') ?>
    <?= $this->render('/../chunks/order.php') ?>
    <?= $this->render('/../chunks/about-us.php') ?>
    <?= $this->render('/../chunks/feedback.php') ?>
    <?= $this->render('/../chunks/footer.php') ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
