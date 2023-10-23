<?php
/* Template name: Благодарности */
?>
<?php get_header(); ?>
<div class="gratitudes">
    <div class="container">
        <h1><? the_title(); ?></h1>
        <div class="gratitudes__text">
            <? the_content(); ?>
        </div>

        <div class="gratitudes__list">
             <?php $gratitudes = new WP_Query( array( 'post_type' => 'gratitude', 'posts_per_page' => -1 ) ); ?>
             <?php while ( $gratitudes->have_posts() ) : $gratitudes->the_post(); ?>
                 <div class="gratitudes__item">
                     <a class="gratitudes__item-img-wrapper" href="<?= get_the_post_thumbnail_url(); ?>" data-fancybox>
                         <img src="<?= get_the_post_thumbnail_url(); ?>" alt="" class="lazyload gratitudes__item-img">
                     </a>
                     <p class="gratitudes__item-title"><? the_title(); ?></p>
                     <div class="gratitudes__item-desc"><? the_content(); ?></div>
                 </div>
             <?php endwhile; ?>
             <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

