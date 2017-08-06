<?php

class Price
{
    private $amount;

    private function __construct($amount)
    {
        $this->amount = $amount;
    }

    public static function fromString($amount)
    {
        $price = new Price($amount);
        return $price;
    }

    public function __toString()
    {
        return $this->amount;
    }

    public function equals(Price $other)
    {
        return (string) $this == (string) $other;
    }
}
