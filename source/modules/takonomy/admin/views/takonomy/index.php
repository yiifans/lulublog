<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\LuLu;
use source\core\lib\Common;
use source\models\Takonomy;
use source\models\TakonomyCategory;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TakonomySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$category=LuLu::getGetValue('category');
$categoryModel = TakonomyCategory::findOne(['id'=>$category]);
$this->addBreadcrumbs([
		['分类管理',['/takonomy']],
		$categoryModel['name'],
]);

?>
<div class="takonomy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建', ['create','category'=>$category], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            [
	
				'attribute'=>'name',
				'format'=>'html',
				 'value'=>function ($model,$key,$index,$column){
						return str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $model->level).Html::a($model->name,['takonomy/update','id'=>$model->id]);
				    }
			],
            'url_alias',

            // 'description',
            // 'contents',
            'sort_num',

            ['class' => 'source\core\grid\ActionColumn',
				'queryParams'=>['view'=>['category'=>$category]]
],
        ],
    ]); ?>

</div>
