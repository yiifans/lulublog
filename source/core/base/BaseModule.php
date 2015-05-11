<?php

namespace source\core\base;

use Yii;
use app\Models\User;
use source\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\base\Model;
use yii\base\Module;


class BaseModule extends Module
{
    const Status_Installed='Installed';
    const Status_Uninstalled='Uninstalled';
    
    const Status_Activity='Activity';
    const Status_Inactivity='Inactivity';
    
    public $status;
   
	public function init()
	{
		parent::init();
		//$this->setViewPath($this->getBasePath());
	}
	
	public function getMenus()
	{
	    $menus = [
	        ['title'=>'新建','url'=>'www.yiifans.com','enabled'=>true],
	        ['title','url','enabled'],
	        ['title','url','enabled'],
	    ];
	    return [];
	}
	
	public function getRoutings()
	{
	    
	}
	
	public function getPermissions()
	{
	    $permissions = [
	        ['key'=>'create','title'=>'create post','description'=>'create a new post'],
	    ];
	}
	
	public function active()
	{
	    
	}
	public function deActive()
	{
	    
	}
}
