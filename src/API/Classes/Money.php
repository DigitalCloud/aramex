<?php


namespace DigitalCloud\Aramex\API\Classes;


use DigitalCloud\Aramex\API\Interfaces\Normalize;

class Money implements Normalize
{
    private $currencyCode;
    private $value;

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * 3-Letter Standard ISO Currency Code
     * @param string $currencyCode
     * @return $this
     */
    public function setCurrencyCode(string $currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * United States Dollar
     * @return Money
     */
    public function useUnitedStatesDollarAsCurrency()
    {
        return $this->setCurrencyCode('USD');
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * The Monetary value.
     * @param float $value
     * @return $this
     */
    public function setValue(float $value)
    {
        $this->value = $value;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'CurrencyCode' => $this->getCurrencyCode(),
            'Value' => $this->getValue()
        ];
    }

    /**
     * @param object $obj
     * @return Money
     */
    public static function parse($obj)
    {
        if (!$obj)
            return new self();

        return (new self())->setCurrencyCode(object_get($obj, "CurrencyCode"))->setValue(object_get($obj, "Value"));
    }
}