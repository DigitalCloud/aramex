<?php


namespace DigitalCloud\Aramex\API\Classes\Rate;

class Address
{
    private $line1;
    private $line2;
    private $line3;
    private $city;
    private $stateOfProvinceCode;
    private $postCode;
    private $countryCode;

    /**
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * @param string $line1
     * @return $this
     */
    public function setLine1(string $line1)
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * @param string $line2
     * @return $this
     */
    public function setLine2(string $line2)
    {
        $this->line2 = $line2;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * @param string $line3
     * @return $this
     */
    public function setLine3(string $line3)
    {
        $this->line3 = $line3;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateOfProvinceCode()
    {
        return $this->stateOfProvinceCode;
    }

    /**
     * @param string $stateOfProvinceCode
     * @return $this
     */
    public function setStateOfProvinceCode(string $stateOfProvinceCode)
    {
        $this->stateOfProvinceCode = $stateOfProvinceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return $this
     */
    public function setPostCode(string $postCode)
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getForRequest()
    {
        return [
            'Line1' => $this->getLine1(),
            'Line2' => $this->getLine2(),
            'Line3' => $this->getLine3(),
            'City' => $this->getCity(),
            'StateOfProvinceCode' => $this->getStateOfProvinceCode(),
            'PostCode' => $this->getPostCode(),
            'CountryCode' => $this->getCountryCode()
        ];
    }
}