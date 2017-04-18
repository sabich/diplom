<?php
/**
 * User: borisovsergej
 * Date: 11.04.17
 * Time: 19:28
 */
?>

<!-- ORDER -->
<section id="order">
    <div class="container">
        <h2 class="title_main">Получить консультацию</h2>
        <p class="desc_main">Оставьте свои контактные данные и мы обязательно свяжимся с Вами</p>
        <div class="form_order row">
            <form action="#">
                <div class="col-md-3">
                    <input type="text" name="fio" id="fio" placeholder="Введите Ваше имя">
                </div>
                <div class="col-md-3">
                    <input type="tel" name="tel" id="tel" placeholder="Введите телефон">
                </div>
                <div class="col-md-3">
                    <input type="text" name="city" id="city" list="city_list" placeholder="Город">
                    <datalist name="city_list" id="city_list">
                        <option value="Астана"></option>
                        <option value="Алма-Ата"></option>
                        <option value="Актау"></option>
                        <option value="Актобе"></option>
                        <option value="Атырау"></option>
                        <option value="Жанаозен"></option>
                        <option value="Караганда"></option>
                        <option value="Кокшетау"></option>
                        <option value="Костанай"></option>
                        <option value="Кызылорда"></option>
                        <option value="Павлодар"></option>
                        <option value="Петропавловск"></option>
                        <option value="Рудный"></option>
                        <option value="Семей"></option>
                        <option value="Талдыкорган"></option>
                        <option value="Тараз"></option>
                        <option value="Темиртау"></option>
                        <option value="Туркестан"></option>
                        <option value="Уральск"></option>
                        <option value="Усть-Каменогорск"></option>
                        <option value="Шымкент"></option>
                        <option value="Экибастуз"></option>
                    </datalist>
                </div>
                <div class="col-md-3">
                    <input type="text" name="project" id="project" list="project_list" placeholder="выберите проект">
                    <datalist name="project" id="project_list">
                        <option value="Индивидуальное жилье"></option>
                        <option value="Жилой комплекс"></option>
                        <option value="Промышленный объект"></option>
                        <option value="Развлекательный комплекс"></option>
                    </datalist>
                </div>
        </div>
                    <input type="submit" name="send_order" class="btn-link btn-order" value="расчитать">
            </form>
    </div>
</section>
