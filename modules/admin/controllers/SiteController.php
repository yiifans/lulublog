<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionAbout()
    {
    	return $this->render('about',['test'=>6]);
    }
}
