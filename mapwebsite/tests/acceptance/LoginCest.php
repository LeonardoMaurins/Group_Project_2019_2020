<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function selectUserStudent(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Student');
        $I->see('Login');
    }

    public function selectUserGuest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Guest');
        $I->see('Under Construction');
    }

    public function loginSuccessfully(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('_username','B00107064');
        $I->fillField('_password','pass');
        $I->click('login-submit');
        $I->see('Student Number: ');
    }

    public function loginFailed(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('_username','john');
        $I->fillField('_password','hello');
        $I->click('login-submit');
        $I->see('Invalid Credentials.');
    }

    public function loginNoAccount(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->click('No account?');
        $I->see('Signup');
    }

    public function loginForgottenPassword(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->click('Forgotten password?');
        $I->see('503');
    }

    public function loginGuest(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->click('Login as guest?');
        $I->see('I Am A...');
    }
}
