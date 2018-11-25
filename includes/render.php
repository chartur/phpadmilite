<?php
/**
 * Created by PhpStorm.
 * User: arturchilingaryan
 * Date: 11/25/18
 * Time: 01:19
 */

?>

<?php if(user()): ?>
    <div class="col-3">
        <?php include 'includes/db_bars.php' ?>
    </div>
    <div class="col-9">
        <?php include 'includes/navbar.php' ?>
        <?php if(getFlashMessage()): ?>
            <div class="mt-1 text-center alert alert-<?= getFlashMessage('status') ?>">
                <p> <?= getFlashMessage('message') ?> </p>
            </div>
        <?php endif; ?>
        <?php include($url); ?>
    </div>
<?php else: ?>
    <?php include "$url"?>
<?php endif; ?>
