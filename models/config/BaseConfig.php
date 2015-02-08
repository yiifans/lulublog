<?php

namespace app\models\config;

use Yii;
use app\core\base\BaseModel;
use app\models\Config;


class BaseConfig extends BaseModel
{
	public function initAll()
	{
		$this->initAllInternael();
	}
	
	public function saveAll()
	{
		$this->saveAllInternael();
	}
	
	protected function getConfigKeys()
	{
		//return $this->attributes();
		return array_keys($this->attributeLabels());
	}
	
	protected function initAllInternael()
	{
		$keys = $this->getConfigKeys();
		foreach ($keys as $key)
		{
			$this->initOneInternael($key);
		}
	}
	
	protected function initOneInternael($key, $defaultValue = '')
	{
		$model  = Config::findOne(['`key`'=>$key]);
		if($model != null)
		{
			$this->$key = $model->value;
		}
		else 
		{
			$model = new Config();
			$model->key = $key;
			$model->value = $defaultValue;
			$model->save();
			
			$this->$key = $defaultValue;
		}
	}
	
	protected function saveAllInternael()
	{
		$keys = $this->getConfigKeys();
		foreach ($keys as $key)
		{
			$this->saveOneInternael($key, $this->$key);
		}
	}
	
    protected function saveOneInternael($key,$value)
    {
    	Config::updateAll(['value'=>$value], ['`key`'=>$key]);
    }
}
