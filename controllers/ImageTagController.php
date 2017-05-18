<?php

namespace noam148\imagemanager\controllers;

use Imagine\Gd\Image;
use Yii;
use noam148\imagemanager\models\ImageManagerTag;
use noam148\imagemanager\models\ImageManagerTagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ImageTagController implements the CRUD actions for ImageManagerTag model.
 */
class ImageTagController extends Controller
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
     * Lists all ImageManagerTag models.
     * @return mixed
     */
    public function actionIndex($id = null)
    {
        if ($id !== null) {
            // The edit ID was specified
            $modelImageTag = $this->findModel($id);

            // Check if model has been found, else get new record
            $modelImageTag !== null ?: new ImageManagerTag();
        } else {
            $modelImageTag = new ImageManagerTag();
        }

        $searchModel = new ImageManagerTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //set stylesheet for modal
        $aCssFiles = \Yii::$app->controller->module->cssFiles;
        if (is_array($aCssFiles) && count($aCssFiles) > 0) {
            //if exists loop through files and add them to iframe mode
            foreach ($aCssFiles AS $cssFile) {
                //registrate file
                $this->view->registerCssFile($cssFile, ['depends' => 'yii\bootstrap\BootstrapAsset']);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelImageTag' => $modelImageTag,
        ]);
    }

    /**
     * Displays a single ImageManagerTag model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ImageManagerTag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ImageManagerTag();

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ImageManagerTag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ImageManagerTag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ImageManagerTag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ImageManagerTag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ImageManagerTag::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
