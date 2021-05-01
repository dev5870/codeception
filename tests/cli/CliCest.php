<?php
use yii\helpers\Url as Url;
class CliCest
{
  public function TestingCliCest(AcceptanceTester $I)
  {
    $I->wantTo('Run command Hello');
    $I->runShellCommand('php yii hello/index');
  }
}
