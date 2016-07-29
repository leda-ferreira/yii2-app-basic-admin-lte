<?php

/* @var $this yii\web\View */
/* @var $attributes string */
/* @var $body string */
/* @var $footer string */
/* @var $overlay string */
/* @var $title string */
/* @var $tools array|string */
/* @var $labels array|string */
/* @var $displayTools boolean */
/* @var $expandable boolean */
/* @var $removable boolean */
/* @var $bodyAttributes string */
/* @var $footerAttributes string */
/* @var $headerAttributes string */
/* @var $overlayAttributes string */
/* @var $titleAttributes string */
/* @var $toolsAttributes string */

?>
<div <?= $attributes ?>>
    <?php if (isset($title) || $displayTools) : ?>
    <div <?= $headerAttributes ?>>
        <h3 <?= $titleAttributes ?>><?= $title ?></h3>
        <?php if ($displayTools) : ?>
        <div <?= $toolsAttributes ?>>
            <?= is_string($tools) ? $tools : (is_array($tools) ? implode("\n", $tools) : '')?>
            <?= is_string($labels) ? $labels : (is_array($labels) ? implode("\n", $labels) : '')?>
            <?php if ($expandable) : ?>
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <?php endif; ?>
            <?php if ($removable) : ?>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <div <?= $bodyAttributes ?>><?= $body ?></div>
    <?php if (isset($footer)) : ?>
    <div <?= $footerAttributes ?>><?= $footer ?></div>
    <?php endif ; ?>
    <?php if (isset($overlay)) : ?>
    <div <?= $overlayAttributes ?>><?= $overlay ?></div>
    <?php endif ; ?>
</div>