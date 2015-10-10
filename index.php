<?php
require_once __DIR__ . '/vendor/autoload.php';

use DataImport\Application;
use DataImport\Http\Request;
use DataImport\Config;

$app = new Application(
    new Request(),
    new Config(__DIR__ . '/config.ini')
);
$app ->run();