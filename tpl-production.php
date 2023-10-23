<?php
/* Template name: Продукция
*
*/

?>
<?php get_header(); ?>

    <div class="breadcrumbs">
        <div class="container">
            <div class="kama_breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a href="<?= get_home_url(); ?>" itemprop="item">
                        <span itemprop="name">Главная</span></a></span>
                <span class="kb_sep">/</span>
                <span class="kb_title"><? the_title(); ?></span>
            </div>
        </div>
    </div>

    <div class="container">
        <h1><? the_title(); ?></h1>
    </div>

	<div class="i-production">
		<div class="container">
			<div class="i-production__row">
                <? $production = get_field('список_продукции'); if($production): ?>
                <? foreach ($production as $item): ?>
				<div class="i-production__item">
					<a class="i-production__item-link" href="<?= $item['ссылка'] ?>"></a>
					<div class="i-production__item-row">
						<div class="i-production__item-left">
                            <img class="i-production__item-img lazyload" data-src="<?= $item['изображение']['sizes']['large']; ?>"></div>
						<div class="i-production__item-right">
							<p class="i-production__title"><?= $item['заголовок'] ?></p>
                            <? if($item['форматы']): ?>
                                <p class="i-production__formats-label">Форматы:</p>
    							<p class="i-production__formats-list"><? foreach ($item['форматы'] as $format): ?><span><?= mb_ucfirst($format['текст']) ?></span> <? endforeach;?></p>
                            <? endif; ?>
                            <? if($item['цветность']): ?>
                                <p class="i-production__formats-label">Цветность:</p>
    							<p class="i-production__formats-list"><? foreach ($item['цветность'] as $format): ?><span><?= mb_ucfirst($format['текст']) ?></span> <? endforeach;?></p>
                            <? endif; ?>
                            <? if($item['сферы_применения']): ?>
                                <p class="i-production__formats-label">Сферы применения:</p>
    							<p class="i-production__formats-list"><? foreach ($item['сферы_применения'] as $format): ?><span><?= mb_ucfirst($format['текст']) ?></span> <? endforeach;?></p>
                            <? endif; ?>
						</div>
					</div>
				</div>
                <? endforeach; endif; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

