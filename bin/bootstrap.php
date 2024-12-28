<?php

declare(strict_types=1);

namespace Mistralys\Starfield;

if(!file_exists(__DIR__.'/../vendor/autoload.php')) {
    die('ERROR: Please run `composer install` first.');
}

if(!file_exists(__DIR__.'/../config.php')) {
    die('ERROR: Please create the config.php file first.');
}

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config.php';