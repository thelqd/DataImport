<?php

namespace DataImport\Model;


interface AnyModel {

    /**
     * @param array $data
     * @return mixed
     */
    public function setData(array $data);
}