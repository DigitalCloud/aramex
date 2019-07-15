<?php


namespace DigitalCloud\Aramex\API\Response;


use DigitalCloud\Aramex\API\Classes\Notification;
use DigitalCloud\Aramex\API\Classes\Transaction;

abstract class Response
{
    private $transaction;
    private $notifications;
    private $hasErrors;

    /**
     * @return Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param Transaction $transaction
     * @return $this
     */
    public function setTransaction(Transaction $transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }

    /**
     * @return Notification[]
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * @param Notification[] $notifications
     * @return $this
     */
    public function setNotifications(array $notifications)
    {
        $this->notifications = $notifications;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasErrors()
    {
        return $this->hasErrors;
    }

    /**
     * @param bool $hasErrors
     * @return $this
     */
    public function setHasErrors(bool $hasErrors)
    {
        $this->hasErrors = $hasErrors;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return !$this->hasErrors;
    }

    /**
     * @return bool
     */
    public function isFail()
    {
        return $this->hasErrors;
    }

    protected function parse($obj)
    {
        $this->setHasErrors($obj->HasErrors)
            ->setTransaction(Transaction::parse($obj->Transaction))
            ->setNotifications(Notification::parseArray($obj->Notifications));

        return $this;
    }

    public static abstract function make($obj);
}