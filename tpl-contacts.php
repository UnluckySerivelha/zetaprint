<?php
/* Template name: Контакты */
get_header();
?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>

<?php $block = get_field('блок_приезжайте_в_типографию', 'options'); ?>
<div class="come come--contacts">
    <div class="container">
        <div class="section-title come__title">
            <h1>
                <? the_title(); ?>
            </h1>
        </div>
        <div class="come__tabs">
            <? $tabs = []; ?>
            <? foreach ($block['вкладки'] as $item): ?>
                <? array_push($tabs, $item['заголовок']); ?>
            <? endforeach; ?>
            <? $i = 0;
            foreach ($block['вкладки'] as $item): ?>

                <div class="come__tab<? if ($i == 0): ?> active<? endif; ?>">
                    <div class="come__tab-row">
                        <div class="come__tab-left">
                            <div class="come__tab-btns">
                                <? $n = 0;
                                foreach ($tabs as $tab): ?>
                                    <button class="come__tab-btn<? if ($n == 0): ?> active<? endif; ?>"><?= $tab ?></button>
                                    <? $n++; endforeach; ?>
                            </div>
                            <div class="contacts">
                                <? if ($item['телефон']): ?>
                                    <div class="contacts__group">
                                        <div class="contacts__group-row">
                                            <img class="contacts__group-icon"
                                                 src="<?= THEME_DIR ?>/img/icon-phone-red-round.png">
                                            <div class="contacts__group-content">
                                                <p class="contacts__group-title">Телефон</p>
                                                <? foreach ($item['телефон'] as $phone): ?>
                                                    <div class="contacts__phone-group">

                                                        <? if ($phone['номер_телефона']): ?>
                                                            <a class="contacts__phone"
                                                               href="tel:<?= $phone['номер_телефона'] ?>"><?= $phone['номер_телефона'] ?></a>
                                                        <? endif; ?>
                                                        <? if ($phone['текст']): ?>
                                                            <span class="contacts__phone-desc"><?= $phone['текст']; ?></span>
                                                        <? endif; ?>
                                                        <? if ($phone['ссылка']): ?>
                                                            <a class="contacts__callback-btn" data-fancybox
                                                               href="<?= $phone['ссылка']['url'] ?>"><?= $phone['ссылка']['title'] ?></a>
                                                        <? endif; ?>
                                                    </div>
                                                <? endforeach; ?>
                                                <div class="contacts__messengers">
                                                    <? if (get_field('мессенджеры', 'options')['whatsapp']): ?>
                                                        <a class="write-messengers__link"
                                                           target="_blank"
                                                           href="<?= getWhatsappLink(get_field('мессенджеры', 'options')['whatsapp']); ?>">
                                                            <img class="lazyload"
                                                                 data-src="<?= THEME_DIR ?>/img/icon-whatsapp.svg">
                                                        </a>
                                                    <? endif; ?>

                                                    <? if (get_field('мессенджеры', 'options')['telegram']): ?>
                                                        <a class="write-messengers__link"
                                                           target="_blank"
                                                           href="<?= get_field('мессенджеры', 'options')['telegram']; ?>">
                                                            <img class="lazyload"
                                                                 data-src="<?= THEME_DIR ?>/img/icon-telegram.svg">
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
                                <? if ($item['e-mail']): ?>
                                    <div class="contacts__group">
                                        <div class="contacts__group-row"><img class="contacts__group-icon"
                                                                              src="<?= THEME_DIR ?>/img/icon-email-red-round.svg">
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
                            <? $i1 = $i + 1;
                            $map = $item['карта']; ?>
                            <div id="map-<?= $i1; ?>"
                                 data-title="<?= $map['address'] ?>"
                                 data-center="<?= $map['lat'] ?>,<?= $map['lng'] ?>"
                                 data-zoom="<?= $map['zoom'] ?>"
                                 data-marker="<?= $map['markers'][0]['lat'] ?>,<?= $map['markers'][0]['lng'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <? $i++; endforeach; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
