<?php
/**
 * User: borisovsergej
 * Date: 10.04.17
 * Time: 23:10
 */

use yii\bootstrap\Nav;
use yii\helpers\Url;
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
                <div id="phone" class="col-md-3 col-xs-11">
                    <div class="row">
                        <a href="tel:+77087677887">+7 (708) 767-78-87</a>
                        <a href="tel:+77081888025">+7 (708) 188-80-25</a>
                    </div>
                    <div class="row">
                        <a href="tel:+77779503968">+7 (777) 950-39-68</a>
                        <a href="tel:+77053339272">+7 (705) 333-92-72</a>
                    </div>
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
                    <div id="links" class="col-md-1">
                        <select name="lang" id="lang">
                            <option value="ru">ru</option>
                            <option value="en">en</option>
                        </select>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                    </div>
                    <div id="callback" class="col-md-2">
                        <a href="tel:+77273561600">+7 (727) 356 16 00</a>
                        <a  data-toggle="modal" href='#callbackModal' class="order_call">заказать звонок</a>
                    </div>
                </div>
            </div>
        </section>
    </nav>

    <div class="modal fade" id="callbackModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Заказать звонок</h4>
                </div>
                <div class="modal-body">
                    <form id="callbackForm" action="<?= Url::to(['site/callback']) ?>" method="POST" role="form">
                        <input type="hidden" name="_csrf" value="<?= \Yii::$app->request->csrfToken ?>" />

                        <label for="callbackFormName">Ваше имя</label>
                        <div class="input-group">
							  <span class="input-group-addon">
							  	<i class="fa fa-user" aria-hidden="true"></i>
							  </span>
                            <input type="text" name="CallbackForm[name]" class="form-control" placeholder="Ваше имя" aria-describedby="сallbackFormName" required>
                        </div>
                        <label for="callbackFormPhone">Ваш телефон</label>
                        <div class="input-group">
							  <span class="input-group-addon">
							  	<i class="fa fa-phone-square" aria-hidden="true"></i>
							  </span>
                            <input type="tel" name="CallbackForm[phone]" class="form-control" placeholder="Номер телефона" aria-describedby="сallbackFormPhone" required>
                        </div>
                        <p>Удобное время звонка</p>
                        <div class="input-group">
							<span class="input-group-addon" id="сallbackPhone">
								<i class="fa fa-bell" aria-hidden="true"></i>
							</span>
                            <div class="form-control">
                                <select name="CallbackForm[hour]" class="selectpicker">
                                    <?php
                                        for ($h=9; $h<19; $h++) { ?>
                                            <option value="<?= $h ?>"><?= $h ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                                <select  name="CallbackForm[minute]" class="selectpicker">
                                    <?php
                                    for ($m=0; $m<60; $m++) { ?>
                                        <option value="<?= $m ?>"><?= $m ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button class="btn-order" type="submit">Заказать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (\Yii::$app->session->hasFlash('callbackSuccess')) {
            $this->registerJs("
                alert('Ваш запрос отправлен.');
            ");
        }

        if (\Yii::$app->session->hasFlash('callbackErrors')) {
            $this->registerJs("
                console.log('Callback errors:', " . json_encode(\Yii::$app->session->getFlash('callbackErrors')) . ");
            ");
        }
    ?>
</header>