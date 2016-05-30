<?php

namespace backend\modules\notification\controllers;

use yii\web\Controller;
use backend\APEDevices\components\controllers\ControllerAPED;

class NotificationController extends ControllerAPED
{
    public $modelClass = 'backend\modules\notification\models\Notification';

}
