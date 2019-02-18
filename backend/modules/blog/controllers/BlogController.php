<?php

namespace backend\modules\blog\controllers;

use Yii;
use common\models\Blog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BlogController implements the CRUD actions for Blog models.
 */
class BlogController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Blog::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog models.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the models cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Blog models.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image  = UploadedFile::getInstance($model,'image');

            if (!empty($image)) {

                $imgName = Yii::$app->security->generateRandomString() . '.' . $image->extension;

                $filePath = Yii::getAlias('@frontend').'/web/images/uploads/blog/';


                if ($image->saveAs($filePath.$imgName)) {
                    $model->image = $imgName;
                }

            }

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blog models.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the models cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_image = $model->image;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image  = UploadedFile::getInstance($model,'image');

            if (!empty($image)) {

                $imgName = Yii::$app->security->generateRandomString() . '.' . $image->extension;

                $filePath = Yii::getAlias('@frontend').'/web/images/uploads/blog/';
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
     * Deletes an existing Blog models.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the models cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blog models based on its primary key value.
     * If the models is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded models
     * @throws NotFoundHttpException if the models cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
