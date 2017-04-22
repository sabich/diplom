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
                            <a href="<?= Url::to(['catalog/project', 'id' => 1]) ?>">
                                <img src="/images/works/work-1.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 1]) ?>">
                                <img src="/images/works/work-2.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 1]) ?>">
                                <img src="/images/works/work-3.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 1]) ?>">
                                <img src="/images/works/work-4.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 1]) ?>">
                                <img src="/images/works/work-5.png" alt="works">
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['catalog/project', 'id' => 1]) ?>">
                                <img src="/images/works/work-6.png" alt="works">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
