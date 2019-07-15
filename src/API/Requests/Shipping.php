<?php


namespace DigitalCloud\Aramex\API\Requests;


use DigitalCloud\Aramex\API\Classes\LabelInfo;
use DigitalCloud\Aramex\API\Classes\Shipment;
use DigitalCloud\Aramex\API\Interfaces\Normalize;

class Shipping extends API implements Normalize
{
    private $shipments;
    private $labelInfo;

    protected $live_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/Shipping/Service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/Shipping/Service_1_0.svc?wsdl';

    public function create()
    {
        $this->validate();
        return $this->soapClient->CreateShipments($this->normalize());
    }

    protected function validate()
    {
        if (!sizeof($this->shipments)) {
            throw new \Exception('Shipments are not provided');
        }
    }

    /**
     * @return Shipment[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param Shipment[] $shipments
     * @return $this
     */
    public function setShipments(array $shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * @param Shipment $shipment
     * @return $this
     */
    public function addShipment(Shipment $shipment)
    {
        $this->shipments[] = $shipment;
        return $this;
    }

    /**
     * @return LabelInfo|null
     */
    public function getLabelInfo()
    {
        return $this->labelInfo;
    }

    /**
     * @param LabelInfo $labelInfo
     * @return $this
     */
    public function setLabelInfo(LabelInfo $labelInfo)
    {
        $this->labelInfo = $labelInfo;
        return $this;
    }

    public function normalize(): array
    {
        return array_merge([
            'Shipments' => $this->getShipments() ? array_map(function ($item) {
                return $item->normalize();
            }, $this->getShipments()) : [],
            'LabelInfo' => optional($this->getLabelInfo())->normalize(),
        ], parent::normalize());
    }
}