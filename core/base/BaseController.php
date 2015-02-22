<?php

namespace app\core\base;

use Yii;
use app\Models\User;
use app\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\base\Model;

class BaseController extends Controller
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
}
