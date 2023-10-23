<?php
/* Template name: Главная */
?>
<?php get_header(); ?>
<?php if (have_rows('первый_экран')) : ?>
    <?php while (have_rows('первый_экран')) : the_row(); ?>
        <div class="hero">
                <div class="container" itemscope itemtype="https://schema.org/WPHeader">
                    <? if(get_field('отдельный_заголовок_страницы')): ?>
                        <h1 class="hero__top-title"><?= get_field('отдельный_заголовок_страницы'); ?></h1>
                        <p class="hero__title" itemprop="headline"><?php the_sub_field('заголовок'); ?></p>
                    <? else: ?>
                        <h1 class="hero__title" itemprop="headline"><?php the_sub_field('заголовок'); ?></h1>
                    <? endif; ?>
                    <div class="hero__features">
                        <? foreach (get_sub_field('преимущества') as $item): ?>
                            <div class="hero__feature" itemprop="hasPart" itemscope itemtype="https://schema.org/WebPageElement">
                                <img class="hero__feature-icon" src="<?= $item['иконка']; ?>" alt="Icon" itemprop="image">
                                <h2 class="hero__feature-title" itemprop="name"><?= $item['заголовок']; ?></h2>
                                <p class="hero__feature-desc" itemprop="description"><?= $item['текст']; ?></p>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php $production = get_field('продукция'); ?>
<?php if($production): ?>
<div class="production">
		<div class="container">
			<div class="production__row">
				<div class="production__left">
					<div class="production__tabs-head production__tabs-head--cats">
                        <? $i = 1; foreach ($production['категории'] as $cat): ?>
						<button class="production__tab-head<? if($i == 1): ?> active<? endif; ?>">
							<svg>
								<use xlink:href="#arrow-right"></use>
							</svg><?= $cat['заголовок']; ?></button>
                        <? $i++; endforeach; ?>
                        <a class="production__tab-head" href="<?= get_permalink('185'); ?>">
							<svg>
								<use xlink:href="#arrow-right"></use>
                        </svg>Вся продукция</a>
					</div>
				</div>
				<div class="production__right">
					<div class="production__tabs-content">
                        <? $i = 1; foreach ($production['категории'] as $cat): ?>
                            <div class="production-tab<? if($i == 1): ?> active<? endif; ?>"
                                    <? if($cat['фон_категории']): ?>
                                        style="background-image: url(<?= $cat['фон_категории']['sizes']['large']; ?>)"
                                    <? else: ?>
                                        style="background-image: url(<?= $cat['подкатегории'][0]['фон']['sizes']['large']; ?>)"
                                    <? endif; ?>
                            >
                                <div class="production-tab__title">
                                    <? if($cat['ссылка_на_страницу']): ?>
                                    <a href="<?= $cat['ссылка_на_страницу']; ?>">
                                        <?= strip_tags($cat['заголовок']); ?>
                                    </a>
                                    <? else: ?>
                                        <?= $cat['заголовок']; ?>
                                    <? endif; ?>
                                </div>
                                <? $subcats = $cat['подкатегории']; ?>
                                <? if($subcats): ?>
                                <div class="production-tab__cats">
                                    <? $n = 1; foreach ($subcats as $subcat): ?>
                                        <a class="production-tab__cat-btn<? if($n == 1): ?> active<? endif; ?>" href="#" data-bg="<?= $subcat['фон']['sizes']['large'] ?>"><?= $subcat['текст'] ?></a>
                                    <? $n++; endforeach; ?>
                                </div>
                                <? endif; ?>
                                <div class="production-tab__meta">
                                    <? if($cat['минимальное_количество']): ?>
                                    <p class="production-tab__meta-time"><?= $cat['минимальное_количество']; ?></p>
                                    <? endif; ?>
                                    <? if($cat['минимальный_срок']): ?>
                                        <p class="production-tab__meta-count"><?= $cat['минимальный_срок']; ?></p>
                                    <? endif; ?>

                                </div>
                                <a class="production-tab__btn red-btn" href="#popup-tech-task" data-fancybox>Рассчитать стоимость</a>
                            </div>
                        <? $i++; endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="production-mob">
		<div class="container">
			<p class="production-mob__title">Каталог продукции</p>
			<div class="production-mob__list">
                <? foreach ($production['категории'] as $cat): ?>
                <?
                    $background = '';
                    if($cat['фон_категории']) {
                        $background = $cat['фон_категории']['sizes']['medium'];
                    } else if($cat['подкатегории'][0]['фон']) {
                        $background = $cat['подкатегории'][0]['фон']['sizes']['medium'];
                    }
                ?>
				<div class="production-mob__item">
                    <? if($cat['ссылка_на_страницу']): ?>
                    <a href="<?= $cat['ссылка_на_страницу']; ?>" class="production-mob__item-link"></a>
                    <? endif; ?>
                    <img class="lazyload" data-src="<?= $background ?>">
					<div class="production-mob__item-title"><?= $cat['заголовок']; ?></div>
					<div class="production-tab__meta production-mob__item-meta">
						<p class="production-tab__meta-time">от 3 дней</p>
						<p class="production-tab__meta-count">от 300 шт.</p>
					</div>
				</div>
				<? endforeach; ?>
			</div>
			<div class="production-mob__btn-wrapper">
                <a class="red-btn--arrow red-btn production-mob__btn" href="<?= get_permalink(235) ?>">
                    <span>Посмотреть все</span>
                </a>
            </div>
		</div>
	</div>
