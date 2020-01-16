<?php
require ROOT . '/vendor/autoload.php';
require_once ROOT . "/application/config/db.php";

require_once ROOT . "/application/core/Model.php";
require_once ROOT . "/application/core/controller.php";
require_once ROOT . "/application/core/router.php";

$rout = new Route();
$rout->start();
