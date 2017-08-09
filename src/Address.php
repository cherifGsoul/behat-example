<?php

class Address
{
    private $street;
    private $wilaya;
    private $city;

    public function __construct($street, $wilaya, $city)
    {
        $this->street = $street;
        $this->wilaya = $wilaya;
        $this->city = $city;
    }

    public function street()
    {
        return $this->street;
    }

    public function wilaya()
    {
        return $this->wilaya;
    }

    public function city()
    {
        return $this->city;
    }
}
