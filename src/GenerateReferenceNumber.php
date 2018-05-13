<?php

namespace App;

use App\CheckSum;
use App\GenerateCheckDigit;

class GenerateReferenceNumber
{
    protected $referenceNumber;

    public function __construct(string $referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
    }

    public function generate()
    {
        $valueA = (new CheckSum($this->referenceNumber))->everyThirdStartingFromFirst()->multiplyBy(3)->sum();
        $valueB = (new CheckSum($this->referenceNumber))->everyThirdStartingFromSecond()->multiplyBy(5)->sum();
        $valueC = (new CheckSum($this->referenceNumber))->everyThirdStartingFromThird()->multiplyBy(7)->sum();

        $finalSum = $valueA + $valueB + $valueC;

        $checkDigit = (new GenerateCheckDigit($finalSum))->generate();

        return (string) $this->referenceNumber.$checkDigit;
    }
}
