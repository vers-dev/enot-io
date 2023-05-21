<header class="header">
    <div class="container">
        <div class="header-content">
            <ul class="menu">
                <li class="menu-item"><a href="/" class="menu-link">Главная</a></li>
                <li class="menu-item"><a href="/profile" class="menu-link">Профиль</a></li>
                <li class="menu-item"><a href="" class="menu-link">Курсы валют</a></li>
            </ul>

            <ul class="button-wrapper">
                <?php if (\App\core\Auth::check()): ?>
                    <li><a href="/logout" class="menu-link">Выход</a></li>
                <?php else: ?>
                    <li><a href="/registration" class="menu-link">Регистрация</a></li>
                    <li><a href="/login" class="menu-link">Авторизация</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>