<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Hello extends \Codeception\Module
{
  public function helloWorld()
  {
    return 'Hello world!';
  }

  public function findUserById($id)
  {
    $db = $this->getModule("Db");
    $list = $db->grabColumnFromDatabase('user', 'email', array('id' => $id));
    $email = end($list);
    return $email;
  }
}
