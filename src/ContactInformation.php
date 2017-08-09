<?php

class ContactInformation
{
    private $mobile;
    private $address;

    public function __construct(Mobile $mobile, Address $address)
    {
        $this->mobile = $mobile;
        $this->address = $address;
    }

    public function mobile()
    {
        return $this->mobile;
    }

    public function address()
    {
        return $this->address;
    }
}
