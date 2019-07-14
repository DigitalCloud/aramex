<?php


namespace DigitalCloud\Aramex\API;


use DigitalCloud\Aramex\API\Classes\Rate\Address;
use DigitalCloud\Aramex\API\Classes\Rate\ShipmentDetails;

class Rating extends API
{
    private $originalAddress;
    private $destinationAddress;
    private $shipmentDetails;

    protected $live_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/RateCalculator/Service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/ShippingAPI.V2/RateCalculator/Service_1_0.svc?wsdl';

    public function calculate()
    {
        $this->validate();
        return $this->soapClient->CalculateRate($this->getForRequest());
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

    public function getForRequest()
    {
        return array_merge([
            'OriginAddress' => $this->getOriginalAddress()->getForRequest(),
            'DestinationAddress' => $this->getDestinationAddress()->getForRequest(),
            'ShipmentDetails' => $this->getShipmentDetails()->getForRequest()
        ], parent::getForRequest());
    }
}