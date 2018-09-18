<?php

namespace Anax;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class DiceGameTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $game = new \Mabn\Dice\DiceGame();
        $this->assertInstanceOf("\Mabn\Dice\DiceGame", $game);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use arguments.
     */
    public function testCreateObjectWithArguments()
    {
        $game = new \Mabn\Dice\DiceGame(2, 2);
        $this->assertInstanceOf("\Mabn\Dice\DiceGame", $game);

        $this->assertEquals(2, sizeof($game->players()));
        $this->assertEquals(2, sizeof($game->players()[0]->dices()));

        $this->assertEquals(sizeof($game->players()[1]->dices()), sizeof($game->players()[0]->dices()));
    }

    /**
     * Tests currentPlayer
     */
    public function testCurrentPlayer()
    {
        $game = new \Mabn\Dice\DiceGame(2, 2);

        $this->assertEquals($game->currentPlayer(), 0);

        $game->changeCurrentPlayer();
        $this->assertEquals($game->currentPlayer(), 1);
    }

    /**
     * Tests Pot methods
     */
    public function testPot()
    {
        $game = new \Mabn\Dice\DiceGame(2, 2);

        $testArray = [1, 2, 3, 4, 5];
        $game->addToPot($testArray);
        $this->assertEquals($game->dicePot(), $testArray);
    }

    /**
     * Tests isDone
     */
    public function testIsDone()
    {
        $game = new \Mabn\Dice\DiceGame(2, 2);

        $game->addToPot([4]);
        $this->assertEquals($game->rollText(), "Roll Again");
        $this->assertFalse($game->isDone());
        $game->players()[$game->currentPlayer()]->setPoints([100]);
        $this->assertEquals($game->isDone(), "Player 1 won!");
    }

    /**
     * Tests isDone2
     */
    public function testIsDoneTwo()
    {
        $game = new \Mabn\Dice\DiceGame(2, 2);

        $game->changeCurrentPlayer();
        $game->addToPot([4]);
        $this->assertEquals($game->rollText(), "Simulate PC");
        $game->players()[$game->currentPlayer()]->setPoints([100]);
        $this->assertEquals($game->isDone(), "Computer won!");

        $game->simulateComputerTurn();
    }
}
