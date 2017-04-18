<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'ARS Holding';
?>
<!-- MAIN SLIDER -->
<section id="main-slider">
    <div id="main_slider" class="owl-carousel owl-theme">
        <div class="item">
            <img src="/images/slider/image01.jpg" alt="">
            <div class="item-block">
                <div class="slide-caption">
                    <img class="logo-max" src="/images/logo/logo-max.png" alt="АРС-Холдинг" width="122" height="147">
                    <span class="red-line"></span>
                    <h2>Проект клиники лучевой терапии</h2>
                </div>
                <div class="slide-text">
                    <p>Планировкой предусмотрено комфортное обслуживание посетителей, с зонами ожидания и лечения.</p>
                </div>
                <div class="nav_slider text left">
                    <span class="btn customPrevBtn"><i class="fa fa-long-arrow-left fa-2x" aria-hidden="true"></i></span>
                    <span>|</span>
                    <span class="btn customNextBtn"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></span>
                </div>
                <a href="#order" class="btn-order">Заказать проект</a>
            </div>
        </div>
        <div class="item">
            <img src="/images/slider/image02.jpg" alt="">
            <div class="item-block">
                <div class="slide-caption">
                    <img class="logo-max" src="/images/logo/logo-max.png" alt="АРС-Холдинг" width="122" height="147">
                    <span class="red-line"></span>
                    <h2>Дизайн спален</h2>
                </div>
                <div class="slide-text">
                    <p> Утонченный дизайн спальни в аппартаментах.
                    </p>
                </div>
                <div class="nav_slider text left">
                    <span class="btn customPrevBtn"><i class="fa fa-long-arrow-left fa-2x" aria-hidden="true"></i></span>
                    <span>|</span>
                    <span class="btn customNextBtn"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></span>
                </div>
                <a href="#order" class="btn-order">Заказать проект</a>
            </div>
        </div>
        <div class="item">
            <img src="/images/slider/image03.jpg" alt="">
            <div class="item-block">
                <div class="slide-caption">
                    <img class="logo-max" src="/images/logo/logo-max.png" alt="АРС-Холдинг" width="122" height="147">
                    <span class="red-line"></span>
                    <h2>Проект благоустройства территории</h2>
                </div>
                <div class="slide-text">
                    <p>Проект дома и гостевого домика выполненный в «сельском» стиле с элементами Прованса, изюминкой проекта является использование соломенной кровли.
                    </p>
                </div>
                <div class="nav_slider text left">
                    <span class="btn customPrevBtn"><i class="fa fa-long-arrow-left fa-2x" aria-hidden="true"></i></span>
                    <span>|</span>
                    <span class="btn customNextBtn"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></span>
                </div>
                <a href="#order" class="btn-order">Заказать проект</a>
            </div>
        </div>
        <div class="item">
            <img src="/images/slider/image04.jpg" alt="">
            <div class="item-block">
                <div class="slide-caption">
                    <img class="logo-max" src="/images/logo/logo-max.png" alt="АРС-Холдинг" width="122" height="147">
                    <span class="red-line"></span>
                    <h2>Проект автосалона</h2>
                </div>
                <div class="slide-text">
                    <p>Проект автосалона с большой автостоянкой</p>
                </div>
                <div class="nav_slider text left">
                    <span class="btn customPrevBtn"><i class="fa fa-long-arrow-left fa-2x" aria-hidden="true"></i></span>
                    <span>|</span>
                    <span class="btn customNextBtn"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></span>
                </div>
                <a href="#order" class="btn-order">Заказать проект</a>
            </div>
        </div>
        <div class="item">
            <img src="/images/slider/image05.jpg" alt="">
            <div class="item-block">
                <div class="slide-caption">
                    <img class="logo-max" src="/images/logo/logo-max.png" alt="АРС-Холдинг" width="122" height="147">
                    <span class="red-line"></span>
                    <h2>Проект  ледовой арены</h2>
                </div>
                <div class="slide-text">
                    <p>Проект  ледовой арены представляет собой  сблокированное сооружение из одноэтажной арены. Сооружение в плане имеет Т-образный вид.
                    </p>
                </div>
                <div class="nav_slider text left">
                    <span class="btn customPrevBtn"><i class="fa fa-long-arrow-left fa-2x" aria-hidden="true"></i></span>
                    <span>|</span>
                    <span class="btn customNextBtn"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></span>
                </div>
                <a href="#order" class="btn-order">Заказать проект</a>
            </div>
        </div>
    </div>
</section>
<!-- MAIN MENU -->
<section class="container-fluid">
    <div id="main_menu" class="row">
        <ul class="nav">
            <li id="m_projects" class="col-md-3 no-padding">
                <div class="dropdown">
                    <div class="item-menu dropdown-toggle" type="button" data-toggle="dropdown"><span>Проектирование</span></div>
                    <ul class="dropdown-menu">
                        <li><a href="<?= Url::toRoute(['catalog/index', 'typeId' => '1']) ?>">Индивидуальное жилье</a></li>
                        <li><a href="<?= Url::toRoute(['catalog/index', 'typeId' => '2']) ?>">Жилые комплексы</a></li>
                        <li><a href="<?= Url::toRoute(['catalog/index', 'typeId' => '3']) ?>">Промышленные объекты</a></li>
                        <li><a href="<?= Url::toRoute(['catalog/index', 'typeId' => '4']) ?>">Развлекательные комплексы</a></li>
                    </ul>
                </div>
            </li>
            <li id="m_building" class="col-md-3 no-padding">
                    <div class="item-menu"><span>Строительство</span></div>
            </li>
            <a href="#"><li id="m_design" class="col-md-3 no-padding"><div class="item-menu"><span>Дизайн</span></div></li></a>
            <a href="<?= Url::to('/service') ?>">
                <li id="m_services" class="col-md-3 no-padding">
                    <div class="item-menu"><span>Услуги</span></div>
                </li>
            </a>
        </ul>
    </div>
</section>
