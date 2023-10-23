<?php
/* Template name: Оплата */
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
                <h1>
                    <? the_title(); ?>
                </h1>
                <? $payment = get_field('способы_оплаты'); ?>

                <? if($payment): ?>
                    <div class="payment">
                        <? $i = 1; foreach ($payment as $item): ?>
                            <div class="payment__group">
                                <button class="payment__group-head<?if ($i == 1):?> active<? endif; ?>">
                                    <?= $item['заголовок'] ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.875" height="9.062">
                                        <path d="m11.594 5.172-3.62 3.62a.92.92 0 0 1-1.3-1.3l2.045-2.044H.905a.918.918 0 1 1 0-1.836h7.814L6.674 1.567a.92.92 0 0 1 1.3-1.3l3.619 3.618a.919.919 0 0 1 .001 1.287Z" fill-rule="evenodd"/>
                                    </svg>
                                </button>
                                <div class="payment__group-content" <?if ($i == 1):?> style="display: block" <? endif; ?>>
                                    <p>
                                        <?= $item['текст'] ?>
                                    </p>
                                </div>
                            </div>
                        <? $i++; endforeach; ?>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
