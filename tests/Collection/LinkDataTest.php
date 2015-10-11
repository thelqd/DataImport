<?php

use DataImport\Collection\LinkData;
use DataImport\Model\LinkData as LinkModel;

class LinkDataCollectionTest extends \PHPUnit_Framework_TestCase
{
    private $linkData;

    public function setUp()
    {
        $this->linkData = new LinkData();
    }

    public function testIfInstanceOfAnyCollection()
    {
        $this->assertInstanceOf(
            'DataImport\Collection\AnyCollection',
            $this->linkData
        );
    }

    public function testAddModel()
    {
        $this->linkData->addModel(new LinkModel());
        $this->assertCount(1, $this->linkData->getStack());
    }

    public function testGetStack()
    {
        $this->assertInternalType('array', $this->linkData->getStack());
    }

    public function testResetStack()
    {
        $this->linkData->addModel(new LinkModel());
        $this->linkData->addModel(new LinkModel());
        $this->linkData->addModel(new LinkModel());
        $this->linkData->resetStack();
        $this->assertCount(0, $this->linkData->getStack());
    }

}