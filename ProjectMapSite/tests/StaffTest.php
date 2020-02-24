<?php

use Utility\Staff;

class StaffTest extends PHPUnit_Framework_TestCase
{
    public function testSetName()
    {
        $_Staff = new Staff();

        $this->assertNotEquals($_Staff, null);
    }
}