<?php endif; ?>
<? if (get_field('все_печатают')): ?>
    <? $slogan = get_field('все_печатают'); ?>
    <div class="slogan">
		<div class="slogan__inner">
			<div class="slogan__content">
                <div class="slogan__title section-title">
                    <?= $slogan['заголовок'] ?>
                </div>
                <? if ($slogan['блоки_с_иконками']): ?>
                    <div class="slogan__items">
                    <? foreach ($slogan['блоки_с_иконками'] as $item): ?>
					<div class="slogan__item">
                        <img class="slogan__item-icon lazyload"
                                data-src="<?= $item['иконка']; ?>">
						<div class="slogan__item-body">
							<p class="slogan__item-text">
                                <?= $item['текст']; ?>
                            </p>
                            <a class="slogan__item-link"
                                    href="<?= $item['ссылка']['url']; ?>">
                                <?= $item['ссылка']['title']; ?>
                            </a>
                        </div>
					</div>
					<? endforeach; ?>
				</div>
                <? endif; ?>
			</div>
		</div>
        <? if($slogan['видео']): ?>
            <div class="slogan__video-wrapper video-block">
                <img class="slogan__video-preview lazyload video-block__img"
                        data-src="<?= $slogan['видео']['превью_видео'] ?>">
                <a class="slogan__video-btn play-btn" href="<?= $slogan['видео']['ссылка_на_видео'] ?>" data-fancybox></a>
                <div class="slogan__video-text video-block__text">
                    <?= $slogan['видео']['текст_видео'] ?>
                </div>
            </div>
        <? endif; ?>
        <? if($slogan['клиенты']): ?>
		<div class="slogan__clients">
			<div class="container">
				<div class="slogan__clients-head">
					<div class="slogan__clients-title">
						<?= $slogan['клиенты']['заголовок'] ?>
                    </div>
					<div class="slogan__clients-controls">
						<button class="swiper-button-prev slider-arrow slider-arrow--left slider-arrow--type-1"></button>
						<button class="swiper-button-next slider-arrow slider-arrow--right slider-arrow--type-1"></button>
					</div>
				</div>
				<div class="slogan__clients-slider-wrapper">
					<div class="slogan__clients-slider swiper">
						<div class="swiper-wrapper">
                            <? foreach ( $slogan['клиенты']['логотипы'] as $item): ?>
                                <div class="swiper-slide slogan__clients-slide">
                                    <img class="lazyload" data-src="<?= $item['url']; ?>"></div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
        <? endif; ?>
	</div>
