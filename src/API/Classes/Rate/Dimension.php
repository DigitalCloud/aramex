<?php


namespace DigitalCloud\Aramex\API\Classes\Rate;


class Dimension
{
    private $length;
    private $width;
    private $height;
    private $unit;

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @return $this
     */
    public function setLength(float $length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @return $this
     */
    public function setWidth(float $width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @return $this
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
        return $this;
    }

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
     * Centimeter
     * @return $this
     */
    public function useCentimeterAsUnit()
    {
        return $this->setUnit('CM');
    }

    /**
     * Meter
     * @return $this
     */
    public function useMeterAsUnit()
    {
        return $this->setUnit('M');
    }

    public function getForRequest()
    {
        return [
            'Length' => $this->getLength(),
            'Width' => $this->getWidth(),
            'Height' => $this->getHeight(),
            'Unit' => $this->getUnit()
        ];
    }
}