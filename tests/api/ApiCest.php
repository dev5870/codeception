<?php
use yii\helpers\Url as Url;
class ApiCest
{
  public function TestingApiCest(ApiTester $I)
  {
    $I->wantTo('GET List users');
    $I->sendGet('/api/users?page=2');
    $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    $res = $I->grabResponse();
    codecept_debug($res);
  }
}
