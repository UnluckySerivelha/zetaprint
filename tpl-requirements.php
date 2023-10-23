<?php
/* Template name: Требования */
get_header();
?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<div class="inner-page-layout">
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

                <div class="requirements">
<!--                    <h1>-->
<!--                        --><?// the_title(); ?>
<!--                    </h1>-->
                    <? if(get_field('текст')): ?>
                        <div class="requirements__text wysiwig">
                            <?= get_field('текст'); ?>
                        </div>
                    <? endif; ?>

                    <? if(get_field('вкладки')): ?>
                        <? if(count(get_field('вкладки')) > 1): ?>
                        <div class="requirements__tabs-head">
                            <? $i = 0; foreach (get_field('вкладки') as $item): ?>
                                <button class="requirements__tab-head<? if($i == 0): ?> active<? endif; ?>">
                                    <?= $item['заголовок'] ?>
                                </button>
                            <? $i++; endforeach; ?>
                        </div>
                        <div class="requirements__tabs-select custom-select">
                            <div class="current">
                                <?= get_field('вкладки')[0]['заголовок']; ?>
                            </div>
                            <div class="dropdown">
                                <? $i = 0; foreach (get_field('вкладки') as $item): ?>
                                    <div class="item">
                                        <?= $item['заголовок'] ?>
                                    </div>
                                <? $i++; endforeach; ?>
                            </div>
                        </div>
                        <? endif; ?>

                    <? endif; ?>
                    <? if(have_rows('ссылки_и_файлы')): ?>
                        <div class="requirements-links requirements-links--mob">
                            <? while ( have_rows('ссылки_и_файлы') ) : the_row(); ?>
                                <?  if( get_row_layout() == 'файл' ): ?>
                                    <a class="requirements-links__link requirements-links__link--file" href="<?= wp_get_attachment_url(get_sub_field('файл')); ?>" download>
                                        <?= get_sub_field('текст'); ?>
                                    </a>
                                <? endif; ?>
                                <?  if( get_row_layout() == 'видео' ): ?>
                                    <a class="requirements-links__link requirements-links__link--video" href="<?= get_sub_field('ссылка_на_видео'); ?>" data-fancybox>
                                        <?= get_sub_field('текст'); ?>
                                    </a>
                                <? endif; ?>
                            <? endwhile; ?>
                        </div>
                    <? endif; ?>
                    <? if(get_field('вкладки')): ?>
                        <div class="requirements__tabs-content">
                            <? $i = 0; foreach (get_field('вкладки') as $item): ?>
                                <div class="requirements__tab-content<? if($i == 0): ?> active<? endif; ?>">
                                    <h2 class="requirements__tab-title">
                                        <?= $item['заголовок'] ?>
                                    </h2>
                                    <div class="requirements__tab-wysiwig wysiwig">
                                        <?= $item['контент'] ?>
                                    </div>
                                </div>
                            <? $i++; endforeach; ?>
                        </div>


                    <? endif; ?>

                    <? if(have_rows('ссылки_и_файлы')): ?>
                        <div class="requirements-links">
                            <? while ( have_rows('ссылки_и_файлы') ) : the_row(); ?>
                                <?  if( get_row_layout() == 'файл' ): ?>
                                    <a class="requirements-links__link requirements-links__link--file" href="#popup-requirments" data-fancybox data-file="<?= wp_get_attachment_url(get_sub_field('файл')); ?>">
                                        <?= get_sub_field('текст'); ?>
                                    </a>
                                <? endif; ?>
                                <?  if( get_row_layout() == 'видео' ): ?>
                                    <a class="requirements-links__link requirements-links__link--video" href="<?= get_sub_field('ссылка_на_видео'); ?>" data-fancybox>
                                        <?= get_sub_field('текст'); ?>
                                    </a>
                                <? endif; ?>
                            <? endwhile; ?>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
