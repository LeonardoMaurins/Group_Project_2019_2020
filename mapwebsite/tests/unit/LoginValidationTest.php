<?php namespace App\Tests;

class LoginValidationTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

//    public function testValidation()
//    {
//        $user = new User();
//
//        $user->setName(null);
//        $this->assertFalse($user->validate(['username']));
//
//        $user->setName('toolooooongnaaaaaaameeee');
//        $this->assertFalse($user->validate(['username']));
//
//        $user->setName('davert');
//        $this->assertTrue($user->validate(['username']));
//    }
//
//    public function testSavingUser()
//    {
//        $user = new User();
//        $user->setName('Miles');
//        $user->setSurname('Davis');
//        $user->save();
//        $this->assertEquals('Miles Davis', $user->getFullName());
//        $this->tester->seeInDatabase('users', [
//            'name' => 'Miles',
//            'surname' => 'Davis'
//        ]);
//    }
}