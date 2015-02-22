<?php

namespace app\modules\admin\modules\rbac\models;

use Yii;



class PermissionForm extends ItemForm
{
   public function init()
   {
   		parent::init();
   		
   		$this->type = \yii\rbac\Item::TYPE_PERMISSION;
   }
}
