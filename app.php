<?php

declare(strict_types=1);

$container = require 'app/bootstrap.php';
$container->call(['\App\Core\Bootstrap', 'run'], []);
