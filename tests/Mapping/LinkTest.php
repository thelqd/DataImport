<?php

use DataImport\Mapping\Link;

class LinkTest extends \PHPUnit_Framework_TestCase
{
    private $link;

    public function setUp()
    {
        $this->link = new Link();
    }

    public function testGetMappings()
    {
        $this->assertInternalType('array', $this->link->getMappings());
    }
}