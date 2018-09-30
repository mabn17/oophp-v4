<?php

namespace Anax;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class HistogramTraitTest extends TestCase
{
    use \Mabn\Dice\HistogramTrait;

    /**
     * Testing get histogram series
     */
    public function testSeries()
    {
        $this->serie[0] = 5;
        $expected = "1. " . "" . "\n" .
            "2. " . "" . "\n" .
            "3. " . "" . "\n" .
            "4. " . "" . "\n".
            "5. " . "*" . "\n" .
            "6. " . "" . "\n";

        $this->assertEquals($this->getHistogramSerie(), [5]);
        $this->expectOutputString($expected);
        $this->printHistogram();
    }

    public function testWithParams()
    {
        $this->serie[0] = 5;
        $this->serie[1] = 1;
        $expected = "1. " . "" . "\n" .
            "2. " . "" . "\n" .
            "3. " . "" . "\n" .
            "4. " . "" . "\n".
            "5. " . "*" . "\n" .
            "6. " . "" . "\n";
        $this->expectOutputString($expected);
        $this->printHistogram(5, 5);
    }
}
