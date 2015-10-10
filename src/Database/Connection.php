<?php

namespace DataImport\Database;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class Connection {

    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $connection;

    /**
     * @param array $connectionData
     * @throws \Doctrine\DBAL\DBALException
     */
    public function __construct(array $connectionData)
    {
        $config = new Configuration();

        $this->connection = DriverManager::getConnection(
            $connectionData,
            $config
        );
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}