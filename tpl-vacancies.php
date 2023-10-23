<?php
/* Template name: Вакансии */
get_header();
?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<?php $vacanvies = get_field('список_вакансий'); ?>
<div class="vacancies">
    <div class="container">
        <h1><? the_title(); ?></h1>
    <div class="vacancies__row">
        <div class="vacancies__left">
            <div class="vacancies__btns">
                <? $i =1; foreach ($vacanvies as $item): ?>
                    <? if(!$item['скрыть']): ?>
                        <button class="vacancies__btn<? if($i == 1): ?> active<? endif; ?>">
                            <span class="vacancies__btn-title">
                                <?= $item['заголовок_вакансии'] ?>
                            </span>
                            <span class="vacancies__btn-body"<? if($i == 1): ?> style="display:block;" <? endif; ?>>
                                <? if($item['график']): ?>
                                <span class="vacancies__btn-schedule">
                                    <?= $item['график'] ?>
                                </span>
                                <? endif; ?>
                                <span class="vacancies__btn-bottom">
                                    <? if($item['зарплата']): ?>
                                    <span class="vacancies__btn-salary">
                                        <?= $item['зарплата'] ?>
                                    </span>
                                    <? endif; ?>
                                    <? if($item['город']): ?>
                                    <span class="vacancies__btn-city">
                                        <?= $item['город'] ?>
                                    </span>
                                    <? endif; ?>
                                </span>
                            </span>
                        </button>
                    <? $i++; endif; ?>
                <? endforeach; ?>
            </div>
        </div>
        <div class="vacancies__right">
            <div class="vacancies__tabs">
                <? $i = 1; foreach ($vacanvies as $item): ?>
                    <? if(!$item['скрыть']): ?>
                    <div class="vacancies__tab<? if($i == 1): ?> active<? endif; ?>">
                        <button class="vacancy-head<? if($i == 1): ?> active<? endif; ?>">
                            <?= $item['заголовок_вакансии']; ?>
                        </button>
                        <div class="vacancy"<? if($i == 1): ?> style="display:block;" <? endif; ?>>
                            <h2 class="vacancy__title">
                                <?= $item['заголовок_вакансии'] ?>
                            </h2>
                            <p class="vacancy__info">
                                <? if($item['график']): ?>
                                    <span><?= $item['график']; ?></span>
                                <? endif; ?>
                                <? if($item['адрес']): ?>
                                    <span><?= $item['адрес']; ?></span>
                                <? endif; ?>
                            </p>
                            <? if($item['зарплата']): ?>
                                <p class="vacancy__salary">
                                    <?= $item['зарплата'] ?>
                                </p>
                            <? endif; ?>

                            <div class="vacancy__lists">
                                <? foreach ($item['списки'] as $list): ?>
                                    <div class="vacancy__list">
                                        <p class="vacancy__list-title">
                                            <?= $list['заголовок_списка'] ?>
                                        </p>
                                        <ul class="list">
                                            <? foreach ($list['список'] as $item2): ?>
                                                <li>
                                                    <?= $item2['текст'] ?>
                                                </li>
                                            <? endforeach; ?>
                                        </ul>
                                    </div>
                                <? endforeach; ?>
                            </div>

<!--                             <a href="#popup-response" data-fancybox class="vacancy__btn red-btn">
                                Откликнуться
                            </a> -->
                        </div>
                    </div>
                    <? $i++; endif; ?>
                <? endforeach; ?>
            </div>
            <? $hr = get_field('отдел_кадров'); ?>
            <div class="hr">
                <p class="hr__title">
                    Если интересная данная вакансия, свяжитесь с отделом кадров
                </p>
                <div class="hr__bottom">
                    <a href="<?= $hr['телефон'] ?>" class="hr__phone tro"><?= $hr['телефон']; ?></a>
                    <div class="hr__messengers">
                        <? if($hr['номер_в_whatsapp']): ?>
                            <a class="hr__messenger tro" target="_blank" href="<?= getWhatsappLink($hr['номер_в_whatsapp']); ?>">
                            <img class="lazyload" data-src="<?= THEME_DIR ?>/img/icon-whatsapp.svg">
                        </a>
                        <? endif; ?>
                        <? if($hr['логин_в_телеграм']): ?>
                        <a class="hr__messenger tro" target="_blank" href="https://t.me/@<?= $hr['логин_в_телеграм']; ?>">
                            <img class="lazyload" data-src="<?= THEME_DIR ?>/img/icon-telegram.svg">
                        </a>
                        <? endif; ?>
                    </div>
                    <a href="mailto:<?= $hr['почта'] ?>" class="hr__email tro"><?= $hr['почта'] ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="popup popup-response" id="popup-response">
    <p class="popup-response__title popup__title">
        Прикрепите резюме или дайте на него ссылку.
        <br>Либо расскажите в свободной форме о своем опыте,
        <br>почему хотите работать у нас и чем можете быть полезны
    </p>
    <div class="popup-response__form-wrapper">
        <?= do_shortcode('[contact-form-7 id="558" title="Откликнуться на вакансию"]'); ?>
    </div>
    <div class="popup-response__agreement agreement-hint">
        Нажимая на кнопку, вы соглашаетесь с <a href="<?= get_permalink(433); ?>" target="_blank">Политикой конфиденциальности сайта</a>
    </div>
</div>

<?php get_footer(); ?>
