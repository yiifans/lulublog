<?php

namespace source\models;

use Yii;
use source\helpers\TimeHelper;
use yii\helpers\Url;
use source\libs\Common;
use source\helpers\StringHelper;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property integer $id
 * @property integer $takonomy_id
 * 
 * @property integer $user_id
 * @property string $user_name
 * @property integer $last_user_id
 * @property string $last_user_name
 * 
 * @property integer $created_at
 * @property integer $updated_at
 * 
 * @property integer $focus_count
 * @property integer $favorite_count
 * @property integer $view_count
 * @property integer $comment_count
 * @property integer $agree_count
 * @property integer $against_count
 *
 * @property integer $is_sticky
 * @property integer $is_recommend
 * @property integer $is_headline
 * @property integer $flag
 * 
 * @property integer $allow_comment
 * @property string $password
 * @property string $template
 * 
 * @property integer $sort_num
 * @property integer $visibility
 * @property integer $status
 * 
 * @property string $content_type
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * 
 * @property string $title
 * @property string $summary
 * @property string $thumb
 * @property string $url_alias
 * 
 */
class Content1 extends \source\core\base\BaseActiveRecord
{
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'content', 'content_type'], 'required'],
            [['takonomy_id', 'user_id', 'allow_comment', 'comments', 'views', 'diggs', 'burys', 'sticky', 'visibility', 'status', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['password', 'content_type', 'template','user_name'], 'string', 'max' => 64],
            [['thumb', 'title'], 'string', 'max' => 256],
            [['url_alias'], 'string', 'max' => 128],
            [['summary'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'takonomy_id'=>'主分类',
            'user_id' => '用户ID',
            'user_name' => '用户名',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
            'allow_comment' => '允许评论',
            'comments' => '评论数',
            'views' => '浏览数',
            'diggs' => '顶',
            'burys' => '踩',
            'sticky' => '置顶',
            'password' => '访问密码',
            'visibility' => '可见',
            'status' => '状态',
            'thumb' => '缩略图',
            'title' => '标题',
            'url_alias' => '别名',
            'summary' => '简介',
            'content' => '内容',
            'content_type' => '内容类型',
            'template' => '模板',
        ];
    }
    
    public function getCreatedAt()
    {
    	return TimeHelper::formatTime($this->created_at);
    }
  
    public function beforeSave($insert)
    {
    	$uploadedFile = Common::uploadFile('Content[thumb]');
    	if($uploadedFile!=null)
    	{
    		$this->thumb=$uploadedFile['url'].$uploadedFile['new_name'];
    	}
    	
    	
    	if($this->views==null)
    	{
    		$this->views=0;
    	}
    	if($this->comments==null)
    	{
    		$this->comments=0;
    	}
    	
    	if($this->summary==null||empty($this->summary))
    	{
    		$content = strip_tags($this->content);
    		$pattern = '/\s/';//去除空白
    		$content = preg_replace($pattern, '', $content);
    		 
    		$this->summary=StringHelper::subStr($content,250);
    	}
    	
    	return parent::beforeSave($insert);
    }
    
    public function getTakonomy()
    {
    	return $this->hasOne(Takonomy::className(), ['id'=>'takonomy_id']);
    }
}
