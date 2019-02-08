<?php

namespace backend\modules\products\controllers;

use common\models\Brands;
use common\models\Categories;
use common\models\Pictures;
use Yii;
use common\models\Products;
use backend\modules\products\models\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InfoController implements the CRUD actions for Products model.
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

        $categories = Categories::find()->asArray()->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');

        $brands = Brands::find()->asArray()->all();
        $brands = ArrayHelper::map($brands, 'id', 'title');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image = UploadedFile::getInstance($model, 'image');

            if (!empty($image)) {

                $imgName = Yii::$app->security->generateRandomString() . '.' . $image->extension;

                $filePath = Yii::getAlias('@frontend') . '/web/images/uploads/products/';


                if ($image->saveAs($filePath . $imgName)) {
                    $model->image = $imgName;
                }

            }

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function actionMultiple()
    {
        $upload = new Pictures();
        $products = Products::find()->asArray()->all();
        $products = ArrayHelper::map($products, 'id', 'title');
        if ($upload->load(Yii::$app->request->post())) {
            $upload->image = UploadedFile::getInstances($upload, 'image');
            if ($upload->image && $upload->validate()) {

                $filePath = Yii::getAlias('@frontend') . '/web/images/uploads/products/';
                foreach ($upload->image as $image) {
                    $model = new Pictures();
                    $model->product_id = $upload->product_id;
                    $model->image = time() . rand(100, 999) . '.' . $image->extension;
                    if ($model->save(false)) {
                        $image->saveAs($filePath . $model->image);
                    }

                }
                return $this->redirect(['index']);
            }

        }
        return $this->render('multiple', [
            'upload' => $upload,
            'products' => $products
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

        $categories = Categories::find()->asArray()->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');

        $brands = Brands::find()->asArray()->all();
        $brands = ArrayHelper::map($brands, 'id', 'title');
        $model = $this->findModel($id);
        $model_image = $model->image;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image = UploadedFile::getInstance($model, 'image');

            if (!empty($image)) {

                $imgName = Yii::$app->security->generateRandomString() . '.' . $image->extension;

                $filePath = Yii::getAlias('@frontend') . '/web/images/uploads/products/';
                if (!is_dir($filePath)) {
                    mkdir($filePath);
                }

                $path = $filePath . $model_image;
                if ($image->saveAs($filePath . $imgName)) {
                    $model->image = $imgName;
                    if (file_exists($path) && is_file($path)) {
                        unlink($path);
                    }
                }

            } else {
                $model->image = $model_image;
            }

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
            'brands' => $brands
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
