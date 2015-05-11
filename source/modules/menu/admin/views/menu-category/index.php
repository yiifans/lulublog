<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->addBreadcrumbs([
	$this->title,
]);
?>
<div class="menu-category-index">

   

    <p>
        <?= Html::a('新建菜单', ['create'], ['class' => 'btn btn-success']) ?>
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
						
						return Html::a($model->name,['/menu/default/index','category'=>$model->id]);
					}
			],
            'description',

            ['class' => 'source\core\grid\ActionColumn'],
        ],
    ]); ?>

</div>
