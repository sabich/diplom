<?php
/**
 * User: borisovsergej
 * Date: 11.04.17
 * Time: 19:30
 */
?>

<!-- FEEDBACK -->
<section id="feedback">
    <div class="container">
        <form id="feedback_form" action="#">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Ваше имя" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Ваш Email" required>
                        </div>
                    </div>
                    <textarea class="form-control" rows="5" name="text">Оставить отзыв</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <input type="submit" value="Оставить отзыв" class="btn-order">
                </div>
            </div>
        </form>
    </div>
</section>
