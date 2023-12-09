<?php

namespace app\modules\chart;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\modules\chart\controllers';

    public function init()
    {
        parent::init();

        // Define the module layout if needed
        $this->layout = 'main';

        // Add your custom module initialization code here
    }
}
