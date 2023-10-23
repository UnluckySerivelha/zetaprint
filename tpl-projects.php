<?php
/* Template name: Проекты */
?>
<?php get_header(); ?>

    <div class="container">
        <h1><? the_title(); ?></h1>
    </div>

	<div class="projects">
		<div class="container">
            <? $cats = get_terms( [
                'taxonomy' => 'projects_category',
                'hide_empty' => true,
            ] ); ?>
			<div class="projects__tabs-head">
                <? $i = 0; foreach ($cats as $cat): ?>
                    <button class="projects__tab-head red-btn<? if($i == 0): ?> active<? endif; ?>"><?= $cat->name; ?></button>
                <? $i++; endforeach; ?>
			</div>
            <div class="projects__tabs-select custom-select">
                <div class="current">
                    <?= $cats[0]->name; ?>
                </div>
                <div class="dropdown">
                    <? $i = 0; foreach ($cats as $cat): ?>
                        <div class="item">
                            <?= $cat->name; ?>
                        </div>
                        <? $i++; endforeach; ?>
                </div>
            </div>
		</div>
		<div class="container container--large">
			<div class="projects__tabs-content">
                <? $i = 0; foreach ($cats as $cat): ?>
                    <div class="projects__tab<? if($i == 0): ?> active<? endif; ?>">
                        <? $posts = get_posts([
                            'post_type'=>'projects',
                            'numberposts' => -1,
                            'tax_query'=>[
                                [
                                    'taxonomy'=>'projects_category',
                                    'field' => 'id',
                                    'terms' => $cat->term_id,
                                ]
                            ]
                        ]); ?>
                        <?  ?>
                        <? $n = 0; foreach ($posts as $post): ?>
                            <div class="case">
                                <div class="case__row">
                                    <div class="case__left">
                                        <? if(get_field('плашка', $post->ID)): ?>
                                        <div class="case__label">
                                            <img class="case__label-icon lazyload" data-src="<?= get_field('плашка', $post->ID)['иконка']['url']; ?>">
                                            <span><?= get_field('плашка', $post->ID)['текст']; ?></span></div>
                                        <? endif; ?>
                                        <? if(get_field('заголовок', $post->ID)): ?>
                                        <h3 class="case__title"><?= get_field('заголовок', $post->ID); ?></h3>
                                        <? endif; ?>
                                        <? if(get_field('текст', $post->ID)): ?>
                                        <p class="case__desc"><?= get_field('текст', $post->ID); ?></p>
                                        <? endif; ?>
                                        <? if(get_field('список', $post->ID)): ?>
                                            <? if(get_field('список', $post->ID)['заголовок']): ?>
                                            <p class="case__list-title"><?= get_field('список', $post->ID)['заголовок']; ?></p>
                                            <? endif; ?>
                                            <? if(get_field('список', $post->ID)['элементы_списка']): ?>
                                            <ul class="case__list">
                                                <? foreach (get_field('список', $post->ID)['элементы_списка'] as $item): ?>
                                                    <li><?= $item['текст']; ?></li>
                                                <? endforeach; ?>
                                            </ul>
                                            <? endif; ?>
                                        <? endif; ?>
<!--                                        <a class="case__review-link" href="#">Отзыв клиента</a></div>-->
                                        <? $video = get_field('видео', $post->ID); ?>
                                        <? $gallery = get_field('галерея', $post->ID); ?>
                                    </div>
                                    <div class="case__right">
                                        <? if($gallery): ?>
                                        <div class="case__gallery-large">
                                            <img class="lazyload" data-src="<?= $gallery[0]['sizes']['large']; ?>">
                                        </div>
                                        <? array_shift($gallery); ?>
                                        <div class="case__gallery-small">
                                            <? if($video['ссылка'] && $video['превью']): ?>
                                            <a class="video" data-fancybox="gallery-<?= $n; ?>" href="<?= $video['ссылка'] ?>">
                                                <span class="video-btn"></span><img class="lazyload" data-src="<?= $video['превью']['sizes']['medium'] ?>">
                                            </a>
                                            <? endif; ?>
                                            <? foreach ($gallery as $img): ?>
                                                <a data-fancybox="gallery-<?= $n; ?>" href="<?= $img['sizes']['large']; ?>">
                                                    <img class="lazyload" data-src="<?= $img['sizes']['medium'] ?>">
                                                </a>
                                            <? endforeach; ?>
                                        </div>
                                        <? endif; ?>
                                    </div>
                                </div>
                                    <? $gallery = get_field('галерея', $post->ID); ?>
                                    <div class="case__slider-wrapper">
                                    <div class="swiper case__slider">
                                        <div class="swiper-wrapper">
                                            <? foreach ($gallery as $img): ?>
                                                <a href="<?= $img['sizes']['large']; ?>" class="case__slide swiper-slide" data-fancybox="gallery-m-<?= $n; ?>">
                                                    <img class="lazyload" data-src="<?= $img['sizes']['large']; ?>">
                                                </a>
                                            <? endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? $n++; endforeach; ?>
                    </div>
                <? $i++; endforeach; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

