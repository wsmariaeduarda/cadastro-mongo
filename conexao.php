<?php
require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/config.php';

$cliente = new MongoDB\Client($config['uri']);
$banco = $cliente->selectDatabase($config['banco']);