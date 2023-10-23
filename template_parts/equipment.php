<p class="equipment__subtitle">
    Для изготовления печатных форм используется 3 устройства прямого экспонирования офсетных печатных форм Computer-to-Plate (CTP), работающие с проявочными процессорами в линию от компании Heidelberg
</p>
<div class="equipment__row">
    <div class="equipment__left">
        <? $cats = get_terms( [
            'taxonomy' => 'equipement_category',
            'hide_empty' => true,
            'hierarchical' => true,
            'parent' => 0
        ] ); ?>
        <div class="production__tabs-head production__tabs-head--eq-cats">
            <? $i = 1; foreach ($cats as $cat): ?>
                <button class="production__tab-head<? if($i == 1): ?> active<? endif; ?>">
                    <svg>
                        <use xlink:href="#arrow-right"></use>
                    </svg><?= $cat->name; ?></button>
                <? $i++; endforeach; ?>
        </div>

    </div>
    <div class="equipment__right">
        <? $tab_number = 1; foreach ($cats as $cat): ?>
            <div class="equipment__tab<? if($tab_number == 1): ?> active<? endif; ?>">
                <? $items_no_cats = get_posts([
                    'post_type'=>'equipment',
                    'numberposts' => -1,
                    'tax_query'=>[
                        [
                            'taxonomy'=>'equipement_category',
                            'field' => 'id',
                            'terms' => $cat->term_id,
                        ]
                    ]
                ]) ?>
<!--                <pre>-->
<!--                --><?// print_r($items_no_cats); ?>
<!--                </pre>-->
                <div class="equipment__tab-category">
                    <? $n = 1; foreach ($items_no_cats as $item): ?>
                        <? $imgs = get_field('галерея', $item->ID); ?>
                        <div class="i-equipment__slide<? if(get_field('только_левый_столбец', $item->ID)): ?> only-right<? endif; ?>">
                            <? if($imgs): ?>
                                <div class="i-equipment__slide-left">
                                    <a class="i-equipment__slide-large-img" data-fancybox="eq-<?= $tab_number; ?>-<?= $n; ?>" href="<?= $imgs[0]['sizes']['large']; ?>">
                                        <img data-src="<?= $imgs[0]['sizes']['large']; ?>" class="lazyload"></a>
                                    <? array_shift($imgs); ?>
                                    <div class="i-equipment__slide-thumbs">
                                        <? foreach ($imgs as $img): ?>
                                            <a class="i-equipment__slide-small-img"
                                               data-fancybox="eq-<?= $tab_number; ?>-<?= $n; ?>" href="<?= $img['url']; ?>">
                                                <img class="lazyload" data-src="<?= $img['sizes']['medium']; ?>"></a>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <div class="i-equipment__slide-right<? if(get_field('только_левый_столбец', $item->ID)): ?> full<? endif; ?>">
                                <p class="i-equipment__slide-title"><?= $item->post_title ?></p>
                                <p class="i-equipment__slide-desc"><?= get_field('описание', $item->ID) ?></p>
                                <? if(get_field('страна-производитель', $item->ID)): ?>
                                    <span class="i-equipment__slide-tag"><?= get_field('страна-производитель', $item->ID) ?></span>
                                <? endif; ?>
                                <? if(get_field('характеристики', $item->ID)): ?>
                                    <div class="i-equipment__slide-params2">
                                        <?= get_field('характеристики', $item->ID) ?>
                                    </div>
                                <? endif; ?>
                                <? if(get_field('список', $item->ID)): ?>
                                    <ul class="i-equipment__slide-list">
                                        <? foreach (get_field('список', $item->ID) as $item2): ?>
                                            <li><?= $item2['текст']; ?></li>
                                        <? endforeach; ?>
                                    </ul>
                                <? endif; ?>
                                <? $imgs = get_field('галерея', $item->ID); ?>
                                <? if($imgs): ?>
                                    <div class="i-equipment__mob-slider-wrapper">
                                        <div class="i-equipment__mob-slider swiper">
                                            <div class="swiper-wrapper">
                                                <? foreach ($imgs as $img): ?>
                                                    <a href="<?= $img['url']; ?>" data-fancybox="eqq-<?= $tab_number; ?>-<?= $n; ?>" class="swiper-slide">
                                                        <img data-src="<?= $img['sizes']['medium']; ?>" alt="" class="lazyload">
                                                    </a>
                                                <? endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <? endif; ?>
                            </div>
                        </div>
                        <? $n++; endforeach; ?>

                </div>
