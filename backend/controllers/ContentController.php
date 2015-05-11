<?php

namespace backend\controllers;

use Yii;
use source\models\Content;
use source\models\search\ContentSearch;
use source\core\back\BaseBackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\libs\Common;
use source\helpers\StringHelper;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends BaseBackController
{
	protected $content_type;
	protected $bodyModel;

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search([]);
        $dataProvider->query->andWhere(['content_type'=>$this->content_type]);
        $dataProvider->query->orderBy('created_at desc');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function saveContent($model, $bodyModel)
    {
        $postDatas = Yii::$app->request->post();
        
        if ($model->load($postDatas) && $bodyModel->load($postDatas) && $model->validate() && $bodyModel->validate()) {
        
            if($model->summary===null|| $model->summary ==='')
            {
                if($bodyModel->hasAttribute('body'))
                {
                    $content = strip_tags($bodyModel->body);
                    $pattern = '/\s/';//去除空白
                    $content = preg_replace($pattern, '', $content);
                     
                    $model->summary=StringHelper::subStr($content,250);
                }
            }
        
            if($model->save())
            {
                $bodyModel->content_id = $model->id;
                $bodyModel->save();
        
                return $this->redirect(['index']);
            }
        }
        return false;
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Content();        
		$model->user_id=1;
		$model->content_type=$this->content_type;
		$model->loadDefaultValues();
		
		$bodyModel = $this->getBodyModel();
		$bodyModel->loadDefaultValues();
		
		if(($r = $this->saveContent($model, $bodyModel))!==false)
		{
		    return $r;
		}
		
        return $this->render('create', [
        		'model' => $model,
                'bodyModel' => $bodyModel,
        		]);
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $bodyModel = $this->getBodyModel($id);
        
        if(($r = $this->saveContent($model, $bodyModel))!==false)
        {
            return $r;
        }
        
       return $this->render('update', [
        			'model' => $model,
        	        'bodyModel' => $bodyModel,
        			]);
        
    }

    /**
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $this->deleteBodyModel($id);
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function getBodyModel($contentId=null,$id=null)
    {
        
    }
    
    public function deleteBodyModel($contentId)
    {
        $bodyModel = $this->getBodyModel($contentId);
        if($bodyModel!=null)
        {
            $bodyModel->delete();
        }
    }
}
