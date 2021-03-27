<?php

use yii\helpers\Url;

class HomeCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->wait(2);
        $I->see('My Company');
        $I->seeInTitle('My Yii Application');

        $I->seeLink('About');
        $I->click('About');
        $I->wait(2);

        $I->see('This is the About page.');
    }
}
