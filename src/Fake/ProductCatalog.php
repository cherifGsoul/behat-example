<?php

namespace Fake;

class ProductCatalog implements \ProductCatalog
{
    private $products = [];

    public function listProduct(\Product $product)
    {
        $this->products[(string)$product] = $product;
    }

    public function forName($name)
    {
        return $this->products[$name];
    }
}