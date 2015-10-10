<?php

namespace DataImport\Import;

use DataImport\Mapping\Link;
use DataImport\Model\LinkData as LinkModel;
use DataImport\Collection\LinkData as LinkCollection;


class Csv {

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var resource
     */
    private $fileHandle;

    /**
     * @var array
     */
    private $mapping;

    public function __construct($fileName)
    {
        $this->setFileName($fileName);
        $mapping = new Link();
        $this->mapping = $mapping->getMappings();
    }

    /**
     * @param $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function readFile(LinkCollection $linkCollection)
    {
        $this->generateFileHandle();
        // Read first line with titles
        fgetcsv($this->fileHandle, 1000, ",");
        while (($data = fgetcsv($this->fileHandle, 1000, ",")) !== FALSE) {
            $linkData = array();
            foreach($data as $key => $value)
            {
                $linkData[$this->mapping[$key]] = $value;
            }
            $link = new LinkModel($linkData);
            $linkCollection->addModel($link);
        }
        $this->closeFileHandle();

    }

    /**
     * Generates file handle
     */
    private function generateFileHandle()
    {
        $this->fileHandle = fopen($this->fileName, 'r');
        if($this->fileHandle === false) {
            throw new \RuntimeException('Could not generate file pointer');
        }
    }

    /**
     * closes file handle
     */
    private function closeFileHandle()
    {
        fclose($this->fileHandle);
    }
}