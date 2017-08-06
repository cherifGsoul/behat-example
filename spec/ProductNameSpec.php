<?php

namespace spec;

use ProductName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductNameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProductName::class);
    }

    function it_can_be_instantiated_from_string()
    {
        $this->beConstructedFromString('Samsung S8');
        $this->__toString()->shouldReturn('Samsung S8');
    }
}
