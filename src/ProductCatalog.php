<?php

interface ProductCatalog
{
    public function add(Product $product);

    public function forName($name);
}
