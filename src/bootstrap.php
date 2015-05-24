<?php
require dirname(__DIR__) . '/vendor/autoload.php';
$app = new Sandip\Website\Application(dirname(__DIR__));
//echo '<pre>'; print_r($app);exit;
return $app;
