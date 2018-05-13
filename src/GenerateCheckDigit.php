<?php

namespace App;

class GenerateCheckDigit
{
    protected $finalSum;

    public function __construct(int $finalSum)
    {
        $this->finalSum = str_split($finalSum);
    }

    public function generate()
    {
        return collect($this->finalSum)->sum();
    }
}
