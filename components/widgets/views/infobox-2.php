<?php

/* @var $this yii\web\View */
/* @var $attributes string */
/* @var $background string */
/* @var $description string */
/* @var $format mixed */
/* @var $icon string */
/* @var $number string */
/* @var $progress string */
/* @var $text string */

?>
<div <?= $attributes ?>>
    <span class="info-box-icon"><i class="<?= $icon ?>"></i></span>
    <div class="info-box-content">
        <span class="info-box-text"><?= $text ?></span>
        <span class="info-box-number"><?= Yii::$app->formatter->format($number, $format) ?></span>
        <?php if (is_numeric($progress)) :?>
        <div class="progress">
            <div class="progress-bar" style="width: <?= $progress ?>%"></div>
        </div>
        <?php endif; ?>
        <span class="progress-description"><?= $description ?></span>
    </div>
</div>

