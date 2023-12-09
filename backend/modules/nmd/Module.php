<?php

namespace app\modules\nmd;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\modules\nmd\controllers';

    public function init()
    {
        parent::init();

        // Define the module layout if needed
        $this->layout = 'main';

        // Add your custom module initialization code here
    }
}
