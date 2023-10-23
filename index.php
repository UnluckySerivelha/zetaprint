<?php
get_header(); ?>

<div class="container">
    <h1><? the_title(); ?></h1>

    <div class="wysiwig">
        <? the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>
