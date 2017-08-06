<?php

namespace spec;

use PricedProduct;
use Product;
use ProductName;
use Price;
use Shop;
use ShopName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PricedProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PricedProduct::class);
    }

    function it_is_priced_for_a_shop()
    {
        $product = Product::named(ProductName::fromString('A product'));
        $price = Price::fromString('50000');
        $shop = Shop::named(ShopName::fromString('A shop'));
        $this->beConstructedPricedForShop($product,$price,$shop);
        $this->price()->equals($price)->shouldReturn(true);
        $this->shop()->sameAs($shop)->shouldReturn(true);
    }
}
