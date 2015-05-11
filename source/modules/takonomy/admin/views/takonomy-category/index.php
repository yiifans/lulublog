<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\TakonomyCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类管理';
$this->addBreadcrumbs([
	$this->title,
]);


?>
<div class="takonomy-category-index">

    <p>
        <?= Html::a('新建分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			[
    			'attribute'=>'name',
    			'format'=>'html',
				'value'=>function ($model,$key,$index,$column)
					{
						
						return Html::a($model->name,['takonomy/index','category'=>$model->id]);
					}
			],
            
            'description',

            [
				'class' => 'source\core\grid\ActionColumn',
				
				'buttons'=>['view'=>function ($url, $model,$key,$index,$column){
						
						return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['takonomy/index','category'=>$key]), [
							'title' => Yii::t('yii', 'View'),
							'data-pjax' => '0',
						]);
					}
				],
			],
        ],
    ]); ?>

</div>
