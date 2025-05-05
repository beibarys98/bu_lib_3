<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var string $q */

$this->title = 'Результаты поиска: ' . Html::encode($q);

$books = $dataProvider->getModels();
?>

<h2 class="mb-4"><?= Html::encode($this->title) ?></h2>

<?php if (empty($books)): ?>
    <div class="alert alert-warning">Ничего не найдено по запросу "<?= Html::encode($q) ?>".</div>
<?php else: ?>
    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-md-3 mb-4">
                <?= Html::a(
                    '<div class="card shadow-sm h-100">
                        <img src="' . Yii::getAlias('@web') . '/' . Html::encode($book->cover_path) . '" class="card-img-top shadow" alt="' . Html::encode($book->title) . '">
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
<?php endif; ?>
