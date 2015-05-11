<?php

namespace source\modules\page\admin;

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
use source\modules\page\models\ContentPage;

class DefaultController extends ContentController
{
	
    public function init()
    {
    	
    	parent::init();
    	$this->content_type='page';
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
            return new ContentPage();
        }
        else 
        {
            $ret = ContentPage::findOne(['content_id'=>$contentId]);
            if($ret===null)
            {
                $ret = new ContentPage();
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
