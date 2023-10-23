<?php
/* Template name: Второстепенная */
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

                <div class="secondary">
                    <h1>
                        <? the_title(); ?>
                    </h1>
                    <? if( have_rows('контент') ): ?>
                        <? while ( have_rows('контент') ) : the_row(); ?>
                            <?  if( get_row_layout() == 'визуальный_редактор' ): ?>
                                <div class="post__content-group post__content-group--wysiwig post__content-group--wysiwig-secondary wysiwig">
                                    <?= get_sub_field('визуальный_редактор'); ?>
                                </div>
                            <? endif; ?>
                            <?  if( get_row_layout() == 'видео' ): ?>
                                <div class="post__content-group post__content-group--video">
                                    <a href="<?= get_sub_field('ссылка_на_видео'); ?>" data-fancybox class="post__video video-block">
                                        <span class="play-btn"></span>
                                        <img class="lazyload video-block__img" data-src="<?= get_sub_field('превью'); ?>" alt="">
                                    </a>
                                </div>
                            <? endif; ?>
                        <? endwhile; ?>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
