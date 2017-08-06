<?php

namespace spec;

use Price;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PriceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Price::class);
    }

    function it_is_constructed_from_string()
    {
        $this->beConstructedFromString('50000');
        $this->__toString()->shouldReturn('50000');
    }
}
