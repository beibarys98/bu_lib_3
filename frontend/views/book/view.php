<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Book $model */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Изменить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category.title_ru',
            'type.title_ru',
            'title',
            'description:ntext',
            'authors',
            'publisher',
            'release',
            'isbn',
            'pages',
            'language',
            [
                'attribute' => 'cover_path',
                'format' => 'raw',
                'value' => function($model) {
                    // Check if cover_path exists
                    if ($model->cover_path) {
                        return Html::a($model->cover_path, Url::to('@web/' . $model->cover_path), ['target' => '_blank']);
                    }
                    return null;  // Return null if there's no cover path
                },
            ],
            [
                'attribute' => 'book_path',
                'format' => 'raw',
                'value' => function($model) {
                    // Check if book_path exists
                    if ($model->book_path) {
                        return Html::a($model->book_path, Url::to('@web/' . $model->book_path), ['target' => '_blank']);
                    }
                    return null;  // Return null if there's no book path
                },
            ],
        ],
    ]) ?>

</div>
