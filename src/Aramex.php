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
    public static function ratting()
    {
        return new Rating();
    }

    public static function shipping()
    {
        return new Shipping();
    }

    public static function tracking()
    {
        return new Tracking();
    }
}