<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;
use app\core\front\BaseFrontController;
use app\models\User;
use app\models\Content;

class SiteController extends BaseFrontController
{
	public $testData='my data';
	
	public $testData2='my data2';
	
	public function init()
	{
		parent::init();
		
	}
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
    	// where
    	// order by
    	// limit 
    	$posts = Content::findAll();
        return $this->render('index',['posts'=>$posts]);
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