<? endif; ?>
<div class="manufacture">
    <div class="container">
        <div class="manufacture__title section-title">
            <h3>Современное производство позволяет <br> печать любые объемы точно в&nbsp;срок</h3></div>
        <div class="manufacture__features">
            <div class="manufacture__feature">
                <p class="manufacture__feature-red">4 000&nbsp;м<sup>2</sup></p>
                <p class="manufacture__feature-black">производственных <br> площадей</p>
            </div>
            <div class="manufacture__feature">
                <p class="manufacture__feature-red">1 000 000</p>
                <p class="manufacture__feature-black">полноцветных оттисков <br> печатаем в&nbsp;сутки</p>
            </div>
            <div class="manufacture__feature">
                <p class="manufacture__feature-red">37 единиц</p>
                <p class="manufacture__feature-black">оборудования, среди которых 6 печатных машин Heidelberg</p>
            </div>
            <div class="manufacture__feature manufacture__feature--bg" style="background-image: url(<?= THEME_DIR ?>/img/manufacture-feature-bg.jpg)"><a class="manufacture__feature-link" href="<?= get_permalink(469); ?>">Просмотреть <br> оборудование</a></div>
        </div>
        <div class="manufacture__video-wrapper video-block"><img class="manufacture__video-preview lazyload video-block__img" data-src="<?= wp_get_attachment_url(1316); ?>">
            <a class="manufacture__video-btn play-btn video-block__play-btn" href="https://www.youtube.com/watch?v=aUM3xAfVPS8&feature=emb_title" data-fancybox></a>
            <div class="manufacture__video-text video-block__text">
                <p><b>Александр Глушков<br>
                        Видеообращение директора компании</b></p>
            </div>
        </div>
    </div>
</div>
	<div class="portfolio">
		<div class="portfolio__inner">
			<div class="container">
				<div class="portfolio__title section-title">
					<h2>Посмотрите, как&nbsp;мы <br> решаем сложные <br> задачи заказчиков</h2></div>
				<div class="portfolio__mob-slider-btns">
					<div class="slider-arrow slider-arrow--left portfolio-slider-arrow-left"></div>
					<div class="slider-arrow slider-arrow--right portfolio-slider-arrow-right"></div>
				</div>
				<div class="portfolio__slider-wrapper">
					<div class="swiper-button-prev slider-arrow slider-arrow--left portfolio-slider-arrow-left"></div>
					<div class="swiper-button-next slider-arrow slider-arrow--right portfolio-slider-arrow-right"></div>
					<div class="portfolio__slider swiper">
						<div class="swiper-wrapper">
                            <? $posts = get_posts([
                                'post_type'=>'projects',
                                'numberposts' => -1
                            ]); ?>
                            <? $n = 0; foreach ($posts as $post): ?>
                                <div class="case swiper-slide">
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
                            <? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <? wp_reset_postdata(); ?>
    <?php $last_cases = get_field('свежие_примеры'); ?>
	<div class="last-cases">
		<div class="container">
			<div class="last-cases__head">
				<div class="section-title last-cases__title">
					<?= $last_cases['заголовок'] ?></div>
                <a class="last-cases__btn red-btn red-btn--arrow" href="<?= $last_cases['ссылка_кнопки'] ?>"><span>В портфолио</span></a></div>
			<div class="last-cases__slider-wrapper">
				<div class="swiper-button-next slider-arrow slider-arrow--right"></div>
				<div class="swiper-button-prev slider-arrow slider-arrow--left"></div>
				<div class="last-cases__slider swiper">
					<div class="swiper-wrapper">
                        <? foreach ($last_cases['портфолио'] as $item): ?>
						<div class="swiper-slide last-cases__item">
                            <div class="last-cases__item-img-wrapper">
                                <? if(get_the_post_thumbnail_url($item->ID)): ?>
                                    <img class="last-cases__item-img lazyload" data-src="<?= get_the_post_thumbnail_url($item->ID, 'large'); ?>">
                                <? endif; ?>
                            </div>
							<div class="last-cases__item-body">
<!--								<p class="last-cases__item-title">--><?//= $item->post_title; ?><!--</p>-->
								<div class="last-cases__item-params">
                                    <? if(get_field('параметры', $item->ID)): foreach (get_field('параметры', $item->ID) as $item): ?>
                                        <div class="last-cases__item-param"><b><?= trim($item['параметр']); ?>: </b> <span><?= mb_ucfirst(trim($item['значение'])); ?></span></div>
                                    <?  endforeach; endif;?>
								</div>
							</div>
						</div>
                        <? endforeach; ?>
					</div>
				</div>
			</div>
			<div class="last-cases__items">
				<? foreach ($last_cases['портфолио'] as $item): ?>
                    <div class="last-cases__item">
                            <div class="last-cases__item-img-wrapper">
                                <? if(get_the_post_thumbnail_url($item->ID)): ?>
                                    <img class="last-cases__item-img lazyload" data-src="<?= get_the_post_thumbnail_url($item->ID, 'large'); ?>">
                                <? endif; ?>
                            </div>
							<div class="last-cases__item-body">
