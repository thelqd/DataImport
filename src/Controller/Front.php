<?php

namespace DataImport\Controller;

use Arg\Tagcloud\Tagcloud;
use DataImport\Config;
use DataImport\Database\LinkTable;
use DataImport\Visualization\Cloud;
use Khill\Lavacharts\Lavacharts;
use League\Plates\Engine;
use DataImport\Visualization\Chart;

class Front {

    /**
     * @var LinkTable
     */
    private $linkTable;

    /**
     * @var Engine
     */
    private $template;

    /**
     * @var Lavacharts
     */
    private $lavaCharts;

    /**
     * @var Tagcloud
     */
    private $tagCloud;

    /**
     * @param Config $config
     * @param LinkTable $linkTable
     */
    public function __construct(Config $config, LinkTable $linkTable)
    {
        $this->linkTable = $linkTable;
        $path = $config->get('filesystem');
        $this->template = new Engine($path['templateFolder']);
        date_default_timezone_set('UTC');
        $this->lavaCharts = new Lavacharts();
        $this->tagCloud = new Tagcloud();
    }

    /**
     * @return void
     */
    public function render()
    {
        $chart = new Chart($this->lavaCharts, $this->linkTable);
        $chart->setUpCharts();
        $cloud = new Cloud($this->tagCloud, $this->linkTable);
        $cloud->generateTagCloud();
        echo $this->template->render(
            'index',
            [
                'charts' => $this->lavaCharts,
                'tagCloud' => $this->tagCloud
            ]
        );

    }
}