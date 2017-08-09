<?php

class Mobile
{
    private $number;
    private function __construct($number)
    {
        $this->number = $number;
    }

    public static function fromString($number)
    {
        $mobile = new Mobile($number);

        return $mobile;
    }

    public function __toString()
    {
        return $this->number;
    }
}
