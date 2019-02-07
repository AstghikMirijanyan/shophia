<?php

namespace backend\modules\brands\controllers;

use common\models\Categories;
use Yii;
use common\models\Brands;
use backend\modules\brands\models\BrandSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BrandController implements the CRUD actions for Brands models.
 */
class BrandController extends Controller
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
     * Lists all Brands models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brands models.
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
     * Creates a new Brands models.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Brands();
        $categories = Categories::find()->asArray()->all();

        $categories = ArrayHelper::map($categories,'id','title');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $imgFile = UploadedFile::getInstance($model, "image");

            if (!empty($imgFile)) {

                $imgPath = Yii::getAlias("@frontend") . "/web/images/uploads/brands/";
                $imgName = Yii::$app->security->generateRandomString() . '.' . $imgFile->extension;

                $path = $imgPath . $imgName;
                if($imgFile->saveAs($path)){
                    $model->image = $imgName;
                    $model->update(false);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'categories' => $categories
        ]);
    }

    /**
     * Updates an existing Brands models.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the models cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categories = Categories::find()->asArray()->all();
        $categories = ArrayHelper::map($categories,'id','title');

        $old_image = $model->image;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $transaction = Yii::$app->db->beginTransaction();
            $imgFile = UploadedFile::getInstance($model, "image");

            if (!empty($imgFile)) {
                $imgPath = Yii::getAlias('@frontend').'/web/images/uploads/brands/';
                $imgName = Yii::$app->security->generateRandomString() . '.' . $imgFile->extension;

                $path = $imgPath . $imgName;
                if($imgFile->saveAs($path)){
                    $model->image = $imgName;
                    $model->update(false);
                    if(!empty($old_photo)){
                        unlink($imgPath.$old_photo);
                    }
                    $transaction->commit();

                }else{

                    $transaction->rollBack();
                }

            }else{
                $model->image = $old_image;
                $model->save(true,['image']);
            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories
        ]);
    }


    /**
     * Deletes an existing Brands models.
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
     * Finds the Brands models based on its primary key value.
     * If the models is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brands the loaded models
     * @throws NotFoundHttpException if the models cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brands::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
