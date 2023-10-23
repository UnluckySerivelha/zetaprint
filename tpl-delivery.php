<?php
/* Template name: Доставка */
get_header();
?>
<div class="breadcrumbs">
    <div class="container">
        <? kama_breadcrumbs('/') ?>
    </div>
</div>
<div class="inner-page-layout inner-page-layout--mob-menu">
    <div class="container">
        <div class="inner-page-layout__row">
            <div class="inner-page-layout__left">
                <div class="inner-page-menu">
                    <? wp_nav_menu([
                        'theme_location'=>'inner-menu'
                    ]); ?>
                </div>
            </div>
            <div class="inner-page-layout__right">
                <div class="delivery">
                    <h1>
                        Доставка собственной транспортной службой нашей компании
                    </h1>
                    <div class="delivery__zone">
                        <span>По Москве</span>
                    </div>
                    <div class="delivery__zone-content">
                        <div class="terms__delivery-block active">
                            <span class="terms__delivery-block-label">Курьером</span>
                            <div class="terms__delivery-block-row">
                                <div class="terms__delivery-block-col">
                                    <span class="terms__delivery-block-weight">до 3 кг</span>
                                    <span class="terms__delivery-block-separator">-</span>
                                    <span class="terms__delivery-block-price">250 ₽</span> </div>
                                <div class="terms__delivery-block-col">
                                    <span class="terms__delivery-block-weight">3-5 кг</span>
                                    <span class="terms__delivery-block-separator">-</span>
                                    <span class="terms__delivery-block-price">500 ₽</span> </div>
                            </div>
                        </div>
                        <div class="terms__delivery-block">
                            <span class="terms__delivery-block-label">Водителем</span>
                            <div class="terms__delivery-block-row">
                                <div class="terms__delivery-block-col">
                                    <span class="terms__delivery-block-weight">до 800 кг</span>
                                    <span class="terms__delivery-block-separator">-</span>
                                    <span class="terms__delivery-block-price">1 650 ₽</span> </div>
                                <div class="terms__delivery-block-col">
                                    <span class="terms__delivery-block-weight">от 800 кг</span>
                                    <span class="terms__delivery-block-separator">-</span>
                                    <span class="terms__delivery-block-price small">договорная и зависит  от веса, тиража и адреса доставки</span> </div>
                            </div>
                        </div>

                        <p class="terms__comment">
                            Доставка доступна курьером, автомобилем и транспортной компанией. Подробности уточняйте у менеджера.
                        </p>
                    </div>
                    <div class="delivery__zone">
                        <span>По Московской области</span>
                    </div>
                    <div class="delivery__zone-content">
                        <div class="delivery__zone-desc">
                            <p>Цена договорная и зависит от веса, тиража и адреса доставки</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
