<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Type $model */

$this->title = Yii::t('app', 'Изменить: {name}', [
    'name' => $model->title_ru,
]);
?>
<div class="type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
