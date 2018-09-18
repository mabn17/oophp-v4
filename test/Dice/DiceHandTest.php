<?php

namespace Anax;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class DiceHandTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $diceHand = new \Mabn\Dice\DiceHand();
        $this->assertInstanceOf("\Mabn\Dice\DiceHand", $diceHand);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use arguments.
     */
    public function testCreateObjectWithArguments()
    {
        $nrOfDices = 6;
        $diceHand = new \Mabn\Dice\DiceHand($nrOfDices);

        $this->assertEquals($nrOfDices, sizeof($diceHand->dices()));
    }

    public function testRoll()
    {
        $diceHand = new \Mabn\Dice\DiceHand(5);

        $diceHand->roll();
        $this->assertEquals(sizeof($diceHand->values()), 5);
        $this->assertEquals(array_sum($diceHand->values()), $diceHand->sum());

        $this->assertFalse($diceHand->setPoints([1, 1, 4, 6, 7]));
        $this->assertTrue($diceHand->setPoints([2, 2, 2, 2, 2]));

        $avg = array_sum($diceHand->values()) / sizeof($diceHand->values());
        $avg = round($avg, 1);
        $this->assertEquals($diceHand->points(), 10);
        $this->assertEquals($diceHand->average(), $avg);
    }
}
