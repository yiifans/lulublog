<?php

namespace app\models\config;

use Yii;
use app\core\base\BaseModel;
use app\models\Config;


class BaseConfig extends BaseModel
{
	
	protected function initValueInternael($key, $defaultValue = '')
	{
		$model  = Config::findOne(['`key`'=>$key]);
		if($model != null)
		{
			return $model->value;
		}
		else 
		{
			$model = new Config();
			$model->key = $key;
			$model->value = '';
			
			$model->save();
		}
		return $defaultValue;
	}
	
	protected function saveAll($array)
	{
		foreach ($array as $key => $value)
		{
			$this->saveOne($key,$value);
		}
	}
	
    protected function saveOne($key,$value)
    {
    	Config::updateAll(['value'=>$value], ['`key`'=>$key]);
    	
    	/* $model = Config::findOne(['`key`'=>$key]);
    	if($model!==null)
    	{
    		Config::updateAll(['value'=>$value], ['`key`'=>$key]);
    	}
    	else
    	{
    		$model = new Config();
    		$model->key = $key;
    		$model->value = $value;
    
    		$model->save();
    	} */
    }
}
