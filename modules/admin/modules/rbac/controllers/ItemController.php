<?php

namespace app\modules\admin\modules\rbac\controllers;

use Yii;
use app\modules\admin\modules\rbac\models\Permission;
use app\modules\admin\modules\rbac\models\search\PermissionSearch;
use app\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\modules\rbac\models\search\RoleSearch;
use app\modules\admin\modules\rbac\models\RoleForm;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class ItemController extends BaseController
{
	public $itemClass='';
	
	/**
	 * Lists all Role models.
	 * @return mixed
	 */


	
	/**
	 * Creates a new Role model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */

	
	/**
	 * Updates an existing Role model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param string $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
	
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->name]);
		} else {
			return $this->render('update', [
					'model' => $model,
					]);
		}
	}
	
	/**
	 * Deletes an existing Role model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param string $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
	
		return $this->redirect(['index']);
	}
	
	/**
	 * Finds the Role model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param string $id
	 * @return Role the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Role::findOne(['name'=>$id])) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
