<?php


namespace DigitalCloud\Aramex\API\Classes;


use DigitalCloud\Aramex\API\Interfaces\Normalize;

class Weight implements Normalize
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
     * Unit of the weight
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
     * Shipment weight.
    If the Data Entity ‘Dimensions’ are filled, charging weight is compared to actual and the highest value is filled here.
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

    public function normalize(): array
    {
        return [
            'Unit' => $this->getUnit(),
            'Value' => $this->getValue()
        ];
    }
}