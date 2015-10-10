<?php


namespace DataImport\Database;


abstract class AbstractTable implements AnyTable {

    /**
     * @var \Doctrine\DBAL\Query\QueryBuilder
     */
    protected $queryBuilder;

    /**
     * @var Connection
     */
    protected $connection;

    public function __construct(Connection $conn)
    {
        $this->connection = $conn;
        $this->queryBuilder = $conn->getConnection()->createQueryBuilder();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return array();
    }
}