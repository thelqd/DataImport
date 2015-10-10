<?php

namespace DataImport\Http;


class Cli implements RequestInterface {

    /**
     * @var array
     */
    private $arguments = array();

    public function __construct()
    {
        $this->setCliArgs();
    }

    /**
     * Sets CLI Arguments
     */
    private function setCliArgs()
    {
        global $argc, $argv;
        if ($argc != 2) {
            throw new \InvalidArgumentException('No input file given');
        }
        $this->arguments['file'] = $argv[1];
    }

    public function getVar($mode, $key, $default = '') {
        if(isset($this->arguments[$key])) {
            return $this->arguments[$key];
        } else {
            return $default;
        }
    }

    public function getGet($key, $default = '')
    {
        return $this->getVar('', $key, $default);
    }

    public function getPost($key, $default = '')
    {
        return $this->getVar('', $key, $default);
    }
}