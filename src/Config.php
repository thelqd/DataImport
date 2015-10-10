<?php

namespace DataImport;


class Config {

    /**
     * @var String
     */
    private $iniFile;

    /**
     * @var array
     */
    private $data;

    public function __construct($iniFile)
    {
        $this->setIniFile($iniFile);
        $this->readIni();
    }

    /**
     * @param $iniFile
     * @throws \InvalidArgumentException
     */
    public function setIniFile($iniFile)
    {
        if(file_exists($iniFile)) {
            $this->iniFile = $iniFile;
        } else {
            throw new \InvalidArgumentException('Ini file not found');
        }
    }

    /**
     * Reds given ini file
     */
    private function readIni()
    {
        $this->data = parse_ini_file($this->iniFile, true);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if(array_key_exists($key, $this->data)) {
            return $this->data[$key];
        } else {
            throw new \InvalidArgumentException('Key not found in config');
        }
    }

}