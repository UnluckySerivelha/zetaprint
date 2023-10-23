<?php get_header(); ?>
<div class="container">
    <div class="e404">
        <div class="e404__row">
            <div class="e404__left">
                <h1 class="e404__number">404</h1>
            </div>
            <div class="e404__right">
                <p class="e404__title">
                Вы пытаетесь открыть страницу, <br> которой не существует
                </p>

                <p class="e404__desc">Но это не страшно!
                <br>Сейчам мы расскажем,
                <br>что делать...
                </p>
                <div class="e404__text">
                    <p>
                        Проверьте адрес ссылки в строке. Возможно, в нем допущена ошибка. Если ошибок нет, значит страница была удалена или ее не переместили в другое место.
                    </p>
                    <p>Вернитесь на <a href="/">главную страницу</a> и попробуйте <br> найти страницу через меню</p>
                    <p>либо вернитесь на <a href="#back" onclick="window.history.go(-1); return false;">предыдущую страницу</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

