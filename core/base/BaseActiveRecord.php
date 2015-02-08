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
	//Query
	public static function find()
	{
		return parent::find();
	}
	
	public static function findOne($where=null,$orderBy=null)
	{
		$query = static::find();
		if($where!==null)
		{
			$query->andWhere($where);
		}
		if($orderBy!=null)
		{
			$query->orderBy($orderBy);
		}
        return $query->one();
	}
	
	public static function findAll($where=null, $orderBy=null, $limit=null)
	{
		$query = static::find();
		if($where!==null)
		{
			$query->andWhere($where);
		}
		if($orderBy!=null)
		{
			$query->orderBy($orderBy);
		}
		if($limit!==null)
		{
			$query->limit($limit);
		}
        return $query->all();
	}
   
	public function afterValidate()
	{
		parent::afterValidate();
		if($this->hasErrors())
		{
			var_dump($this->errors);
		}
	}
	
}
