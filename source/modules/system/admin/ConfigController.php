<?php

namespace source\modules\system\admin;

use Yii;
use source\models\Config;
use source\models\search\ConfigSearch;
use source\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\models\config\BasicConfig;
use source\models\config\ThemeConfig;
use source\models\config\DatetimeConfig;

/**
 * ConfigController implements the CRUD actions for Config model.
 */
class ConfigController extends BaseBackController
{

	private function doConfig($model,$view=null)
	{
		if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->saveAll())
		{
			return $this->refresh();
		}
		else
		{
			if($view===null)
			{
				$view = $this->action->id;
			}
			
			$model->initAll();
			return $this->render($view, [
					'model' => $model
					]);
		}
	}
	
	public function actionBasic()
	{
		$model = new BasicConfig();
		return $this->doConfig($model);
	}

	public function actionTheme()
	{
		$model = new ThemeConfig();
		
		return $this->doConfig($model);
	}

	public function actionEmail()
	{
	    $model = new ThemeConfig();
	
	    return $this->doConfig($model);
	}
	
	public function actionDatetime()
	{
	    $model = new DatetimeConfig();
	
	    return $this->doConfig($model);
	}
	public function actionAccess()
	{
	    $model = new DatetimeConfig();
	
	    return $this->doConfig($model);
	}
}
