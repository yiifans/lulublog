<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $created_at
 * @property string $modified_at
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
            [['created_at', 'modified_at'], 'safe'],
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
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
            'allow_comment' => 'Allow Comment',
            'comments' => 'Comments',
            'views' => 'Views',
            'diggs' => 'Diggs',
            'burys' => 'Burys',
            'sticky' => 'Sticky',
            'password' => 'Password',
            'visibility' => 'Visibility',
            'status' => 'Status',
            'thumb' => 'Thumb',
            'title' => 'Title',
            'alias' => 'Alias',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
            'content_type' => 'Content Type',
            'template' => 'Template',
        ];
    }
}
