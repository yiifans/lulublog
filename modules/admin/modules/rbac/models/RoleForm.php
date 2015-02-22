<?php

namespace app\modules\admin\modules\rbac\models;

use Yii;

class RoleForm extends ItemForm
{
	public function init()
	{
		parent::init();
		 
		$this->type = \yii\rbac\Item::TYPE_ROLE;
	}
}
