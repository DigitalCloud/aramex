<?php


namespace DigitalCloud\Aramex\API\Classes\Rate;


class Weight
{
    private $unit;
    private $value;

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     * @return $this
     */
    public function setUnit(string $unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return float
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

    /**
     * Kilogram
     * @return Weight
     */
    public function useKilogramAsUnit()
    {
        return $this->setUnit('KG');
    }

    /**
     * Pound
     * @return Weight
     */
    public function usePoundAsUnit()
    {
        return $this->setUnit('LB');
    }

    public function getForRequest()
    {
        return [
            'Unit' => $this->getUnit(),
            'Value' => $this->getValue()
        ];
    }
}