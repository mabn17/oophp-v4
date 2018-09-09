<?php

namespace Mabn\Dice;

/**
 * A dicehand, consisting of dices.
 */
class DiceHand
{
    /**
     * @var Dice $dices   Array consisting of dices.
     * @var int  $values  Array consisting of last roll of the dices.
     * @var int  $points  consisting of last roll of the dices.
     */
    private $dices;
    private $values;
    private $points;

    /**
     * Constructor to initiate the dicehand with a number of dices.
     * Also increments the instance counter
     *
     * @param int $dices Number of dices to create, defaults to five.
     */
    public function __construct(int $dices = 5)
    {
        $this->dices  = [];
        $this->values = [];
        $this->points = 0;

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[]  = new Dice();
            $this->values[] = null;
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll()
    {
        for ($j=0; $j < sizeof($this->values); $j++) {
            $this->values[$j] = $this->dices[$j]->roll();
        }
    }

    /**
     * Get values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function values()
    {
        return $this->values;
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function sum()
    {
        return array_sum($this->values);
    }

    /**
     * Get the average of all dices.
     *
     * @return float as the average of all dices.
     */
    public function average()
    {
        $avg = array_sum($this->values) / sizeof($this->values);

        return round($avg, 1);
    }

    /**
     * Get the player points
     *
     * @return int the total dice points
     */
    public function points()
    {
        return $this->points;
    }

    /**
     * Changes the player points
     * Adds the total sum of all dices if noone has the score of 1
     *
     * @param $values Array with the values of the last roll
     *
     * @return bool true if no 1 is in the array || Else false
     */
    public function setPoints($values)
    {
        if (in_array(1, $values)) {
            return false;
        } else {
            $this->points += array_sum($values);
        }
        return true;
    }
}
