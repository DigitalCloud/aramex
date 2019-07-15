<?php


namespace DigitalCloud\Aramex\API\Classes;


use DigitalCloud\Aramex\API\Interfaces\Normalize;

class ShipmentItem implements Normalize
{

    private $packageType;
    private $quantity;
    private $weight;
    private $comments;
    private $reference;

    /**
     * @return string
     */
    public function getPackageType()
    {
        return $this->packageType;
    }

    /**
     * Type of packaging, for example. Cans, bottles, degradable Plastic. Conditional: If any of the Item element values are filled then the rest must be filled.
     * @param string $packageType
     * @return $this
     */
    public function setPackageType(string $packageType)
    {
        $this->packageType = $packageType;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Number of items
     * @param int $quantity
     * @return $this
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return Weight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Total Weight of the Items
     * @param Weight $weight
     * @return $this
     */
    public function setWeight(Weight $weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Additional Comments or Information about the items
     * @param string $comments
     * @return $this
     */
    public function setComments(string $comments)
    {
        $this->comments = $comments;
        return $this;
    }


    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return $this
     */
    public function setReference(string $reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return [
            'PackageType' => $this->getPackageType(),
            'Quantity' => $this->getQuantity(),
            'Weight' => optional($this->getWeight())->normalize(),
            'Comments' => $this->getComments(),
            'Reference' => $this->getReference()
        ];
    }
}