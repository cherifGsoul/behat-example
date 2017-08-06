<?php

class ShopName
{
    private $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    public static function fromString($name)
    {
        $shopName = new ShopName($name);
        return $shopName;
    }

    public function __toString()
    {
        return $this->name;
    }
}
