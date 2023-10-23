<?php get_header(); ?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<div class="container">
    <div class="i-news">
        <h1>
           Новости
        </h1>
        <div class="i-news-list">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="i-news-list__item">
                        <? if(get_the_post_thumbnail()): ?>
                        <a href="<? the_permalink() ?>" class="i-news-list__item-img-wrapper tro">
                            <img class="lazyload" data-src="<?= get_the_post_thumbnail_url(); ?>" alt="<? the_title(); ?>">
                        </a>
                        <? endif; ?>
                        <p class="i-news-list__item-date">
                            <?= the_date(); ?>
                        </p>
                        <a href="<? the_permalink() ?>" class="i-news-list__item-title tro">
                            <? the_title(); ?>
                        </a>
                    </div>
                <?php   endwhile;
            endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

