<?php

interface ProductCatalog
{
    public function listProduct(Product $product);

    public function forName($name);
}
