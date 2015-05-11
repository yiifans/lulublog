<?php

namespace source\modules\page\home;

use yii\web\Controller;
use Yii;
use source\models\Content;
use source\models\search\ContentSearch;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\ContentController;
use source\LuLu;
use source\models\Takonomy;
use source\modules\post\models\ContentPost;
use source\modules\page\models\ContentPage;


class DefaultController extends BaseController
{
   
    
    public function getDetail($id)
    {
        $model = Content::getBody(ContentPage::className(),['a.id'=>$id])->one();
        //var_dump($model);
        
        return ['model'=>$model];
    }
}
