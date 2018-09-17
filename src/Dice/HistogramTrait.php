<?php

namespace Mabn\Dice;

/**
 * A trait implomenting histogram for integers
 */
trait HistogramTrait
{
    /**
     * @var array $serie  The numbers stored in sequence.
     */
    private $serie = [];

    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie()
    {
        return $this->serie;
    }

    /**
     * Print out the histogram, default is to print out only the numbers
     * in the serie, but when $min and $max is set then print also empty
     * values in the serie, within the range $min, $max.
     *
     * @param int $min The lowest possible integer number.
     * @param int $max The highest possible integer number.
     *
     * @return string representing the histogram.
     */
    public function printHistogram(int $min = null, int $max = null)
    {
        $list = [];

        if ($min && $max) {
            for ($i=0; $i < sizeof($this->serie); $i++) {
                $currNumber = $this->serie[$i];
                if ($currNumber >= $min && $currNumber <= $max) {
                    $list[] = $currNumber;
                }
            }
        } else {
            $list = $this->serie;
        }

        $counter = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
        ];

        for ($t=0; $t < sizeof($list); $t++) {
            $counter[$list[$t]] += 1;
        }

        for ($i=1; $i <= 6; $i++) { 
            $nrOfRep = str_repeat("*", $counter[$i]);
            echo "$i. " . "$nrOfRep" . "\n";
        }
    }
}
