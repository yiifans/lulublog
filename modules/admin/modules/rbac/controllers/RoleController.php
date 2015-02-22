<?php

namespace app\modules\admin\modules\rbac\controllers;

use Yii;
use app\modules\admin\modules\rbac\models\Role;
use app\modules\admin\modules\rbac\models\search\RoleSearch;
use app\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\modules\rbac\models\RoleForm;
use app\core\LuLu;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends ItemController
{
  
	public function actionIndex()
	{
		$roles = $this->authManager->getRoles();
	
		return $this->render('index', [
				'roles' => $roles,
				]);
	}
	
	public function actionCreate()
	{
		$model = new RoleForm();
	
		if ($model->load(Yii::$app->request->post())) {
	
			$role = new \yii\rbac\Role();
			$role->name=$model->name;
			$role->type=$model->type;
			$this->authManager->add($role);
			
			foreach ($model->child as $permissionName)
			{
				$permissionObj = $this->authManager->getPermission($permissionName);
				$this->authManager->addChild($role, $permissionObj);
			}
			
			return $this->redirect(['index', 'id' => $model->name]);
		} else {
			$permission = $this->authManager->getPermissions();
			return $this->render('create', [
					'model' => $model,
					'permissions'=>$permission
					]);
		}
	}

	public function actionUpdate($id)
	{
		$role = $this->authManager->getRole($id);
		
		$model = new RoleForm();
		$model->name=$role->name;
	
		if ($model->load(Yii::$app->request->post())) {
			$role = new \yii\rbac\Role();
			$role->name=$model->name;
			$role->type=$model->type;
			$this->authManager->update($id, $role);
			
			$this->authManager->removeChildren($role);
			foreach ($model->child as $permissionName)
			{
				$permissionObj = $this->authManager->getPermission($permissionName);
				$this->authManager->addChild($role, $permissionObj);
			}
			
			return $this->redirect(['index', 'id' => $model->name]);
		} else {
			$selectedPermissions = $this->authManager->getPermissionsByRole($id);
			
			if($selectedPermissions!=null)
			{
				foreach ($selectedPermissions as $p)
				{
					$model->child[] = $p->name;
				}
			}
			
			$permission = $this->authManager->getPermissions();
			return $this->render('update', [
					'model' => $model,
					'permissions'=>$permission
					]);
		}
	}
	
	protected function findModel($id)
	{
		if (($model = Role::findOne(['name'=>$id])) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
