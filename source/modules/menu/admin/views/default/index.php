<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\LuLu;
use source\models\MenuCategory;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$category=LuLu::getGetValue('category');
$categoryModel = MenuCategory::findOne(['id'=>$category]);

$this->title = '新建菜单';
$this->addBreadcrumbs([
		['菜单管理',['/menu']],
		[$categoryModel['name'],['/menu/default/index','category'=>$category]],
		$this->title,
		]);

?>
<div class="menu-index">

    <p>
        <?= Html::a('添加菜单项 ', ['create','category'=>$category], ['class' => 'btn btn-success']) ?>
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
			'url',
			'sort_num',
            'enabled',

            ['class' => 'source\core\grid\ActionColumn',
				'queryParams'=>['view'=>['category'=>$category]]
			],
        ],
    ]); ?>

</div>
