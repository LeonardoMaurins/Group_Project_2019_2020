<?php

use Utility\User;

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultConstructor()
    {
        $_User = new User();

        $this->assertNotEquals($_User, null);
    }

    public function testNameField()
    {
        $_User = new User();
        $_User->setId("id");

        $this->assertEquals($_User->getId(), "id");
    }

    public function testUsernameField()
    {
        $_User = new User();
        $_User->setUsername("username");

        $this->assertEquals($_User->getUsername(), "username");
    }

    public function testEmailField()
    {
        $_User = new User();
        $_User->setEmail("email");

        $this->assertEquals($_User->getEmail(), "email");
    }

    public function testPasswordField()
    {
        $_User = new User();
        $_User->setPassword("password");

        $this->assertEquals($_User->getPassword(), "password");
    }
}