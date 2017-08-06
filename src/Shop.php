<?php

class Shop implements \Countable
{
    private $shopName;
    private $products;

    private function __construct(ShopName $shopName)
    {
        $this->shopName = $shopName;
        $this->products = [];
    }

    public static function named(ShopName $shopName)
    {
        $shop = new Shop($shopName);
        return $shop;
    }

    public function __toString()
    {
        return (string) $this->shopName;
    }

    public function addPricedProduct(Product $product, Price $price)
    {
        $this->products[] = PricedProduct::pricedForShop($product, $price, $this);
    }

    public function hasProducts()
    {
       return $this->count() > 0;
    }

    public function count()
    {
        return count($this->products);
    }

    public function sameAs(Shop $other)
    {
       return (string) $this == (string) $other;
    }
}
