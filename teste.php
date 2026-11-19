<?php
require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/config.php';

$cliente = new MongoDB\Client($config['uri']);

$cliente->selectDatabase('admin')->command(['ping' => 1]);

echo 'Conectou no Atlas!';