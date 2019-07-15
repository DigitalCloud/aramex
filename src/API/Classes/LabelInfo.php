<?php


namespace DigitalCloud\Aramex\API\Classes;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

class LabelInfo implements Normalize
{
    private $reportId;
    private $reportType;


    /**
     * @return int
     */
    public function getReportId()
    {
        return $this->reportId;
    }

    /**
     * The Template of the report to be generated.
     * @param int $reportId
     * @return $this
     */
    public function setReportId(int $reportId)
    {
        $this->reportId = $reportId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportType()
    {
        return $this->reportType;
    }

    /**
     * Either by URL or a streamed file (RPT).   URL by Default
     * @param string $reportType
     * @return $this
     */
    public function setReportType(string $reportType)
    {
        $this->reportType = $reportType;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'ReportID' => $this->getReportId(),
            'ReportType' => $this->getReportType()
        ];
    }
}