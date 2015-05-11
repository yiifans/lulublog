<?php

namespace source\modules\post\admin;

use yii\web\Controller;
use Yii;
use source\models\Content;
use source\models\search\ContentSearch;
use source\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\ContentController;
use source\modules\post\models\ContentPost;
use source\modules\post\models\source\modules\post\models;

class DefaultController extends ContentController
{
	
    public function init()
    {
    	$this->content_type='post';
    	parent::init();
    }

    public function actionIndex()
    {
    	return parent::actionIndex();
    }
    
    public function actionCreate()
    {
    	return parent::actionCreate();
    }
    
    public function actionUpdate($id)
    {
    	return parent::actionUpdate($id);
    }
    
    public function getBodyModel($contentId=null,$id=null)
    {
        if($contentId===null)
        {
            return new ContentPost();
        }
        else 
        {
            $ret = ContentPost::findOne(['content_id'=>$contentId]);
            if($ret===null)
            {
                $ret = new ContentPost();
                $ret->content_id=$contentId;
                $ret->body='';
                $ret->save();
            }
            return $ret;
        }
    }
    
    public function actionDelete($id)
    {
    	return parent::actionDelete($id);
    }
   
}
