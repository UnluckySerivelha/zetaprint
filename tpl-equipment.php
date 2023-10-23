<?php
/* Template name: Оборудование */
?>
<?php get_header(); ?>

    <div class="equipment">
        <div class="equipment__inner">
            <div class="container">
                <h1><? the_title(); ?></h1>
                <div class="equipment__head">
                    <div class="equipment__head-col equipment__head-col--logo">
                        <img src="<?= THEME_DIR ?>/img/i-equipment-logo.png" alt="">
                    </div>
                    <div class="equipment__head-col">
                        <p>Предприятие-партнер<br> компании Heidelberg</p>
                    </div>
                    <div class="equipment__head-col">
                        <p>Парк оборудования включает 37 единиц<br> европейских производителей</p>
                    </div>
                </div>
                <? include "template_parts/equipment.php"; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>