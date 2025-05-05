<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$books = $dataProvider->getModels();
?>

<div class="row">
    <!-- Sidebar (Categories) -->
    <div class="col-md-3">
        <ul class="list-group">
            <?php foreach ($categories as $category): ?>
                <li class="list-group-item <?= ($selectedCategoryId == $category->id) ? 'active' : '' ?>">
                    <?= Html::a(
                        Html::encode($category->title_ru),
                        ['site/index', 'category_id' => $category->id],
                        [
                            'class' => 'text-decoration-none text-black',  // Keeps text black
                            'style' => 'display:block;' // Ensures the entire li is clickable
                        ]
                    ) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Main Content (Books) -->
    <div class="col-md-9">
        <div class="row">
            <?php foreach ($books as $book): ?>
                <div class="col-md-3 mb-4">
                    <?= Html::a(
                        '<div class="card shadow-sm h-100">
                                <img src="' . Yii::getAlias('@web') . '/' . $book->cover_path . '" class="card-img-top shadow" alt="' . Html::encode($book->title) . '">
                                <div class="card-body">
                                    <h6 class="card-title fw-bold">' . Html::encode(mb_strimwidth($book->title, 0, 30, '...')) . '</h6>
                                    <p class="card-text text-muted mb-0">' . Html::encode(mb_strimwidth($book->authors, 0, 25, '...')) . '</p>
                                </div>
                            </div>',
                        ['site/view', 'id' => $book->id],
                        ['class' => 'text-decoration-none text-dark d-block']
                    ) ?>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="mt-4">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'options' => ['class' => 'pagination justify-content-center'], // Bootstrap classes
                'linkContainerOptions' => ['class' => 'page-item'],
                'linkOptions' => ['class' => 'page-link'],
                'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
            ]) ?>
        </div>
    </div>
</div>
