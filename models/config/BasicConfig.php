<?php

namespace app\models\config;

use Yii;
use app\core\base\BaseModel;
use app\models\Config;

class BasicConfig extends BaseConfig
{
	public $sys_site_name;
	public $sys_site_description;

    public function rules()
    {
        return [
            [['sys_site_name', 'sys_site_description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_site_name' => '网站名称',
            'sys_site_description' => '网站描述',
        ];
    }
    
    public function initValue()
    {
    	$this->sys_site_name=parent::initValueInternael('sys_site_name');
    	$this->sys_site_description=parent::initValueInternael('sys_site_description');
    }
    
    public function save()
    {
    	parent::saveAll([
				'sys_site_name' => $this->sys_site_name,
    			'sys_site_description' => $this->sys_site_description,
    	]);
    }
}
