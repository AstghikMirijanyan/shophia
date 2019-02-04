<?php

namespace backend\modules\categories\controllers;

use Yii;
use common\models\Categories;
use backend\modules\categories\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoryController implements the CRUD actions for Categories model.
 */
class CategoryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image  = UploadedFile::getInstance($model,'image');

            if (!empty($image)) {

                $imgName = Yii::$app->security->generateRandomString() . '.' . $image->extension;

                $filePath = Yii::getAlias('@frontend').'/web/images/uploads/categories/';
                if(!is_dir($filePath)){
                    mkdir($filePath);
                }

                if ($image->saveAs($filePath.$imgName)) {
                    $model->image = $imgName;
                }

            }

            $model->save(false);
            //die();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_image = $model->image;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image  = UploadedFile::getInstance($model,'image');

            if (!empty($image)) {

                $imgName = Yii::$app->security->generateRandomString() . '.' . $image->extension;

                $filePath = Yii::getAlias('@frontend').'/web/images/uploads/categories/';
                if(!is_dir($filePath)){
                    mkdir($filePath);
                }

                $path = $filePath . $model_image;
                if ($image->saveAs($filePath.$imgName)) {
                    $model->image = $imgName;
                    if (file_exists($path) && is_file($path)) {
                        unlink($path);
                    }
                }

            }else{
                $model->image = $model_image;
            }

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
