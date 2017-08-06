<?php

namespace spec;

use Product;
use ProductName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Product::class);
    }

    function it_should_be_constructed_by_a_name()
    {
        $this->beConstructedNamed(ProductName::fromString('A product name'));
        $this->__toString()->shouldReturn('A product name');
    }
}
