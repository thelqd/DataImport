<?php

namespace DataImport\Visualization;


use DataImport\Database\LinkTable;
use Khill\Lavacharts\Lavacharts;

class Chart {

    private $lavaCharts;
    private $linkTable;

    public function __construct(Lavacharts $lavaCharts, LinkTable $linkTable)
    {
        $this->lavaCharts = $lavaCharts;
        $this->linkTable = $linkTable;
    }

    public function setUpCharts()
    {
        $this->buildBlDomChart();
        $this->buildFromUrlChart();
        $this->buildLinkStatusChart();
    }
    /**
     * @return void
     */
    private function buildBlDomChart()
    {
        $blDomDataTable = $this->lavaCharts->DataTable();
        $data = $this->linkTable->getBlDomByClass();
        $blDomDataTable->addStringColumn('BlDom');
        $blDomDataTable->addNumberColumn('Count');
        foreach($data as $item) {
            $blDomDataTable->addRow(
                array(
                    $item['title'],
                    $item['count']
                )
            );
        }

        $this->lavaCharts->BarChart('BlDom')
            ->setOptions(
                array(
                    'datatable' => $blDomDataTable
                )
            );
    }

    /**
     * @return void
     */
    private function buildLinkStatusChart()
    {
        $lsDataTable = $this->lavaCharts->DataTable();
        $data = $this->linkTable->getLinkStatus();
        $lsDataTable->addStringColumn('Link Status');
        $lsDataTable->addNumberColumn('Count');
        foreach($data as $item) {
            $lsDataTable->addRow(
                array(
                    $item['linkStatus'],
                    (int)$item['countLinkStatus']
                )
            );
        }

        $this->lavaCharts->DonutChart('Link Status')
            ->setOptions(
                array(
                    'datatable' => $lsDataTable,
                    'title' => 'Count Link Status'
                )
            );
    }

    /**
     * @return void
     */
    private function buildFromUrlChart()
    {
        $fUrlDataTable = $this->lavaCharts->DataTable();
        $data = $this->linkTable->getFromUrlHosts();
        $fUrlDataTable->addStringColumn('From URL');
        $fUrlDataTable->addNumberColumn('Count');
        foreach($data as $item) {
            $fUrlDataTable->addRow(
                array(
                    $item['fromHost'],
                    (int)$item['countFrom']
                )
            );
        }

        $this->lavaCharts->DonutChart('From URL')
            ->setOptions(
                array(
                    'datatable' => $fUrlDataTable,
                    'title' => 'Form URL by Host'
                )
            );
    }
}