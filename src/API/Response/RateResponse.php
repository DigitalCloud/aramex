<?php


namespace DigitalCloud\Aramex\API\Response;


use DigitalCloud\Aramex\API\Classes\Money;

class RateResponse extends Response
{
    private $totalAmount;

    /**
     * @return Money
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param Money $totalAmount
     * @return $this
     */
    public function setTotalAmount(Money $totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @param $obj
     * @return self
     */
    protected function parse($obj)
    {
        parent::parse($obj);

        $this->setTotalAmount(Money::parse($obj->TotalAmount));

        return $this;
    }

    public static function make($obj)
    {
        return (new self())->parse($obj);
    }
}