<?php

namespace Fake;

class ProductCatalog implements \ProductCatalog
{
    private $products = [];

    public function add(\Product $product)
    {
        $this->products[(string)$product] = $product;
    }

    public function forName($name)
    {
        return $this->products[$name];
    }
}