<?php

class ProductPricer
{
    private $productCatalog;

    public function __construct(ProductCatalog $productCatalog)
    {
        $this->productCatalog = $productCatalog;
    }

    public function priceProductForShop(ProductName $productName, Price $price, Shop $shop)
    {
        $product = $this->productCatalog->forName((string)$productName);
        $shop->addPricedProduct($product,$price);
    }
}
