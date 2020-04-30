<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class MainCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('_username','B00107064');
        $I->fillField('_password','pass');
        $I->click('login-submit');
    }

    public function mainMap(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->click('Map');
        $I->amOnPage('/map');
    }

    public function mainTimetable(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->click('Timetable');
        $I->amOnPage('/underconstruction');
    }

    public function mainStudentServices(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->click('Student Services');
        $I->amOnPage('/underconstruction');
    }

    public function mainShuttleBus(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->click('Shuttle Bus');
        $I->see('From Coolmine');
    }

    public function mainStaffDirectory(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->click('View staff directory');
        $I->see('Department');
    }

    public function mainLogOut(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->click('Logout');
        $I->see('I Am A...');
    }
}
