<?php if (!\App\core\Auth::check()) \App\core\Router::redirect('/login'); ?>

<section class="section">
    <div class="container">
        <div class="section-content">
            <div class="convertor" id="convertor">
                <div class="group">
                    <p>Рубли</p>
                    <textarea id="input"></textarea>
                </div>

                <div class="group">
                    <select id="currency">
                        <?php foreach ($currencies as $curr): ?>
                            <option value="<?= $curr['currency']; ?>"
                                    data-units="<?= $curr['units']; ?>"><?= $curr['name']; ?>
                                | <?= $curr['char_code']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <textarea id="output"></textarea>
                </div>

                <button class="button" id="currBtn">
                    Рассчитать
                </button>
            </div>
        </div>
    </div>
</section>