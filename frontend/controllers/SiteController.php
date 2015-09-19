<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use source\models\LoginForm;
use source\models\ContactForm;
use source\models\Post;
use source\core\front\BaseFrontController;
use source\models\User;
use source\models\Content;
use source\LuLu;
use yii\data\ActiveDataProvider;

class SiteController extends BaseFrontController
{
	
    public function actionIndex()
    {
    	$query = Content::leftJoinWith('takonomy');
    	$locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>6]);
    	
    	$dataProvider = new ActiveDataProvider([
			'query'=>$query,
    		'pagination'=>[
				'pageSize'=>5,
    		],
    	]);
    	$locals['dataProvider']=$dataProvider;
    	
        return $this->render('index',$locals);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
        $model->scenario='login';
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
    	
    	
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
    	
    	
    	/* return $this->render('/default/contact',['test'=>5]);
    	 
    	$content = $this->renderPartial('about',['test'=>5]);
    	 
    	$this->renderContent($content);
    	 
    	$this->renderFile('full file name',['test'=>5]);
    	 
    	$this->renderAjax('about',['test'=>'test']);
    	 */
    	
    	//$this->layout='main';
    	
    	
    	
        return $this->render('about',['test'=>5,'testData'=>$this->testData]);
    }
}
