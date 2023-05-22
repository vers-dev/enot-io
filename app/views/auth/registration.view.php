<?php if (\App\core\Auth::check()) \App\core\Router::redirect(); ?>
<section class="section">
    <div class="container">
        <div class="section-content">
            <h1>Форма Регистрации</h1>
            <form class="form" action="/users/create" method="POST">
                <label>
                    Логин
                    <input type="text" name="login">
                </label>

                <label>
                    Пароль
                    <input type="password" name="password">
                </label>

                <label>
                    Повтор пароля
                    <input type="password" name="re_password">
                </label>

                <button class="button">Регистрация</button>
                <p>
                    <a href="/login">Войдите,</a>
                    если у вас есть аккаунт
                </p>
            </form>
        </div>
    </div>
</section>