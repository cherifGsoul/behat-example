<?php

namespace spec;

use ContactInformation;
use Mobile;
use Address;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContactInformationSpec extends ObjectBehavior
{
    function it_has_mobile_and_address()
    {
        $mobile = Mobile::fromString('0774804851');
        $address = new Address('nowhere he we go','23','El Bouni');
        $this->beConstructedWith($mobile,$address);
        $this->mobile()->shouldReturn($mobile);
        $this->address()->shouldReturn($address);
    }
}
