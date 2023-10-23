<?php get_header(); ?>
<div class="breadcrumbs">
    <div class="container">
        <div class="kama_breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="<?= get_home_url(); ?>" itemprop="item">
                    <span itemprop="name">Главная</span></a></span>
            <span class="kb_sep">/</span>
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="<?= get_post_type_archive_link('news'); ?>"
                        itemprop="item"><span itemprop="name">Новости</span></a>
            </span>
            <span class="kb_sep">/</span>
            <span class="kb_title"><? the_title(); ?></span>
        </div>
    </div>
</div>
<div class="container">
    <div class="post post--news">
        <? if(get_the_post_thumbnail_url()): ?>
            <img data-src="<?= get_the_post_thumbnail_url(); ?>" alt="" class="post__thumb lazyload">
        <? endif; ?>
        <div class="post__head">
            <h1>
                <? the_title(); ?>
            </h1>
        </div>
        <div class="post__content wysiwig">
            <? the_content(); ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
       $('.post__content .gallery-item a').each(function () {
          $(this).attr('data-fancybox', 'gallery');
       });
    });
</script>
<?php get_footer(); ?>

