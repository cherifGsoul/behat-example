<?php

class Product
{
    private $productName;
    
    private function __construct(ProductName $productName)
    {
        $this->productName = $productName;
    }

    public static function named(ProductName $productName)
    {
        $product = new Product($productName);
        return $product;
    }

    public function __toString()
    {
        return (string) $this->productName;
    }
}
