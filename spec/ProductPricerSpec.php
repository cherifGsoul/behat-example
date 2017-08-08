<?php

namespace spec;

use Shop;
use ShopName;
use ProductName;
use Product;
use Price;
use ProductCatalog;
use ProductPricer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductPricerSpec extends ObjectBehavior
{

    function let(ProductCatalog $productCatalog)
    {
        $this->beConstructedWith($productCatalog);
    }

    function it_prices_product_for_a_shop(ProductCatalog $productCatalog)
    {
        $this->beConstructedWith($productCatalog);
        $product = Product::named(ProductName::fromString('A product'));
        $price = Price::fromString('50000');
        $shop = Shop::named(ShopName::fromString('A shop'));
        $productCatalog->forName(ProductName::fromString('A product'))->willReturn($product);
        $this->listProductForShop($product,$price,$shop);
        
    }
}
