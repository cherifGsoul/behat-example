<?php

namespace spec;

use Address;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddressSpec extends ObjectBehavior
{
    function it_has_a_street_wilaya_city()
    {
        $this->beConstructedWith('nowhere he we go','23','El Bouni');
        $this->street()->shouldReturn('nowhere he we go');
        $this->wilaya()->shouldReturn('23');
        $this->city()->shouldReturn('El Bouni');
    }
}
