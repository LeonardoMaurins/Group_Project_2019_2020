<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class NavBarCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('_username','B00107064');
        $I->fillField('_password','pass');
        $I->click('login-submit');
    }

    public function navMap(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->seeElement('nav');
        $I->click("Map", 'nav');
        $I->seeElement('//img[@src="../images/CampusMap.png"]');
    }

    public function navStudentServices(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->seeElement('nav');
        $I->click("Student Services", 'nav');
        $I->see('503 Service Unavailable');
    }

    public function navTimetable(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->seeElement('nav');
        $I->click("Timetable", 'nav');
        $I->see('503 Service Unavailable');
    }

    public function navBusSchedule(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->seeElement('nav');
        $I->click("Bus Schedule", 'nav');
        $I->see('Coolmine');
    }

    public function navStaffDirectory(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->seeElement('nav');
        $I->click("Staff Directory", 'nav');
        $I->see('Department');
    }

    public function navLogOut(AcceptanceTester $I)
    {
        $I->amOnPage('/main');
        $I->seeElement('nav');
        $I->click("logout-submit", 'nav');
        $I->see('I Am A...');
    }
}
