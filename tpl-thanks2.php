<?php
/* Template name: Спасибо за отклик */
get_header();
?>
<div class="thanks">
    <div class="container">
        <div class="thanks__inner">
            <div class="thanks__row">
                <div class="thanks__left">
                    <div class="thanks__title section-title">
                        <h1>Мы получили ваш запрос</h1>
                    </div>
                    <div class="thanks__desc">
                        <p>В течение 20 минут менеджер свяжется с вами,<br> чтобы уточнить детали</p>
                    </div>
                    <a class="thanks__home-link tro" href="/">Вернуться на главную</a>
                    <div class="thanks__socials">
                        <p class="thanks__socials-title">
                            Пока ждете посмотрите наши соцсети
                        </p>
                        <p class="thanks__socials-desc">
                            Там вы найдете видео о нашем производстве и оборудовании,<br> свежие работы из портфолио, истории о том, как мы решали<br> нетривиальные задачи заказчиков
                        </p>
                        <div class="thanks__socials-list">
                            <? $socials = get_field('соц_сети', 'options'); ?>
                            <? if($socials['vk']): ?>
                                <a class="thanks__social-link tro" href="<?= $socials['vk']; ?>">
                                            <img class="thanks__social-icon" src="<?= THEME_DIR ?>/img/icon-vk.svg">
                                        </a>
                            <? endif; ?>
                            <? if($socials['youtube']): ?>
                                <a class="thanks__social-link tro" href="<?= $socials['youtube']; ?>">
                                            <img class="thanks__social-icon" src="<?= THEME_DIR ?>/img/icon-yt.svg">
                                        </a>
                            <? endif; ?>
                            <? if($socials['twitter']): ?>
                                <a class="thanks__social-link tro" href="<?= $socials['twitter']; ?>">
                                            <img class="thanks__social-icon" src="<?= THEME_DIR ?>/img/icon-tw.svg">
                                        </a>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
                <div class="thanks__right">
                    <div class="thanks__people">
                        <img src="<?= THEME_DIR ?>/img/i-manager-woman.png" alt="" class="thanks__people-img">
                        <div class="thanks__people-block">
                            <p class="thanks__people-name">
                                Менеджер «Зетапринт»
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? if(false): ?>
<div class="blog-more blog-more--no-pt">
    <div class="container">
        <div class="section-title blog-more__title">
            <h2>
                Также почитайте наш блог
            </h2>
        </div>
        <?
        $current_post_id = get_the_ID();
        $resent_posts = wp_get_recent_posts( [
            'numberposts'      => 3,
            'offset'           => 0,
            'category'         => 0,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => $current_post_id,
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true,
        ], OBJECT ); ?>
        <div class="blog-more__slider-wrapper">
            <div class="blog-more__slider swiper">
                <div class="swiper-wrapper">
                    <? foreach( $resent_posts as $post ): setup_postdata( $post ); ?>
                        <div class="swiper-slide blog-more__item">
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
                    <? endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<? endif; ?>
<?php get_footer(); ?>
