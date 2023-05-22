<?php if (\App\core\Auth::check()) \App\core\Router::redirect(); ?>
<section class="section">
    <div class="container">
        <div class="section-content">
            <h1>Форма авторизации</h1>
            <form class="form" action="/users/create" method="POST">
                <label>
                    Логин
                    <input type="text" name="login">
                </label>

                <label>
                    Пароль
                    <input type="password" name="password">
                </label>

                <button class="button">Войти</button>
                <p>
                    <a href="/registration">Зарегистрируйтесь,</a>
                    если у вас нет аккаунта
                </p>
            </form>
        </div>
    </div>
</section>