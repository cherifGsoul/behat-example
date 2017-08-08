<?php

class ProductPricer
{
    private $productCatalog;

    public function __construct(ProductCatalog $productCatalog)
    {
        $this->productCatalog = $productCatalog;
    }

    public function listProductForShop(Product $product, Price $price, Shop $shop)
    {
        if ($shop->hasProduct($product) === false) {
            $product = $this->productCatalog->forName((string)$product);
            $shop->addPricedProduct($product,$price);
        }
    }

    public function unlistProductFromShop(Shop $shop, Product $product)
    {
        if ($shop->hasProduct($product)) {
            $shop->unlistProduct($product);
        }
    }
}
