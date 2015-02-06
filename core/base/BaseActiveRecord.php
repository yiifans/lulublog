<?php

namespace app\core\base;

use Yii;
use app\Models\User;
use app\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;


class BaseActiveRecord extends ActiveRecord
{
   
	public function afterValidate()
	{
		parent::afterValidate();
		if($this->hasErrors())
		{
			var_dump($this->errors);
		}
	}
	
}
