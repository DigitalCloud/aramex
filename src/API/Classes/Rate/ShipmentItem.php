<?php


namespace DigitalCloud\Aramex\API\Classes\Rate;


class ShipmentItem
{

    private $packageType;
    private $quantity;
    private $weight;
    private $comments;

    /**
     * @return string
     */
    public function getPackageType()
    {
        return $this->packageType;
    }

    /**
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
     * @param string $comments
     * @return $this
     */
    public function setComments(string $comments)
    {
        $this->comments = $comments;
        return $this;
    }

    public function getForRequest()
    {
        return [
            'PackageType' => $this->getPackageType(),
            'Quantity' => $this->getQuantity(),
            'Weight' => optional($this->getWeight())->getForRequest(),
            'Comments' => $this->getComments()
        ];
    }
}