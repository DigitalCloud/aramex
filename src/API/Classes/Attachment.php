<?php


namespace DigitalCloud\Aramex\API\Classes;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

class Attachment implements Normalize
{
    private $fileName;
    private $fileExtension;
    private $fileContent;

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * The file name without its extension.
     * @param string $fileName
     * @return $this
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }

    /**
     * The extension of the file. Our system accepts any extension
     * @param string $fileExtension
     * @return $this
     */
    public function setFileExtension(string $fileExtension)
    {
        $this->fileExtension = $fileExtension;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileContent()
    {
        return $this->fileContent;
    }

    /**
     * Contents of the file.
     * @param $fileContent
     * @return $this
     */
    public function setFileContent(string $fileContent)
    {
        $this->fileContent = $fileContent;
        return $this;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return [
            'FileName' => $this->getFileName(),
            'FileExtension' => $this->getFileExtension(),
            'FileContent' => $this->getFileContent()
        ];
    }
}