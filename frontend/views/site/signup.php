<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация';
?>
<div class="site-signup d-flex justify-content-center align-items-center" style="margin-top: 100px;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4"><?= Html::encode($this->title) ?></h2>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'email', [
            'template' => '{input}{error}',
        ])->textInput([
            'placeholder' => 'Email',
            'class' => 'form-control mb-3',
        ]) ?>

        <?= $form->field($model, 'password', [
            'template' => '{input}{error}',
        ])->passwordInput([
            'placeholder' => 'Пароль',
            'class' => 'form-control mb-4',
        ]) ?>

        <div class="d-grid">
            <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
