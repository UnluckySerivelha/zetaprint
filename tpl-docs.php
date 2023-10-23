<?php
/* Template name: Документы */
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
                <div class="docs">
                <h1>
                    <? the_title(); ?>
                </h1>
                    <div class="docs__row">
                        <? if(get_field('список_документов')): ?>
                            <? foreach (get_field('список_документов') as $item): ?>
                                <div class="docs__item">
                                    <a href="<?= $item['файл_документа']; ?>" target="_blank" class="docs__item-link">
                                    </a>
                                    <span>
                                        <?= $item['название_документа']; ?>
                                    </span>
                                </div>
                            <? endforeach; ?>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
