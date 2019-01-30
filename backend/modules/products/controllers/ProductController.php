<?php

namespace backend\modules\products\controllers;

use Yii;
use common\models\Products;
use backend\modules\products\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Products model.
 */
class ProductController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $imgFile = UploadedFile::getInstance($model, "image");

            $imgPath = Yii::getAlias('@frontend').'/web/images/uploads/products/';
            $imgName = Yii::$app->security->generateRandomString() . '.' . $imgFile->extension;
            $path = $imgPath . $imgName;
            if($imgFile->saveAs($path)){
                $model->image = $imgName;
                $model->update(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $old_image = $model->image;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //TODO add transaction
            $transaction = Yii::$app->db->transaction;
            $imgFile = UploadedFile::getInstance($model, "image");

            if (!empty($imgFile)) {
                $imgPath = Yii::getAlias('@frontend').'/web/images/uploads/products/';
//                $image_name = (uniqid('logo').$imgFile->baseName.date('dHis') ). '.' . $imgFile->extension;

                $imgName = Yii::$app->security->generateRandomString() . '.' . $imgFile->extension;
                $model->image = $imgName;
                $path = $imgPath . $imgName;
                if($imgFile->saveAs($path)){
                    $model->save(false);
                       if (!empty($old_image)){
                           unlink($imgPath.$old_image);
                       }
                    //TODO check if has old image and delete that old image
                    //TODO transaction commit
                }else{
                    // rollback
                }

            }else{
                $model->image = $old_image;
                $model->save(false);
            }


//            $session = Yii::$app->session;
//
//            $cookies = Yii::$app->response->cookies;
//
//// add a new cookie to the response to be sent
//            $cookies->add(new \yii\web\Cookie([
//                'name' => 'language',
//                'value' => 'zh-CN',
//            ]));
//
//            $session->setFlash('some_key','Update successfully done!');



            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
