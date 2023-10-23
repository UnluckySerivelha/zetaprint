<?php get_header(); ?>
<div class="breadcrumbs">
    <div class="container">
        <div class="kama_breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="<?= home_url(); ?>" itemprop="item"><span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1">
            </span>
            <span class="kb_sep">/</span>
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="<?= get_permalink(185) ?>" itemprop="item"><span itemprop="name">Продукция</span></a>
                <meta itemprop="position" content="2">
            </span>
            <span class="kb_sep">/</span>
            <span class="kb_title"><? the_title(); ?></span></div>
    </div>
</div>
<? $fs = get_field('первый_экран'); ?>
<?php if($fs['показывать_блок']): ?>
    <?php if($fs['изображение_первого_экрана']): ?>
        <div class="service-hero-top">
            <div class="container">
                <div class="service-hero-top__row">
                    <div class="service-hero-top__left">
                        <? if($fs['изображение_первого_экрана']): ?>
                            <img src="<?= $fs['изображение_первого_экрана']; ?>" alt="" class="service-hero-top__mob-img">
                        <? endif; ?>
                        <div class="service-hero-top__title">
                            <? if(get_field('отдельный_заголовок_страницы')): ?>
                                <h1 class="hero__top-title">
                                    <?= get_field('отдельный_заголовок_страницы'); ?>
                                </h1>
                            <? endif; ?>
                            <? if(get_field('отдельный_заголовок_страницы')): ?>
                                <? $title = $fs['заголовок'];
                                $title_text = strip_tags($title, '<span><strong>');
                                $title = '<p class="h1">' . $title_text . '</p>'
                                ?>
                                <?= $title; ?>
                            <? else: ?>
                                <?= $fs['заголовок']; ?>
                            <? endif; ?>
                        </div>
                        <? if($fs['подзаголовок']): ?>
                        <p class="service-hero-top__desc">
                            <?= $fs['подзаголовок']; ?>
                        </p>
                        <? endif; ?>
                        <? if($fs['список']): ?>
                        <ul class="service-hero__list service-hero__list--top">
                            <? foreach ($fs['список'] as $item): ?>
                                <li><?= $item['текст']; ?></li>
                            <? endforeach; ?>
                        </ul>
                        <? endif; ?>
                        <? if($fs['видео_первого_экрана_ссылка']): ?>
                            <a href="<?= $fs['видео_первого_экрана_ссылка'] ?>" data-fancybox class="service-hero-top__play-btn service-hero-top__play-btn--mob">
                                <span class="service-hero-top__play-btn-icon"></span>
                                <? if($fs['кнопка_видео_первого_экрана']): ?>
                                    <span class="service-hero-top__play-btn-text">
                                        <?= $fs['кнопка_видео_первого_экрана'] ?>
                                    </span>
                                <? endif; ?>
                            </a>
                        <? endif; ?>
                        <a href="#popup-tech-task" data-fancybox class="service-hero-top__calc-btn red-btn">
                            Рассчитать стоимость
                        </a>
                    </div>
                    <div class="service-hero-top__right">
                        <? if($fs['изображение_первого_экрана']): ?>
                            <img src="<?= $fs['изображение_первого_экрана']; ?>" alt="">
                        <? endif; ?>
                        <? if($fs['видео_первого_экрана_ссылка']): ?>
                            <a href="<?= $fs['видео_первого_экрана_ссылка'] ?>" data-fancybox class="service-hero-top__play-btn">
                                <span class="service-hero-top__play-btn-icon"></span>
                                <? if($fs['кнопка_видео_первого_экрана']): ?>
                                    <span class="service-hero-top__play-btn-text">
                                        <?= $fs['кнопка_видео_первого_экрана'] ?>
                                    </span>
                                <? endif; ?>
                            </a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="container">
            <? if(get_field('отдельный_заголовок_страницы')): ?>
                <h1 class="hero__top-title">
                    <?= get_field('отдельный_заголовок_страницы'); ?>
                </h1>
            <? endif; ?>
            <? if(get_field('отдельный_заголовок_страницы')): ?>
                <? $title = $fs['заголовок'];
                $title_text = strip_tags($title, '<span><strong>');
                $title = '<p class="h1">' . $title_text . '</p>'
                ?>
                <?= $title; ?>
            <? else: ?>
                <?= $fs['заголовок']; ?>
            <? endif; ?>
        </div>
    <?php endif; ?>
    <div class="service-hero">
    <div class="container">
        <? if($fs['заголовоок_калькулятора']): ?>
            <div class="service-calc__title section-title">
                <h2>
                    <?= $fs['заголовоок_калькулятора']; ?>
                </h2>
            </div>
        <? endif; ?>
        <div class="service-hero__row">
            <div class="service-hero__left">
                <? if($fs['изображение_для_мобильных'] && !$fs['изображение_первого_экрана']): ?>
                    <img data-src="<?= $fs['изображение_для_мобильных']; ?>" alt="" class="service-hero__mob-img lazyload">
                    <div class="service-hero__mob-btns">
                        <a href="#popup-tech-task" data-fancybox class="service-hero__mob-btn red-btn">
                            Прислать техзадание
                        </a>
                        <a href="#calc" class="service-hero__mob-btn service-hero__mob-btn--gray red-btn sc">
                            Рассчитать на сайте
                        </a>
                    </div>
                <? endif; ?>
                <?php if( have_rows('первый_экран') ): ?>
                    <?php while( have_rows('первый_экран') ): the_row(); ?>
                        <? if (have_rows('калькулятор')): ?>
                            <div class="service-calc" id="calc">
                                <? if(!$fs['заголовоок_калькулятора']): ?>
                                    <a class="service-calc__file-wrapper" href="#popup-tech-task" data-fancybox>
                                        <span class="service-calc__file-title">
                                            Пришлите техзадание
                                        </span>
                                        <span class="service-calc__file-subtitle">для расчета стоимости либо заполните форму</span>
                                    </a>
                                <? endif; ?>
                                <? $i = 1;while ( have_rows('калькулятор') ) : the_row(); ?>
                                    <? if( get_row_layout() == 'выбор' ): ?>
                                        <div class="service-calc__input-group service-calc__input-group--select">
                                            <span class="service-calc__input-group-number">
                                                <span>
                                                    <?= $i; ?>
                                                </span>
                                            </span>
                                            <p class="service-calc__input-group-title"><?= get_sub_field('заголовок'); ?></p>
                                            <div class="service-calc__select-wrapper">
                                                <select class="select-2" name="<?= get_sub_field('заголовок'); ?>">
                                                    <? foreach (get_sub_field('варианты') as $variant): ?>
                                                        <option value="<?= $variant['вариант'] ?>"><?= $variant['вариант'] ?></option>
                                                    <? endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <? endif; ?>
                                    <? if( get_row_layout() == 'произвольный_текст' ): ?>
                                        <div class="service-calc__input-group">
                                            <span class="service-calc__input-group-number">
                                                <span>
                                                    <?= $i; ?>
                                                </span>
                                            </span>
                                            <p class="service-calc__input-group-title"><?= get_sub_field('заголовок'); ?></p>
                                            <div class="service-calc__input-wrapper">
                                                <input type="text" placeholder="<?= get_sub_field('заголовок'); ?>" class="input-text">
                                            </div>
                                        </div>
                                    <? endif; ?>
                                    <? if( get_row_layout() == 'выбор_с_параметрами' ): ?>
                                        <div class="service-calc__input-group service-calc__input-group--params">
                                            <span class="service-calc__input-group-number">
                                                <span>
                                                    <?= $i; ?>
                                                </span>
                                            </span>
                                            <p class="service-calc__input-group-title">
                                                <?= get_sub_field('заголовок'); ?>
                                            </p>
                                            <div class="service-calc__options-mob-select custom-select">
                                                <div class="current">
                                                    <?= get_sub_field('варианты')[0]['заголовок'] ?>
                                                </div>
                                                <div class="dropdown">
                                                    <? foreach (get_sub_field('варианты') as $item): ?>
                                                        <div class="item">
                                                            <?= $item['заголовок']; ?>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>

                                            </div>
                                            <div class="service-calc__options">
                                                <? $i = 1; foreach (get_sub_field('варианты') as $item): ?>
                                                <label class="service-calc__option<? if($i == 1): ?> active<? endif; ?>">
                                                    <input type="radio" name="<?= get_sub_field('заголовок'); ?>" value="<?= $item['заголовок'] ?>" <? if($i == 1): ?> checked<? endif; ?>>
                                                    <span class="control"></span>
                                                    <span class="service-calc__option-title">
                                                        <?= $item['заголовок']; ?>
                                                    </span>
                                                    <? foreach ($item['параметры'] as $subitem): ?>
                                                    <span class="service-calc__option-param">
                                                        <b>
                                                            <?= $subitem['параметр'] ?>
                                                        </b>
                                                        <span>
                                                            <?= $subitem['значение'] ?>
                                                        </span>
                                                    </span>
                                                    <? endforeach; ?>
                                                </label>
                                                <? $i++; endforeach; ?>
                                            </div>
                                        </div>
                                    <? endif; ?>
                                    <? if( get_row_layout() == 'выбор_формата' ): ?>
                                        <div class="service-calc__input-group service-calc__input-group--formats">
                                            <span class="service-calc__input-group-number">
                                                <span>
                                                    <?= $i; ?>
                                                </span>
                                            </span>
                                            <p class="service-calc__input-group-title"><?= get_sub_field('заголовок'); ?></p>
                                            <div class="service-calc__formats">
                                                <? $i = 1; foreach (get_sub_field('варианты') as $item): ?>
                                                    <label class="service-calc__format<? if($i == 1): ?> checked<? endif; ?>">
                                                        <input type="radio" name="<?= get_sub_field('заголовок'); ?>"<? if($i == 1): ?> checked<? endif; ?> value="<?= $item['заголовок'] ?>">
                                                        <img src="<?= $item['изображение'] ?>" alt="" class="service-calc__format-img">
                                                        <span class="service-calc__format-title">
                                                            <?= $item['заголовок']; ?>
                                                        </span>
                                                        <span class="service-calc__format-desc">
                                                            <?= $item['подзаголовок']; ?>
                                                        </span>
                                                    </label>
                                                <? $i++; endforeach; ?>
                                            </div>
                                        </div>
                                    <? endif; ?>
                                    <? if( get_row_layout() == 'кол-во_панелей_z-cart' ): ?>
                                        <div class="service-calc__input-group service-calc__input-group--panels">
                                            <span class="service-calc__input-group-number">
                                                <span>
                                                    <?= $i; ?>
                                                </span>
                                            </span>
                                            <p class="service-calc__input-group-title">Количество панелей</p>
                                            <div class="service-calc__panels">
                                                <div class="service-calc__panels-head">
                                                    <label class="service-calc__panels-btn">
                                                        <input type="radio" name="Кол-во панелей z-card:" value="4" checked>
                                                        <button>4 панели</button>
                                                    </label>
                                                    <label class="service-calc__panels-btn">
                                                        <input type="radio" name="Кол-во панелей z-card:" value="6">
                                                        <button>6 панелей</button>
                                                    </label>
                                                    <label class="service-calc__panels-btn">
                                                        <input type="radio" name="Кол-во панелей z-card:" value="8">
                                                        <button>8 панелей</button>
                                                    </label>
                                                </div>
                                                <div class="service-calc__panels-content">
                                                    <div class="service-calc__panels-tab active">
                                                        <img src="<?= THEME_DIR ?>/img/4-panels.svg" alt="">
                                                    </div>
                                                    <div class="service-calc__panels-tab">
                                                        <img src="<?= THEME_DIR ?>/img/6-panels.svg" alt="">
                                                    </div>
                                                    <div class="service-calc__panels-tab">
                                                        <img src="<?= THEME_DIR ?>/img/8-panels.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <? endif; ?>
                                <? $i++; endwhile; ?>
                                <? if($fs['тираж']): ?>
                                    <div class="service-calc__input-group service-calc__input-group--count">
                                        <span class="service-calc__input-group-number">
                                            <span>
                                                <?= $i; ?>
                                            </span>
                                        </span>
                                        <p class="service-calc__input-group-title">Тираж</p>
                                        <div class="service-calc__input-group-row">
                                            <div class="service-calc__range-wrapper<? if(!$fs['цена']): ?> full<? endif; ?>">
                                                <input type="text" class="range-output input" value="<?= $fs['тираж']['минимум']; ?>" name="Тираж:">
