<? if( have_rows('контент') ): ?>
    <? while ( have_rows('контент') ) : the_row(); ?>
        <?  if( get_row_layout() == 'портфолио' ): ?>
            <?php $category = get_sub_field('категория'); ?>
            <? if($category): ?>
            <div class="i-portfolio">
                    <div class="container">
                        <div class="i-portfolio__title section-title">
                            <?= get_sub_field('заголовок'); ?>
                        </div>
                        <? $subcats = get_term_children($category, 'portfolio_category'); ?>
                        <div class="i-portfolio__tabs-head"<? if(isset($subcats) && (count($subcats)  == 1 || count($subcats) == 0)): ?> style="display: none;"<? endif; ?>>
                            <? $n = 1; foreach ($subcats as $subcat): $subcat_object = get_term_by('id', $subcat, 'portfolio_category'); ?>
                                <button class="i-portfolio__tab-head<? if($n == 1): ?> active<? endif; ?>">
                                    <?= $subcat_object->name; ?>
                                </button>
                                <? $n++; endforeach; ?>
                        </div>
                        <div class="i-portfolio__tabs-head-mob">
                            <div class="current">
                                <span>
                                    <? $name = get_term_by('id', $subcats[0], 'portfolio_category')->name ?>
                                    <?= $name; ?>
                                </span>
                            </div>
                            <div class="dropdown">
                                <? $n = 1; foreach ($subcats as $subcat): $subcat_object = get_term_by('id', $subcat, 'portfolio_category'); ?>
                                    <button class="i-portfolio__tab-head<? if($n == 1): ?> active<? endif; ?>"><?= $subcat_object->name; ?></button>
                                    <? $n++; endforeach; ?>
                            </div>
                        </div>
                        <div class="i-portfolio__tabs-content">
                            <? $n = 1; foreach ($subcats as $subcat): $subcat_object = get_term_by('id', $subcat, 'portfolio_category'); ?>
                                <div class="i-portfolio__tab<? if($n == 1): ?> active<? endif; ?>">
                                    <div class="i-portfolio__slider-wrapper">
                                        <div class="slider-arrow slider-arrow--left"></div>
                                        <div class="slider-arrow slider-arrow--right"></div>
                                        <div class="i-portfolio__slider swiper">
                                            <div class="swiper-wrapper">
                                                <?
                                                $args = array(
                                                    'post_type' => 'portfolio',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'portfolio_category',
                                                            'field' => 'id',
                                                            'terms' => $subcat_object->term_id
                                                        )
                                                    )
                                                );
                                                $posts = new WP_Query($args);

                                                if($posts->have_posts()):
                                                    while($posts->have_posts()) : $posts->the_post();
                                                        ?>
                                                        <div class="i-portfolio__item swiper-slide">
                                                            <? if ( current_user_can( 'manage_options' ) ): ?>
                                                                <a href="<?= get_edit_post_link($post->ID)  ?>" class="edit-link" target="_blank">Редактировать</a>
                                                            <? endif; ?>
                                                    <div class="i-portfolio__item-img-wrapper">
                                                        <? if(get_the_post_thumbnail_url()): ?>
                                                            <img class="i-portfolio__item-img lazyload" data-src="<?= get_the_post_thumbnail_url(null, 'large'); ?>">
                                                        <? endif; ?>
                                                    </div>
                                                    <? if(get_field('параметры')): ?>
                                                    <div class="i-portfolio__item-overlay">
                                                        <p class="i-portfolio__item-title"><? the_title(); ?></p>
                                                        <div class="i-portfolio__item-params">
                                                            <? if(get_field('параметры')): foreach (get_field('параметры') as $item): ?>
                                                                <div class="i-portfolio__item-param"><span class="i-portfolio__item-param-label"><?= trim($item['параметр']); ?>:</span> <span class="i-portfolio__item-param-value"><?= mb_ucfirst(trim($item['значение'])); ?></span></div>
                                                            <?  endforeach; endif;?>
                                                        </div>
                                                    </div>
                                                    <? endif; ?>
                                                </div>

                                                    <? endwhile; endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <? $n++; endforeach; wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>
            <? endif; ?>
        <? endif; ?>
        <?  if( get_row_layout() == 'примеры' ): ?>
            <div class="i-portfolio">
                <div class="container">
                    <div class="i-portfolio__title section-title">
                        <?= get_sub_field('заголовок'); ?>
                    </div>
                    <div class="i-portfolio__slider-wrapper">
                        <div class="slider-arrow slider-arrow--left"></div>
                        <div class="slider-arrow slider-arrow--right"></div>
                        <div class="i-portfolio__slider swiper">
                            <div class="swiper-wrapper">
                                <? foreach (get_sub_field('примеры') as $item): ?>
                                <div class="i-portfolio__item swiper-slide">
                                    <div class="i-portfolio__item-img-wrapper">
                                        <? if(get_the_post_thumbnail_url($item)): ?>
                                            <img class="i-portfolio__item-img lazyload" data-src="<?= get_the_post_thumbnail_url($item, 'large'); ?>">
                                        <? endif; ?>
                                    </div>
                                    <? if(!isset($page_template) && $page_template == 'single-printhouse_services'): ?>
                                    <div class="i-portfolio__item-overlay">
                                        <p class="i-portfolio__item-title"><?=  get_the_title($item); ?></p>
                                        <div class="i-portfolio__item-params">
                                            <? if(get_field('параметры', $item)): foreach (get_field('параметры', $item) as $item2): ?>
                                                <div class="i-portfolio__item-param"><span class="i-portfolio__item-param-label"><?= trim($item2['параметр']); ?>:</span> <span class="i-portfolio__item-param-value"><?= mb_ucfirst(trim($item2['значение'])); ?></span></div>
                                            <?  endforeach; endif;?>
                                        </div>
                                    </div>
                                    <? endif; ?>
                                </div>
                                <? endforeach; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? endif; ?>
        <?  if( get_row_layout() == 'про_производство' ): ?>
        <div class="i-gray-block">
                <div class="i-quality">
                    <img class="lazyload i-quality__bg" data-src="<?= get_sub_field('фон'); ?>" alt="">
                    <div class="container">
                        <div class="section-title i-quality__title">
                            <?= get_sub_field('заголовок'); ?>
                        </div>
                        <div class="i-quality__feature">
                            <img class="lazyload i-quality__feature-icon" data-src="<?= get_sub_field('блок_с_иконкой')['иконка']; ?>">
                            <div class="i-quality__feature-text">
                                <?= get_sub_field('блок_с_иконкой')['текст']; ?>
                            </div>
                        </div>
                        <div class="i-quality__video-block video-block">
                            <img class="i-quality__preview lazyload video-block__img"
                                data-src="<?= get_sub_field('видео')['превью']; ?>">
                            <a class="i-quality__-btn play-btn video-block__play-btn" href="<?= get_sub_field('видео')['ссылка_на_видео']; ?>" data-fancybox></a>
                            <div class="i-quality__text video-block__text">
                                <?= get_sub_field('видео')['текст']; ?>
                            </div>
                        </div>
                        <div class="i-quality__text i-quality__text--mob video-block__text">
                            <?= get_sub_field('видео')['текст']; ?>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?  if( get_row_layout() == 'идеи_и_возможности1' ): ?>
                <div class="ideas">
                <div class="container">
                    <div class="ideas__title section-title">
                        <?= get_sub_field('заголовок'); ?>
                    </div>
                    <div class="ideas__slider-wrapper">
                        <div class="slider-arrow slider-arrow--left"></div>
                        <div class="slider-arrow slider-arrow--right"></div>
                        <div class="ideas__slider swiper">
                            <div class="swiper-wrapper">
                                <? foreach (get_sub_field('слайдер') as $item): ?>
                                    <div class="swiper-slide ideas__slide">
                                        <div class="ideas__slide-img-wrapper">
                                            <img data-src="<?= $item['изображение']; ?>" alt="" class="ideas__slide-img lazyload">
                                        </div>
                                        <p class="ideas__slide-text">
                                            <?= $item['текст']; ?>
                                        </p>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? endif; ?>
            <?  if( get_row_layout() == 'для_чего_чаще_всего_используют' ): ?>
                <div class="i-most-used">
                    <div class="container">
                        <div class="i-most-used__title section-title">
                            <?= get_sub_field('заголовок'); ?>
                        </div>
                        <div class="i-most-used__row">
                            <div class="i-most-used__left">
                                <div class="production__tabs-head production__tabs-head--most-used">
                                    <? $i = 1; foreach (get_sub_field('категории') as $item): ?>
                                        <button class="production__tab-head production__tab-head--most-used<? if($i == 1): ?> active<? endif; ?>">
                                            <svg>
                                                <use xlink:href="#arrow-right"></use>
                                            </svg>
                                            <span><?= $item['заголовок_категории']; ?></span>
                                        </button>
                                        <? $i++; endforeach; ?>
                                </div>
                            </div>
                            <div class="i-most-used__right">
                                <? $i = 1; foreach (get_sub_field('категории') as $item): ?>
                                    <div class="i-most-used__tab<? if($i == 1): ?> active<? endif; ?>">
                                        <? if($item['элементы_в_категории']): ?>
                                        <div class="i-most-used__items">
                                            <? foreach ($item['элементы_в_категории'] as $item): ?>
                                                <div class="i-most-used__item">
                                                    <img data-src="<?= $item['изображение'] ?>" alt="" class="lazyload">
                                                    <p class="i-most-used__item-text">
                                                        <?= $item['текст']; ?>
                                                    </p>
                                                </div>
                                            <? endforeach; ?>
                                        </div>
                                        <? endif; ?>

                                        <? if($item['текст_в_категории']): ?>
                                            <div class="i-most-used__tab-text">
                                                <?= $item['текст_в_категории']; ?>
                                            </div>
                                        <? endif; ?>
                                    </div>
                                    <? $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?  if( get_row_layout() == 'про_станки' ): ?>
            <div class="i-equipment">
                <div class="container">
                    <div class="i-equipment__head">
                        <div class="section-title i-equipment__title">
                            <p>
                                37 единиц оборудования от европейских производителей
                            </p>
                        </div>
                        <div class="i-equipment__right">
                            <img class="i-equipment__right-logo lazyload" data-src="<?= get_sub_field('логотип_производителя'); ?>">
                        </div>
                    </div>
                    <p class="i-equipment__head-desc">Включая 6 печатных машин машин Heidelberg</p>
                    <img class="i-equipment__mob-logo lazyload" data-src="<?= get_sub_field('логотип_производителя'); ?>">

                    <div class="i-equipment__slider-title">
                        <?= get_sub_field('заголовок_слайдера'); ?>
                    </div>
                    <? if (get_sub_field('слайды')): ?>
                        <div class="i-equipment__slider-wrapper">
                        <div class="slider-arrow slider-arrow--left"></div>
                        <div class="slider-arrow slider-arrow--right"></div>
                        <div class="i-equipment__slider swiper">
                            <div class="swiper-wrapper">
                                <? $i = 1; ?>
                                <? foreach (get_sub_field('слайды') as $slide): ?>
                                    <? $imgs = $slide['изображения']; ?>
                                    <div class="swiper-slide i-equipment__slide">
                                    <? if($imgs): ?>
                                    <div class="i-equipment__slide-left">
                                        <a class="i-equipment__slide-large-img" data-fancybox="eq<?= $i; ?>" href="<?= $imgs[0]; ?>">
                                            <img class="lazyload" data-src="<?= $imgs[0]; ?>"></a>
                                        <? array_shift($imgs); ?>
                                        <div class="i-equipment__slide-thumbs">
                                            <? foreach ($imgs as $img): ?>
                                                <a class="i-equipment__slide-small-img"
                                                    data-fancybox="eq<?= $i; ?>" href="<?= $img; ?>">
                                                <img class="lazyload" data-src="<?= $img; ?>"></a>
                                            <? endforeach; ?>
                                        </div>
                                    </div>
                                    <? endif; ?>
                                    <div class="i-equipment__slide-right">
                                        <p class="i-equipment__slide-title"><?= $slide['заголовок'] ?></p>
                                        <p class="i-equipment__slide-desc"><?= $slide['подзаголовок'] ?></p>
                                        <? if(get_field('страна-производитель', $item->ID)): ?>
                                            <span class="i-equipment__slide-tag"><?= get_field('страна-производитель', $item->ID) ?></span>
                                        <? endif; ?>
                                        <p class="i-equipment__slide-perfomance"><?= $slide['производительность']; ?></p>
                                        <? if($slide['параметры']): ?>
                                            <p class="i-equipment__slide-params">
                                            <? foreach ($slide['параметры'] as $param): ?>
                                                <b><?= $param['параметр'] ?></b> <?= $param['значение']; ?><br>
                                            <? endforeach; ?>
                                            </p>
                                        <? endif; ?>
                                        <? if($slide['список']): ?>
                                            <ul class="i-equipment__slide-list">
                                            <? foreach ($slide['список'] as $item): ?>
                                                <li><?= $item['текст']; ?></li>
                                            <? endforeach; ?>
                                            </ul>
                                        <? endif; ?>
                                        <div class="i-equipment__mob-slider-wrapper">
                                            <div class="i-equipment__mob-slider swiper">
                                                <div class="swiper-wrapper">
                                                    <? $imgs = $slide['изображения']; ?>
                                                    <? foreach ($imgs as $img): ?>
                                                        <a href="<?= $img; ?>" data-fancybox="eqq<?= $i ?>" class="swiper-slide">
                                                            <img data-src="<?= $img; ?>" alt="" class="lazyload">
                                                        </a>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <? $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <? endif; ?>
                </div>
            </div>
            </div>
    <? endif; ?>
        <?  if( get_row_layout() == 'контроль_качества' ): ?>
            <div class="i-control">
                    <div class="container">
                        <div class="i-control__row">
                            <div class="i-control__left">
                                <div class="section-title i-control__title">
                                    <?= get_sub_field('заголовок'); ?>
                                </div>
                                <? $list = get_sub_field('список'); ?>
                                <? if ($list): ?>
                                    <ul class="i-control__list">
                                        <? foreach ($list as $item): ?>
                                            <li>
                                                <?= $item['текст']; ?>
                                            </li>
                                        <? endforeach; ?>
                                    </ul>
                                <? endif; ?>
                                <? if(get_sub_field('текст_на_кнопке') && get_sub_field('ссылка_кнопки')): ?>
                                    <a class="i-control__btn red-btn" href="<?= get_permalink(469); ?>"><?= get_sub_field('текст_на_кнопке'); ?></a>
                                <? endif; ?>
                                </div>
                            <div class="i-control__right">
                                <img class="lazyload" data-src="<?= wp_get_attachment_url(1162); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
        <? endif; ?>
        <?  if( get_row_layout() == 'большие_объёмы' ): ?>
            <div class="i-volume">
                    <div class="container">
                        <div class="i-volume__inner">
                            <img class="i-volume__inner-bg lazyload" data-src="<?= get_sub_field('заголовок_копия'); ?>">
                            <div class="section-title i-volume__title">
                                <?= get_sub_field('заголовок'); ?>
                            </div>
                            <div class="i-volume__desc">
                                <?= get_sub_field('подзаголовок'); ?>
                            </div>
                            <div class="i-volume__features">
                                <? foreach (get_sub_field('блоки_с_иконками') as $item): ?>
                                    <div class="i-volume__feature">
                                    <img class="i-volume__feature-icon lazyload"
                                        data-src="<?= $item['иконка'] ?>" alt="">
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
        <? endif; ?>
        <?  if( get_row_layout() == 'все_печатают_в_' ): ?>
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
        <?  if( get_row_layout() == 'благодарности' ): ?>
            <div class="gratitude">
                <div class="container">
                    <div class="section-title gratitude__title">
                        <?= get_sub_field('заголовок'); ?>
                    </div>
                    <div class="gratitude__slider-wrapper">
                        <div class="slider-arrow slider-arrow--left"></div>
                        <div class="slider-arrow slider-arrow--right"></div>
                        <div class="gratitude__slider swiper">
                            <div class="swiper-wrapper">
                                <?php $gratitudes = new WP_Query( array( 'post_type' => 'gratitude', 'posts_per_page' => -1 ) ); ?>
                                <?php while ( $gratitudes->have_posts() ) : $gratitudes->the_post(); ?>
                                    <div class="gratitude__item swiper-slide">
                                        <a class="gratitude__item-link" data-fancybox href="<?= get_the_post_thumbnail_url(); ?>">
                                            <img class="lazyload" data-src="<?= get_the_post_thumbnail_url(); ?>"></a>
                                        <p class="gratitude__item-title"><? the_title(); ?></p>
                                        <div class="gratitude__item-desc"><? the_content(); ?></div>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                    <!--                    --><?// if(get_sub_field('кнопка')): ?>
                    <!--                        <div class="gratitude__btn-wrapper">-->
                    <!--                            <a class="red-btn gratitude__btn" href="--><?//= get_sub_field('кнопка')['ссылка_кнопки'] ?><!--">--><?//= get_sub_field('кнопка')['текст_кнопки'] ?><!--</a>-->
                    <!--                        </div>-->
                    <!--                    --><?// endif; ?>
                </div>
            </div>
        <? endif; ?>
        <?  if( get_row_layout() == 'доставка_и_оплата' ): ?>
            <? $delivery = get_field('доставка', 'options'); ?>
            <? $payment = get_field('оплата', 'options'); ?>
            <div class="terms">
                <div class="container">
                    <div class="terms__row">
                        <? if($delivery): ?>
                            <div class="terms__col">
