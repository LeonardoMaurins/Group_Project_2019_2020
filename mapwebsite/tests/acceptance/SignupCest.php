<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class SignupCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function signUpSuccessfully(AcceptanceTester $I)
    {
        $I->amOnPage('/signup');
        $I->fillField('username','B00107064');
        $I->fillField('email','B00107064@mytudublin.ie');
        $I->fillField('password','pass');
        $I->fillField('password_confirm','pass');
        $I->click('signup-submit');
        $I->see('Login');
    }

    public function signUpEmptyFields(AcceptanceTester $I)
    {
        $I->amOnPage('/signup');
        $I->fillField('username','');
        $I->fillField('email','');
        $I->fillField('password','');
        $I->fillField('password_confirm','');
        $I->click('signup-submit');
        $I->see('Missing Credentials');
    }

    public function signUpIncorrectUsername(AcceptanceTester $I)
    {
        $I->amOnPage('/signup');
        $I->fillField('username','john');
        $I->fillField('email','B00107064@mytudublin.ie');
        $I->fillField('password','pass');
        $I->fillField('password_confirm','pass');
        $I->click('signup-submit');
        $I->see('Invalid Student ID');
    }

    public function signUpIncorrectEmail(AcceptanceTester $I)
    {
        $I->amOnPage('/signup');
        $I->fillField('username','B00107064');
        $I->fillField('email','rachel@gmail.com');
        $I->fillField('password','pass');
        $I->fillField('password_confirm','pass');
        $I->click('signup-submit');
        $I->see('Invalid Email');
    }

    public function signUpPasswordsNotEqual(AcceptanceTester $I)
    {
        $I->amOnPage('/signup');
        $I->fillField('username','B00107064');
        $I->fillField('email','B00107064@mytudublin.ie');
        $I->fillField('password','pass');
        $I->fillField('password_confirm','passpass');
        $I->click('signup-submit');
        $I->see('Passwords are not equal');
    }

    public function signUpReturnToLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/signup');
        $I->click('Return to login');
        $I->see('Login');
    }
}
