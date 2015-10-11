<?php

use DataImport\Model\LinkData;

class LinkDataTest extends \PHPUnit_Framework_TestCase
{
    private $linkData;

    private $mockData;

    public function setUp()
    {
        $this->linkData = new LinkData();
        $this->mockData = array(
            'blDom' => '1,000,000',
            'power' => '2,345,123.55',
            'linkStatus' => 'test'
        );
    }
    public function testSetData()
    {
        $this->linkData->setData($this->mockData);
        $this->assertEquals('test', $this->linkData->linkStatus);
        $this->assertEquals(1000000, $this->linkData->blDom);
        $this->assertEquals(2345123, $this->linkData->power);
    }

    public function testIfInstanceOfLinkData()
    {
        $this->assertInstanceOf('DataImport\Model\LinkData', $this->linkData);
    }
}