<?php

class Model
{
    public function __construct() {}

    public function init ($name)
    {
        if(file_exists(ROOT . "/application/models/" . $name . ".php")) {
            require_once ROOT . "/application/models/" . $name . ".php";
            return new $name;
        }
    }
}
