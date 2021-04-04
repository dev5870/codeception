<?php

use yii\helpers\Url;

class RegistrationAndLoginCest
{
  public function ensureThatRegistrationWorks(AcceptanceTester $I)
  {
      $I->amOnPage(Url::toRoute('/site/signup'));
      $I->see('Signup form', 'h1');

      $I->amGoingTo('try to registration with correct credentials');

      $username = 'admin_'.mt_rand(10000,200000);
      $email = mt_rand(10000,200000).'@test.com';

      $I->fillField('input[name="SignupForm[username]"]', $username);
      $I->fillField('input[name="SignupForm[email]"]', $email);
      $I->fillField('input[name="SignupForm[password]"]', 'password');
      $I->click('Signup');

      $I->expectTo('see user info');
      $I->see('Logout');

      $I->seeInDatabase('user', ['username' => $username, 'email' => $email]);
  }

  public function ensureThatLoginWorks(AcceptanceTester $I)
  {
      $I->amOnPage(Url::toRoute('/site/login'));
      $I->see('Login', 'h1');

      $I->amGoingTo('try to login with correct credentials');

      $users = $I->grabColumnFromDatabase('user', 'username', array('created_at' => date("Y-m-d")));
      $user = end($users);
      $password = $I->grabColumnFromDatabase('user', 'password_hash', array('username' => $user));
      $I->updateInDatabase('user', array('password_hash' => '$2y$13$SfFjhqLJ6xTNyB3/cqz36uagw0DJNub8Vpr4vupb.v7O5dHJNk34q'), array('username' => $user));

      $I->fillField('input[name="LoginForm[username]"]', $user);
      $I->fillField('input[name="LoginForm[password]"]', 'password');
      $I->click('login-button');

      $I->expectTo('see user info');
      $I->see('Logout');

      $I->updateInDatabase('user', array('password_hash' => $password[0]), array('username' => $user));
  }
}
