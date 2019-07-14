<?php


namespace DigitalCloud\Aramex\API\Classes\Rate;


class Money
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
     * @param float $value
     * @return $this
     */
    public function setValue(float $value)
    {
        $this->value = $value;
        return $this;
    }

    public function getForRequest()
    {
        return [
            'CurrencyCode' => $this->getCurrencyCode(),
            'Value' => $this->getValue()
        ];
    }
}