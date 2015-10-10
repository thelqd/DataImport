<?php

namespace DataImport\Collection;

use DataImport\Model\AnyModel;
use DataImport\Model\LinkData as LinkModel;

class LinkData implements AnyCollection {

    /**
     * @var array
     */
    private $stack;

    public function __construct()
    {
        $this->stack = array();
    }

    /**
     * @param LinkModel $linkModel
     */
    public function addModel(AnyModel $linkModel)
    {
        $this->stack[] = $linkModel;
    }

    /**
     * @return LinkModel[]
     */
    public function getStack()
    {
        return $this->stack;
    }

    /**
     * @return void
     */
    public function resetStack()
    {
        $this->stack = array();
    }
}