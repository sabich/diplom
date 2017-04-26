<?php
/**
 * User: borisovsergej
 * Date: 10.04.17
 * Time: 23:10
 */

use yii\bootstrap\Nav;
?>

<!-- HEADER -->
<header>
    <nav class="navbar navbar-fixed-top">
        <section id="top-menu" class="container">
            <div id="header-wrap" class="row">
                <div id="logo-top" class="col-md-1 col-xs-1">
                    <a href="<?= Yii::$app->homeUrl ?>">
                        <img src="/images/logo/logo-min.png" alt="АРС-Холдинг">
                    </a>
                </div>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Меню</span>
                    <i class="fa fa-list" aria-hidden="true"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <div id="nav-top" class="col-md-5">
                        <?= Nav::widget([
                            'options' => [
                                'class' => 'navbar-nav'
                            ],
                            'items' => $this->params['main_menu']
                        ]) ?>
                    </div>

                    <!--
                    <div id="links" class="col-md-1">
                        <select name="lang" id="lang">
                            <option value="ru">ru</option>
                            <option value="en">en</option>
                        </select>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                    </div>
                    -->
                </div>
            </div>
        </section>
    </nav>
</header>