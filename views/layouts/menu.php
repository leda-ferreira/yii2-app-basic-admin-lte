<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\components\widgets\Nav;

echo Nav::widget([
    'items' => [
        '<li class="header">MAIN NAVIGATION</li>',
        [
            'label' => ficon('home', '<span>Home</span>'),
            'url' => ['/site/index']
        ],
        [
            'label' => ficon('book', '<span>About</span>'),
            'url' => ['/site/about']],
        [
            'label' => ficon('comment', '<span>Contact</span>'),
            'url' => ['/site/contact']
        ],
        Yii::$app->user->isGuest ? (
            [
                'label' => ficon('sign-in', '<span>Login</span>'),
                'url' => ['/site/login']
            ]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
            . Html::submitButton(
                ficon('sign-out', '<span>Logout (' . Yii::$app->user->identity->username . ')</span>'),
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);
