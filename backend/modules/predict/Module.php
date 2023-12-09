<?php

namespace app\modules\predict;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\modules\predict\controllers';

    public function init()
    {
        parent::init();

        // Define the module layout if needed
        $this->layout = 'main';

        // Add your custom module initialization code here
    }
}
