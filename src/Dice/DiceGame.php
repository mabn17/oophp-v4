<?php

namespace Mabn\Dice;

/**
 * Preparing Dice100 game
 */
class DiceGame
{
    /**
     * @var int   $dices        The number of dices that the game is played with.
     * @var DiceHand $players   Array the players
     * @var int $currentPlayer  The "active" player number
     * @var array $dicePot      Stores the all DiceHand values
     * @var array $names        Array with playernames
     */
    private $dices;
    private $players;
    private $currentPlayer;
    private $dicePot;
    private $names;

    /**
     * Constructor to create a dice.
     *
     * @param 2|int $nrOfDices        The max value of the dice.
     * @param 2|int $nrOfPlayers      The max value of the dice.
     */
    public function __construct(int $nrOfDices = 5, int $nrOfPlayers = 2)
    {
        $this->dices = $nrOfDices;
        $this->currentPlayer = 0;
        $this->names = [
            0 => "Player",
            1 => "Computer",
        ];
        for ($i=0; $i < $nrOfPlayers; $i++) {
            $this->players[]  = new DiceHand($this->dices);
        }
    }

    public function names()
    {
        return $this->names;
    }
    /**
     * Get the players array
     *
     * @return array with the players (DiceHand(s)).
     */
    public function players()
    {
        return $this->players;
    }

    /**
     * Get the number of dices
     *
     * @return int the number of dices that is getting played.
     */
    public function dices()
    {
        return $this->dices;
    }

    /**
     * Get the current player
     *
     * @return int The array index of the current player.
     */
    public function currentPlayer()
    {
        return $this->currentPlayer;
    }

    /**
     * Changes the current player
     *
     * @return void
     */
    public function changeCurrentPlayer()
    {
        $this->currentPlayer = ($this->currentPlayer === 1) ? 0 : 1;
        $this->resetDicePot();
    }

    /**
     * Adds the array to the Pot, resets on player change.
     *
     * @param array $values Keeps track of the values.
     */
    public function addToPot($values)
    {
        foreach ($values as $value) {
            $this->dicePot[] = $value;
        }
    }

    /**
     * Get the dice pot.
     *
     * @return array $this->dicePot all values from the dice hand.
     */
    public function dicePot()
    {
        return $this->dicePot;
    }

    /**
     * Resets the dice pot.
     *
     * @return void
     */
    public function resetDicePot()
    {
        $this->dicePot = [];
    }

    public function isDone()
    {
        if ($this->players()[0]->points() >= 100) {
            return "Player 1 won!";
        } elseif ($this->players()[1]->points() >= 100) {
            return "Computer won!";
        }
        return false;
    }

    /**
     * Changes the input[submit] text dippending on player turn.
     *
     * @return string $txt Changes the value of the $_POST["roll"] input.
     */
    public function rollText()
    {
        $txt = "Simulate PC";

        if ($this->currentPlayer() == 0) {
            $txt = (in_array(1, $game->dicePot())) ? "Simulate PC" : "Roll Again";
        }
        return $txt;
    }

    /**
     * Simulates the Computers turn.
     * Auto save after one roll.
     *
     * @return void
     */
    public function simulateComputerTurn()
    {
        $this->players()[1]->setPoints($this->dicePot());
        $this->changeCurrentPlayer();
        $this->isDone();
    }
}
