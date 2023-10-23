<?php get_header(); ?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<div class="container">
    <div class="blog">
        <div class="blog__head">
            <h1>
                Блог
            </h1>
            <div class="blog__sort">
                <a href="/blog/?sort_by=popular" class="blog__sort-link tro">
                    по популярности
                </a>
                <? if($_GET['sort_by'] == 'date' && $_GET['order'] == 'ASC'): ?>
                    <a href="/blog/?sort_by=date&order=DESC" class="blog__sort-link tro sorted">
                        по актуальности
                    </a>
                <? else: ?>
                    <a href="/blog/?sort_by=date&order=ASC" class="blog__sort-link tro">
                        по актуальности
                    </a>
                <? endif; ?>
            </div>
        </div>
        <div class="blog__list">
            <?
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'posts_per_page' => -1,
                    'paged' => $paged
                );
                if($_GET['sort_by'] == 'date') {
                    if($_GET['order']){
                        $args['order'] = $_GET['order'];
                    }
                    $args['orderby'] = 'date';

                }
                $query = new WP_Query($args);
            ?>
             <? if( $query->have_posts() ): ?>
                <? while( $query->have_posts() ): ?>
                    <? $query->the_post(); ?>
                         <div class="blog-more__item">
                            <? if(get_field('видео')['ссылка_на_видео']): ?>
                                <a href="<?= get_field('видео')['ссылка_на_видео']; ?>" class="blog-more__item-video tro" data-fancybox>

                                </a>
                            <? endif; ?>
                             <a href="<? the_permalink(); ?>" class="blog-more__item-img-wrapper">
                                <? if( get_the_post_thumbnail_url() ):?>
                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="" class="lazyload blog-more__item-img">
                                <? endif; ?>
                            </a>
                            <a href="<? the_permalink(); ?>" class="blog-more__item-title"><? the_title(); ?></a>
                            <div class="blog-more__item-desc">
                                <? the_excerpt() ?>
                            </div>
                            <div class="blog-more__item-bottom">
                                <span class="blog-more__item-date">
                                    <?= get_the_date(); ?>
                                </span>
                                <span class="blog-more__item-views">
                                    <?= do_shortcode('[post-views]'); ?>
                                </span>
                            </div>
                        </div>
                 <? endwhile; ?>
             <? endif; ?>


        </div>

        <div class="blog__pagination">
            <? $max_page = $query->max_num_pages;
            echo paginate_links( array(
                'base'    => str_replace( $max_page, '%#%', esc_url( get_pagenum_link( $max_page ) ) ),
                'format'  => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total'   => $max_page,
            ) ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