<!--                --><?// $subcats = get_terms( [
//                    'taxonomy' => 'equipement_category',
//                    'hide_empty' => true,
//                    'hierarchical' => true,
//                    'parent' => $cat->term_id
//                ] ); ?>
<!--                --><?// foreach ($subcats as $subcat): ?>
<!--                    <div class="equipment__tab-category">-->
<!--                        --><?// $items = get_posts([
//                            'post_type'=>'equipment',
//                            'numberposts' => -1,
//                            'tax_query'=>[
//                                [
//                                    'taxonomy'=>'equipement_category',
//                                    'field' => 'id',
//                                    'terms' => $subcat->term_id,
//                                ]
//                            ]
//                        ]) ?>
<!--                        --><?// $n = 1; foreach ($items as $item): ?>
<!--                            --><?// $imgs = get_field('галерея', $item->ID); ?>
<!--                            <div class="i-equipment__slide">-->
<!--                                --><?// if($imgs): ?>
<!--                                    <div class="i-equipment__slide-left">-->
<!--                                        <a class="i-equipment__slide-large-img" data-fancybox="eqqq---><?//= $tab_number; ?><!-----><?//= $n; ?><!--" href="--><?//= $imgs[0]['sizes']['large']; ?><!--">-->
<!--                                            <img data-src="--><?//= $imgs[0]['sizes']['large']; ?><!--" class="lazyload"></a>-->
<!--                                        --><?// array_shift($imgs); ?>
<!--                                        <div class="i-equipment__slide-thumbs">-->
<!--                                            --><?// foreach ($imgs as $img): ?>
<!--                                                <a class="i-equipment__slide-small-img"-->
<!--                                                   data-fancybox="eqqq---><?//= $tab_number; ?><!-----><?//= $n; ?><!--" href="--><?//= $img['url']; ?><!--">-->
<!--                                                    <img class="lazyload" data-src="--><?//= $img['sizes']['medium']; ?><!--"></a>-->
<!--                                            --><?// endforeach; ?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                --><?// endif; ?>
<!--                                <div class="i-equipment__slide-right">-->
<!--                                    <p class="i-equipment__slide-title">--><?//= $item->post_title ?><!--</p>-->
<!--                                    <p class="i-equipment__slide-desc">--><?//= get_field('описание', $item->ID) ?><!--</p>-->
<!--                                    --><?// if(get_field('страна-производитель', $item->ID)): ?>
<!--                                        <span class="i-equipment__slide-tag">--><?//= get_field('страна-производитель', $item->ID) ?><!--</span>-->
<!--                                    --><?// endif; ?>
<!--                                    --><?// if(get_field('характеристики', $item->ID)): ?>
<!--                                        <div class="i-equipment__slide-params2">-->
<!--                                            --><?//= get_field('характеристики', $item->ID) ?>
<!--                                        </div>-->
<!--                                    --><?// endif; ?>
<!--                                    --><?// if(get_field('список', $item->ID)): ?>
<!--                                        <ul class="i-equipment__slide-list">-->
<!--                                            --><?// foreach (get_field('список', $item->ID) as $item2): ?>
<!--                                                <li>--><?//= $item2['текст']; ?><!--</li>-->
<!--                                            --><?// endforeach; ?>
<!--                                        </ul>-->
<!--                                    --><?// endif; ?>
<!--                                    --><?// if($imgs): ?>
<!--                                        <div class="i-equipment__mob-slider-wrapper">-->
<!--                                            <div class="i-equipment__mob-slider swiper">-->
<!--                                                <div class="swiper-wrapper">-->
<!--                                                    --><?// foreach ($imgs as $img): ?>
<!--                                                        <a href="--><?//= $img['url']; ?><!--" data-fancybox="eqqqq---><?//= $tab_number; ?><!-----><?//= $n; ?><!--" class="swiper-slide">-->
<!--                                                            <img data-src="--><?//= $img['sizes']['medium']; ?><!--" alt="" class="lazyload">-->
<!--                                                        </a>-->
<!--                                                    --><?// endforeach; ?>
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    --><?// endif; ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            --><?// $n++; endforeach; ?>
<!---->
<!--                    </div>-->
<!--                --><?// endforeach; ?>
            </div>
            <? $tab_number++; endforeach; ?>
    </div>
</div>