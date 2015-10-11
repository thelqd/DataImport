<?php

namespace DataImport\Database;

use DataImport\Collection\AnyCollection;
use DataImport\Collection\LinkData as LinkCollection;
use DataImport\Model\LinkData as LinkModel;

class LinkTable extends AbstractTable {

    public function __construct(Connection $connection)
    {
        parent::__construct($connection);
    }

    /**
     * Get all Models from collection and save them to database
     *
     * @param AnyCollection $collection
     */
    public function save(AnyCollection $collection)
    {
        foreach($collection->getStack() as $model) {
            $this->queryBuilder
                ->insert('link')
                ->values(
                    array(
                        'favorite'      => '?',
                        'fromUrl'       => '?',
                        'toUrl'         => '?',
                        'anchorText'    => '?',
                        'linkStatus'    => '?',
                        'type'          => '?',
                        'blDom'         => '?',
                        'domPop'        => '?',
                        'power'         => '?',
                        'trust'         => '?',
                        'powerTrust'    => '?',
                        'alexa'         => '?',
                        'ip'            => '?',
                        'countryCode'   => '?'
                    )
                )
                ->setParameter(0, $model->favorite)
                ->setParameter(1, $model->fromUrl)
                ->setParameter(2, $model->toUrl)
                ->setParameter(3, $model->anchorText)
                ->setParameter(4, $model->linkStatus)
                ->setParameter(5, $model->type)
                ->setParameter(6, $model->blDom)
                ->setParameter(7, $model->domPop)
                ->setParameter(8, $model->power)
                ->setParameter(9, $model->trust)
                ->setParameter(10, $model->powerTrust)
                ->setParameter(11, $model->alexa)
                ->setParameter(12, $model->ip)
                ->setParameter(13, $model->countryCode);

            $this->queryBuilder->execute();
        }
    }

    public function getAll()
    {
        $this->queryBuilder
            ->select('*')
            ->from('link');

        $result = $this->queryBuilder->execute();
        return $result->fetchAll();
    }

    /**
     * @return LinkCollection
     */
    public function getCollection()
    {
        $linkCollection = new LinkCollection();
        $data = $this->getAll();
        foreach($data as $row) {
            $model = new LinkModel();
            $model->setData($row);
            $linkCollection->addModel($model);
        }
        return $linkCollection;
    }

    /**
     * @return LinkCollection
     */
    public function getGroupAnchorText()
    {
        $linkCollection = new LinkCollection();
        $this->queryBuilder
            ->select('LOWER(anchorText) as anchorText')
            ->from('link')
            ->groupBy('anchorText');
        $result = $this->queryBuilder->execute()->fetchAll();
        $this->addToCollection($linkCollection, $result);
        return $linkCollection;
    }

    /**
     * @return array
     */
    public function getLinkStatus()
    {
        $this->queryBuilder
            ->select('linkStatus, COUNT(linkStatus) as countLinkStatus')
            ->from('link')
            ->groupBy('linkStatus');
        return $this->queryBuilder->execute()->fetchAll();
    }

    /**
     * @return array
     */
    public function getFromUrlHosts()
    {
        $this->queryBuilder
            ->select("SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(fromUrl, '://', -1),'/',1),'www.', -1) as fromHost, COUNT(*) as countFrom")
            ->from('link')
            ->groupBy('fromHost');
        return $this->queryBuilder->execute()->fetchAll();
    }

    /**
     * @return array
     */
    public function getBlDomByClass()
    {
        $classes = array(
            array(
                'title' => '0',
                'count' => 0
            ),
            array(
                'title' => '1 - 10',
                'count' => 0
            ),
            array(
                'title' => '11 - 100',
                'count' => 0
            ),
            array(
                'title' => '< 1,000',
                'count' => 0
            ),
            array(
                'title' => '< 100,000',
                'count' => 0
            ),
            array(
                'title' => '> 100,000',
                'count' => 0
            )
        );
        $this->queryBuilder
            ->select('blDom')
            ->from('link')
            ->groupBy('blDom');
        $result = $this->queryBuilder->execute()->fetchAll();
        foreach($result as $row) {
            if($row['blDom'] == 0) {
                $classes[0]['count']++;
            } elseif($row['blDom'] <= 10) {
                $classes[1]['count']++;
            } elseif($row['blDom'] <= 100) {
                $classes[2]['count']++;
            } elseif($row['blDom'] < 1000) {
                $classes[3]['count']++;
            } elseif($row['blDom'] < 100000) {
                $classes[4]['count']++;
            } else {
                $classes[5]['count']++;
            }
        }
        return $classes;
    }

    /**
     * @param LinkCollection $linkCollection
     * @param array $data
     */
    private function addToCollection(LinkCollection $linkCollection, $data)
    {
        foreach($data as $row) {
            $model = new LinkModel();
            $model->setData($row);
            $linkCollection->addModel($model);
        }
    }
}