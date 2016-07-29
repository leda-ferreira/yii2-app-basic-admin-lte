<?php

/* @var $this yii\web\View */
/* @var $attributes string */
/* @var $background string */
/* @var $description string */
/* @var $format mixed */
/* @var $icon string */
/* @var $number number */
/* @var $progress number */
/* @var $text string */

?>
<div <?= $attributes ?>>
    <span class="info-box-icon <?= $background ?>"><i class="<?= $icon ?>"></i></span>
    <div class="info-box-content">
        <span class="info-box-text"><?= $text ?></span>
        <span class="info-box-number"><?= Yii::$app->formatter->format($number, $format) ?></span>
    </div>
</div>