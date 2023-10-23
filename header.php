<!DOCTYPE html>
<html lang="ru-RU" itemscope itemtype="https://schema.org/WebPage">

<head>

	<meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="address=no">
    <meta name="format-detection" content="email=no">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= THEME_DIR; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= THEME_DIR; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= THEME_DIR; ?>/favicon-16x16.png">
    <link rel="manifest" href="<?= THEME_DIR; ?>/site.webmanifest">
    <link rel="mask-icon" href="<?= THEME_DIR; ?>/safari-pinned-tab.svg" color="#dc2026">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="yandex-verification" content="1cfff66d79a96054" />
    <meta name="google-site-verification" content="MxFQd7aKshwT_CZ4io6VGD-ia-QdBwksh6GmRVShI48" />

    <meta name="theme-color" content="#dc2026">
    <script>
        var theme_dir = '<?= get_template_directory_uri(); ?>';
        var thanks_page_url = '<?= get_permalink('533'); ?>'
        var thanks_page_url2 = '<?= get_permalink('1080'); ?>'
    </script>
    <? wp_head(); ?>
	<style>.last-cases__item {
background-color: rgb(248, 248, 249);
}</style>
    <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || (stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false && (stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false))): ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(91632191, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/91632191" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5D7WDFFR');</script>
<!-- End Google Tag Manager -->
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5D7WDFFR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<? endif; ?>
	<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
<script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=2a6e7a1d547527a87c24940251996d2c" charset="UTF-8" async></script>
<script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=a115dc59c9e1944960782115e9db7430" charset="UTF-8" async></script>
</head>

<body <? body_class(); ?>>
	<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>
	<div class="svg-sprite">
		<svg>
			<symbol id="arrow-right" viewBox="0 0 11.875 9.062">
				<path d="m11.594 5.172-3.62 3.62a.92.92 0 0 1-1.3-1.3l2.045-2.044H.905a.918.918 0 1 1 0-1.836h7.814L6.674 1.567a.92.92 0 0 1 1.3-1.3l3.619 3.618a.919.919 0 0 1 .001 1.287Z" fill-rule="evenodd" />
			</symbol>
		</svg>
	</div>
	<header class="header">
		<div class="header-top">
			<div class="container">
				<div class="header-top__row">
					<div class="header-top__nav">
                        <?
                        $menu_html = '';
                        $menu_name = 'main_nav';
                        $locations = get_nav_menu_locations();

                        $menu_html .= '<ul class="menu" itemscope itemtype="https://schema.org/SiteNavigationElement">';
                        if( $locations && isset( $locations[ $menu_name ] ) ){

                            // получаем элементы меню
                            $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );
                            // создаем список

                            $i = 1;
                            foreach ( (array) $menu_items as $key => $menu_item ){
                                $schemaOrgPageType = 'WebPage';
                                if($menu_item->title == 'Контакты') {
                                    $schemaOrgPageType = 'ContactPage';
                                }
                                if($menu_item->title == 'О нас') {
                                    $schemaOrgPageType = 'AboutPage';
                                }
                                if($menu_item->object_id == get_the_ID()) {
                                    $current_page_class = ' class="current_page_item"';
                                } else {
                                    $current_page_class = '';
                                }
                                $menu_html .= '<li itemprop="hasPart" itemscope itemtype="https://schema.org/' . $schemaOrgPageType . '"' . $current_page_class . '>
                                    <a itemprop="url" href="' . $menu_item->url . '"><span itemprop="name">' . $menu_item->title . '</span></a>
                                    <meta itemprop="position" content="' . $i . '" />
                                    </li>';
                                $i++;
                            }

                        }
                        $menu_html .= '</ul>';
                        ?>
                        <?
                        echo $menu_html; ?>

					</div>
					<div class="header-top__right">
                        <a class="header-top__email" href="mailto:<?= get_field('почта', 'options'); ?>"><?= get_field('почта', 'options'); ?></a>
                        <a class="header-top__phone" href="tel:<?= get_field('номер_телефона', 'options'); ?>"><?= get_field('номер_телефона', 'options'); ?></a>
                        <a class="header-top__callback-btn red-btn" href="#callbackwidget">Обратный звонок</a>
                    </div>
				</div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<div class="header-bottom__row">
                    <? if(is_front_page()): ?>
					<div class="header-bottom__logo-wrapper">
                        <img class="header-bottom__logo" src="<?= THEME_DIR ?>/img/logo.png">
                    </div>
                    <? else: ?>
                    <a href="/" class="header-bottom__logo-wrapper header-bottom__logo-wrapper--link">
                        <img class="header-bottom__logo" src="<?= THEME_DIR ?>/img/logo.png">
                    </a>
                    <? endif; ?>
					<p class="header-bottom__logo-desc">Надежная типография
						<br> полного цикла в Москве
                        <br>Работаем по всей России</p>
					<div class="header-bottom__products-wrapper">
						<button class="header-bottom__products-btn"><span class="header-bottom__products-btn-icon"><span></span><span></span><span></span></span><span class="header-bottom__products-btn-text">Продукция</span></button>
                        <div class="header-bottom__products-dropdown">
                            <button class="header-bottom__products-dropdown-close">
                                <span></span>
                                <span></span>
                            </button>
                        <div class="header-bottom__products-dropdown-inner">
                            <? wp_nav_menu([
                                'theme_location'=>'production'
                            ]); ?>
                            <div class="header-bottom__products-info">
                                <?
                                    $locations = get_nav_menu_locations()['production'];
                                    $menu_items = wp_get_nav_menu_items($locations);
                                    $production_info = get_field('список_продукции', 185);
                                ?>
                                <? foreach ($production_info as $item): ?>
                                    <div class="header-bottom__products-info-tab">
                                        <a class="product-info__title" href="<?= $item['ссылка']; ?>" style="display: block;">
                                            <?= $item['заголовок']; ?>
                                        </a>
                                        <? if($item['форматы']): ?>
                                        <div class="product-info__group">
                                            <p class="product-info__group-title">Форматы:</p>
                                            <p class="product-info__group-list">
                                                <? foreach ($item['форматы'] as $format): ?>
                                                    <span><?= mb_ucfirst($format['текст']) ?></span>
                                                <? endforeach;?></p>
                                        </div>
                                        <? endif; ?>
                                        <? if($item['цветность']): ?>
                                        <div class="product-info__group">
                                            <p class="product-info__group-title">Цветность:</p>
                                            <p class="product-info__group-list">
                                                <? foreach ($item['цветность'] as $format): ?>
                                                    <span><?= mb_ucfirst($format['текст']) ?></span>
                                                <? endforeach;?>
                                            </p>
                                        </div>
                                        <? endif; ?>
                                        <? if($item['сферы_применения']): ?>
                                        <div class="product-info__group">
                                            <p class="product-info__group-title">Сферы применения:</p>
                                            <p class="product-info__group-list">
                                                <? foreach ($item['сферы_применения'] as $format): ?>
                                                    <span><?= mb_ucfirst($format['текст']) ?></span>
                                                <? endforeach;?>
                                            </p>
                                        </div>
                                        <? endif; ?>


                                    </div>
                                <? endforeach; ?>
                            </div>
                            </div>
                        </div>
					</div>
                    <div class="header-bottom__menu">
                        <? wp_nav_menu([
                            'theme_location'=>'production_outer'
                        ]); ?>
                    </div>
                    <a class="header-bottom__phone" href="tel:<?= get_field('номер_телефона', 'options'); ?>">
                        <?= get_field('номер_телефона', 'options'); ?>
                    </a>
                </div>
			</div>
		</div>
	</header>
<div class="mob-menu">
    <div class="mob-menu__content">
        <button class="mob-menu__close-btn">
            Закрыть
        </button>
        <? wp_nav_menu([
            'theme_location'=>'mobile_menu'
        ]); ?>
    </div>
    <div class="mob-info">
        <a href="tel:<?= get_field('номер_телефона', 'options'); ?>"
           class="mob-info__phone">
            <?= get_field('номер_телефона', 'options'); ?>
        </a>
        <a href="mailto:<?= get_field('почта', 'options'); ?>" class="mob-info__email">
            <?= get_field('почта', 'options'); ?>
        </a>
        <a href="#popup-callback" class="mob-info__callback-btn red-btn" data-fancybox>Обратный звонок</a>
    </div>
</div>

