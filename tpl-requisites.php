<?php
/* Template name: Реквизиты */
get_header();
?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<div class="inner-page-layout inner-page-layout--mob-menu">
    <div class="container">
        <div class="inner-page-layout__row">
            <div class="inner-page-layout__left">
                <div class="inner-page-menu">
                    <? wp_nav_menu([
                        'theme_location'=>'inner-menu'
                    ]); ?>
                </div>
            </div>
            <div class="inner-page-layout__right">

                <div class="requisites">
                    <h1>
                        <? the_title(); ?>
                    </h1>
                    <p>
                        ООО «РПК «ЗЕТАПРИНТ»
                    </p>
                    <div class="requisites__row">
                        <span class="requisites__row-label">ОГРН</span>
                        <span class="requisites__row-value">1117746932511</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">ИНН</span>
                        <span class="requisites__row-value">7723819154</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">КПП</span>
                        <span class="requisites__row-value">772301001</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">ОКПО</span>
                        <span class="requisites__row-value">37240029</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">Юридический  адрес </span>
                        <span class="requisites__row-value">115088, г. Москва, Южнопортовый 2-й проезд, дом 26А, строение 31.</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">Фактический адрес</span>
                        <span class="requisites__row-value">115088, г. Москва, Южнопортовый 2-й проезд, дом 26А, строение 31.</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">Телефон</span>
                        <span class="requisites__row-value">8 (495) 775-23-38</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">E-mail</span>
                        <span class="requisites__row-value">info@zetaprint.ru</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">Генеральный директор</span>
                        <span class="requisites__row-value">Глушков Александр Викторович</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">Расчетный счет</span>
                        <span class="requisites__row-value">40702810100000005481</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">Банк</span>
                        <span class="requisites__row-value">АО БАНК «НАЦИОНАЛЬНЫЙ СТАНДАРТ» г. Москва</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">БИК</span>
                        <span class="requisites__row-value">044525498</span>
                    </div>
                    <div class="requisites__row">
                        <span class="requisites__row-label">Корр. счет</span>
                        <span class="requisites__row-value">30101810045250000498</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
