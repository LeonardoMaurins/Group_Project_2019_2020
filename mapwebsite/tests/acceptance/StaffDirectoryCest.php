<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class StaffDirectoryCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('_username','B00107064');
        $I->fillField('_password','pass');
        $I->click('login-submit');
    }

    public function staffDirectorySearch(AcceptanceTester $I)
    {
        $I->amOnPage('/staffdirectory');
        $I->fillField('_search','John');
        $I->see('Barrie');
    }

    public function staffDirectoryDepartment(AcceptanceTester $I)
    {
        $I->amOnPage('/staffdirectory');
        $I->selectOption('dropdown','LINC');
        $I->see('LINC');
    }

    public function staffLogOut(AcceptanceTester $I)
    {
        $I->amOnPage('/staffdirectory');
        $I->click('logout-submit');
        $I->see('I Am A...');
    }
}
