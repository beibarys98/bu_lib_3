<?php

namespace frontend\controllers;

use common\models\Book;
use common\models\search\BookSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Book models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $book = UploadedFile::getInstance($model, 'book');
                $cover = UploadedFile::getInstance($model, 'cover');

                if($book){
                    $filePath = 'uploads/books/' . Yii::$app->security->generateRandomString() . '.' . $book->extension;
                    $book->saveAs($filePath);
                    $model->book_path = $filePath;
                    $model->save(false);
                }

                if($cover){
                    $filePath = 'uploads/covers/' . Yii::$app->security->generateRandomString() . '.' . $cover->extension;
                    $cover->saveAs($filePath);
                    $model->cover_path = $filePath;
                    $model->save(false);
                }

                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $book = UploadedFile::getInstance($model, 'book');
            $cover = UploadedFile::getInstance($model, 'cover');

            if($book){
                $filePath = 'uploads/books/' . Yii::$app->security->generateRandomString() . '.' . $book->extension;
                $book->saveAs($filePath);
                $model->book_path = $filePath;
                $model->save(false);
            }

            if($cover){
                $filePath = 'uploads/covers/' . Yii::$app->security->generateRandomString() . '.' . $cover->extension;
                $cover->saveAs($filePath);
                $model->cover_path = $filePath;
                $model->save(false);
            }

            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
