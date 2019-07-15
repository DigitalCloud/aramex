<?php


namespace DigitalCloud\Aramex\API\Requests;


use DigitalCloud\Aramex\API\Interfaces\Normalize;

class Tracking extends API implements Normalize
{
    private $shipments;

    protected $live_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/tracking/Service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/tracking/Service_1_0.svc?wsdl';

    public function track()
    {
        $this->validate();

        return $this->soapClient->TrackShipments($this->normalize());
    }

    /**
     * @return array
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param array $shipments
     * @return $this
     */
    public function setShipments(array $shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * @param string $shipment
     * @return $this
     */
    public function addShipment(string $shipment)
    {
        $this->shipments[] = $shipment;
        return $this;
    }

    protected function validate()
    {
        if (!sizeof($this->shipments)) {
            throw new \Exception('Shipments are not provided');
        }
    }

    public function normalize(): array
    {
        return array_merge([
            'Shipments' => $this->getShipments()
        ], parent::normalize());
    }

}