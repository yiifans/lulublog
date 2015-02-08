<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Config;
use app\models\search\ConfigSearch;
use app\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\config\BasicConfig;
use app\models\config\ThemeConfig;

/**
 * ConfigController implements the CRUD actions for Config model.
 */
class ConfigController extends BaseBackController
{

	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(), 
				'actions' => [
					'delete' => [
						'post'
					]
				]
			]
		];
	}

	/**
	 * Lists all Config models.
	 *
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new ConfigSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		return $this->render('index', [
			'searchModel' => $searchModel, 
			'dataProvider' => $dataProvider
		]);
	}

	public function actionBasic()
	{
		$model = new BasicConfig();
		
		if($model->load(Yii::$app->request->post()) && $model->saveAll())
		{
			return $this->redirect([
				'view', 
				'id' => $model->id
			]);
		}
		else
		{
			$model->initAll();
			return $this->render('basic', [
				'model' => $model
			]);
		}
	}

	public function actionTheme()
	{
		$model = new ThemeConfig();
		
		if($model->load(Yii::$app->request->post()) && $model->saveAll())
		{
			return $this->redirect([
				'view', 
				'id' => $model->id
			]);
		}
		else
		{
			$model->initAll();
			return $this->render('theme', [
				'model' => $model
			]);
		}
	}

	/**
	 * Displays a single Config model.
	 *
	 * @param integer $id        	
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id)
		]);
	}

	/**
	 * Creates a new Config model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Config();
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect([
				'view', 
				'id' => $model->id
			]);
		}
		else
		{
			return $this->render('create', [
				'model' => $model
			]);
		}
	}

	/**
	 * Updates an existing Config model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id        	
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		
		if($model->load(Yii::$app->request->post()) && $model->save())
		{
			return $this->redirect([
				'view', 
				'id' => $model->id
			]);
		}
		else
		{
			return $this->render('update', [
				'model' => $model
			]);
		}
	}

	/**
	 * Deletes an existing Config model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id        	
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		
		return $this->redirect([
			'index'
		]);
	}

	/**
	 * Finds the Config model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id        	
	 * @return Config the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if(($model = Config::findOne($id)) !== null)
		{
			return $model;
		}
		else
		{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
