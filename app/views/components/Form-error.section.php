<?php if (\App\core\App::$app->session->has('errors')): ?>

    <?php foreach ($_SESSION['errors'] as $error): ?>
        <li><?= $error; ?></li>
    <?php endforeach; ?>

    <?php unset($_SESSION['errors']); ?>

<?php endif; ?>