<!--								<p class="last-cases__item-title">--><?//= $item->post_title; ?><!--</p>-->
								<div class="last-cases__item-params">
                                    <? if(get_field('параметры', $item->ID)): foreach (get_field('параметры', $item->ID) as $item): ?>
                                        <div class="last-cases__item-param"><b><?= $item['параметр']; ?>:</b><span><?= $item['значение']; ?></span></div>
                                    <?  endforeach; endif;?>
								</div>
							</div>
						</div>
                <? endforeach; ?>
			</div>
		</div>
	</div>
    <? $gratitude = get_field('благодарственные_письма'); ?>
    <? if($gratitude): ?>
        <div class="gratitude gratitude--home">
            <div class="container">
                <div class="section-title gratitude__title">
                    <?= $gratitude['заголовок']; ?>
                </div>
                <div class="gratitude__slider-wrapper">
                    <div class="slider-arrow slider-arrow--left"></div>
                    <div class="slider-arrow slider-arrow--right"></div>
                    <div class="gratitude__slider swiper">
                        <div class="swiper-wrapper">
                            <? foreach ($gratitude['список'] as $item): ?>
                                <div class="gratitude__item swiper-slide">
                                    <a class="gratitude__item-link" data-fancybox href="<?= $item['изображение']['url']; ?>">
                                        <img class="lazyload" data-src="<?= $item['изображение']['sizes']['medium']; ?>"></a>
                                    <p class="gratitude__item-title"><?= $item['заголовок']; ?></p>
                                    <p class="gratitude__item-desc"><?= $item['подзаголовок']; ?></p>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
<!--                <div class="gratitude__btn-wrapper">-->
<!--                    <button class="red-btn gratitude__btn">Больше благодарностей</button>-->
<!--                </div>-->
            </div>
        </div>
    <? endif; ?>
    <? if(false): ?>
	<div class="news">
		<div class="container">
			<div class="news__head">
				<div class="section-title news__title">
					<h2>Новости «Зетапринт»</h2></div><a class="red-btn red-btn--arrow news__btn" href="#"><span>Все новости</span></a></div>
			<div class="news__slider-wrapper">
				<div class="swiper-button-prev slider-arrow slider-arrow--left"></div>
				<div class="swiper-button-next slider-arrow slider-arrow--right"></div>
				<div class="news__slider swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide news__slide">
							<a class="news__slide-img-wrapper" href="#"><img class="news__slide-img lazyload" data-src="<?= THEME_DIR ?>/img/news-slide-1.jpg"></a><span class="news__slide-date">09.02.2021</span><a class="news__slide-title" href="#">Мы купили новый агрегат <br> для резки Stitchmaster <br> ST 350</a></div>
						<div class="swiper-slide news__slide">
							<a class="news__slide-img-wrapper" href="#"><img class="news__slide-img lazyload" data-src="<?= THEME_DIR ?>/img/news-slide-2.jpg"></a><span class="news__slide-date">09.02.2021</span><a class="news__slide-title" href="#">Мы купили новый агрегат <br> для резки Stitchmaster <br> ST 350</a></div>
						<div class="swiper-slide news__slide">
							<a class="news__slide-img-wrapper" href="#"><img class="news__slide-img lazyload" data-src="<?= THEME_DIR ?>/img/news-slide-3.jpg"></a><span class="news__slide-date">09.02.2021</span><a class="news__slide-title" href="#">Мы купили новый агрегат <br> для резки Stitchmaster <br> ST 350</a></div>
						<div class="swiper-slide news__slide">
							<a class="news__slide-img-wrapper" href="#"><img class="news__slide-img lazyload" data-src="<?= THEME_DIR ?>/img/news-slide-4.jpg"></a><span class="news__slide-date">09.02.2021</span><a class="news__slide-title" href="#">Мы купили новый агрегат <br> для резки Stitchmaster <br> ST 350</a></div>
						<div class="swiper-slide news__slide">
							<a class="news__slide-img-wrapper" href="#"><img class="news__slide-img lazyload" data-src="<?= THEME_DIR ?>/img/news-slide-1.jpg"></a><span class="news__slide-date">09.02.2021</span><a class="news__slide-title" href="#">Мы купили новый агрегат <br> для резки Stitchmaster <br> ST 350</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<? endif; ?>
