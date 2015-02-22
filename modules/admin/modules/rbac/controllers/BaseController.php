<?php

namespace app\modules\admin\modules\rbac\controllers;

use yii\web\Controller;
use app\core\back\BaseBackController;

class BaseController extends BaseBackController
{
	public $authManager;
	
	public function init()
	{
		parent::init();
		$this->authManager=\Yii::$app->authManager;
	}
	
    public function actionIndex()
    {
        return $this->render('index');
    }
}
