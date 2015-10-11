<?php

namespace DataImport\Visualization;


use Arg\Tagcloud\Tagcloud;
use DataImport\Database\LinkTable;

class Cloud {

    /**
     * @var LinkTable
     */
    private $linkTable;

    /**
     * @var Tagcloud
     */
    private $tagCloud;

    /**
     * @param Tagcloud $tagCloud
     * @param LinkTable $linkTable
     */
    public function __construct(Tagcloud $tagCloud, LinkTable $linkTable)
    {
        $this->linkTable = $linkTable;
        $this->tagCloud = $tagCloud;
    }

    /**
     * @return void
     */
    public function generateTagCloud()
    {
        $data = $this->linkTable->getGroupAnchorText();
        foreach($data->getStack() as $linkModel) {
            $this->tagCloud->addTag($linkModel->anchorText);
        }
    }
}