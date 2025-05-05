<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Войти';
?>
<div class="site-login d-flex justify-content-center align-items-center" style="margin-top: 100px;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4"><?= Html::encode($this->title) ?></h2>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username', [
            'template' => '{input}{error}',
        ])->textInput([
            'autofocus' => true,
            'placeholder' => 'Email',
            'class' => 'form-control mb-3',
        ]) ?>

        <?= $form->field($model, 'password', [
            'template' => '{input}{error}',
        ])->passwordInput([
            'placeholder' => 'Пароль',
            'class' => 'form-control mb-3',
        ]) ?>

        <div class="text-muted small mb-3">
            <div>Если вы забыли пароль, вы можете его <?= Html::a('восстановить', ['site/request-password-reset']) ?>.</div>
            <div>Нужна новая ссылка для подтверждения? <?= Html::a('Отправить повторно', ['site/resend-verification-email']) ?></div>
        </div>


        <div class="d-grid">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
