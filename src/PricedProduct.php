<?php

class PricedProduct
{
    private $product;
    private $price;
    private $shop;

    private function __construct(Product $product, Price $price, Shop $shop)
    {
        $this->product = $product;
        $this->price = $price;
        $this->shop = $shop;
    }

    public static function pricedForShop(Product $product, Price $price, Shop $shop)
    {
        $pricedProduct = new PricedProduct($product, $price, $shop);
        return $pricedProduct;
    }

    public function price()
    {
        return $this->price;
    }

    public function shop()
    {
        return $this->shop;
    }
}
