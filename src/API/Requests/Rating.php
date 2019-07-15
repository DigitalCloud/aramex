<?php


namespace DigitalCloud\Aramex\API\Requests;


use DigitalCloud\Aramex\API\Classes\Address;
use DigitalCloud\Aramex\API\Classes\ShipmentDetails;
use DigitalCloud\Aramex\API\Interfaces\Normalize;
use DigitalCloud\Aramex\API\Response\RateResponse;

class Rating extends API implements Normalize
{
    private $originalAddress;
    private $destinationAddress;
    private $shipmentDetails;
    private $preferredCurrencyCode;

    protected $live_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/RateCalculator/Service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/RateCalculator/Service_1_0.svc?wsdl';

    /**
     * @return RateResponse
     */
    public function calculate()
    {
        $this->validate();

        return RateResponse::make($this->soapClient->CalculateRate($this->normalize()));
    }

    /**
     * @return Address
     */
    public function getOriginalAddress()
    {
        return $this->originalAddress;
    }

    /**
     * @param Address $originalAddress
     * @return $this
     */
    public function setOriginalAddress(Address $originalAddress)
    {
        $this->originalAddress = $originalAddress;
        return $this;
    }

    /**
     * @return Address
     */
    public function getDestinationAddress()
    {
        return $this->destinationAddress;
    }

    /**
     * @param Address $destinationAddress
     * @return $this
     */
    public function setDestinationAddress(Address $destinationAddress)
    {
        $this->destinationAddress = $destinationAddress;
        return $this;
    }

    /**
     * @return ShipmentDetails
     */
    public function getShipmentDetails()
    {
        return $this->shipmentDetails;
    }

    /**
     * @param ShipmentDetails $shipmentDetails
     * @return $this
     */
    public function setShipmentDetails(ShipmentDetails $shipmentDetails)
    {
        $this->shipmentDetails = $shipmentDetails;
        return $this;
    }


    /**
     * @return string
     */
    public function getPreferredCurrencyCode()
    {
        return $this->preferredCurrencyCode;
    }

    /**
     * @param string $preferredCurrencyCode
     * @return $this
     */
    public function setPreferredCurrencyCode(string $preferredCurrencyCode)
    {
        $this->preferredCurrencyCode = $preferredCurrencyCode;
        return $this;
    }

    protected function validate()
    {
        Parent::validate();

        if (!$this->originalAddress) {
            throw new \Exception('Origin Address not provided');
        }

        if (!$this->destinationAddress) {
            throw new \Exception('Destination Address not provided');
        }

        if (!$this->shipmentDetails) {
            throw new \Exception('Shipment Details not provided');
        }
    }

    public function normalize(): array
    {
        return array_merge([
            'OriginAddress' => $this->getOriginalAddress()->normalize(),
            'DestinationAddress' => $this->getDestinationAddress()->normalize(),
            'ShipmentDetails' => $this->getShipmentDetails()->normalize(),
            'PreferredCurrencyCode' => $this->getPreferredCurrencyCode()
        ], parent::normalize());
    }

}