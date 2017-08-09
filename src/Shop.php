<?php

class Shop implements \Countable
{
    private $shopName;
    private $products;

    private function __construct(ShopName $shopName)
    {
        $this->shopName = $shopName;
        $this->products = new \SplObjectStorage;
    }

    public static function registerForFree(ShopName $shopName, ContactInformation $contactInformation)
    {
        $enablement = Enablement::forFreeOffer();
        $shop = new Shop($shopName, $contactInformation, $enablement);

        return $shop;
    }

    /*public static function named(ShopName $shopName)
    {
        $shop = new Shop($shopName);
        return $shop;
    }*/

    public function __toString()
    {
        return (string) $this->shopName;
    }

    public function addPricedProduct(Product $product, Price $price)
    {
        $this->products->offsetSet($product,PricedProduct::pricedForShop($product, $price, $this));
    }

    public function hasProducts()
    {
       return $this->count() > 0;
    }

    public function count()
    {
        return $this->products->count();
    }

    public function sameAs(Shop $other)
    {
       return (string) $this == (string) $other;
    }

    public function hasProduct(Product $product)
    {
        return $this->products->offsetExists ($product);
    }

    public function unlistProduct(Product $product)
    {
        $this->products->offsetUnset($product);
    }

    public function isEnabled()
    {
        return $this->enablement->isEnabled();
    }
}
