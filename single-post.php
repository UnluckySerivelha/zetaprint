<?php get_header(); ?>
<div class="breadcrumbs">
    <div class="container">
        <div class="kama_breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="<?= get_home_url(); ?>" itemprop="item">
                    <span itemprop="name">Главная</span></a></span>
            <span class="kb_sep">/</span>
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="<?= get_permalink(410); ?>"
                        itemprop="item"><span itemprop="name">Блог</span></a>
            </span>
            <span class="kb_sep">/</span>
            <span class="kb_title"><? the_title(); ?></span>
        </div>
    </div>
</div>
<div class="container">
    <div class="post">
        <? if(get_the_post_thumbnail_url()): ?>
            <img data-src="<?= get_the_post_thumbnail_url(); ?>" alt="" class="lazyload post__thumb">
        <? endif; ?>
        <div class="post__head">
            <h1>
                <? the_title(); ?>
            </h1>
            <div class="post__meta">
                <span class="post__date">
                    <?php echo get_the_date(); ?>
                </span>
                <span class="post__views">
                    <?= do_shortcode('[post-views]'); ?>
                </span>
            </div>
        </div>
        <div class="post__row">
            <div class="post__left">
                <? if( have_rows('контент') ): ?>
                    <div class="post__content">
                        <? while ( have_rows('контент') ) : the_row(); ?>
                            <?  if( get_row_layout() == 'текстовый_контент' ): ?>
                                <div class="post__content-group post__content-group--wysiwig wysiwig">
                                    <?= get_sub_field('текстовый_контент'); ?>
                                </div>
                            <? endif; ?>
                            <?  if( get_row_layout() == 'содержание' ): ?>
                                <div class="post__content-group post__content-group--contents post-contents">
                                    <? if(get_sub_field('заголовок_содержания')): ?>
                                        <p class="post-contents__title">
                                            <?= get_sub_field('заголовок_содержания'); ?>
                                        </p>
                                    <? endif; ?>
                                    <? if(get_sub_field('содержание')): ?>
                                        <ul class="post-contents__list">
                                            <? foreach (get_sub_field('содержание') as $item): ?>
                                                <li>
                                                    <a href="<?= $item['ссылка'] ?>"><?= $item['текст'] ?></a>
                                                </li>
                                            <? endforeach; ?>
                                        </ul>
                                    <? endif; ?>
                                </div>
                            <? endif; ?>
                        <? endwhile; ?>
                    </div>
                <? endif; ?>
                <div class="post__tags">
                    <? the_tags('', ', '); ?>
                </div>

                <div class="post__share">
                    <? include('include/share.php'); ?>
                </div>

            </div>
            <div class="post__right">
                <? if(get_field('автор_статьи')): ?>
                <? $author = get_field('автор_статьи'); ?>
                <div class="post__author">
                    <? if($author['изображение']): ?>
                        <img data-src="<?= $author['изображение']['sizes']['thumbnail']; ?>" alt="<?= $author['имя']; ?>" class="post__author-img lazyload">
                    <? endif; ?>
                    <? if($author['имя']): ?>
                    <p class="post__author-name"><?= $author['имя']; ?></p>
                    <? endif; ?>
                    <? if($author['должность']): ?>
                    <p class="post__author-desc"><?= $author['должность']; ?></p>
                    <? endif; ?>
                </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>

    <div class="blog-more">
        <div class="container">
            <div class="blog-more__title section-title">
                <h2>
                    Вам также будет интересно
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

<div class="container">
    <div class="blog-subscribe">
        <p class="blog-subscribe__title">
            Подпишитесь на наш блог и получайте<br>
            ценные материалы каждую неделю
        </p>
        <p class="blog-subscribe__desc">
            Новые технологии в типографии, новости рынка, <br>
            советы по подготовке макетов и интересные кейсы
        </p>
        <div class="blog-subscribe__form-wrapper">
            <form action="">
                <div class="blog-subscribe__form-row">
                    <input type="email" placeholder="Ваша почта" required>
                    <button class="tro">Подписаться</button>
                </div>
            </form>
        </div>
        <p class="blog-subscribe__agreement">
            Нажимая на кнопку, вы соглашаетесь с <a href="<?= get_permalink(433) ?>" class="tro">Политикой конфиденциальности сайта</a>
        </p>
    </div>
</div>
<?php get_footer(); ?>

