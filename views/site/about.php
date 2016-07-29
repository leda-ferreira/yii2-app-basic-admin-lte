<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\widgets\Box;
use app\components\widgets\InfoBox;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$infoboxes_1 = [
    [
        'background' => 'bg-aqua',
        'icon' => 'fa fa-envelope-o',
        'number' => 1410,
        'text' => 'messages'
    ],
    [
        'background' => 'bg-green',
        'icon' => 'fa fa-flag-o',
        'number' => 410,
        'text' => 'bookmarks'
    ],
    [
        'background' => 'bg-yellow',
        'icon' => 'fa fa-files-o',
        'number' => 13648,
        'text' => 'uploads'
    ],
    [
        'background' => 'bg-red',
        'icon' => 'fa fa-star-o',
        'number' => 93139,
        'text' => 'likes'
    ]
];

$infoboxes_2 = [
    [
        'background' => 'bg-aqua',
        'description' => '10% increase last week',
        'icon' => 'fa fa-bookmark-o',
        'number' => 717,
        'progress' => 10,
        'text' => 'Bookmarks'
    ],
    [
        'background' => 'bg-green',
        'description' => '40% increase in 30 days',
        'icon' => 'fa fa-thumbs-o-up',
        'number' => 17119,
        'progress' => 40,
        'text' => 'Likes'
    ],
    [
        'background' => 'bg-yellow',
        'description' => '32 events completed, 8 remain',
        'icon' => 'fa fa-calendar',
        'number' => 32,
        'progress' => 80,
        'text' => 'Events'
    ],
    [
        'background' => 'bg-red',
        'description' => '10% increase from last week',
        'icon' => 'fa fa-comment-o',
        'number' => 113,
        'progress' => 10,
        'text' => 'Comments'
    ]
];

$boxes = [
    [
        'title' => 'Default Box Example',
        'body' => 'The body of the box',
        'options' => ['class' => 'box-default'],
        'labels' => '<span class="label label-default">Default</span>',
        'overlay' => ficon('refresh fa-spin')
    ],
    [
        'title' => 'Primary Box Example',
        'body' => 'The body of the box',
        'options' => ['class' => 'box-primary'],
        'labels' => '<span class="label label-primary">Primary</span>',
        'expandable' => true
    ],
    [
        'title' => 'Info Box Example',
        'body' => 'The body of the box',
        'options' => ['class' => 'box-info'],
        'labels' => '<span class="label label-info">Info</span>',
        'expandable' => true,
        'removable' => true
    ],
    [
        'title' => 'Warning Box Example',
        'body' => 'The body of the box',
        'options' => ['class' => 'box-warning']
    ],
    [
        'title' => 'Success Box Example',
        'body' => 'The body of the box',
        'options' => ['class' => 'box-success'],
        'expandable' => true
    ],
    [
        'title' => 'Danger Box Example',
        'body' => 'The body of the box',
        'options' => ['class' => 'box-danger'],
        'expandable' => true,
        'removable' => true
    ],
];
?>

<?php Box::begin([
    'title' => Html::encode($this->title),
    'options' => [
        'class' => 'box-primary'
    ],
    'solid' => true
]) ?>
    <div class="site-about">
        <p>This is the About page. You may modify the following file to customize its content:</p>
        <code><?= __FILE__ ?></code>
    </div>
<?php Box::end() ?>

<div class="row">
    <?php foreach ($infoboxes_1 as $box): ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <?= InfoBox::widget($box) ?>
    </div>
    <?php endforeach; ?>
</div>

<div class="row">
    <?php foreach ($infoboxes_2 as $box): ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <?= InfoBox::widget($box) ?>
    </div>
    <?php endforeach; ?>
</div>

<div>
<?= Box::widget([
    'title' => 'Default Box Example',
    'body' => 'The body of the box',
    'footer' => 'The footer of the box',
    'options' => [
        'class' => 'meh'
    ],
]) ?>
</div>

<div class="row">
    <?php foreach ($boxes as $index => $box) : ?>
    <div class="col-md-4">
        <?= Box::widget($box) ?>
    </div>
    <?php endforeach; ?>
</div>

<div class="row">
    <?php foreach ($boxes as $index => $box) : $box['solid'] = true; ?>
    <div class="col-md-4">
        <?= Box::widget($box) ?>
    </div>
    <?php endforeach; ?>
</div>