<!--                                <img class="terms__col-icon lazyload" data-src="--><?//= $delivery['иконка'] ?><!--" alt="">-->
                                <p class="terms__col-title"><?= $delivery['заголовок'] ?></p>
<!--                                <div class="terms__variants custom-select">-->
<!--                                    <span class="current">-->
<!--                                        --><?//= $delivery['вид_доставки'][0]['заголовок']; ?>
<!--                                    </span>-->
<!--                                    <div class="dropdown">-->
<!--                                        --><?// foreach ($delivery['вид_доставки'] as $item): ?>
<!--                                            <div class="item">-->
<!--                                                --><?//= $item['заголовок']; ?>
<!--                                            </div>-->
<!--                                        --><?// endforeach; ?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                                --><?// $i = 1; foreach ($delivery['вид_доставки'] as $item): ?>
<!--                                    <div class="terms__delivery-block--><?// if($i == 1): ?><!-- active--><?// endif; ?><!--">-->
<!--                                        <span class="terms__delivery-block-label">--><?//= $item['заголовок'] ?><!--</span>-->
<!--                                        <div class="terms__delivery-block-row">-->
<!--                                            --><?// foreach ($item['колонки'] as $subitem): ?>
<!--                                                <div class="terms__delivery-block-col">-->
<!--                                                    <span class="terms__delivery-block-weight">--><?//= $subitem['вес'] ?><!--</span>-->
<!--                                                    <span class="terms__delivery-block-price--><?// if($subitem['маленький_шрифт_цены']): ?><!-- small--><?// endif; ?><!--">--><?//= $subitem['цена'] ?><!--</span>-->
<!--                                                </div>-->
<!--                                            --><?// endforeach; ?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                --><?// $i++; endforeach; ?>
                                <? if($delivery['комментарий']): ?>
                                    <p class="terms__col-desc">
                                        <?= $delivery['комментарий'] ?>
                                    </p>
                                <? endif; ?>
                            </div>
                        <? endif; ?>
                        <? if($payment): ?>
                            <div class="terms__col">
