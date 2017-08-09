<?php

namespace spec;

use Mobile;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MobileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Mobile::class);
    }

    function it_can_constructed_from_string()
    {
        $this->beConstructedFromString('0774804851');
        $this->__toString()->shouldReturn('0774804851');
    }
}
