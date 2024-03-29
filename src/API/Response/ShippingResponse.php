<?php


namespace DigitalCloud\Aramex\API\Response;


use DigitalCloud\Aramex\API\Classes\Notification;
use DigitalCloud\Aramex\API\Classes\Shipment;

class ShippingResponse extends Response
{
    private $shipments;

    /**
     * @return Shipment[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    public function setShipments($shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * @param object $obj
     * @return self
     */
    protected function parse($obj)
    {
        parent::parse($obj);

        if ($obj->Shipments->ProcessedShipment->Notifications) {
            $newNotifications = Notification::parseArray($obj->Shipments->ProcessedShipment->Notifications);
            if ($newNotifications) {
                $this->setHasErrors(true)
                    ->addNotifications($newNotifications);
            }
        }

        $this->setShipments([$obj->Shipments->ProcessedShipment]);

        return $this;
    }

    /**
     * @param object $obj
     * @return RateResponse
     */
    public static function make($obj)
    {
        return (new self())->parse($obj);
    }

}