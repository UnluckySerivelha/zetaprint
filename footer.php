<? if(get_field('seo-текст')): ?>
    <div class="seo-text">
        <div class="container">
            <div class="seo-text__inner">
                <div class="seo-text__wysiwig">
                    <?= get_field('seo-текст'); ?>
                    <? if(get_field('мета-теги')): ?>
                        <?= get_field('мета-теги'); ?>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>
<footer class="footer" itemscope itemtype="https://schema.org/LocalBusiness">
    <meta itemprop="priceRange" content="₽₽" />
		<div class="container">
			<div class="footer__row">
				<div class="footer__left">
					<div class="footer__logo-wrapper">
                        <img class="footer__logo" src="<?= THEME_DIR ?>/img/logo.png" itemprop="image"></div>
					<p class="footer__logo-desc">
                        <b itemprop="name">Надежная типография в Москве</b>
						<br><span itemprop="description">Все печатают здесь с 2005 года</span>
                    </p>
<!--                    --><?// if(get_field('адрес', 'options')): ?>
<!--                    <p class="footer__address"><b>Адрес офиса:</b> --><?//= get_field('адрес', 'options'); ?><!--</p>-->
<!--                    --><?// endif; ?>
                    <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <? if(get_field('адрес_производства', 'options')): ?>
					<p class="footer__address"><b>Адрес производства:</b> 115088, <span itemprop="addressLocality">г. Москва</span>, <span itemprop="streetAddress">Южнопортовый 2-й проезд, дом 26А, строение 31.</span></p>
                    <? endif; ?>
                    </div>
					<p class="footer__req">
                        <?= get_field('реквизиты', 'options'); ?>
                    </p>
					<p class="footer__copyright"><?= get_field('копирайт', 'options'); ?></p>
				</div>
				<div class="footer__nav">
					<div class="footer__nav-row">
                        <? $footer_menu = get_field('футер', 6) ?>
                        <? foreach ($footer_menu['меню'] as $col): ?>
						<div class="footer__nav-col">
                            <? foreach ($col['ссылки'] as $link): ?>
							    <? if(isset($link['ссылка']['url']) && isset($link['ссылка']['title'])): ?>
                                <a  rel="nofollow" class="footer__nav-link" href="<?= $link['ссылка']['url'] ?>"><?= $link['ссылка']['title'] ?></a>
								<? endif; ?>
                            <? endforeach; ?>
                        </div>
                        <? endforeach; ?>
					</div>
				</div>
				<div class="footer__right">
                    <a class="footer__phone" href="tel:<?= get_field('номер_телефона', 'options'); ?>">
                        <span itemprop="telephone"><?= get_field('номер_телефона', 'options'); ?></span>
                    </a>
                    <a class="footer__email" href="mailto:<?= get_field('почта', 'options'); ?>">
                        <span itemprop="email"><?= get_field('почта', 'options'); ?></span></a>
                    <a class="red-btn footer__callback-btn" href="#callbackwidget">Обратный звонок</a>
					<div class="footer__socials">
						<p class="footer__socials-title">Социальные сети</p>
						<div class="footer__socials-row">
                            <? $socials = get_field('соц_сети', 'options'); ?>
                            <? if($socials['vk']): ?>
                                <a rel="nofollow" class="footer__social-link" href="<?= $socials['vk']; ?>">
                                    <img class="footer__social-icon lazyload" data-src="<?= THEME_DIR ?>/img/icon-vk.svg">
                                </a>
                            <? endif; ?>
                            <? if($socials['youtube']): ?>
                                <a rel="nofollow" class="footer__social-link" href="<?= $socials['youtube']; ?>">
                                    <img class="footer__social-icon lazyload" data-src="<?= THEME_DIR ?>/img/icon-yt.svg">
                                </a>
                            <? endif; ?>
                            <? if($socials['twitter']): ?>
                                <a rel="nofollow" class="footer__social-link" href="<?= $socials['twitter']; ?>">
                                    <img class="footer__social-icon lazyload" data-src="<?= THEME_DIR ?>/img/icon-tw.svg">
                                </a>
                            <? endif; ?>
						</div>
					</div>
					<div class="footer__links"><a class="footer__link" rel="nofollow" href="<?= get_permalink(433) ?>">Политика конфиденциальности</a>
                        <a class="footer__link" rel="nofollow" href="<?= get_permalink(434) ?>">Оферта</a></div>
                    <div class="footer__dev-wrapper">
                        <img src="<?= THEME_DIR ?>/img/concurs-logo.jpg" alt="" class="footer__concurs-logo">
                        <a  rel="nofollow" href="https://polovinkin-marketing.ru/?utm_source=referral&utm_medium=free&utm_content=footer&utm_campaign=<?php echo $_SERVER['SERVER_NAME']; ?>" class="footer__dev">
                            <img src="<?= THEME_DIR ?>/img/tolka.svg" alt="Tolka Digital" class="footer__dev-logo">
                            <span class="footer__dev-text">
                                Разработка <br> и продвижение <br> сайтов
                            </span>
                        </a>
                    </div>
				</div>
			</div>
		</div>
	</footer>
	<div class="footer-mob">
		<div class="container">
			<div class="footer-mob__logo-wrapper">
                <img class="footer-mob__logo" src="<?= THEME_DIR ?>/img/logo.png">
				<p class="footer-mob__logo-desc"><b>Надежная типография в Москве</b>
					<br> Все печатают здесь с 2005 года</p>
			</div>
			<div class="footer-mob__socials">
				<p class="footer-mob__socials-title">Социальные сети</p>
				<div class="footer-mob__socials-list">
                    <? $socials = get_field('соц_сети', 'options'); ?>
                    <? if($socials['vk']): ?>
                        <a rel="nofollow" class="footer-mob__social-link"  target="_blank" href="<?= $socials['vk']; ?>"><img class="footer-mob__social-icon lazyload" data-src="<?= THEME_DIR ?>/img/icon-vk.svg"></a>
                    <? endif; ?>
                    <? if($socials['youtube']): ?>
                        <a rel="nofollow" class="footer-mob__social-link"  target="_blank" href="<?= $socials['youtube']; ?>"><img class="footer-mob__social-icon lazyload" data-src="<?= THEME_DIR ?>/img/icon-yt.svg"></a>
                    <? endif; ?>
                    <? if($socials['twitter']): ?>
                        <a rel="nofollow" class="footer-mob__social-link"  target="_blank" href="<?= $socials['twitter']; ?>"><img class="footer-mob__social-icon lazyload" data-src="<?= THEME_DIR ?>/img/icon-tw.svg"></a>
                    <? endif; ?>
				</div>
			</div>
			<p class="footer-mob__req">ОГРН: 1117746932511
				<br> ИНН: 7723819154</p>
			<div class="footer-mob__links"><a class="footer-mob__link" href="<?= get_permalink(433) ?>">Политика конфиденциальности</a><a class="footer-mob__link" href="<?= get_permalink(434) ?>">Оферта</a></div>

            <div class="footer__dev-wrapper footer__dev-wrapper--mob">
                <img data-src="<?= THEME_DIR ?>/img/concurs-logo.jpg" alt="" class="footer__concurs-logo lazyload">
                <a href="https://polovinkin-marketing.ru/?utm_source=referral&utm_medium=free&utm_content=footer&utm_campaign=<?php echo $_SERVER['SERVER_NAME']; ?>" class="footer__dev footer__dev--mob">
                    <img data-src="<?= THEME_DIR ?>/img/tolka.svg" alt="Tolka Digital" class="footer__dev-logo lazyload">
                    <span class="footer__dev-text">
                        Разработка <br> и продвижение <br> сайтов
                    </span>
                </a>
            </div>
        </div>
	</div>

    <div class="popup popup-tech-task" id="popup-tech-task">
        <p class="popup__title popup-tech-task__title">
            Пришлите техзадание, макеты <br> и все файлы, которые вы посчитаете <br>нужным для расчета сметы
        </p>
        <div class="popup-tech-task__form-wrapper">
            <?= do_shortcode('[contact-form-7 id="568" title="Прислать техзадание"]'); ?>
        </div>
        <? if(false): ?>
        <div class="popup-tech-task__messengers">
            <p class="write-messengers__title write-messengers__title--black">или пришлите файлы в мессенджер</p>
            <? if(false): ?>
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
            <? endif; ?>
        </div>
        <? endif; ?>
        <p class="popup-tech-task__agreement-hint agreement-hint agreement-hint--gray">
            Нажимая на кнопку, вы соглашаетесь с&nbsp;<a href="<?= get_permalink(433); ?>" target="_blank">Политикой конфиденциальности сайта</a>
        </p>
    </div>

    <div class="popup popup-callback" id="popup-callback">
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
                    Перезвоню в течение 20 минут <br> и отвечу на вопросы
                </p>
                <ul class="popup-callback__list list">
                    <li>Расскажу о наших технологических<br>
                    процессах и оборудовании </li>
                    <li>Рассчитаю ориентировочную стоимость печати</li>
                    <li>Дам советы по подготовке макетов для печати</li>
                </ul>
                <div class="popup-callback__form-wrapper">
                    <?= do_shortcode('[contact-form-7 id="567" title="Заказать обратный звонок"]'); ?>
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
    <div class="popup popup-callback popup-callback--requirments" id="popup-requirments">
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
                    Введите ваш номер и вам станут доступны требования
                </p>
                <div class="popup-callback__form-wrapper">
                    <?= do_shortcode('[contact-form-7 id="729" title="Скачать требования"]'); ?>
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
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || (stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false && (stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false))): ?>
    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter46478646 = new Ya.Metrika({ id:46478646, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/46478646" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108377133-15"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-108377133-15');
    </script><?php endif; ?>
    <?php wp_footer(); ?>
<script>
    $(function () {
        $('input[name="page_name"]').val(document.title)
        $('input[name="page_url"]').val(window.location.href)
    })
</script>
<? if(false): ?>
<!-- calltouch -->
<!--<script>-->
<!--    (function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","4f8ph9e4");-->
<!--</script>-->
<!-- calltouch -->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function(){-->
<!--        $(document).on("tildaform:aftersuccess", 'form', function() {-->
<!--            var m = $(this);-->
<!--            var fio = m.find('input[data-tilda-rule="name"]').val();-->
<!--            var phone = m.find('input[data-tilda-rule="phone"]').val();-->
<!--            var mail = m.find('input[data-tilda-rule="email"]').val();-->
<!--            var ct_site_id = '56070';-->
<!--            var sub = 'Заявка';-->
<!--            var ct_data = {-->
<!--                fio: fio,-->
<!--                phoneNumber: phone,-->
<!--                email: mail,-->
<!--                subject: sub,-->
<!--                requestUrl: location.href,-->
<!--                sessionId: window.call_value-->
<!--            };-->
<!--            console.log(ct_data);-->
<!--            if (!!phone || !!mail){-->
<!--                $.ajax({-->
<!--                    url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+ct_site_id+'/register/',-->
<!--                    dataType: 'json',type: 'POST', data: ct_data, async: false-->
<!--                });-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<? endif; ?>
<!-- Top.Mail.Ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "3368668", type: "pageView", start: (new Date()).getTime(), pid: "USER_ID"});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = "https://top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "tmr-code");
</script>
<noscript><div><img src="https://top-fwz1.mail.ru/counter?id=3368668;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div></noscript>
<!-- /Top.Mail.Ru counter -->


</body>

</html>