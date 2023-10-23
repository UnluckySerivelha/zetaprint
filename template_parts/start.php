<div class="start">
		<div class="container">
			<div class="start__title section-title">
				<h3>Давайте начнем работу <br>с простого шага</h3></div>
			<div class="start__row">
				<div class="start__col start__col--1">
					<p class="start__col-title">У вас есть
						<br> техзадание?</p>
					<p class="start__col-desc">Отправьте его нам, получите расчёт сметы и технологические рекомендации от специалиста «Зетапринт»</p><a class="red-btn start__col-btn"  href="#popup-tech-task" data-fancybox>Отправить техзадание</a></div>
				<div class="start__col start__col--2">
					<p class="start__col-title">Получите
						<br> консультацию
						<br> специалиста</p>
					<p class="start__col-desc">4 профессиональных технолога
                        <br>
                        ответят на вопросы по материалам
                        <br>и технологическим процессам.
                        <br>Подскажут следующий шаг.</p><a class="red-btn start__col-btn" href="#popup-callback" data-fancybox>Получить консультацию</a></div>
				<div class="start__col start__col--3">
					<p class="start__col-title">Посмотрите перечень продукции и наших услуг</p>
                    <a class="start__col-link" href="<?= get_permalink(468); ?>">Услуги для типографий</a>
                    <a class="start__col-link" href="<?= get_permalink(185); ?>">Продукция</a>
                </div>
			</div>
		</div>
	</div>
	<div class="start-form">
		<div class="container">
			<div class="start-form__wrapper lazyload" data-bg="<?= THEME_DIR ?>/img/start-form-bg.jpg">
				<p class="start-form__title">Пришлите файлы для расчета сметы или получите консультацию специалиста Zeta-print</p>
                <?= do_shortcode('[contact-form-7 id="301" title="Прислать файлы для расчета"]'); ?>
                <? if(false): ?>
                <div class="start-form__messengers write-messengers">
					<p class="write-messengers__title">или напишите
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
				<p class="start-form__agreement agreement-hint">
                    Нажимая на кнопку, вы соглашаетесь
					<br> с <a href="<?= get_permalink(433); ?>">Политикой конфиденциальности</a>
                </p>
			</div>
		</div>
	</div>