<?php

namespace Anax;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class DiceTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new \Mabn\Dice\Dice();
        $this->assertInstanceOf("\Mabn\Dice\Dice", $dice);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use sides arguments.
     */
    public function testCreateObjectWithArguments()
    {
        $sides = 1;
        $dice = new \Mabn\Dice\Dice($sides);

        $this->assertEquals($sides, $dice->sides());
    }

    /**
     * Testing Roll
     */
    public function testRoll()
    {
        $dice = new \Mabn\Dice\Dice(1);

        $dice->roll();

        $this->assertEquals(1, $dice->getLastRoll());
    }
}
