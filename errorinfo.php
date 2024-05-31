<?php if (count($errMsg) > 0): ?>
    <?php foreach ($errMsg as $error): ?>
        <p><?=$error; ?></p>
    <?php endforeach; ?>
<?php endif; ?>