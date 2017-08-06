<?php

class ProductName
{
    private $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    public static function fromString($name)
    {
        $productName = new ProductName($name);

        return $productName;
    }

    public function __toString()
    {
        return $this->name;
    }
}
