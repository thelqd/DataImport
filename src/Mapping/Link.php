<?php

namespace DataImport\Mapping;


class Link implements AnyMapping {

    /**
     * @var array
     */
    private $mapping;

    public function __construct()
    {
        $this->mapping = array(
            'favorite',
            'fromUrl',
            'toUrl',
            'anchorText',
            'linkStatus',
            'type',
            'blDom',
            'domPop',
            'power',
            'trust',
            'powerTrust',
            'alexa',
            'ip',
            'countryCode'
        );
    }

    /**
     * @return array
     */
    public function getMappings()
    {
        return $this->mapping;
    }
}