<?php
class Controller
{
    function __construct()
    {
        $this->model = new Model();
        $this->view = new VIew();
    }
}