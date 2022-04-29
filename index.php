<?php
declare(strict_types = 1);

require_once __DIR__ .'/vendor/autoload.php';

// use Philipowusuasare\BugReport\Helpers\Config;

$config = Philipowusuasare\BugReport\Helpers\Config::get('app');
var_dump($config);