<?php

namespace tests\codeception\common\fixtures;

use yii\test\ActiveFixture;

/**
 * User fixture
 */
class UserFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\user\models\User';
}