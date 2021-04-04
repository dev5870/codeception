<?php

use yii\helpers\Url;

class RegistrationAndLoginCest
{
  public function ensureThatRegistrationWorks(AcceptanceTester $I)
  {
      $I->amOnPage(Url::toRoute('/site/signup'));
      $I->wait(2);
      $I->see('Signup form', 'h1');

      $I->amGoingTo('try to registration with correct credentials');
      $I->wait(2);

      $I->fillField('input[name="SignupForm[username]"]', 'admin_'.mt_rand(10000,200000));
      $I->fillField('input[name="SignupForm[email]"]', mt_rand(10000,200000).'@test.com');
      $I->fillField('input[name="SignupForm[password]"]', 'password');
      $I->click('Signup');
      $I->wait(2);

      $I->expectTo('see user info');
      $I->see('Logout');
  }

  public function ensureThatLoginWorks(AcceptanceTester $I)
  {
      $I->amOnPage(Url::toRoute('/site/login'));
      $I->wait(2);
      $I->see('Login', 'h1');

      $I->amGoingTo('try to login with correct credentials');
      $I->wait(2);

      $I->fillField('input[name="LoginForm[username]"]', 'admin_90158');
      $I->fillField('input[name="LoginForm[password]"]', 'password');
      $I->click('login-button');
      $I->wait(2);

      $I->expectTo('see user info');
      $I->see('Logout');
  }
}
