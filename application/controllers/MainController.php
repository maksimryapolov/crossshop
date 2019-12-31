<?php

class MainController extends Controller
{
    public function actionIndex()
    {
        $modlaProduct = $this->model->init("MainModal");
        $result = $modlaProduct->getListProduct();
        $slides = $modlaProduct->getSlideProduct();

        require_once ROOT . "/application/views/index/index.php";
    }
}