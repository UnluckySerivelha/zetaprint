<?php
/* Template name: О нас */
get_header();
?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>

<div class="about-us">
    <? $about_us = get_field('первый_экран'); ?>
        <div class="about-us__inner" style="background-image: url(<?= $about_us['фон'] ?>);">
                <div class="container">
            <div class="about-us__title">
                <?= $about_us['заголовок'] ?>
            </div>
            <div class="about-us__links">
                <? foreach ($about_us['ссылки'] as $link): ?>
                    <a href="<?= $link['ссылка']['url'] ?>" class="tro">
                        <?= $link['ссылка']['title'] ?>
                    </a>
                <? endforeach; ?>
            </div>
            <? $slogan = get_field('все_печатают', 6); ?>
            <div class="about-us__video">
                <div class="slogan__video-wrapper video-block">
                    <img class="slogan__video-preview video-block__img"
                            src="<?= wp_get_attachment_url(1316); ?>">
                    <a class="slogan__video-btn play-btn" href="https://youtu.be/aUM3xAfVPS8" data-fancybox></a>
                    <div class="slogan__video-text video-block__text">
                        <p>
                            <b>
                                Александр Глушков
                            </b>
                            <br>
                            <b>Видеообращение директора компании</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="manufacture">
        <div class="container">
            <div class="manufacture__title section-title">
                <h3>Современное производство позволяет <br> печать любые объемы точно в срок</h3></div>
            <div class="manufacture__features">
                <div class="manufacture__feature">
                    <p class="manufacture__feature-red">4 000 м<sup>2</sup></p>
                    <p class="manufacture__feature-black">производственных
                        <br> площадей</p>
                </div>
                <div class="manufacture__feature">
                    <p class="manufacture__feature-red">1 000 000</p>
                    <p class="manufacture__feature-black">полноцветных оттисков <br> печатаем в сутки</p>
                </div>
                <div class="manufacture__feature">
                    <p class="manufacture__feature-red">37 единиц</p>
                    <p class="manufacture__feature-black">оборудования, среди которых 6 печатных машин Heidelberg</p>
                </div>
                <div class="manufacture__feature manufacture__feature--bg" style="background-image: url(<?= THEME_DIR ?>/img/manufacture-feature-bg.jpg)">
                    <a class="manufacture__feature-link" href="<?= get_permalink(469); ?>">Просмотреть <br> оборудование</a></div>
            </div>
            <div class="manufacture__video-wrapper video-block"><img class="manufacture__video-preview lazyload video-block__img" data-src="<?= THEME_DIR ?>/img/manufacture-video-preview.jpg">
                <a class="manufacture__video-btn play-btn video-block__play-btn" href="https://www.youtube.com/watch?v=fps0pSxAQPU" data-fancybox></a>
                <div class="manufacture__video-text video-block__text">
                    <p><b>Узнайте все о нашем <br> производстве</b>
                        <br> из 2-минутного видео</p>
                </div>
            </div>
        </div>
    </div>
    <? $clients = get_field('клиенты'); ?>
    <div class="clients">
        <div class="clients__inner">
            <div class="container">
                <div class="clients__title section-title">
                    <h2><?= $clients['заголовок'] ?></h2>
                </div>
                <div class="clients__row">
                    <? foreach ($clients['логотипы'] as $logo): ?>
                        <div class="clients__col">
                            <img class="lazyload" data-src="<?= $logo; ?>" alt="">
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <? $gratitude = get_field('благодарственные_письма', 6); ?>
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

    <? $publications = get_field('публикации_о_нас'); ?>
    <? if($publications && false): ?>

        <div class="publications">
            <div class="container">
                <div class="publications__title section-title">
                    <?= $publications['заголовок']; ?>
                </div>
                <div class="publications__slider-wrapper">
                    <div class="publications__slider-arrow publications__slider-arrow--left slider-arrow slider-arrow--left">

                    </div>
                    <div class="publications__slider-arrow publications__slider-arrow--right slider-arrow slider-arrow--right">

                    </div>
                    <div class="swiper publications__slider">
                        <div class="swiper-wrapper">
                            <? foreach ($publications['список_публикаций'] as $item): ?>
                                <div class="publication swiper-slide">
                                    <a href="<?= $item['ссылка'] ?>" target="_blank" class="publication__img-wrapper tro">
                                        <img src="<?= $item['изображение'] ?>" alt="" class="lazyload publication__img">
                                    </a>
                                    <span class="publication__date">
                                        <?= $item['дата']; ?>
                                    </span>
                                    <a href="<?= $item['ссылка'] ?>" target="_blank" class="publication__title">
                                        <?= $item['заголовок']; ?>
                                    </a>

                                    <span class="publication__source">
                                        <?= $item['источник']; ?>
                                    </span>
                                </div>
                            
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <? endif; ?>

    <div class="team">
        <div class="team__inner">
            <div class="container">
                <div class="team__title section-title">
                    <h2>Команда «Зетапринт»</h2>
                </div>
                <div class="team__row">
                    <div class="team__left">
                        <div class="team__btns">
                            <? $team_items = get_field('команда')['люди']; ?>
                            <? $i = 1; foreach ($team_items as $item): ?>
                            <button class="team__btn<? if($i == 1): ?> active<? endif; ?>">
                                <span class="team__btn-row">
                                    <span class="team__btn-img-wrapper">
                                        <? if($item['изображение_в_кружочке']): ?>
                                            <img data-src="<?= $item['изображение_в_кружочке']['url']; ?>" alt="<? if($item['имя']): ?><?= $item['имя'] ?><? endif; ?>" class="team__btn-img lazyload">
                                        <? endif; ?>
                                    </span>
                                    <span class="team__btn-info">
                                        <? if($item['имя']): ?>
                                            <span class="team__btn-name">
                                                <?= $item['имя'] ?>
                                            </span>
                                        <? endif; ?>
                                        <? if($item['должность']): ?>
                                            <span class="team__btn-desc">
                                                <?= $item['должность'] ?>
                                            </span>
                                        <? endif; ?>
                                    </span>
                                </span>
                            </button>
                            <? $i++; endforeach; ?>
                        </div>
                    </div>

                    <div class="team__right">
                        <div class="team__slider-wrapper">
                            <div class="team__slider-arrow team__slider-arrow--prev slider-arrow slider-arrow--left"></div>
                            <div class="team__slider-arrow team__slider-arrow--next slider-arrow slider-arrow--right"></div>
                            <div class="team__slider swiper">
                                <div class="swiper-wrapper">
                                    <? $i = 1; foreach ($team_items as $item): ?>
                                    <div class="swiper-slide team__tab<? if($i == 1): ?> active<? endif; ?>">
                                        <div class="team__tab-img-wrapper">
                                            <? if($item['изображение_большое']): ?>
                                                <img data-src="<?= $item['изображение_большое']['sizes']['large']; ?>" alt="" class="lazyload team__tab-img">
                                            <? endif; ?>
                                        </div>
                                        <? if($item['имя']): ?>
                                        <p class="team__tab-name">
                                            <?= $item['имя'] ?>
                                        </p>
                                        <? endif; ?>
                                        <? if($item['должность']): ?>
                                        <p class="team__tab-desc">
                                            <?= $item['должность'] ?>
                                        </p>
                                        <? endif; ?>
                                        <? if($item['доп_текст']): ?>
                                        <p class="team__tab-text">
                                            <?= $item['доп_текст'] ?>
                                        </p>
                                        <? endif; ?>
                                    </div>
                                    <? $i++; endforeach; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!--     <div class="news">
		<div class="container">
			<div class="news__head">
				<div class="section-title news__title">
					<h2>Новости «Зетапринт»</h2></div>
            </div>
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
	</div> -->
    <?php include "template_parts/start.php"; ?>
    <?php $block = get_field('блок_приезжайте_в_типографию', 'options'); ?>
    <div class="come">
                    <div class="container">
                        <div class="section-title come__title">
                            <?= $block['заголовок']  ?>
                        </div>
                        <p class="come__desc"><?= $block['подзаголовок']  ?></p>
                        <div class="come__tabs">
                            <? $tabs = []; ?>
                            <? foreach ($block['вкладки'] as $item): ?>
                                <? array_push($tabs, $item['заголовок']); ?>
                            <? endforeach; ?>
                            <? $i = 0; foreach ($block['вкладки'] as $item): ?>

                                <div class="come__tab<? if($i == 0): ?> active<? endif; ?>">
                                <div class="come__tab-row">
                                    <div class="come__tab-left">
                                        <div class="come__tab-btns">
                                            <? $n = 0; foreach ($tabs as $tab): ?>
                                                <button class="come__tab-btn<? if($n == 0): ?> active<? endif; ?>"><?= $tab ?></button>
                                                <? $n++; endforeach; ?>
                                        </div>
                                        <div class="contacts">
                                            <? if($item['телефон']): ?>
                                                <div class="contacts__group">
                                                <div class="contacts__group-row">
                                                    <img class="contacts__group-icon" src="<?= THEME_DIR ?>/img/icon-phone-red-round.png">
                                                    <div class="contacts__group-content">
                                                        <p class="contacts__group-title">Телефон</p>
                                                        <? foreach ($item['телефон'] as $phone): ?>
                                                            <div class="contacts__phone-group">


                                                                <? if($phone['номер_телефона']): ?>
                                                                    <a class="contacts__phone" href="tel:<?= $phone['номер_телефона'] ?>"><?= $phone['номер_телефона'] ?></a>
                                                                <? endif; ?>
                                                                <? if($phone['текст']): ?>
                                                                    <span class="contacts__phone-desc"><?= $phone['текст']; ?></span>
                                                                <? endif; ?>
                                                                <? if($phone['ссылка']): ?>
                                                                    <a class="contacts__callback-btn" data-fancybox
                                                                            href="<?= $phone['ссылка']['url'] ?>"><?= $phone['ссылка']['title'] ?></a>
                                                                <? endif; ?>
                                                            </div>
                                                        <? endforeach; ?>
                                                        <div class="contacts__messengers">
                                                            <? if(get_field('мессенджеры', 'options')['whatsapp']): ?>
                                                                <a class="write-messengers__link" target="_blank" href="<?= getWhatsappLink(get_field('мессенджеры', 'options')['whatsapp']); ?>">
                                                                    <img class="lazyload" data-src="<?= THEME_DIR ?>/img/icon-whatsapp.svg">
                                                                </a>
                                                            <? endif; ?>

                                                            <? if(get_field('мессенджеры', 'options')['telegram']): ?>
                                                                <a class="write-messengers__link" target="_blank" href="<?= get_field('мессенджеры', 'options')['telegram']; ?>">
                                                                    <img class="lazyload" data-src="<?= THEME_DIR ?>/img/icon-telegram.svg">
                                                                </a>
                                                            <? endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <? endif; ?>
                                            <? if ($i == 0): ?>
                                                <div class="contacts__group">
                                                    <img src="<?= THEME_DIR ?>/img/address.jpg">
                                                </div>
                                            <? elseif ($item['адрес']): ?>
                                                <div class="contacts__group">
                                                    <div class="contacts__group-row">
                                                        <img class="contacts__group-icon"
                                                             src="<?= THEME_DIR ?>/img/icon-geo-red-round.svg">
                                                        <div class="contacts__group-content">
                                                            <p class="contacts__group-title contacts__group-title--address">
                                                                Адрес</p>
                                                            <p class="contacts__group-text"><?= $item['адрес'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <? endif; ?>
                                            <? if($item['e-mail']): ?>
                                                <div class="contacts__group">
                                                <div class="contacts__group-row"><img class="contacts__group-icon" src="<?= THEME_DIR ?>/img/icon-email-red-round.svg">
                                                    <div class="contacts__group-content">
                                                        <p class="contacts__group-title">Email</p>
                                                        <a class="contacts__email" href="mailto:<?= $item['e-mail'] ?>">
                                                            <?= $item['e-mail'] ?>
                                                        </a></div>
                                                </div>
                                            </div>
                                            <? endif; ?>
                                        </div>
                                        <a href="#popup-callback" data-fancybox class="come__callback-btn red-btn">
                                            Обратный звонок
                                        </a>
                                    </div>
                                    <div class="come__tab-right">
                                        <? $i1 = $i + 1; $map = $item['карта']; ?>
                                        <div id="map-<?= $i1; ?>" data-title="<?= $map['address'] ?>" data-center="<?= $map['lat'] ?>,<?= $map['lng'] ?>"
                                                data-zoom="<?= $map['zoom'] ?>" data-marker="<?= $map['markers'][0]['lat'] ?>,<?= $map['markers'][0]['lng'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <? $i++; endforeach; ?>
                        </div>
                    </div>
                </div>
</div>


<?php get_footer(); ?>
