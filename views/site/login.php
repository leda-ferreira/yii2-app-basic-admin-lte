<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\forms\ActiveForm;

$this->title = 'Login';
?>

<div class="login-logo">
    <a href="<?= Url::to() ?>"><b>Admin</b>LTE</a>
</div>

<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => ''],
        'fieldConfig' => [
            'options' => [
                'class' => 'form-group has-feedback'
            ]
        ],
    ]); ?>

        <?= $form->field($model, 'username', [
            'template' => '{input}' . gicon('envelope form-control-feedback') . '{error}'
        ])->textInput([
            'autofocus' => true,
            'placeholder' => 'Username',
        ]) ?>

        <?= $form->field($model, 'password', [
            'template' => '{input}' . gicon('lock form-control-feedback') . '{error}'
        ])->passwordInput([
            'placeholder' => 'Password'
        ]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="checkbox icheck">{input} {label}</div><div class="col-lg-8">{error}</div>',
                ]) ?>
            </div>

            <div class="col-xs-4">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
    </div>
    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

    <p class="login-box-msg">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </p>

</div>

<?php
$js = <<<JS
$('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
});
JS;
echo $this->registerJs($js, yii\web\View::POS_READY, 'iCheck-login')
?>
