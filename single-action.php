<?php get_header(); ?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<div class="container">
    <div class="action">
        <h1>
            <? the_title(); ?>
        </h1>
        <div class="action__text">
            <? the_content(); ?>
        </div>
        <? if(get_field('кнопка')): ?>
            <div class="action__btn-wrapper">
                <a href="<?= get_field('кнопка')['ссылка']; ?>" data-fancybox class="red-btn action__btn"><?= get_field('кнопка')['текст']; ?></a>
            </div>
        <? endif; ?>
    </div>
</div>

<div class="popup popup-callback" id="popup-gift">
        <div class="popup-callback__row">
            <div class="popup-callback__left">
                <img data-src="<?= THEME_DIR ?>/img/popup-callback-mob-img.png" alt="" class="lazyload  popup-callback__left-img">
                <div class="popup-callback__name-block">
                    <p>
                        <span>Менеджер «Зетапринт»</span>
                    </p>
                </div>
            </div>
            <div class="popup-callback__right">
                <p class="popup-callback__title popup__title">
                    Введите ваш номер, за ним закрепится ваш подарок
                </p>
                <p class="popup-callback__desc">
                    Перезвоню в течение 20 минут и отвечу на вопросы
                </p>
                <div class="popup-callback__form-wrapper">
                    <?= do_shortcode('[contact-form-7 id="718" title="Получить подарок"]'); ?>
                </div>
                    <? if(false): ?>
                    <div class="popup-callback__messengers">
                        <p class="write-messengers__title write-messengers__title--black">или напишите  в мессенджер</p>
                        <div class="write-messengers__links">
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
                    <? endif; ?>
                    <p class="popup-callback__agreement-hint agreement-hint">
                        Нажимая на кнопку, вы соглашаетесь <br>с <a href="<?= get_permalink(433); ?>" target="_blank">Политикой конфиденциальности сайта</a>
                    </p>
            </div>
        </div>
    </div>
<?php get_footer(); ?>

