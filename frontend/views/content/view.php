<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model source\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'takonomy_id',
            'user_id',
            'user_name',
            'last_user_id',
            'last_user_name',
            'created_at',
            'updated_at',
            'focus_count',
            'favorite_count',
            'view_count',
            'comment_count',
            'agree_count',
            'against_count',
            'is_sticky',
            'is_recommend',
            'is_headline',
            'flag',
            'allow_comment',
            'password',
            'template',
            'sort_num',
            'visibility',
            'status',
            'content_type',
            'seo_title',
            'seo_keywords',
            'seo_description',
            'title',
            'summary',
            'thumb',
            'url_alias:url',
        ],
    ]) ?>

</div>