<!--                                <img class="terms__col-icon lazyload" data-src="--><?//= $payment['иконка'] ?><!--" alt="">-->
                                <p class="terms__col-title"><?= $payment['заголовок'] ?></p>
                                <ul class="terms__list">
                                    <? foreach ($payment['список'] as $item): ?>
                                        <li>
                                            <?= $item['текст']; ?>
                                        </li>
                                    <? endforeach; ?>
                                </ul>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        <? endif; ?>
        <?  if( get_row_layout() == 'менеджер' ): ?>
            <div class="i-manager">
                    <div class="container">
                        <div class="i-manager__inner">
                            <img class="lazyload i-manager__inner-bg" data-src="<?= get_sub_field('фон'); ?>">
                            <div class="i-manager__inner-row">
                                <div class="i-manager__inner-left">
                                    <div class="section-title i-manager__title">
                                        <?= get_sub_field('заголовок'); ?>
                                    </div>
                                    <ul class="i-manager__list list">
<!--                                        --><?// foreach (get_sub_field('список') as $item): ?>
<!--                                            <li>--><?//= $item['текст'] ?><!--</li>-->
<!--                                        --><?// endforeach; ?>
                                        <li>На связи 24/7, быстро реагирует на сообщения</li>
                                        <li>Быстро рассчитает стоимость заказа по вашему<br>
                                            техзаданию, а если его нет — задаст уточняющие вопросы</li>
                                        <li>Разбирается в форматах печати, технологических<br>
                                            процессах, оборудовании и материалах</li>
                                        <li>Отслеживает производство продукции<br>
                                            и всегда подскажет на каком этапе ваш заказ</li>
                                    </ul>
                                    <img data-src="<?= THEME_DIR ?>/img/i-manager-mob-img.jpg" alt="" class="lazyload i-manager__mob-img">
                                    <div class="i-manager__name i-manager__name--mob">
                                        <?= get_sub_field('о_менеджере'); ?>
                                    </div>
                                    <div class="i-manager__bottom">
                                        <? $btn = get_sub_field('кнопка'); ?>
                                        <a class="i-manager__bottom-btn red-btn" href="#popup-callback" data-fancybox><?= $btn['текст_кнопки']; ?></a>
                                        <? if(false): ?>
                                        <div class="i-manager__messengers write-messengers">
                                            <p class="write-messengers__title write-messengers__title--black">или напишите
                                                <br> в мессенджер</p>
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
                                    </div>
                                </div>
                                <div class="i-manager__inner-right">
                                    <img class="i-manager__woman lazyload" data-src="<?= get_sub_field('изображение_менеджера'); ?>">
                                    <div class="i-manager__name">
                                        <?= get_sub_field('о_менеджере'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <? endif; ?>
        <?  if( get_row_layout() == 'форматы_и_сферы' ): ?>
            <? if(get_sub_field('колонка')): ?>
            <div class="i-using">
                    <div class="container">
                        <div class="i-using__row">
                            <? foreach (get_sub_field('колонка') as $item): ?>
                                <div class="i-using__col<? if($item['колонка_на_всю_ширину']): ?> i-using__col--full<? endif; ?>">
                                    <div class="i-using__col-title section-title">
                                        <?= $item['заголовок'] ?>
                                    </div>
                                    <div class="i-using__items">
                                        <? foreach ($item['список'] as $subitem): ?>
                                            <div class="i-using__item">
                                                <img data-src="<?= $subitem['изображение']['sizes']['medium'] ?>" alt="" class="lazyload">
                                                <p class="i-using__item-text">
                                                    <?= $subitem['текст']; ?>
                                                </p>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
        <? endif; ?>
        <? endif; ?>
        <?  if( get_row_layout() == 'контакты' ): ?>
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
        <? endif; ?>
    <? endwhile; ?>
<? endif; ?>