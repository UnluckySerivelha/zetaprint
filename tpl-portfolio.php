<?php
/* Template name: Портфолио */
?>
<?php get_header(); ?>

    <div class="container">
        <h1><? the_title(); ?></h1>
    </div>

    <div class="p-portfolio">
        <div class="container">
            <? $cats = get_terms( [
                'hierarchical'  => true,
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true,
            ] ); ?>
        <div class="p-portfolio__cats">
            <? $i = 1; foreach ($cats as $cat): ?>
                <? if($cat->parent == 0): ?>
                    <button class="red-btn p-portfolio__cat<? if($i == 1): ?> active<? endif; ?>">
                        <?= $cat->name ?>
                    </button>
                <? $i++; endif; ?>
            <?  endforeach; ?>
        </div>
        <div class="p-portfolio__cats-select custom-select">
            <div class="current">
                <? $i = 1; foreach ($cats as $cat): ?>
                    <? if($cat->parent == 0): ?>
                            <?= $cat->name ?>
                        <? break; endif; ?>
                <?  endforeach; ?>
            </div>
            <div class="dropdown">
                <? $i = 1; foreach ($cats as $cat): ?>
                    <? if($cat->parent == 0): ?>
                        <button class="item<? if($i == 1): ?> active<? endif; ?>">
                            <?= $cat->name ?>
                        </button>
                        <? $i++; endif; ?>
                <?  endforeach; ?>
            </div>
        </div>
        <div class="p-portfolio__cats-tabs">
            <? $i = 1; foreach ($cats as $cat): ?>
                <? if($cat->parent == 0): ?>
                    <div class="p-portfolio__cats-tab<? if($i == 1): ?> active<? endif; ?>">
                        <? $subcats = get_term_children($cat->term_id, 'portfolio_category'); ?>
                            <? if(count($subcats) > 0): ?>
                                <div class="p-portfolio__subcats">
                                    <div class="p-portfolio__subcats-btns">
                                    <? $n = 1; foreach ($subcats as $subcat): $subcat_object = get_term_by('id', $subcat, 'portfolio_category'); ?>
                                        <button class="p-portfolio__subcat<? if($n == 1): ?> active<? endif; ?>">
                                            <?= $subcat_object->name; ?>
                                        </button>
                                    <? $n++; endforeach; ?>
                                    </div>

                                    <div class="p-portfolio__subcats-tabs">

                                        <? $n = 1; foreach ($subcats as $subcat): $subcat_object = get_term_by('id', $subcat, 'portfolio_category'); ?>
                                            <div class="p-portfolio__subcats-tab<? if($n == 1): ?> active<? endif; ?>">
                                                <div class="last-cases__items">
                                                <?
                                                $args = array(
                                                    'post_type' => 'portfolio',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'portfolio_category',
                                                            'field' => 'id',
                                                            'terms' => $subcat_object->term_id
                                                        )
                                                    )
                                                );
                                                $posts = new WP_Query($args);

                                                if($posts->have_posts()):
                                                    while($posts->have_posts()) : $posts->the_post();
                                                ?>

                                                        <div class="last-cases__item" data-id="<?= $post->ID; ?>">
                                                            <div class="last-cases__item-img-wrapper">
                                                                <? if(get_the_post_thumbnail_url()): ?>
                                                                <img class="last-cases__item-img lazyload" data-src="<?= get_the_post_thumbnail_url(null, 'large'); ?>">
                                                                <? endif; ?>
                                                            </div>
                                                            <div class="last-cases__item-body" data-title="<? the_title(); ?>">
<!--                                                                <p class="last-cases__item-title">--><?// the_title(); ?><!--</p>-->
                                                                <div class="last-cases__item-params">
                                                                    <? if(get_field('параметры')): foreach (get_field('параметры') as $item): ?>
                                                                    <div class="last-cases__item-param"><b><?= trim($item['параметр']); ?>:</b> <span><?= mb_ucfirst(trim($item['значение'])); ?></span></div>
                                                                    <?  endforeach; endif;?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                <? endwhile; endif; ?>

                                            </div>
                                            </div>
                                        <? $n++; endforeach; ?>
                                    </div>
                                </div>
                            <? endif; ?>
                    </div>

                <? $i++; endif; ?>
            <? endforeach; ?>
        </div>


        </div>
    </div>
<?php get_footer(); ?>

