<?php

use common\models\Category;
use common\models\Type;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Book $model */
/** @var yii\widgets\ActiveForm $form */

$categories = ArrayHelper::map(Category::find()->all(), 'id', 'title_ru');
$types = ArrayHelper::map(Type::find()->all(), 'id', 'title_ru');
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id', ['options' => ['class' => 'mb-3']])
        ->dropDownList($categories, [
            'prompt' => 'Выберите категорию',
        ])->label(false) ?>

    <?= $form->field($model, 'type_id', ['options' => ['class' => 'mb-3']])
        ->dropDownList($types, [
            'prompt' => 'Выберите вид',
        ])->label(false) ?>

    <?= $form->field($model, 'title', ['options' => ['class' => 'mb-3']])
        ->textInput(['maxlength' => true, 'placeholder' => 'Название'])->label(false) ?>

    <?= $form->field($model, 'description', ['options' => ['class' => 'mb-3']])
        ->textarea(['rows' => 6, 'placeholder' => 'Описание'])->label(false) ?>

    <?= $form->field($model, 'authors', ['options' => ['class' => 'mb-3']])
        ->textInput(['maxlength' => true, 'placeholder' => 'Авторы'])->label(false) ?>

    <?= $form->field($model, 'publisher', ['options' => ['class' => 'mb-3']])
        ->textInput(['maxlength' => true, 'placeholder' => 'Издатель'])->label(false) ?>

    <?= $form->field($model, 'release', ['options' => ['class' => 'mb-3']])
        ->textInput(['maxlength' => true, 'placeholder' => 'Год выпуска'])->label(false) ?>

    <?= $form->field($model, 'isbn', ['options' => ['class' => 'mb-3']])
        ->textInput(['maxlength' => true, 'placeholder' => 'ISBN'])->label(false) ?>

    <?= $form->field($model, 'pages', ['options' => ['class' => 'mb-3']])
        ->textInput(['placeholder' => 'Количество страниц'])->label(false) ?>

    <?= $form->field($model, 'language', ['options' => ['class' => 'mb-3']])
        ->dropDownList(
            ['kz' => 'Казахский', 'ru' => 'Русский'],
            ['prompt' => 'Выберите язык']
        )->label(false) ?>


    <?= $form->field($model, 'book', ['options' => ['class' => 'mb-3']])
        ->fileInput()->label('Книга') ?>

    <?= $form->field($model, 'cover', ['options' => ['class' => 'mb-3']])
        ->fileInput()->label('Обложка') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
