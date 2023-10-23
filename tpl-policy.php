<?php
/* Template name: Политика конфиденциальности */
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

                <div class="policy">
                    <h1>
                        <? the_title(); ?>
                    </h1>

                    <div class="policy__content wysiwig">
                        <? the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