<?php include "template_parts/start.php"; ?>
<? if(false): ?>
<!--     <div class="seo-text">
		<div class="container">
			<div class="seo-text__inner">
				<div class="seo-text__wysiwig">
					<h2>Заголовок h2</h2>
					<p>В своём стремлении повысить качество жизни, они забывают, что экономическая повестка сегодняшнего дня однозначно фиксирует необходимость анализа существующих паттернов поведения. Также как понимание сути ресурсосберегающих технологий обеспечивает актуальность системы массового участия. Господа, постоянный количественный рост и сфера нашей активности предполагает независимые способы реализации приоретизации разума над эмоциями. Имеется спорная точка зрения, гласящая примерно следующее: элементы политического процесса заблокированы в рамках своих собственных рациональных ограничений.</p>
					<h3>Заголовок h3</h3>
					<p>С другой стороны, выбранный нами инновационный путь способствует подготовке и реализации экономической целесообразности принимаемых решений. Картельные сговоры не допускают ситуации, при которой явные признаки победы институционализации являются только методом политического участия и разоблачены.</p>
					<h4>Заголовок h4</h4>
					<p>Сложно сказать, почему акционеры крупнейших компаний, которые представляют собой яркий пример континентально-европейского типа политической культуры, будут функционально разнесены на независимые элементы. Господа, укрепление и развитие внутренней структуры прекрасно подходит для реализации кластеризации усилий!</p>
					<h5>Заголовок h5</h5>
					<p>Есть над чем задуматься: ключевые особенности структуры проекта преданы социально-демократической анафеме. С учётом сложившейся международной обстановки, существующая теория не даёт нам иного выбора, кроме определения кластеризации усилий. Безусловно, курс на социально-ориентированный национальный проект является качественно новой ступенью глубокомысленных рассуждений. Внезапно, тщательные исследования конкурентов формируют глобальную экономическую сеть и при этом — в равной степени предоставлены сами себе. Прежде всего, существующая теория однозначно определяет каждого участника как способного принимать собственные решения касаемо первоочередных требований.</p>
					<p>Внезапно, базовые сценарии поведения пользователей лишь добавляют фракционных разногласий и подвергнуты целой серии независимых исследований. В своём стремлении повысить качество жизни, они забывают, что экономическая повестка сегодняшнего дня не оставляет шанса для инновационных методов управления процессами.</p>
					<h6>Заголовок h6</h6>
					<p>Вот вам яркий пример современных тенденций — перспективное планирование в значительной степени обусловливает важность укрепления моральных ценностей. Таким образом, высокое качество позиционных исследований в значительной степени обусловливает важность системы обучения кадров, соответствующей насущным потребностям.</p>
					<p>Как уже неоднократно упомянуто, интерактивные прототипы, которые представляют собой яркий пример континентально-европейского типа политической культуры, будут своевременно верифицированы. Мы вынуждены отталкиваться от того, что курс на социально-ориентированный национальный проект является качественно новой ступенью вывода текущих активов. Принимая во внимание показатели успешности, экономическая повестка сегодняшнего дня представляет собой интересный эксперимент проверки благоприятных перспектив.</p>
					<p>Каждый из нас понимает очевидную вещь: новая модель организационной деятельности, а также свежий взгляд на привычные вещи — безусловно открывает новые горизонты для укрепления моральных ценностей. Как принято считать, предприниматели в сети интернет, вне зависимости от их уровня, должны быть призваны к ответу. Приятно, граждане, наблюдать, как представители современных социальных резервов будут описаны максимально подробно. Безусловно, сплочённость команды профессионалов напрямую зависит от поставленных обществом задач. С учётом сложившейся международной обстановки, постоянный количественный рост и сфера нашей активности, в своём классическом представлении, допускает внедрение новых принципов формирования материально-технической и кадровой базы.</p>
					<p>С учётом сложившейся международной обстановки, начало повседневной работы по формированию позиции является качественно новой ступенью переосмысления внешнеэкономических политик. Для современного мира консультация с широким активом предоставляет широкие возможности для системы массового участия. Картельные сговоры не допускают ситуации, при которой представители современных социальных резервов представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности. Повседневная практика показывает, что курс на социально-ориентированный национальный проект создаёт предпосылки для соответствующих условий активизации. В частности, постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обусловливает важность инновационных методов управления процессами. Приятно, граждане, наблюдать, как явные признаки победы институционализации, инициированные исключительно синтетически, смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности.</p>
				</div>
				<div class="seo-text__more-link"><a href="#read-more">Читать полностью</a></div>
			</div>
		</div>
	</div> -->
<? endif; ?>
<?php get_footer(); ?>

