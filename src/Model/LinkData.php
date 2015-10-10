<?php

namespace DataImport\Model;


class LinkData implements AnyModel {

    /**
     * @var string
     */
    public $favorite;

    /**
     * @var string
     */
    public $fromUrl;

    /**
     * @var string
     */
    public $toUrl;

    /**
     * @var string
     */
    public $anchorText;

    /**
     * @var string
     */
    public $linkStatus;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $blDom;

    /**
     * @var int
     */
    public $domPop;

    /**
     * @var int
     */
    public $power;

    /**
     * @var int
     */
    public $trust;

    /**
     * @var int
     */
    public $powerTrust;

    /**
     * @var int
     */
    public $alexa;

    /**
     * @var string
     */
    public $ip;

    /**
     * @var string
     */
    public $countryCode;

    /**
     * @param array $data
     */
    public function __construct(array $data = null)
    {
        if(isset($data)) {
            $this->setData($data);
        }
    }

    /**
     * @param array $data
     * @return void
     */
    public function setData(array $data)
    {
        $this->favorite     = (isset($data['favorite'])) ? $data['favorite'] : null;
        $this->fromUrl      = (isset($data['fromUrl'])) ? $data['fromUrl'] : null;
        $this->toUrl        = (isset($data['toUrl'])) ? $data['toUrl'] : null;
        $this->anchorText   = (isset($data['anchorText'])) ? $data['anchorText'] : null;
        $this->linkStatus   = (isset($data['linkStatus'])) ? $data['linkStatus'] : null;
        $this->type         = (isset($data['type'])) ? $data['type'] : null;
        $this->blDom        = (isset($data['blDom'])) ? $data['blDom'] : null;
        $this->domPop       = (isset($data['domPop'])) ? $data['domPop'] : null;
        $this->power        = (isset($data['power'])) ? $data['power'] : null;
        $this->trust        = (isset($data['trust'])) ? $data['trust'] : null;
        $this->powerTrust   = (isset($data['powerTrust'])) ? $data['powerTrust'] : null;
        $this->alexa        = (isset($data['alexa'])) ? $data['alexa'] : null;
        $this->ip           = (isset($data['ip'])) ? $data['ip'] : null;
        $this->countryCode  = (isset($data['countryCode'])) ? $data['countryCode'] : null;
    }

}