<?php
//PASSWORD = md5('admin123qwe')

ini_set('display_errors', 1);
error_reporting(E_ALL);

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
session_start();
$_SESSION["TEST"] = 123132;
require_once ROOT . '/application/bootstrap.php';