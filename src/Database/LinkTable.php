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
}