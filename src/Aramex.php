<?php


namespace DigitalCloud\Aramex;


use DigitalCloud\Aramex\API\Requests\Rating;
use DigitalCloud\Aramex\API\Requests\Shipping;
use DigitalCloud\Aramex\API\Requests\Tracking;

class Aramex
{
    /**
     * @param bool $live
     * @return Rating
     */
    public static function ratting(bool $live= false)
    {
        return new Rating($live);
    }

    public static function shipping(bool $live= false)
    {
        return new Shipping($live);
    }

    public static function tracking(bool $live= false)
    {
        return new Tracking($live);
    }
}