<?php

namespace Mabn\Dice;

/**
 * Showing of a standard Dice class
 */
class Dice
{
    /**
     * @var int $sides        Number of sides that the dice has
     * @var int $lastRoll     The latest dice roll
     */
    private $sides;
    private $lastRoll;

    /**
     * Constructor to create a dice.
     *
     * @param 6|int $sides      The max value of the dice.
     */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
        $this->lastRoll = null;
    }

    /**
     * Rolls the dice.
     *
     * @return int      a number between 1 and $this->sides
     */
    public function roll()
    {
        $newRoll = rand(1, $this->sides);
        $this->lastRoll = $newRoll;
        return $newRoll;
    }

    /**
     * Rolls the dice.
     *
     * @return int      the latest roll
     */
    public function getLastRoll()
    {
        return $this->lastRoll;
    }

    /**
     * Gets the sides
     *
     * @return int    the sides
     */
    public function sides()
    {
        return $this->sides;
    }
}
