<?php


namespace DigitalCloud\Aramex\API\Classes;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

class Transaction implements Normalize
{
    private $reference1;
    private $reference2;
    private $reference3;
    private $reference4;
    private $reference5;

    /**
     * @return string
     */
    public function getReference1()
    {
        return $this->reference1;
    }

    /**
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
        return $this->reference1;
    }

    /**
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
    public function getReference3()
    {
        return $this->reference3;
    }

    /**
     * @param string $reference3
     * @return $this
     */
    public function setReference3(string $reference3)
    {
        $this->reference3 = $reference3;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference4()
    {
        return $this->reference4;
    }

    /**
     * @param string $reference4
     * @return $this
     */
    public function setReference4(string $reference4)
    {
        $this->reference4 = $reference4;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference5()
    {
        return $this->reference5;
    }

    /**
     * @param string $reference5
     * @return $this
     */
    public function setReference5(string $reference5)
    {
        $this->reference5 = $reference5;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'Reference1' => $this->getReference1(),
            'Reference2' => $this->getReference2(),
            'Reference3' => $this->getReference3(),
            'Reference4' => $this->getReference4(),
            'Reference5' => $this->getReference5()
        ];
    }

    /**
     * @param $obj
     * @return Transaction
     */
    public static function parse($obj)
    {
        if (!$obj)
            return new self();

        return (new self())->setReference1($obj->Reference1)->setReference2($obj->Reference2)
            ->setReference3($obj->Reference3)->setReference4($obj->Reference4)->setReference5($obj->Reference4);
    }
}