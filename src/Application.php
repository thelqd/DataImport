<?php

namespace DataImport;

use DataImport\Http\RequestInterface;
use DataImport\Http\Cli;
use DataImport\Import\Csv;
use DataImport\Collection\LinkData;
use DataImport\Database\LinkTable;
use DataImport\Database\Connection;
use DataImport\Controller\Front;

class Application {

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var Config
     */
    public $config;

    /**
     * @var Connection
     */
    public $connection;

    /**
     * @param RequestInterface $request
     * @param Config $config
     */
    public function __construct(RequestInterface $request, Config $config)
    {
        $this->request = $request;
        $this->config = $config;
        $this->connection = new Connection($this->config->get('database'));
    }

    /**
     * Runs the application
     */
    public function run()
    {
        if($this->isCommandLineInterface()) {
            try {
                $this->runImport();
            } catch(\Exception $e) {
                print $e->getMessage();
            }
        } else {
            $linkTable = new LinkTable($this->connection);
            $frontController = new Front($this->config, $linkTable);
            $frontController->render();
        }

    }

    /**
     * @return bool
     */
    private function isCommandLineInterface()
    {
        return (php_sapi_name() === 'cli');
    }

    /**
     * @return string
     */
    private function buildCsvFilePath()
    {
        $path = $this->config->get('filesystem');
        return $path['importFolder'].$this->request->getGet('file');
    }

    /**
     * @return void
     */
    private function runImport()
    {
        $this->request = new Cli();
        $filePath = $this->buildCsvFilePath();
        $linkCollection = new LinkData();

        //Get data from CSV
        $csv = new Csv($filePath);
        $csv->readFile($linkCollection);

        // save data to database
        $linkTable = new LinkTable($this->connection);
        $linkTable->save($linkCollection);
    }

}