<!--                                                <input type="text" data-min="--><?//= $fs['тираж']['минимум']; ?><!--" data-max="--><?//= $fs['тираж']['максимум']; ?><!--" class="range" name="Тираж:">-->
                                            </div>
                                            <? if($fs['цена'] && false): ?>
                                                <div class="service-calc__price">
                                                    <p class="service-calc__price-label">
                                                        Цена:
                                                    </p>
                                                    <p class="service-calc__price-value">
                                                        <?= $fs['цена'] ?>
                                                    </p>
                                                </div>
                                            <? endif; ?>
                                        </div>
                                    </div>
                                <? endif; ?>
                                <div class="service-calc__form-wrapper">
                                    <span class="service-calc__input-group-number">
                                        <span>
                                            <?= $i + 1; ?>
                                        </span>
                                    </span>
                                    <?= do_shortcode('[contact-form-7 id="216" title="Калькулятор"]'); ?>
                                    <div class="service-calc__bottom">
                                        <div class="service-calc__bottom-row">
                                            <? if(false): ?>
                                                <div class="service-calc__bottom-messengers">
                                                    <div class="write-messengers__links">
                                                        <a class="write-messengers__link" href="#">
                                                            <img class="lazyload" data-src="<?= THEME_DIR ?>/img/icon-whatsapp.svg">
                                                        </a>
                                                        <a class="write-messengers__link" href="#">
                                                            <img class="lazyload" data-src="<?= THEME_DIR ?>/img/icon-telegram.svg">
                                                        </a>
                                                    </div>
                                                    <p class="write-messengers__title">или пришлите файлы <br> в мессенджер</p>
                                                </div>
                                            <? endif; ?>
                                            <a href="#popup-callback" data-fancybox class="service-calc__bottom-question">
                                                Задать вопрос
                                            </a>
                                        </div>
                                        <p class="service-calc__agreement agreement-hint">Нажимая на кнопку, вы соглашаетесь
                                            <br> с <a href="<?= get_permalink('') ?>">Политикой конфиденциальности</a></p>
                                    </div>
                                </div>
                            </div>
                        <? endif; ?>
                    <? endwhile; ?>
                <? endif; ?>
            </div>
            <div class="service-hero__right">
                <? if($fs['слайдер']): ?>
                    <div class="service-hero__slider-wrapper">
                        <div class="swiper-button-next slider-arrow slider-arrow--right"></div>
                        <div class="swiper-button-prev slider-arrow slider-arrow--left"></div>
                        <div class="service-hero__slider swiper">
                            <div class="swiper-wrapper">
                                <? foreach($fs['слайдер'] as $slide): ?>
                                    <div class="service-hero__slide swiper-slide">
                                        <img data-src="<?= $slide['sizes']['large']; ?>" class="lazyload">
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Content -->
<?php include 'template_parts/constructor.php'?>


<?php include "template_parts/start.php"; ?>

<?php get_footer(); ?>

