<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Book $model */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>

<div class="book-view container py-4">

    <div class="row">
        <!-- Cover Image -->
        <div class="col-md-4 text-center">
            <?php if ($model->cover_path): ?>
                <img src="<?= Yii::getAlias('@web') . '/' . $model->cover_path ?>" class="img-fluid rounded shadow" alt="<?= Html::encode($model->title) ?>">
            <?php else: ?>
                <div class="bg-light border rounded p-5 text-muted">Нет обложки</div>
            <?php endif; ?>
            <div class="mt-4">
                <?php if ($model->book_path): ?>
                    <a href="<?= Url::to(['site/read', 'id' => $model->id]) ?>" class="btn btn-outline-primary">
                        Читать
                    </a>

                <?php endif; ?>
            </div>
        </div>

        <!-- Book Info -->
        <div class="col-md-8">
            <h2 class="fw-bold"><?= Html::encode($model->title) ?></h2>
            <p><strong>Автор(ы):</strong> <?= Html::encode($model->authors) ?></p>
            <p><strong>Категория:</strong> <?= Html::encode($model->category->title_ru ?? '-') ?></p>
            <p><strong>Тип:</strong> <?= Html::encode($model->type->title_ru ?? '-') ?></p>
            <p><strong>Издательство:</strong> <?= Html::encode($model->publisher) ?></p>
            <p><strong>Год выпуска:</strong> <?= Html::encode($model->release) ?></p>
            <p><strong>Страниц:</strong> <?= Html::encode($model->pages) ?></p>
            <p><strong>Язык:</strong> <?= Html::encode($model->language) ?></p>
            <p><strong>ISBN:</strong> <?= Html::encode($model->isbn) ?></p>
            <h4>Описание</h4>
            <div class="text-justify">
                <?= $model->description ?>
            </div>
        </div>
    </div>

</div>
