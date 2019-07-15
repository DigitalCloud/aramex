<?php


namespace DigitalCloud\Aramex\API\Classes;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

class Party implements Normalize
{
    private $reference1;
    private $reference2;
    private $accountNumber;
    private $partyAddress;
    private $contact;

    /**
     * @return string
     */
    public function getReference1()
    {
        return $this->reference1;
    }

    /**
     * Any details the client would like to add that will be sent back in the response.
     * @param string $reference1
     * @return $this
     */
    public function setReference1(string $reference1)
    {
        $this->reference1 = $reference1;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference2()
    {
        return $this->reference2;
    }

    /**
     * Any details the client would like to add that will be sent back in the response.
     * @param string $reference2
     * @return $this
     */
    public function setReference2(string $reference2)
    {
        $this->reference2 = $reference2;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * The Same Account number entered in the Client Info
     * @param string $accountNumber
     * @return $this
     */
    public function setAccountNumber(string $accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

//    public function useClientAccountNumberasAccountNumber()
//    {
//        return $this->setAccountNumber('');
//    }

    /**
     * @return Address
     */
    public function getPartyAddress()
    {
        return $this->partyAddress;
    }

    /**
     * @param Address $partyAddress
     * @return $this
     */
    public function setPartyAddress(Address $partyAddress)
    {
        $this->partyAddress = $partyAddress;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return $this
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return [
            'Reference1' => $this->getReference1(),
            'Reference2' => $this->getReference2(),
            'AccountNumber' => $this->getAccountNumber(),
            'PartyAddress' => optional($this->getPartyAddress())->normalize(),
            'Contact' => optional($this->getContact())->normalize()
        ];
    }
}