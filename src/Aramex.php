<?php


namespace DigitalCloud\Aramex;


use DigitalCloud\Aramex\API\Rating;
use DigitalCloud\Aramex\API\Shipping;
use DigitalCloud\Aramex\API\Tracking;

class Aramex
{
    /**
     * @param bool $live
     * @return Rating
     */
    public static function ratting(bool $live= true)
    {
        return new Rating($live);
    }

    public static function shipping(bool $live= true)
    {
        return new Shipping($live);
    }

    public static function tracking(bool $live= true)
    {
        return new Tracking($live);
    }
}