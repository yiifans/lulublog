<?php

namespace app\modules\admin;

use app\core\base\BaseModule;

class AdminModule extends BaseModule
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();

        //false：不使用布局文件
        //null：使用父级布局文件
        //file name：使用当前Module 中 的布局文件
        $this->layout = '/main';
        // custom initialization code goes here
    }
}
