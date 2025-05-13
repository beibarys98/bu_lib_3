<?php
use yii\helpers\Html;
use diecoding\pdfjs\PdfJs;

/** @var $model */

$this->title = Html::encode($model->title);
?>

<h1><?= Html::encode($model->title) ?></h1>

<?= \diecoding\pdfjs\PdfJs::widget([
    'url' => Yii::getAlias('@web') . '/' . $model->book_path,
    'options' => [
        'style' => [
            'width' => '100%',
            'height' => '800px',
            'border' => 'none',
        ],
    ],
    'sections' => [
        'toolbarContainer' => true,     // верхняя панель
        'sidebarContainer' => true,     // боковая панель слева
        'download' => false,            // скрыть кнопку "Download"
        'print' => false,               // скрыть кнопку "Print" (если нужно)
    ],
]) ?>

