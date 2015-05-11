<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'takonomy_id',
            'user_id',
            'user_name',
            'last_user_id',
            // 'last_user_name',
            // 'created_at',
            // 'updated_at',
            // 'focus_count',
            // 'favorite_count',
            // 'view_count',
            // 'comment_count',
            // 'agree_count',
            // 'against_count',
            // 'is_sticky',
            // 'is_recommend',
            // 'is_headline',
            // 'flag',
            // 'allow_comment',
            // 'password',
            // 'template',
            // 'sort_num',
            // 'visibility',
            // 'status',
            // 'content_type',
            // 'seo_title',
            // 'seo_keywords',
            // 'seo_description',
            // 'title',
            // 'summary',
            // 'thumb',
            // 'url_alias:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
