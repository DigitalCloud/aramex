<?php


namespace DigitalCloud\Aramex\API\Classes;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

class Address implements Normalize
{
    private $line1;
    private $line2;
    private $line3;
    private $city;
    private $stateOfProvinceCode;
    private $postCode;
    private $countryCode;
    private $longitude;
    private $latitude;
    private $buildingNumber;
    private $buildingName;
    private $floor;
    private $apartment;
    private $poBox;
    private $description;

    /**
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Additional Address information, such as the building number, block, street name.
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
     * Additional Address information.
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
     * Additional Address information.
     * @param string $line3
     * @return $this
     */
    public function setLine3(string $line3)
    {
        $this->line3 = $line3;
        return $this;
    }

    /**
     * Address City. Conditional: Required if the post code is not given.
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
     * Address State or province code. Required if The country code and city require a State or Province Code
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
     * Postal Code, if there is a postal code in the country code and city then it must be given.
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
     * 2-Letter Standard ISO Country Code.
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return $this
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return $this
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * @param string $buildingNumber
     * @return $this
     */
    public function setBuildingNumber(string $buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildingName()
    {
        return $this->buildingName;
    }

    /**
     * @param string $buildingName
     * @return $this
     */
    public function setBuildingName(string $buildingName)
    {
        $this->buildingName = $buildingName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param int $floor
     * @return $this
     */
    public function setFloor(int $floor)
    {
        $this->floor = $floor;
        return $this;
    }

    /**
     * @return string
     */
    public function getApartment()
    {
        return $this->apartment;
    }

    /**
     * /**
     * @param string $apartment
     * @return $this
     */
    public function setApartment(string $apartment)
    {
        $this->apartment = $apartment;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoBox()
    {
        return $this->poBox;
    }

    /**
     * @param string $poBox
     * @return $this
     */
    public function setPoBox(string $poBox)
    {
        $this->poBox = $poBox;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }


    public function normalize(): array
    {
        return [
            'Line1' => $this->getLine1(),
            'Line2' => $this->getLine2(),
            'Line3' => $this->getLine3(),
            'City' => $this->getCity(),
            'StateOfProvinceCode' => $this->getStateOfProvinceCode(),
            'PostCode' => $this->getPostCode(),
            'CountryCode' => $this->getCountryCode(),
            'Longitude' => $this->getLongitude(),
            'Latitude' => $this->getLatitude(),
            'BuildingNumber' => $this->getBuildingNumber(),
            'BuildingName' => $this->getBuildingName(),
            'POBox' => $this->getPoBox(),
            'Description' => $this->getDescription(),
            'Apartment' => $this->getApartment(),
            'Floor' => $this->getFloor(),
        ];
    }
}