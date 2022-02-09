<?php

define('PROJECT_ROOT', realpath(__DIR__ . '/../'));

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/Util/VarBucket.php';

echo renderTemplate(getFullPath('pub/templates/main.phtml'));
