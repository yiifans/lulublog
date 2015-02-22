<?php

namespace app\modules\admin\modules\rbac\controllers;

use Yii;
use app\modules\admin\modules\rbac\models\Permission;
use app\modules\admin\modules\rbac\models\search\PermissionSearch;
use app\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\modules\rbac\models\PermissionForm;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class PermissionController extends ItemController
{
	public function actionIndex()
	{
		$permissions = $this->authManager->getPermissions();
	
		return $this->render('index', [
				'permissions' => $permissions,
				]);
	}
	
	public function actionCreate()
	{
		$model = new PermissionForm();
	
	
		if ($model->load(Yii::$app->request->post())) {
	
			$role = new \yii\rbac\Permission();
			$role->name=$model->name;
			$role->type=$model->type;
	
			$this->authManager->add($role);
			return $this->redirect(['index', 'id' => $model->name]);
		} else {
			return $this->render('create', [
					'model' => $model,
					]);
		}
	}
}
