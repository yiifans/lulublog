<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\core\LuLu;
use app\models\Content;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$type=LuLu::getGetValue('type');
$this->title = Content::getTypes($type);
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建'.Content::getTypes($type), ['create','type'=>$type], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'title',
            'updated_at',
            'allow_comment',
            // 'comments',
            // 'views',
            // 'diggs',
            // 'burys',
            // 'sticky',
            // 'password',
            // 'visibility',
            // 'status',
            // 'thumb',
            // 
            // 'alias',
            // 'excerpt',
            // 'content:ntext',
            // 'content_type',
            // 'template',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
