<?php
/* Template name: Типографиям */
get_header();
?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<div class="for-printing-houses">
    <div class="container">
        <h1>
            <? if(get_field('отдельный_заголовок_страницы')): ?>
                <?= get_field('отдельный_заголовок_страницы'); ?>
            <? else: ?>
                <? the_title(); ?>
            <? endif; ?>
        </h1>
    </div>
    <? $slogan = get_field('все_печатают', 6); ?>

    <div class="i-gray-block i-gray-block--pt">
        <div class="i-gray-block-mob">
        <div class="print-services">
            <div class="container">
                <div class="print-services__row">
                    <? $services =  get_posts( array(
                        'numberposts' => -1,
                        'post_type'   => 'printhouse_services',
                    ) ); ?>
                    <? foreach ($services as $service): ?>
                        <div class="print-services__item">
                            <a href="<?= get_permalink($service->ID); ?>" class="print-services__item-link"></a>
<!--                            --><?// $short_title = get_field('краткое_название', $service->ID); ?>
                            <p class="print-services__item-title">
<!--                                --><?// if($short_title): ?>
<!--                                --><?//= $short_title ?>
<!--                                --><?// else: ?>
                                <?= get_the_title($service->ID); ?>
<!--                                --><?// endif;?>
                            </p>
                            <? $price = get_field('первый_экран_услуга', $service->ID)['цена']; ?>
                            <? $term = get_field('первый_экран_услуга', $service->ID)['срок']; ?>
<!--                            <div class="print-services__item-bottom">-->
<!--                                --><?// if($price): ?>
<!--                                <span class="print-services__item-price">-->
<!--                                    --><?//= $price ?>
<!--                                </span>-->
<!--                                --><?// endif; ?>
<!--                                --><?// if($price): ?>
<!--                                <span class="print-services__item-term">-->
<!--                                    --><?//= $term ?>
<!--                                </span>-->
<!--                                --><?// endif; ?>
<!--                            </div>-->
                        </div>
                    <? endforeach; ?>
            </div>
            </div>
        </div>
            <? if($slogan['клиенты']): ?>
                <div class="slogan__clients slogan__clients--mb  mob-arrows-bottom">
                    <div class="container">
                        <div class="slogan__clients-head">
                            <div class="slogan__clients-title">
                                <h2>
                                    Работаем с известными компаниями
                                </h2>
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
        <div class="i-equipment equipment">
            <div class="container">
                <div class="i-equipment__head">
                    <div class="section-title i-equipment__title">
                        <h2>
                        37 станков европейских <br> производителей</h2>
                    </div>
                    <div class="i-equipment__right">
                        <img class="i-equipment__right-logo lazyload" data-src="<?= THEME_DIR ?>/img/i-equipment-logo.png">
                    </div>
                </div>
                <p class="i-equipment__head-desc">Включая 6 станков Heidelberg. Мы сертифицированный партнер </p>
                <img class="i-equipment__mob-logo lazyload" data-src="<?= THEME_DIR ?>/img/i-equipment-logo.png">

                <div class="i-equipment__slider-title">
                    Посмотрите, на каких станках мы работаем:
                </div>
                <? include "template_parts/equipment.php"; ?>
            </div>
        </div>
    </div>
    <? $volume = get_field('большие_объёмы'); ?>
    <div class="i-volume">
        <div class="container">
            <div class="i-volume__inner">
                <img class="i-volume__inner-bg ls-is-cached lazyload" data-src="<?= $volume['фон'] ?>">
                <div class="section-title i-volume__title">
                    <?= $volume['заголовок'] ?>
                </div>
                <div class="i-volume__desc">
                    <?= $volume['подзаголовок'] ?>
                </div>
                <div class="i-volume__features">
                    <? foreach ($volume['блоки_с_иконками'] as $item): ?>
                        <div class="i-volume__feature">
                        <img class="i-volume__feature-icon lazyload" data-src="<?= $item['иконка']['url'] ?>">
                        <div class="i-volume__feature-text">
                            <?= $item['текст'] ?>
                        </div>
                    </div>
                    <? endforeach; ?>
                </div>
                <img data-src="<?= THEME_DIR ?>/img/i-volume-mob-img.jpg" alt="" class="lazyload i-volume__mob-img">
            </div>
        </div>
    </div>

    <? $gratitude = get_field('благодарственные_письма', 6); ?>
    <? if($gratitude): ?>
        <div class="gratitude gratitude--home">
            <div class="container">
                <div class="section-title gratitude__title">
                    <h2>
                        Благодарности от типографий
                    </h2>
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
    <div class="terms">
        <div class="container">
            <div class="terms__row">
                <div class="terms__col">
