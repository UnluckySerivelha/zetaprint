<?php get_header(); ?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<div class="container">
    <div class="actions">
        <h1>
            Акции и скидки
        </h1>
        <div class="actions-list">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="actions-list__item">
                        <? if(get_the_post_thumbnail()): ?>
                        <a href="<? the_permalink() ?>" class="actions-list__item-img-wrapper">
                            <img class="lazyload" data-src="<?= get_the_post_thumbnail_url(); ?>" alt="<? the_title(); ?>">
                        </a>
                        <? endif; ?>
                        <a href="<? the_permalink() ?>" class="actions-list__item-title">
                            <? the_title(); ?>
                        </a>
                    </div>
                <?php   endwhile;
            endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

