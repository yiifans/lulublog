<?php

namespace app\modules\admin\modules\rbac\models;

use Yii;
use app\core\base\BaseModel;


class ItemForm extends BaseModel
{

	public $name;
	public $type;
	public $description;
	public $rule_name;
	public $data;
	public $created_at;
	public $updated_at;
	
	public $child;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['child'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

  
}
