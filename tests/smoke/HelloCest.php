<?php

use yii\helpers\Url;

class HelloCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        codecept_debug($I->findUserById(11));
    }
}
