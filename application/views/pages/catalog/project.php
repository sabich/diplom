<?php

?>

<section>
    <div class="container">
        <div class="row">
            <?= $project->article ?> <br/>
            <?= $project->type->name ?> <br/>
            <img src="<?= $project->coverUrl ?>" />
        </div>
    </div>
</section>