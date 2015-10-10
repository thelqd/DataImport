<?php

namespace DataImport\Database;


use DataImport\Collection\AnyCollection;

interface AnyTable {

    /**
     * @param AnyCollection $collection
     * @return void
     */
    public function save(AnyCollection $collection);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @return AnyCollection
     */
    public function getCollection();

}