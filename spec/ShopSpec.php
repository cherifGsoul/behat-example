<?php

namespace spec;

use Shop;
use ShopName;
use ProductName;
use Product;
use Price;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ShopSpec extends ObjectBehavior
{
    function it_should_be_named()
    {
        $this->beConstructedNamed(ShopName::fromString('A shop'));
        $this->__toString()->shouldReturn('A shop');
    }

    function it_adds_priced_products()
    {
        $this->beConstructedNamed(ShopName::fromString('A shop'));
        $product = Product::named(ProductName::fromString('A product'));
        $this->addPricedProduct($product, Price::fromString('50000'));
        $this->shouldHaveProducts();
    }

    function it_is_countable()
    {
        $this->shouldImplement(\Countable::class);
    }

    function it_knows_the_count_of_its_products()
    {
        $this->beConstructedNamed(ShopName::fromString('A shop'));
        $product = Product::named(ProductName::fromString('A product'));
        $this->addPricedProduct($product, Price::fromString('50000'));
        $this->shouldHaveCount(1);
    }

    function it_knows_if_it_has_a_product()
    {
        $this->beConstructedNamed(ShopName::fromString('A shop'));
        $product = Product::named(ProductName::fromString('A product'));
        $this->addPricedProduct($product, Price::fromString('50000'));
        $this->shouldHaveProduct($product);
    }

    function it_unlists_product_from_priced_product()
    {
        $this->beConstructedNamed(ShopName::fromString('A shop'));
        $product = Product::named(ProductName::fromString('A product'));
        $this->addPricedProduct($product, Price::fromString('50000'));
        $this->unlistProduct($product);
        $this->shouldNotHaveProduct($product);

    }


}
