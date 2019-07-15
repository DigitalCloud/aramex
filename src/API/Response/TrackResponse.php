<?php


namespace DigitalCloud\Aramex\API\Response;


class TrackResponse extends Response
{
    private $results;

    /**
     * @return mixed
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param $results
     * @return $this
     */
    public function setResults($results)
    {
        $this->results = $results;
        return $this;
    }

    /**
     * @param object $obj
     * @return self
     */
    protected function parse($obj)
    {
        parent::parse($obj);


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