<?php


namespace DataImport\Http;


interface RequestInterface {

    /**
     * @param string $mode
     * @param string $key
     * @param string $value
     * @return mixed
     */
    public function getVar($mode, $key, $value = '');

    /**
     * @param string $key
     * @param string $value
     * @return mixed
     */
    public function getGet($key, $value = '');

    /**
     * @param string $key
     * @param string $value
     * @return mixed
     */
    public function getPost($key, $value = '');
}