<?php
/**
 * User: borisovsergej
 * Date: 11.04.17
 * Time: 19:25
 */

use yii\helpers\Url;
?>

<!-- LAST WORKS -->
<section id="last_works">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="title_main">Последние проекты</h2>
                <p class="desc_main">Индивидуальный подход и инновационные технологии - главные причины наших успехов</p>
            </div>
        </div>
        <div class="row">
            <div id="project_slider">
                <div id="coverflow">
                    <ul class="flip-items">
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 21]) ?>">
                                <img src="/images/works/105w.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 26]) ?>">
                                <img src="/images/works/114w.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 27]) ?>">
                                <img src="/images/works/120w.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 7]) ?>">
                                <img src="/images/works/131w.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 9]) ?>">
                                <img src="/images/works/138w.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 11]) ?>">
                                <img src="/images/works/142w.png" alt="works">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
