<?php

use yii\helpers\Url;

class LoginCest
{
    public function ensureThatLoginWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->wait(2);
        $I->see('Login', 'h1');

        $I->amGoingTo('try to login with correct credentials');
        $I->wait(2);

        $I->fillField('input[name="LoginForm[username]"]', 'admin');
        $I->fillField('input[name="LoginForm[password]"]', 'admin');
        $I->click('login-button');
        $I->wait(2);

        $I->expectTo('see user info');
        $I->see('Logout');
    }
}
