<?php

namespace App;

class CheckSum
{
    protected $array;

    protected $splited_string;

    public function __construct(string $string)
    {
        $this->array = str_split($string, 1);

        $this->splited_string = collect($this->array);
    }

    public function everyThirdStartingFromFirst()
    {
        $this->splited_string = $this->splited_string->nth(3, 0);

        return $this;
    }

    public function everyThirdStartingFromSecond()
    {
        $this->splited_string = $this->splited_string->nth(3, 1);

        return $this;
    }

    public function everyThirdStartingFromThird()
    {
        $this->splited_string = $this->splited_string->nth(3, 2);

        return $this;
    }

    public function multiplyBy(int $multiplier)
    {
        $this->splited_string =  $this->splited_string->map(function ($value) use ($multiplier) {
            return $value * $multiplier;
        });

        return $this->splited_string;
    }
}
