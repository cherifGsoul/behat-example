<?php

namespace spec;

use ShopName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ShopNameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ShopName::class);
    }

    function it_can_created_from_string()
    {
        $this->beConstructedFromString('A shop');
        $this->__toString()->shouldReturn('A shop');
    }
}
