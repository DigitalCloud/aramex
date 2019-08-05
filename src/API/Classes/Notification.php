<?php


namespace DigitalCloud\Aramex\API\Classes;


use Illuminate\Support\Facades\Log;

class Notification
{
    private $code;
    private $message;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param object $notificationsData
     * @return self[]
     */
    public static function parseArray($notificationsData)
    {
        if (!$notificationsData || !object_get($notificationsData, 'Notification'))
            return [];

        if (is_object($notificationsData->Notification)) {
            $notificationsData = [$notificationsData->Notification];
            Log::info(1);
            Log::info(json_encode($notificationsData));
        } else {
            $notificationsData = $notificationsData->Notification;
            Log::info(2);
            Log::info(json_encode($notificationsData));
        }

        return array_map(function ($item) {
            return self::parse($item);
        }, $notificationsData);
    }

    public static function parse($item)
    {
        return (new self())->setCode(object_get($item, 'Code'))->setMessage(object_get($item, 'Message'));
    }
}