<!--                    <img class="terms__col-icon lazyload" data-src="--><?//= wp_get_attachment_url(178); ?><!--" alt="">-->
                    <p class="terms__col-title">Доставка</p>
                    <p class="terms__col-desc">
                        Доставка доступна курьером, автомобилем и транспортной компанией. Подробности уточняйте у менеджера.                                    </p>
                </div>
                <div class="terms__col">
<!--                    <img class="terms__col-icon lazyload" data-src="--><?//= wp_get_attachment_url(179); ?><!--" alt="">-->
                    <p class="terms__col-title">Оплата</p>
                    <ul class="terms__list">
                        <li>
                            Безналичный расчет                                        </li>
                        <li>
                            Наличный расчет                                        </li>
                        <li>
                            Частичная предоплата                                        </li>
                        <li>
                            Постоплата                                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <? if (get_field('все_печатают', 6)): ?>
        <? $slogan = get_field('все_печатают', 6); ?>
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

    <div class="i-manager">
        <div class="container">
            <div class="i-manager__inner">
                <img class="i-manager__inner-bg ls-is-cached lazyloaded" data-src="https://zeta.pdymok.ru/wp-content/uploads/2022/08/i-manager-bg.jpg" src="https://zeta.pdymok.ru/wp-content/uploads/2022/08/i-manager-bg.jpg">
                <div class="i-manager__inner-row">
                    <div class="i-manager__inner-left">
                        <div class="section-title i-manager__title">
                            <h2>Менеджер сделает работу<br>
с нашей типографией<br>
спокойной и приятной</h2>
                        </div>
                        <ul class="i-manager__list list">
                                                                        <li>На связи 24/7, быстро реагирует на сообщения</li>
                                                                        <li>Быстро рассчитает стоимость партии по вашему<br>
техзаданию, а если его нет — задаст уточняющие вопросы</li>
                                                                        <li>Разбирается в форматах печати, технологических<br>
процессах, оборудовании и материалах</li>
                                                                        <li>Отслеживает производство продукции<br>
и всегда подскажет на каком этапе ваш продукт</li>
                                                                </ul>
                        <img data-src="https://zeta.pdymok.ru/wp-content/themes/zetaprint/img/i-manager-mob-img.jpg" alt="" class="lazyload i-manager__mob-img">
                        <div class="i-manager__name i-manager__name--mob">
                            <p>
</b>Менеджер «Зетапринт»</p>
                        </div>
                        <div class="i-manager__bottom">
                                                                    <a class="i-manager__bottom-btn red-btn" href="#popup-callback" data-fancybox>Задайте вопрос менеджеру</a>
                            <? if(false): ?>
                            <div class="i-manager__messengers write-messengers">
                                <p class="write-messengers__title write-messengers__title--black">или напишите
                                    <br> в мессенджер</p>
                                <div class="write-messengers__links">
                                                                                        <a class="write-messengers__link" target="_blank" href="https://web.whatsapp.com/send/?phone=+79258004219">
                                            <img class=" ls-is-cached lazyloaded" data-src="https://zeta.pdymok.ru/wp-content/themes/zetaprint/img/icon-whatsapp.svg" src="https://zeta.pdymok.ru/wp-content/themes/zetaprint/img/icon-whatsapp.svg">
                                        </a>

                                                                                        <a class="write-messengers__link" target="_blank" href="https://t.me/@zetaprint">
                                            <img class=" ls-is-cached lazyloaded" data-src="https://zeta.pdymok.ru/wp-content/themes/zetaprint/img/icon-telegram.svg" src="https://zeta.pdymok.ru/wp-content/themes/zetaprint/img/icon-telegram.svg">
                                        </a>
                                                                                </div>
                            </div>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="i-manager__inner-right">
                        <img class="i-manager__woman lazyload" data-src="https://zeta.pdymok.ru/wp-content/uploads/2022/08/i-manager-woman.png">
                        <div class="i-manager__name">
                            <p>
</b>Менеджер «Зетапринт»</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <?php include "template_parts/start.php"; ?>

</div>

<?php get_footer(); ?>
