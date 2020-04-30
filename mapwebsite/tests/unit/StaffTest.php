<?php

use App\Entity\Staff;

class StaffTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultConstructor()
    {
        $_Staff = new Staff();

        $this->assertNotEquals($_Staff, null);
    }

    public function testNameField()
    {
        $_Staff = new Staff();
        $_Staff->setName("name");

        $this->assertEquals($_Staff->getName(), "name");
    }

    public function testPositionField()
    {
        $_Staff = new Staff();
        $_Staff->setPosition("position");

        $this->assertEquals($_Staff->getPosition(), "position");
    }

    public function testDepartmentField()
    {
        $_Staff = new Staff();
        $_Staff->setDepartment("department");

        $this->assertEquals($_Staff->getDepartment(), "department");
    }

    public function testEmailField()
    {
        $_Staff = new Staff();
        $_Staff->setEmail("email");

        $this->assertEquals($_Staff->getEmail(), "email");
    }

    public function testPhoneNumField()
    {
        $_Staff = new Staff();
        $_Staff->setPhoneNum("phoneNum");

        $this->assertEquals($_Staff->getPhoneNum(), "phoneNum");
    }

    public function testRoomField()
    {
        $_Staff = new Staff();
        $_Staff->setRoom("room");

        $this->assertEquals($_Staff->getRoom(), "room");
    }
}
