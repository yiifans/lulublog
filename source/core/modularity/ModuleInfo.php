<?php

namespace source\core\modularity;

use Yii;
use app\Models\User;
use source\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\base\Model;
use source\core\base\BaseModel;
use source\core\base\BaseModule;
use yii\base\Object;


class ModuleInfo extends Object
{
    public $name;
    public $version;
    public $description;
    public $url;
    
    public $author;
    public $author_url;
    
  
    public $is_system;
    public $is_content;
    
    public function install()
    {
    
    }
    
    public function uninstall()
    {
    
    }
    public function upgrader()
    {
    
    }
    
    public function activeAdmin()
    {
    
    }
    
    public function deactiveAdmin()
    {
    
    }
    public function activeHome()
    {
    
    }
    
    public function deactiveHome()
    {
    
    }
}
