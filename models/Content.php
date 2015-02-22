<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $allow_comment
 * @property integer $comments
 * @property integer $views
 * @property integer $diggs
 * @property integer $burys
 * @property integer $sticky
 * @property string $password
 * @property integer $visibility
 * @property integer $status
 * @property string $thumb
 * @property string $title
 * @property string $alias
 * @property string $excerpt
 * @property string $content
 * @property string $content_type
 * @property string $template
 */
class Content extends \app\core\base\BaseActiveRecord
{
	const TYPE_POST='post';
	const TYPE_PAGE='page';
	
	const VISIBILITY_PUBLIC='1';
	const VISIBILITY_HIDDEN='2';
	const VISIBILITY_PASSWORD='3';
	const VISIBILITY_PRIVATE='4';
	
	
	const STATUS_PUBLISH='1';
	const STATUS_DRAFT='2';
	const STATUS_PENDING='3';

	public static function getTypes($type=null)
	{
		$ret = [
		self::TYPE_POST => '文章',
		self::TYPE_PAGE => '页面',
				];
		if($type!=null)
		{
			return $ret[$type];
		}
		return $ret;
		// return ['public'=>'公开','hidden'=>'回复可见','password'=>'密码保护','private'=>'私有'];
	}
	
	public static function getVisibilities()
	{
		return [
			self::VISIBILITY_PUBLIC => '公开', 
			self::VISIBILITY_HIDDEN => '回复可见', 
			self::VISIBILITY_PASSWORD => '密码保护', 
			self::VISIBILITY_PRIVATE => '私有'
		];
		// return ['public'=>'公开','hidden'=>'回复可见','password'=>'密码保护','private'=>'私有'];
	}

	public static function getStatuses()
	{
		return [
			self::STATUS_PUBLISH => '发布', 
			self::STATUS_DRAFT => '草稿', 
			self::STATUS_PENDING => '等待审核'
		];
		// return ['publish'=>'发布','draft'=>'草稿','pending'=>'等待审核'];
	}
	
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
            [['user_id', 'allow_comment', 'comments', 'views', 'diggs', 'burys', 'sticky', 'visibility', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['content'], 'string'],
            [['password', 'content_type', 'template'], 'string', 'max' => 64],
            [['thumb', 'title'], 'string', 'max' => 256],
            [['alias'], 'string', 'max' => 128],
            [['excerpt'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
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
            'alias' => '别名',
            'excerpt' => '简介',
            'content' => '内容',
            'content_type' => '内容类型',
            'template' => '模板',
        ];
    }
}
