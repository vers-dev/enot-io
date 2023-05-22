<?php if (!\App\core\Auth::check()) \App\core\Router::redirect('/login'); ?>

<h1>Главная страница</h1>