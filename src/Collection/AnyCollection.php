<?php

namespace DataImport\Collection;

use DataImport\Model\AnyModel;

interface AnyCollection {

    /**
     * @param AnyModel $model
     * @return void
     */
    public function addModel(AnyModel $model);

    /**
     * @return AnyModel[]
     */
    public function getStack();
}