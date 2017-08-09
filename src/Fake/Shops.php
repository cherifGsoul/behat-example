<?php

namespace Fake;

class Shops implements \Shops
{
    private $shops;

    public function add(Shop $shop)
    {
        $this->shops[] = $shops;
    }

    public function all()
    {
        return $shops;
    }
}