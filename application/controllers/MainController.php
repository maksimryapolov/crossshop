<?php

class MainController extends Controller
{
    public function actionIndex()
    {
        $modleProduct = $this->model->init("MainModel");
        $result = $modleProduct->getListProduct();
        $slides = $modleProduct->getSlideProduct();

        require_once ROOT . "/application/views/index/index.php";
    }
}